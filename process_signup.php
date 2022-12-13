<?php

    session_start();
    require 'dbcred.php';
    if(isset($_POST['submit'])) {
        // echo 'Correct';
        # code...
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $checkExist = "SELECT * FROM users WHERE email = '$email'";
        $queryExist = $connectDb->query($checkExist);
        if ($queryExist->num_rows > 0) {
           $_SESSION['message']= 'This email already exist.';
           header("Location: signup.php");
        }else{
             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // echo $hashedPassword;

            $query = "INSERT INTO users (`first_name`, `last_name`, `email`, `phone_number`, `address`, `password`) VALUES ('$first_name', '$last_name', '$email','$phone_number', '$address', '$hashedPassword')";
             $queryDb = $connectDb->query($query);
             if($queryDb){
                header("Location: signin.php");
             }else{
                $_SESSION['message'] = "Registration failed. Try again later.";
             }
        }
       

    }else{
        echo 'wrong entry';
        header('Location:signup.php');
    }


?>