<?php

if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

if (!empty(Session::get('loggedin'))) {
    // Fetch the current logged-in user
    $currentUser = $pdo->select("SELECT * FROM user_blog WHERE id = ?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC);

    // Check if the user is an admin
    $isAdmin = ($currentUser['access'] === 'admin');

    if (file_exists('public/txt/category.txt')) {
        $file = explode(',', trim(file_get_contents('public/txt/category.txt'), ' '));
    }

    // Handle post creation
    if (isset($_POST['create-post'])) {
        $title = sanitize($_POST['title']);
        $body = sanitize($_POST['body']);
        $category = sanitize($_POST['category']);
        $img = $_FILES['upload'];

        // Only admins can publish posts
        $publish = $isAdmin && isset($_POST['publish']) ? 1 : 0;

        $path = fileUpload($img);

        $postData = [
            'Title' => $title,
            'Body' => $body,
            'Category' => $category
        ];

        $msg = isEmpty($postData);

        if ($msg != 1) {
            redirect('create-post', $msg);
        }

        // Insert post into database
        $pdo->insert('INSERT INTO posts(title, body, author, category, publish, img) VALUES(?,?,?,?,?,?)', [
            $postData['Title'], 
            $postData['Body'], 
            $currentUser['id'], 
            $postData['Category'], 
            $publish, 
            $path
        ]);

        if ($pdo->status) {
            // Post created successfully
            redirect('create-post', "Post created Successfully", 'success');
        }
    }

    // Handle post deletion
    if (isset($_GET['del_post'])) {
        $id = $_GET['del_post'];
        $pdo->delete("DELETE FROM posts WHERE id = ?", [$id]);
        redirect('view-post', "Post deleted Successfully", 'success');
    }


  
    

    require_once 'view/loggedin/view.createpost.php';
}






// Fetch comments for a post

