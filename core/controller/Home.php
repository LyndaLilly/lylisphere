<?php

if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

// Check if a user is logged in
$currentUser = null;
$isLoggedIn = false;

// Ensure the session is started and the key exists
$loggedInUserId = Session::get('loggedin');
if (!empty($loggedInUserId)) {
    $currentUser = $pdo->select("SELECT * FROM user_blog WHERE id = ?", [$loggedInUserId])->fetch(PDO::FETCH_ASSOC);
    if ($currentUser) {
        $isLoggedIn = true;
    }
}

// Fetch published posts and related comments and likes
$posts = $pdo->select("SELECT posts.*, user_blog.username FROM posts JOIN user_blog ON posts.author = user_blog.id WHERE posts.publish = ?", [1])->fetchAll(PDO::FETCH_ASSOC);

if (file_exists('public/txt/category.txt')) {
    $cat = explode(',', trim(file_get_contents('public/txt/category.txt'), ' '));
}

// Debug: Check the fetched posts
error_log("Fetched Posts: " . print_r($posts, true));

foreach ($posts as &$post) {
    // Fetch comments for each post
    $post['comments'] = $pdo->select("SELECT c.comment, u.username, c.created_at FROM comments c JOIN user_blog u ON c.user_id = u.id WHERE c.post_id = ?", [$post['id']])->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch like count for each post
    $post['like_count'] = $pdo->select("SELECT COUNT(*) as total_likes FROM likes WHERE post_id = ?", [$post['id']])->fetch(PDO::FETCH_ASSOC)['total_likes'];
    
    // Check if the current user liked the post (if logged in)
    if ($isLoggedIn) {
        $post['user_liked'] = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_id = ?", [$post['id'], $currentUser['id']])->fetch(PDO::FETCH_ASSOC) ? true : false;
    } else {
        // Check if the IP address liked the post (if not logged in)
        $userIp = $_SERVER['REMOTE_ADDR'];
        $post['user_liked'] = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_ip = ?", [$post['id'], $userIp])->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
unset($post);

// Handle comment submission
if (isset($_POST['add_comment']) && $isLoggedIn) {
    $comment = sanitize($_POST['comment']);
    $postId = sanitize($_POST['post_id']);
    $userId = $currentUser['id'];

    if (!empty($comment)) {
        $pdo->insert("INSERT INTO comments(post_id, user_id, comment) VALUES(?, ?, ?)", [$postId, $userId, $comment]);
        if ($pdo->status) {
            redirect('home', "Comment added successfully", 'success');
        }
    } else {
        redirect('home', "Comment cannot be empty", 'error');
    }
}


// Handle like/unlike submission (toggle like/unlike)
if (isset($_POST['like_post'])) {
    $postId = sanitize($_POST['post_id']);
    
    if ($isLoggedIn) {
        $userId = $currentUser['id'];

        // Check if the user has already liked the post
        $existingLike = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_id = ?", [$postId, $userId])->fetch(PDO::FETCH_ASSOC);

        if ($existingLike) {
            // User already liked the post, so unlike it
            $pdo->delete("DELETE FROM likes WHERE id = ?", [$existingLike['id']]);
            redirect('home', "Like removed", 'success');
        } else {
            // Add a like
            $pdo->insert("INSERT INTO likes(post_id, user_id) VALUES(?, ?)", [$postId, $userId]);
            redirect('home', "Post liked", 'success');
        }
    } else {
        // Handle anonymous user likes
        $userIp = $_SERVER['REMOTE_ADDR'];

        // Check if the IP address already liked the post
        $existingLike = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_ip = ?", [$postId, $userIp])->fetch(PDO::FETCH_ASSOC);

        if ($existingLike) {
            // IP address already liked the post, so unlike it
            $pdo->delete("DELETE FROM likes WHERE id = ?", [$existingLike['id']]);
            redirect('home', "Like removed", 'success');
        } else {
            // Add a like for anonymous user
            $pdo->insert("INSERT INTO likes(post_id, user_ip) VALUES(?, ?)", [$postId, $userIp]);
            redirect('home', "Post liked", 'success');
        }
    }
}

// Fetch published posts and related comments and likes
$posts = $pdo->select("SELECT posts.*, user_blog.username FROM posts JOIN user_blog ON posts.author = user_blog.id WHERE posts.publish = ?", [1])->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as &$post) {
    // Fetch comments for each post
    $post['comments'] = $pdo->select("SELECT c.comment, u.username, c.created_at FROM comments c JOIN user_blog u ON c.user_id = u.id WHERE c.post_id = ?", [$post['id']])->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch like count for each post
    $post['like_count'] = $pdo->select("SELECT COUNT(*) as total_likes FROM likes WHERE post_id = ?", [$post['id']])->fetch(PDO::FETCH_ASSOC)['total_likes'];
    
    // Check if the current user liked the post (if logged in)
    if ($isLoggedIn) {
        $post['user_liked'] = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_id = ?", [$post['id'], $currentUser['id']])->fetch(PDO::FETCH_ASSOC) ? true : false;
    } else {
        // Check if the IP address liked the post (if not logged in)
        $userIp = $_SERVER['REMOTE_ADDR'];
        $post['user_liked'] = $pdo->select("SELECT * FROM likes WHERE post_id = ? AND user_ip = ?", [$post['id'], $userIp])->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
unset($post);


// // Pass the post data as JSON to the view
// $postsJson = toJson($posts);

// // Debug: Check the posts JSON
// error_log("Posts JSON: " . $postsJson);

require_once("view/guest/view.home.php");
