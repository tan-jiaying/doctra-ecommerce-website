<?php
include('auth.php');
?>
<!DOCTYPE html>
<html>
<title>Doctra | My Cart</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/cart.css" type="text/css">
<link rel="stylesheet" href="css/products.css" type="text/css">
<!--Icon Library-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
  <link rel="icon" href="img/template-image/favicon.png">
</head>

<!--Remove products from local storage key "toCheckout" when page is refreshed-->
<body onload="refresh()" onpageshow="refresh()" id="style-1"> 
<div id="home" class="nav-bar">
    <nav class="nav-box">
        <a class="logo-text" href="index.php">
            <img class="nav-logo" src="img/template-image/nav_logo.svg" alt="Doctra">
            <b>doctra</b>
        </a>
        <?php 
        // display first name if user is logged in
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
        
        <!--Link to Pages from Navigation Bar-->
        <a class="nav-list" href="products.php">Products<div class="nav-active" style="width: 40px; transform: translate(94px);"></div></a>
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

    <!--Drop Down List for Profile, Purchase History and Logout-->
    <div id="logout-box" style="left: 50%; transform: translate(550px);">
        <div class="account-button"><a href="profile.php">My Account</a></div>
        <div class="account-button"><a href="purchasehistory.php">Purchase History</a></div>
        <div class="account-button"><a href="logout.php">Log Out</a></div>
    </div>
</div>  

<!-- Main Content -->
  <div class="background">
    <h1>My Cart</h1>

    <!--Progress Bar-->
    <div class="progress-bar-container">
      <ul class="progress-bar">
          <li class="active">Cart</li>
          <li>Total</li>
          <li>Details</li>
          <li>Complete</li>
      </ul>
  </div>
  <br>

    <!--Products in shopping cart-->
    <div class="table-title">Product
      <span style="padding-left: 320px">Quantity</span>
      <span style="padding-left: 60px">Subtotal</span>
    </div>
    <div class="cart-container" id="style-1">
          <table class="cart-table" id="cart-table1"></table>
    </div>

    <!--Proceed to Payment button-->
    <a href="products.php"><button class="previous-button" style="float: left;">Back to Products</button></a>
    <button class="next-button" style="transform: translate(710px, 40px);" onclick="checkboxChecked()">Checkout</button>
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

<!--Link to cart.js-->
<script src="js/cart.js"></script>
<!--Add to Cart Function-->
<script src="js/addToCart.js"></script>

<!--Display Account Drop Down List-->
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