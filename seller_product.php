<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand text-danger" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="./sellersDashboard.php">Upload Product</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actions
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./sellersSignup.php">Signup</a></li>
            <li><a class="dropdown-item" href="./sellersSignin.php">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex">
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
<div class='vh-100' style='padding: 10px;'>
<h2 class="text-primary text-center">Products</h2><br><br>

    <div class="row ">
        <?php
            //  require 'dbcred.php';
            //  $query2 = "SELECT * FROM product JOIN sellers USING (seller_id) JOIN category USING (category_id)";
            //  $queryDb = $connectDb->query($query2);
            //   //    $query3= "SELECT * FROM product JOIN category USING (category_id)";
            //   //$queryDb = $connectDb->query($query3);
            //  if ($queryDb->num_rows > 0) {
            //   while ($all = $queryDb->fetch_assoc()) {
            //       $image = $all['image'];}}

            session_start();
            require 'dbcred.php';
            // $user_id = $_SESSION['user_id'];
            if(isset($_SESSION['seller_id'])){echo"hello";
            $id = $_SESSION['seller_id'];
            // $query = "SELECT * FROM product WHERE seller_id = '$id'";
                $query = "SELECT * FROM product JOIN sellers USING (seller_id = '$id') JOIN category USING (category_id)";
                $queryDb = $connectDb->query($query);
                if ($queryDb->num_rows > 0) {
                    while ($all = $queryDb->fetch_assoc ()) {
                        $image = $all['image'];
                        echo "
                        <div class='col-2 mx-auto text-center'>
                        <div class='card p-2'><img src='uploads/{$all['image']}' style='height:25vh;' alt=''>
                         <div class='h5 text-dark'>Name: {$all['name']}</div>
                            <div class='h6 '>Product: {$all['product_name']}</div>
                            <div class='h6 fw-bold'>Price:£{$all['price']}</div>
                            <div class='h6  text-dark'>Quantity: {$all['quantity']}</div>
                          <div class='h6  text-dark'>Details: {$all['details']}</div>
                            </div>
                    </div>"
                    ; 
                    }
                  }
                }
            ?>
            
        </div >
    </div>
</div>
</body>
</html>