<?php


if(isset($_GET['title'])){
    $title = sanitize($_GET['title']);

    $res = $pdo->select("SELECT * FROM posts WHERE title=? LIMIT 1", [$title])->fetch(PDO::FETCH_ASSOC);

    $posts = toJson($res);

 
}

require 'view/guest/view.blogdetails.php';