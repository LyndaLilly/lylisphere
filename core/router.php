<?php

$routes = [
    '/' => 'core/controller/Home.php',
    'home' => 'core/controller/Home.php',
    // 'about' => 'core/controller/about.php',
    'contact' => 'core/controller/Contact.php',
    'auth-register' => 'core/controller/Register.php',
    'auth-login' => 'core/controller/Login.php',
    'dashboard' => 'core/controller/AdminDashboard.php',
    'profile' => 'core/controller/UserDashboard.php',
    'create-post' => 'core/controller/Post.php',
    '404' => 'core/controller/404.php',
    '403' => 'core/controller/403.php',
    'blog-details' => 'core/controller/Blogdetails.php',
    'view-post' => 'core/controller/Viewpost.php',
    'users-post' => 'core/controller/Userspost.php',
    'edit-post' => 'core/controller/Editpost.php',
    'forgot-password' => 'core/controller/Forgot_password.php',
    'reset-password' => 'core/controller/Reset_password.php',
    'password-code' => 'core/controller/Passcode.php',

];


$admin_pages = ['dashboard', 'users-post', 'blog-details', 'contact', 'auth-login', 'auth-register', 'create-post', 'home', '/', 'view-post', 'edit-post'];

$guest_pages = ['home', 'users-post', '/', 'profile', 'create-post', 'contact', 'auth-register', 'auth-login', 'blog-details', 'edit-post', 'forgot-password', 'reset-password', 'password-code'];

if(Session::exists('loggedin')){
    $access_level = toJson($pdo->select("SELECT * FROM user_blog WHERE id=?", [Session::get("loggedin")])->fetch(PDO::FETCH_ASSOC))->access;

    switch($access_level){
        case 'guest' :
            if(in_array($url, $guest_pages)){
                require $routes[$url];
            }else{
                abort(403);
            }

            break;

            case 'admin' :

                if(in_array($url, $admin_pages)){
                    require $routes[$url];
                }else{
                    abort(403);
                }
                break;

    }
}else{
    if(in_array($url, $guest_pages)){
        require $routes[$url];
    }else{
        abort(404);
    }
}




