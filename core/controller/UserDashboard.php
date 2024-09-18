<?php

$title = 'Dashboard' . '|' . SITE_TITLE;

if(isset($_POST['logout'])){
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}
if(!empty(Session::get('loggedin'))){
    
    $currentUser = toJson($pdo->select("SELECT * FROM user_blog WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));





    
    require_once 'view/guest/auth/view.profile.php';


}


