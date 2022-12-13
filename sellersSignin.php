<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sellers Signup</title>

</head>
<body style='background-color:rgba(59, 10, 65, .8);'>
<div class='container vh-100' style='background-color:rgba(59, 10, 65, .8);'><br><br>
    <div class="row">
         <div class=" col-5 mx-auto shadow-lg p-3">
            <div class='card p-4' >
            <?php
        require 'dbcred.php';
         session_start();
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo $email;
            $query = "SELECT * FROM sellers WHERE email=  '$email'";
            $queryDb = $connectDb->query($query);

            if ($queryDb->num_rows > 0) {
                $userDetails = $queryDb->fetch_assoc ();
                $_SESSION['seller_id']= $userDetails['seller_id'];
                $pass = $userDetails['password'];
                $verify = password_verify($password, $pass);
                if ($verify) {
                    print_r($_SESSION['seller_id']);
                    header("Location: sellersDashboard.php");
                } 
            else {
                    echo "<div class='alert alert-danger text-center'> Incorrect Password .</div>";
                }
            }else{
                echo "<div class='alert alert-danger text-center'> Invalid Login Details.</div>";
            }
        }
    ?>

                <form action=<?php echo $_SERVER['PHP_SELF'] ?> method='POST'>
                <h1 class='text-center' style='color:rgba(59, 10, 65, .8);'>SIGNIN</h1>
                <input type="email" placeholder='Email' name='email' class='form-control mb-3' style='border-radius:30px;'>
                <input type="password" placeholder='Password' name='password' class='form-control mb-3' style='border-radius:30px;'>
                <input type="submit" class='btn btn-success text-light' style='background-color:rgba(59, 10, 65, .8);' name='submit' value='submit'>
                <!-- <button class='btn btn-success '>SIGNUP</button> -->
               </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>