<?php

if (isset($_POST['login'])) {

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    $userData = ['email' => $email, 'password' => $password];

    $msg = isEmpty($userData);

    if ($msg != 1) {
       redirect('auth-login', $msg);
    }

    $res = $pdo->select("SELECT * FROM user_blog WHERE email=? LIMIT 1", [$userData['email']])->fetch(PDO::FETCH_ASSOC);

    if (empty($res)) {
        redirect('auth-login',  "Email or password incorrect!!!");
    }

    $res = json_decode(json_encode($res));

    if (!password_verify($userData['password'], $res->password)) {
        redirect('auth-login', 'Email or password incorrect!!!');
    }

    // Store user data in session
    Session::put('loggedin', $res->id);
    Session::put('userData', $res); // Store entire user data object in session

    if ($res->access === 'admin') {
        redirect('dashboard');
    } else {
        redirect('home');
    }
}

require_once 'view/guest/auth/view.login.php';
