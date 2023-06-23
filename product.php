<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</div>
    <div class='container'>
      <H2 class='text-center fw-bold'>
       
      </H2>
        <div class="row gx-3 gy-5 mb-3 pt-5">
          <?php
               require 'dbcred.php';
          // session_start();
          //   if(isset($_SESSION['seller_id'])){
          //      $seller_id = $_SESSION['seller_id'];
               $query2 = "SELECT * FROM product JOIN sellers USING (seller_id) JOIN category USING (category_id)";
               $queryDb = $connectDb->query($query2);
                //    $query3= "SELECT * FROM product JOIN category USING (category_id)";
                //$queryDb = $connectDb->query($query3);
               if ($queryDb->num_rows > 0) {
                while ($all = $queryDb->fetch_assoc()) {
                    $image = $all['image'];
                    // $image = $cat['image'];
                echo "<div class='col-lg-3 col-md-5 col-sm-7 '>
                <a href='/php_class/signup.php' class='text-decoration-none'>
                        <div class=''>
                        <div class='px-5 text-center info'>
                        <div class='h5 text-dark'>Name: {$all['name']}</div>
                        <div class='card'><img src='uploads/{$all['image']}' style='height:20vh;' alt=''>
                            <div class='h6 text-dark'>Product: {$all['product_name']}</div>
                            <div class='h6 text-dark fw-bold'>Price:#{$all['price']}</div>
                            <div class='h6  text-dark'>Quantity: {$all['quantity']}</div>
                            <div class='h6 text-dark'>Category-Name: {$all['cat_name']}</div>
                            <form method='post' action='addToCart.php'>
                           <input type='hidden' name='index' value='{$all['product_id']}'>
                           <button class='btn btn-success m-2' type='submit' name='addToCart' value='addToCart'>Add to Cart</button>
                           </form>
                           </div>
                           </div>
                        
                           </div>
                           </div>"
                           ; 
                          }
                        }
                      // }
                        
                        
                        
                        ?>
        </div>
      </div>
</body>
</html>