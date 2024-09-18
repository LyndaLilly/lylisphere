<?php 


function dnd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    die;
}

function sanitize($data)
{
    return htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

function isEmpty($data)
{
    foreach ($data as $key => $value) {
        if (empty($value)) {
            return $key . " field is empty";
        }
    }
    return 1;
}

function redirect($where, $info = '', $type = 'danger')
{
    if (empty($info)) {
        header("location: $where");
    }

    if (!empty($info)) {
        header("location: $where?error=$info&type=$type");
    }
    exit;

}

function abort($code)
{
    http_response_code($code);
    require "controller/$code.php";
    die;
}

function toJson($res){
    return json_decode(json_encode($res));

}

function fileUpload($upload){
    $target_dir = 'uploads/';
    $allowed_size = 1000000; //1mb
    $allowed_type = Array('jpg','jpeg','png','gif', 'webp');
    $error = [];
    
    if(!is_dir($target_dir)){
        $target_dir = mkdir('uploads');
    }
    $targetFile = $target_dir .time().basename($upload['name']);
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    $fileSize = $upload['size'];
    $getImgSize = getimagesize($upload['tmp_name']);

    if(!$getImgSize){
        $error['invalid'] = "File does not exist";
    }

    if($fileSize > $allowed_size){
        $error['size'] = "File size shouldnt be more than 1mb";
    }

    if(!in_array($fileType,$allowed_type)){
        $error['type'] = 'File type not allowed';
    }

    if(empty($error)){
        if(move_uploaded_file($upload['tmp_name'],$targetFile)){
            return $targetFile;
        }else{
            return $error;
        }
    }

   
}



function timeAgo($datetime) {
    $time = strtotime($datetime);
    $diff = time() - $time;
    
    if ($diff < 60) {
        return $diff . ' seconds ago';
    } elseif ($diff < 3600) {
        return round($diff / 60) . ' minutes ago';
    } elseif ($diff < 86400) {
        return round($diff / 3600) . ' hours ago';
    } else {
        return round($diff / 86400) . ' days ago';
    }
}
