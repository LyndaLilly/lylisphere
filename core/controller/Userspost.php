<?php

if(isset($_POST['logout'])){
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

if(!empty(Session::get('loggedin'))){
    // Fetch the current user's data
    $currentUser = toJson($pdo->select("SELECT * FROM user_blog WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));

    // Fetch only posts created by the current user
    $posts = toJson($pdo->select("SELECT * FROM posts WHERE author=?", [Session::get('loggedin')])->fetchAll(PDO::FETCH_ASSOC));
}

require 'view/guest/auth/view.viewuserpost.php';
