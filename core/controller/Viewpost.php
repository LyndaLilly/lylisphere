<?php
if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

if (!empty(Session::get('loggedin'))) {
    // Fetch the current logged-in user
    $currentUser = toJson($pdo->select("SELECT * FROM user_blog WHERE id = ?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));

    // Fetch all posts regardless of publish status
    $posts = toJson($pdo->select("SELECT posts.*, user_blog.username AS author FROM posts JOIN user_blog ON posts.author = user_blog.id")->fetchAll(PDO::FETCH_ASSOC));

    // Unpublish post logic
    if (isset($_GET['unpublish_post'])) {
        $id = $_GET['unpublish_post'];
        $result = $pdo->update("UPDATE posts SET publish = 0 WHERE id = ?", [$id]);

        if ($result) {
            redirect('view-post', "Post unpublished successfully", 'success');
        }
    }

    // Publish post logic
    if (isset($_GET['publish_post'])) {
        $id = $_GET['publish_post'];
        $result = $pdo->update("UPDATE posts SET publish = 1 WHERE id = ?", [$id]);

        if ($result) {
            redirect('view-post', "Post published successfully", 'success');
        }
    }
}

require 'view/loggedin/view.viewpost.php';
