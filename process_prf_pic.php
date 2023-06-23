<?php
    session_start();
    require('dbcred.php');
    $fileName = $_FILES['profilePic']['name'];
    $newName = time().$fileName;
    $user_id = $_SESSION['user_id'];

    $uploading = move_uploaded_file($_FILES['profilePic']['tmp_name'],"uploads/".$newName);
    if($uploading){
        $query = "UPDATE users SET `prf_pic` = '$newName' WHERE `user_id` = '$user_id'";
        $queryDb = $connectDb->query($query);
        // $queryDb = $connectDb->query($query);
        if($queryDb){
            header('Location: dashboard.php');
        }else{
            $_SESSION['upload_error'] = "Unable to Upload.";
        }
    }else{
        $_SESSION['upload_error'] = "Unable to Upload.";
    }


?>