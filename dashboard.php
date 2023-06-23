<?php
    require 'dbcred.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        // $userDetails = $_SESSION['userDetails'];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE `user_id` = '$user_id'";
        $queryDb = $connectDb->query($query);
        $userDetails = $queryDb->fetch_assoc();

    }else{
        header('Location: signin.php');
    }
    

?>

<!-- $query2 = "SELECT * FROM products JOIN sellers USING (`seller_id`)";
        $queryDb2 = $connectDb->query($query2); -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="seller.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./sidebar.css">
    <title></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <img src="../../assets/images/a-icon.png" alt="" width="60px">
    <h2 class="text-light">
      <?php
        echo $userDetails['first_name'];
      ?>
    </h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link mx-2 text-light" href="dashboard.php"><b>Home</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2 text-light" href="userprofile.php"><b>Profile</b></a>
      </li>
    </ul>
    <form class="form-inline my-2 mr-5 my-lg-0">
      <button class="btn mr-2"><a href="signin.php" style='text-decoration:none;color:white;border-radius:30px;'>Login</a></button>
      <button class="btn btn-md mr-2"><a style='text-decoration:none;color:white;border-radius:30px;' href="signup.php" >Signup</a></button>
    </form>
  </div>
</nav>
    <div class='container'>
      <H2 class='text-center fw-bold'>
        <?php  
          echo $userDetails['first_name'];
          echo $userDetails['last_name'];
        ?>
      </H2>
      <div class="row p-5">
          <?php
               require 'dbcred.php';
               $query2 = "SELECT * FROM product JOIN sellers USING (seller_id) JOIN category USING (category_id)";
               $queryDb = $connectDb->query($query2);
                //    $query3= "SELECT * FROM product JOIN category USING (category_id)";
                //$queryDb = $connectDb->query($query3);
               if ($queryDb->num_rows > 0) {
                while ($all = $queryDb->fetch_assoc()) {
                    $image = $all['image'];
                    // $image = $cat['image'];

                  //  *ngFor="let item of courseArray let id = index ;">
                  //   <span class="position-absolute top-0 start-100 translate-middle p-2 border border-light rounded-circle"
                  //     id="btn">{{item.status}}
                  //   </span>
                  //   <ul class="list-group list-group-flush">
                  //     <li class="list-group-item">Name: {{item.first_name}} {{item.last_name}}</li>
                  //     <li class="list-group-item">Title: {{item.title}}</li>
                  //     <li class="list-group-item">Description: {{item.desc}}</li>
                  //   </ul>



                echo "<div class='col-2 m-3 p-3 shadow' style='width: 18rem;' >
                        <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Name: {$all['name']}</li><img src='uploads/{$all['image']}' style='height:30vh;' alt=''>
                        <li class='list-group-item'>Product: {$all['product_name']}</li>
                        <li class='list-group-item'>Price: #{$all['price']}</li>
                        <li class='list-group-item'>Quantity: {$all['quantity']}</li>
                        <li class='list-group-item'>Category-Name: {$all['cat_name']}</li>
                        <form method='post' action='addToCart.php'>
                          <input type='hidden' name='index' value='{$all['product_id']}'>
                          <input type='hidden' name='index2' value='{$userDetails['user_id']}'>
                          <button class='btn btn-success m-2' type='submit' name='addToCart' value='addToCart'>Add to Cart</button>
                        </form>
                        </ul>
                        </div>"
                           ; 
                          }
                        }
                        
                        
                        
                        ?>
        </div>
        </div>
        </div>
      </div>
      <script src="./sidebar.js"></script>
    </body>
</html>