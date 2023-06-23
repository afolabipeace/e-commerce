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
<h2 class="text-light">Autron</h2>
    <a class="navbar-brand text-danger" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="./sellersDashboard.php">Upload Product</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actions
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./sellersSignup.php">Signup</a></li>
            <li><a class="dropdown-item" href="./sellersSignin.php">Login</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class='container ' style='padding: 10px;'>
  <h2 class="text-primary text-center">Products</h2><br><br>
  <?php
  // echo $sellerDetails['name'];
  ?>
    <div class="row p-5">
        <?php
            require 'dbcred.php';
            session_start();
            $seller_id = $_SESSION['seller_id'];

                $query = "SELECT * FROM product WHERE `seller_id` = $seller_id";
                $queryDb = $connectDb->query($query);
                if ($queryDb->num_rows > 0) {
                  print_r($queryDb);
                    while ($all = $queryDb->fetch_assoc()) {
                        $image = $all['image'];
                        echo "
                        <div class='col-2 m-3 p-3 shadow' style='width: 18rem;' >
                        <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Name: {$all['name']}</li><img src='uploads/{$all['image']}' style='height:30vh;' alt=''>
                        <li class='list-group-item'>Product: {$all['product_name']}</li>
                        <li class='list-group-item'>Price: #{$all['price']}</li>
                        <li class='list-group-item'>Quantity: {$all['quantity']}</li>
                        <li class='list-group-item'>Category-Name: {$all['details']}</li>
                        </ul>
                    </div>"
                    ; 
                    }
                  }
                // }
            ?>
            
        </div >
    </div>
</div>
</body>
</html>