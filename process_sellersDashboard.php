<?php
session_start();
require 'dbcred.php';
// print_r($seller_id);
// echo "$seller_id";

    if(isset($_POST['submit'])) {
         $product_name = $_POST['product_name'];
         $quantity = $_POST['quantity'];
         $details = $_POST['details'];
         $price = $_POST['price'];
         // $cat_id = $_POST['cat_id'];
         $fileName = $_FILES['profilePic']['name'];
         $newName = time().$fileName;
         $seller_id = $_SESSION['seller_id'];
         $product_category = $_POST['product_category'];
            $uploading = move_uploaded_file($_FILES['profilePic']['tmp_name'],"uploads/".$newName);
        //     $query2 = "SELECT * FROM products JOIN sellers USING (`seller_id`)";
            $checkExist = "SELECT * FROM product WHERE seller_id = '$seller_id'";
            $queryExist = $connectDb->query($checkExist);

            if ($queryExist){
                $query = "INSERT INTO product (`product_name`, `quantity`, `details`, `price`, `image`,`seller_id`, `category_id`) VALUES ('$product_name', '$quantity','$details', '$price', '$newName', '$seller_id', $product_category)";
                print_r($query);
                $queryDb = $connectDb->query($query);
                if($queryDb){
                     header('Location: seller_product.php');
                }
            }
    }
?>