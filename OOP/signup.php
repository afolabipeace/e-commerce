<?php
    require 'classes/users.php';
    $_POST = json_decode(file_get_contents("php://input"));
    $full_name = $_POST->full_name;
    $phone_no = $_POST->phone_no;
    $address = $_POST->address;
    $email = $_POST->email;
    $password = $_POST->password;

    $user = new Users;
    $insert = $user->signUpUser($full_name, $phone_no, $address, $email, $password);
    $resp =[];
    if($insert){
        $resp['success'] = true;
    }else{
        $resp['success'] = false;
    }

    echo json_encode($resp);

?>