<?php
/* [INIT] */
session_start();
if(!isset($_SESSION['sfirstname'])){
	header('Location: ../homepage_before_login.php');
}
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
require PATH_LIB . "lib-db.php";
require PATH_LIB . "lib-cart.php";
$cartLib = new Cart();
$products = $cartLib->pGet();

/* [DRAW HTML] */
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" href="Logo.png">
    <!-- [META] -->
    <title>Cuisines</title>
    
    <meta name="description" content="Cart">
    <meta name="author" content="Naren">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- [SCRIPTS & STYLES] -->
    <link rel="stylesheet" href="public/theme.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
    <script src="public/general.js"></script>
    <script src="public/cart.js"></script>
  </head>
  <body>
    <script>
      function goBack() {
            window.history.back();
        } 
      </script>
    <!-- [NOTIFICATION BOX] -->
    <div id="noteOut"><div id="noteIn"></div></div>

    <!-- [HEADER] -->
    <header id="page-header">
    
    <button class="btn" onclick="goBack()">Back</button>
    <!-- <div id="list" style="margin-left:20%;"> 
        <a href="" >Indian</a>&nbsp;
        <a href="" >Italian</a>&nbsp;
        <a href="" >Chinese</a>&nbsp;
        <a href="" >Desserts</a>&nbsp;
    </div> -->
      <div id="page-cart" onclick="cart.toggle();">

      <img src="images/cart.png"  alt="Shopping Cart" width="30" height="30">&nbsp;&nbsp;<span id="page-cart-count">0</span>
      </div>
    </header>

    <!-- [PRODUCTS] -->	
    <div id="products" >
    <?php
      if (is_array($products)) {
        foreach ($products as $id => $row) {
          ?>
          <div class="pdt">
            
            <img src="images/<?= $row['product_image'] ?>" height="200px" width="250px" />
    
            <h3 class="pdtName"><?= $row['product_name'] ?></h3>
            <div class="pdtPrice">&#8377;<?= $row['product_price'] ?></div>
            <div class="pdtDesc"><?= $row['product_description'] ?></div><br>
            <input class="pdtAdd" type="button" value="Add to cart" style=".pdtAdd:hover{opacity:0.2;}" onclick="cart.add(<?= $row['product_id'] ?>);" style="position:relative;"/>
          </div>
        <?php
        }
      } else {
        echo "No products found.";
      }
      ?></div>

    <!-- [CART] -->
    <div id="cart" class="ninja"></div>

    <footer id="page-footer">
      &copy; RELISH 2019
    </footer>
  </body>
</html>