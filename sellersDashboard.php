<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>SIGNUP</title>
</head>
<body style='background-color:rgba(59, 10, 65, .8);'>
  <div class="container"><br><br>
    <div class="row">
        <div class="col-5 mx-auto" style='background-color:rgba(59, 10, 65, .8);'>
          <h3 class='text-center text-light'>UPLOAD YOUR PRODUCT</h3>
          <form action="process_sellersDashboard.php" method="post" enctype="multipart/form-data">
           <!-- <?php
            session_start();
              if (isset($_SESSION['message'])) {
                echo"<div class='text-dark text-center'>".$_SESSION['message'] . "</div>";
              };
            // session_unset();
            ?> -->
            <input type="text" placeholder='Name of product' name='product_name' class='form-control mb-3' style='border-radius:30px;'><br>

            <input type="text" placeholder='Quantity' name='quantity' class='form-control mb-3' style='border-radius:30px;'><br>

            <input type="text" placeholder='Details' name='details' class='form-control mb-3' style='border-radius:30px;'><br>
                        
            <input type="text" placeholder='Price' name='price' class='form-control mb-3' style='border-radius:30px;'><br>
                        
            <input type="file" name='profilePic'class='text-light mb-3'><br>

                        
            <select name="product_category" class="form-control mb-3 bg-transparent text-light" id="">
            <option value="" class='text-light'>Choose a category</option>
            <?php
                require 'dbcred.php';
               $query = "SELECT * FROM category";
                $queryDb = $connectDb->query($query);
               if ($queryDb->num_rows > 0 ) {
                while ($all = $queryDb->fetch_assoc()) {
                  echo "<option class='form-control' value='{$all['category_id']}'>{$all['cat_name']}<option/>";
                }
              }
            ?>
            </select>
           <div>
           <input type="Submit" name='Submit' id='button' class='btn btn-success' value='Submit'>

            <button class="btn btn-success"><a href="seller_product.php" style='text-decoration:none;'>View Product</a></button>
            
           </div>

          </form>
        </div>
    </div><br>
  </div>
</body>
</html>
  