<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $handler = mysqli_connect("localhost", "root", "", "doctra");
    $query = "SELECT * FROM `customers` WHERE email ='".$_SESSION['email']."'";
    $result = mysqli_query($handler, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row["email"];
} else {
}

// sql statement for logged in customer's orders from  the order_list database 
$GetProd="SELECT products, orderDate FROM order_list, customers WHERE order_list.customerID= customers.customerID AND email ='".$_SESSION['email']."' ";
//query to get the customer's orders
$GetProdRes=mysqli_query($handler, $GetProd);
// query to get date of each orders
$productGroups = mysqli_fetch_all($GetProdRes, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<title>Doctra | Purchase History</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/products.css" type="text/css">
<link rel="stylesheet" href="css/purchasehistory.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<link rel="icon" href="img/template-image/favicon.png">
</head>
<body id="style-1">
<!-- Navigation Bar -->
<div id="home" class="nav-bar">
    <nav class="nav-box">
        <a class="logo-text" href="index.php">
            <img class="nav-logo" src="img/template-image/nav_logo.svg" alt="Doctra">
            <b>doctra</b>
        </a>
        <?php 
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<button onclick="showLogoutDiv()" class="nav-contact nav-list logged-in">';
            echo "Hello, ",$_SESSION['fname'],"!"; 
            echo '</button>';
        } else {
            echo '<a class="nav-contact nav-list" href="login.php">';
            echo "Login | Register";
            echo '</a>';
        }
        ?>
        <!--Shopping Cart Icon-->
        <img class="my-cart cart-icon" src="img/template-image/mycart.svg" alt="Doctra">
        
        <a class="nav-list" href="products.php">Products<div class="nav-active"></div></a>
        <a class="nav-list" href="details.php">Details</a>
        <a class="nav-list" href="index.php">Home</div></a>
        
        <!--Cart Drop Down List-->
        <div class="cart-list hide">
            <div class="overlay"></div>
            <div class="top">
                <button id="closeButton">
                    <i class="fa fa-close"></i>
                </button>
                <h3>My Cart</h3>
                <button class="checkout hidden" onclick="document.location='cart.php'">Check Out</button>
            </div>
            <ul id="addItems"></ul>
        </div>
    </nav>
    <div id="logout-box" style="left: 50%; transform: translate(550px);">
        <div class="account-button"><a href="profile.php">My Account</a></div>
        <div class="account-button"><a href="purchasehistory.php">Purchase History</a></div>
        <div class="account-button"><a href="logout.php">Log Out</a></div>
    </div>
</div>  
<!-- Main Content -->

<div class="background" style="padding-top: 100px; height: 850px">
    <div class="container">
        <div class="titlebox">
        <h1 class="title"> Purchase History </h1>  
        </div>
        <div class="table-title">Product Ordered
          <span style="padding-left: 80px">Quantity</span>
          <span style="padding-left: 120px">Price</span>
          <span style="padding-left: 114px">Delivery Date</span>
      </div>

        <div class="cart-container" id="style-1">
        <?php 
        $counter = 0;
        foreach($productGroups as $productGroup){ 
        $products= json_decode($productGroup["products"], true);
        foreach($products as $product){ 
          $counter += 1;
          ?>
            <table class="cart-table"> 
            <tr>
            <td> <img src="<?=$product['image']?>"> </td>
             <td> <?=$product['name']?> <br> <?=$product['code']?> </td>
                <td><?=$product['qty']?></td>
                <td>RM<?=$product['price']?></td>
                <td> <?=$productGroup['orderDate']?> </td>
            </tr>
            <?php }} 
            if ($counter == 0) {
              echo "<div class='nothing-inside'>You have not purchased any products.</div>";
            }
            ?>
          </table>
    
        </div>
        <div class="buttonbox"> 
        <button type="button" class="next-button" onclick="document.location='index.php'">Back to Home Page</button>
        </div>
  </div> 
  </div>
  
  
<!-- Footer -->
<footer>
  <div class="footer-content">
    <p id="copy">+(60)12-3456789</p>
    <p id="copy">doctra@gmail.com</p>
    <img class="bottom-logo" src="img/template-image/favicon.png">
    <div class="bottom-line" style="right: 0"></div>
    <img class="bottom-icon1" src="img/template-image/icon1.svg">
    <img class="bottom-icon2" src="img/template-image/icon2.svg">
    <span>Copyright © 2021 Doctra Sdn Bhd</span>
  </div>
</footer>
<script src="js/addToCart.js"></script>
<script>
function showLogoutDiv() {
  var x = document.getElementById("logout-box");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</body>
</html>