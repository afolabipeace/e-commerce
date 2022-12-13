<?php
     require 'classes/users.php';
     require "../vendor/autoload.php";
   //   $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
   //   $dotenv->load();

     $_POST = json_decode(file_get_contents("php://input"));
     $email = $_POST->email;
     $password = $_POST->password;

     $users = new Users;
     $insert = $users->signin($email,$password);
     $resp= [];

     if($insert){
        $resp['success'] = true;
        $resp['details'] = $insert['result'];
        $user_email = $insert['result'][0]['email'];


        $jwtDetails = [
         "iss" => "localhost:4200",
         "iat" => time(),
         "nbf" =>time(),
         "exp" => time() + 7200,
         "info" => [
            "email" => $user_email,
         ]
         
        ];

        $jwt = \Firebase\JWT\JWT::encode($jwtDetails, "peace", 'HS256');
        $resp['jwt'] = $jwt;

     }else {
        $resp['success'] = false;
     }

     echo json_encode($resp);

?>