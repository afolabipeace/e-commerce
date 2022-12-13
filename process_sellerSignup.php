<?php
    session_start();
    require 'dbcred.php';
    if(isset($_POST['submit'])) {
        // echo 'Correct';
        # code...
        $name = $_POST['name'];
        $number = $_POST['phone_number'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $checkExist = "SELECT * FROM sellers WHERE email = '$email'";
        $queryExist = $connectDb->query($checkExist);
        if ($queryExist->num_rows > 0) {
           $_SESSION['message']= 'This email already exist.';
           header("Location: sellsersSignup.php");
        }else{
             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // echo $hashedPassword;

            $query = "INSERT INTO sellers (`name`, `email`, `phone_number`, `address`, `password`) VALUES ('$name', '$email','$phone_number', '$address', '$hashedPassword')";
             $queryDb = $connectDb->query($query);
             if($queryDb){
                header("Location: sellersSignin.php");
             }else{
                $_SESSION['message'] = "Registration failed. Try again later.";
             }
        }

    }else{
        echo 'wrong entry';
        header('Location:sellsersSignup.php');
    }
?>