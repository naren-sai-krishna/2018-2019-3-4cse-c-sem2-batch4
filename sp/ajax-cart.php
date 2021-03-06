<?php
/* [INIT] */
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
require PATH_LIB . "lib-db.php";
require PATH_LIB . "lib-cart.php";
$cartLib = new Cart();

/* [HANDLE AJAX REQUEST] */
switch ($_POST['req']) {
  default:
    echo "INVALID REQUEST";
    break;

  // COUNT TOTAL NUMBER OF ITEMS
  case "count":
    $total = 0;
    
    if (is_array($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $id => $qty) {
        $total += $qty;
      }
    }
    echo $total;
    break;

  // ADD ITEM TO CART
  case "add":
    // ITEMS WILL BE STORED IN THE ORDER OF
    // $_SESSION['cart'][PRODUCT ID] = QUANTITY
    if (is_numeric($_SESSION['cart'][$_POST['product_id']])) {
      $_SESSION['cart'][$_POST['product_id']] ++;
    } else {
      $_SESSION['cart'][$_POST['product_id']] = 1;
    }
    echo "Item added to cart";
    break;

  // SHOW CART
  case "show":
    // FETCH PRODUCTS
    // Could be better here if you only get the items in the cart only
    $products = $cartLib->pGet();

    // SPIT OUT THE CART CONTENTS IN HTML
    $sub = 0;
    $total = 0;
    ?>
    <h1 style="text-align:center">MY CART</h1>
    <table class="zebra" frame="box">
      <tr>
        <th>Qty</th>
        <th>Item</th>
        <th>Price</th>
      </tr>
      <?php
      if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $id => $qty) {
          // CALCULATE THE TOTALS
          $sub = $qty * $products[$id]['product_price'];
          $total += $sub;
          // THE PRODUCT
          printf("<tr><td><input id='qty_%u' onchange='cart.change(%u);' type='number' value='%u'/></td><td>%s</td><td>&#8377;%0.2f</td></tr>", $id, $id, $qty, $products[$id]['product_name'], $sub
          );
        }
      }
      ?>
      <tr>
        <td></td>
        <td><strong>Grand Total</strong></td>
        <td><strong>&#8377;<?= $total ?></strong></td>
      </tr>
    </table>
    <?php if ($total > 0) { ?>
      <form id="cart-checkout" onsubmit="return cart.checkout();">
        Name: <input type="text" id="co_name" required/>
        Email: <input type="email" id="co_email" required/>
        <input type="submit" value="Checkout"/>
      </form>
    <?php
    }
    break;

  // CHANGE QTY
  case "change":
    if ($_POST['qty'] == 0) {
      unset($_SESSION['cart'][$_POST['product_id']]);
    } else {
      $_SESSION['cart'][$_POST['product_id']] = $_POST['qty'];
    }
    echo "Quantity updated";
    break;

  // CHECKOUT
  // THERE ARE NO ERROR & SECURITY CHECKS IN THIS SIMPLE EXAMPLE
  // BEEF UP THIS SECTION ON YOUR OWN!
  case "checkout":
    if ($cartLib->oAdd($_POST['name'], $_POST['email'])) {
      $_SESSION['cart'] = array();
      $_SESSION['beep1']="1";
      echo "OK";
    } else {
      echo $cartLib->error;
    }
    break;

  // CHECKOUT WITH EMAIL
  case "checkout-email":
    if ($cartLib->oAdd($_POST['name'], $_POST['email'])) {
      $_SESSION['cart'] = array();

      // SEND EMAIL
      // Beef up this message as you see fit
      $order = $cartLib->oGet($cartLib->lastID);
      $to = $_POST['email'];
      $subject = "Order Received";
      $message = "";
      foreach ($order['items'] as $pid=>$p) {
        $message .= $p['product_name'] . " - " . $p['quantity'] . "<br>";
      }
      $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=utf-8',
        'From: john@doe.com'
      ];
      $headers = implode("\r\n", $headers);
      echo mail($to, $subject, $message, $headers) ? "OK" : "ERROR sending email!" ;
    } else {
      echo $cartLib->error;
    }
    break;
}
?>