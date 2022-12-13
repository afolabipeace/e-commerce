<?php
    session_start();
    require 'dbcred.php';
    if(isset($_SESSION['add'])){
        print_r($_POST);
        // $userDetails = $_SESSION['userDetails'];
        $sub_cart_id = $_POST['index'];
        $checkExist = "SELECT * FROM sub_cart JOIN product USING (product_id)";
        $queryExist0 = $connectDb->query($checkExist);
       

    }else{
        header('Location: signin.php');
    }

?>