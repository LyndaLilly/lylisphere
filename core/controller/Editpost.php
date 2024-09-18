<?php


if(isset($_POST['logout'])){
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

if(!empty(Session::get('loggedin'))){
    if(isset($_GET['ed_post'])){
        $postId = $_GET['ed_post'];
        $post = $pdo->select("SELECT * FROM posts WHERE id = ?", [$postId])->fetch(PDO::FETCH_ASSOC);
    }
    
    $currentUser = toJson($pdo->select("SELECT * FROM user_blog WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));

    if(file_exists('public/txt/category.txt')){
        $file = explode(',',trim(file_get_contents('public/txt/category.txt'),' '));
    }

    if(isset($_POST['edit-post'])){
        
        $title = sanitize($_POST['title']);
        $body = sanitize($_POST['body']);
        $category = sanitize($_POST['category']);
        $img = $_FILES['upload'];

        $path = fileUpload($img);

      
    
        $postData = [
            'Title' =>$title,
            'Body' => $body,
            'Category' =>$category
        ];

        $msg = isEmpty($postData);

        if ($msg != 1) {
            redirect('create-post', $msg);
        }

   

        $pdo->update('UPDATE posts SET title = ?, body = ?, author = ?, category = ?, img = ? WHERE id = ?',[$postData['Title'],$postData['Body'],$currentUser->id,$postData['Category'],$path, $postId]);

        if ($pdo->status) {
    //send a welcome email to the user
    redirect('edit-post', "Post updated Successfully", 'success');
}




}





    
 


}




require_once("view/loggedin/view.edit.php");