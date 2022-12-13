<?php
    require 'dbcred.php';
    session_start();
    if(isset($_POST['addToCart'])){
        print_r($_POST);
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['index'];
        $user_id = $_POST['index2'];
        $status = false;

        $checkExist = "SELECT * FROM cart WHERE `user_id` = '$user_id' AND `status` = '$status'";
        $queryExist=$connectDb->query($checkExist);
        if($queryExist->num_rows > 0){
            $_SESSION['message2'] = 'this cart already exist';
            $result = $queryExist->fetch_assoc()['cart_id'];
            print_r($_SESSION['message2']);

            $checkExist0 = "SELECT * FROM sub_cart JOIN cart USING (cart_id) JOIN product USING (product_id) WHERE `status` = '0' AND `product_id` = '$product_id' AND `user_id` = '$user_id'";
            
            $queryExist0 = $connectDb->query($checkExist0);
            if($queryExist0->num_rows > 0){
                $_SESSION['message3'] = 'bought before';
                $data = $queryExist0->fetch_assoc();
                $qty = $data['Qty']+1;
                $amt = $data['price']*$qty;
                print_r($_SESSION['message3']);
                print_r($queryExist0);
                $queryUpdate = "UPDATE sub_cart SET `Qty` = '$qty', `amount` = '$amt' WHERE `product_id` = '$product_id' AND `cart_id` = '$result'";
                $queryDbUpdate = $connectDb->query($queryUpdate);
                if($queryDbUpdate){
                    header("Location:dashboard.php");
                }else{
                    $_SESSION['upload_mishap']= 'Unable to load';
                    print_r($_SESSION['upload_mishap']);
                }
            }
            else{
                $query0 = "SELECT * FROM product WHERE `product_id` = '$product_id'";
                $queryDb0 = $connectDb->query($query0);
                print_r($queryDb0);
                if($queryDb0->num_rows > 0){
                    $product = $queryDb0->fetch_assoc();
                    $amount = $product['price'];
                    $query30 = "INSERT INTO sub_cart (`Qty`, `amount`, `product_id`,`cart_id`) VALUES ('1', '$amount', '$product_id', '$result')";
                    $queryDb30 = $connectDb->query($query30);
                    print_r($queryDb30);
                    if($queryDb30){
                        header("Location: dashboard.php");
                    }
                }
            }
        }
        else{
            $query = "INSERT INTO cart (`user_id`, `status`) VALUES ('$user_id', '$status')";
            $queryDb = $connectDb->query($query);
            print_r($queryDb);
            if($queryDb){
                $checkExist4 = "SELECT * FROM cart WHERE `user_id` = '$user_id' AND `status` = '$status'";
                $queryExist4 = $connectDb->query($checkExist4);
                print_r($queryExist4);
                $result = $queryExist4->fetch_assoc()['cart_id'];
                
                $checkExist2 = "SELECT * FROM cart JOIN sub_cart USING (cart_id) WHERE `status` = '$status' AND `product_id` = '$product_id' AND `user_id` = '$user_id'";
                $queryExist2 = $connectDb->query($checkExist2);
                if($queryExist2->num_rows > 0){
                    $_SESSION['message3'] = 'bought before';
                    print_r($_SESSION['message3']);
                }
                else {
                    $query2 = "SELECT * FROM product WHERE `product_id` = $product_id";
                    $queryDb2 = $connectDb->query($query2);
                    print_r($queryDb2);

                    if($queryDb2->num_rows > 0){
                       $product = $queryDb2->fetch_assoc();
                       $amount = $product['price'];

                       $query3 = "INSERT INTO sub_cart (`Qty`, `amount`, `product_id`, `cart_id`) VALUES ('1', '$amount', '$product_id', '$result')";
                        $queryDb3 = $connectDb->query($query3);
                        print_r($queryDb3);
                        if($queryDb3){
                            header("Location:dashboard.php");
                        }
                    }
                }
            }

            else{
                $_SESSION['message2'] = "Purchase failed.Try again later";
                print_r($_SESSION['message2']);
            }
        }
    }
    else{

    }


?>