<?php
// "INSERT INTO users (first_name, last_name, email, phone_number) VALUES (?, ?, ?, ?)"
// bind_param('ssss')
require 'dbcred.php';
session_start();
     if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE email=  ?";
        $preparedQuery= $connectDb->prepare($query);
        $bindQuery = $preparedQuery->bind_param('s',$email);
        $queryDb = $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        if($result->num_rows > 0){
            $userDetails = $result->fetch_assoc();
            $pass = $userDetails['password'];
            $verify = password_verify($password, $pass);
            if ($verify) {
                $_SESSION['user_id']= $userDetails['user_id'];
                header("Location: dashboard.php");
            } else {
                echo "<div class='alert alert-danger text-center'> Incorrect Password .</div>";
            }
        }else{
            echo "<div class='alert alert-danger text-center'> Invalid Login Details.</div>";
        }
    }


?>