<?php

if(isset($_POST['logout'])){
    unset($_SESSION['loggedin']);
    session_destroy();

    redirect("home");
    exit;
}