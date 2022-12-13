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
<body  style='background-color:rgba(59, 10, 65, .8);'>
<div class='container vh-100' style='background-color:rgba(59, 10, 65, .8);'><br><br>
    <div class="row">
         <div class=" col-5 mx-auto shadow-lg p-3">
            <div class='card p-4' >
                <form action="process_sellerSignup.php" method='POST'>
                <h1 class='text-center '  style='color:rgba(59, 10, 65, .8);'>SIGNUP</h1>
                    <?php
                    session_start();
                    if (isset($_SESSION['message'])) {
                        echo"<div class='alert alert-danger text-center'>". $_SESSION['message'] . "</div>";
                    }
                    ?> 
                <input type="text" style='border-radius:30px;' placeholder='Name' name='name' class='form-control mb-3'>
                
                <input type="text" placeholder='Address' name='address' class='form-control mb-3' style='border-radius:30px;'>

                <input type="email" placeholder='Email' name='email' class='form-control mb-3' style='border-radius:30px;'>

                <input type="text" placeholder='Phonenumber' name='phone_number' class='form-control mb-3' style='border-radius:30px;'>

                <input type="password" placeholder='Password' name='password' class='form-control mb-3' style='border-radius:30px;'>

                <input type="submit"  style='background-color:rgba(59, 10, 65, .8);' class='btn btn-success text-light' name='submit' value='submit'>
                <!-- <button class='btn btn-success '>SIGNUP</button> -->
               </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>