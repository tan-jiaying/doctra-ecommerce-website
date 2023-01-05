<?php
include("auth.php");
if(!isset($_SESSION["email"])){ // check if user is logged in 
  echo '<script>alert("You need to be logged in to proceed.")</script>';
  echo '<script>window.location.href = "login2.php"</script>'; // redirect user to login page
  exit(); 
  }
?>
<!DOCTYPE html>
<html>
<title>Doctra | Checkout</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/cart.css" type="text/css">
<link rel="stylesheet" href="css/products.css" type="text/css">
<!--Icon Library-->
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
        // display first name if user is checked in 
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

    <!--Account Drop Down List-->
    <div id="logout-box" style="left: 50%; transform: translate(550px);">
        <div class="account-button"><a href="profile.php">My Account</a></div>
        <div class="account-button"><a href="purchasehistory.php">Purchase History</a></div>
        <div class="account-button"><a href="logout.php">Log Out</a></div>
    </div>
</div>  

<!-- Main Content -->
  <div class="background">
    <h1>Checkout</h1>

      <!--Progress Bar-->
      <div class="progress-bar-container">
        <ul class="progress-bar">
            <li class="previous">Cart</li>
            <li class="active">Total</li>
            <li>Details</li>
            <li>Complete</li>
        </ul>
      </div>
      <br>

    <!--Products to be Checked Out -->
    <div>
      <div class="table-title">Product Ordered
      <span style="padding-left: 175px">Quantity</span>
      <span style="padding-left: 250px">Subtotal</span>
    </div>
        <div class="cart-container" id="style-1">
          <table class="cart-table" id="cart-table2" >
          </table>

          <script>
            // retrieve products to be checked out from local storage 
            let productsCheckout = JSON.parse(localStorage.getItem('toCheckout'));
            if (!productsCheckout) {
                productsCheckout = []; 
            }

            // assign elements to variable names
            let table = document.getElementById('cart-table2');

            // dynamically populate table with products in cart 
            let total = 0; 
            let content = "";
            for (let i = 0; i < productsCheckout.length; i++) {
                content += "<tr style='background-color: #e8e8e8;'>";
                content += "<td><div class='item'><img src='" + productsCheckout[i].image + "'><div>" + productsCheckout[i].name + "<br><small>" + productsCheckout[i].code + "</small>" + "<br><br><small>Price: RM" + productsCheckout[i].basePrice + "</small></div><td>x" + productsCheckout[i].qty + "</td><td><span style='float: right; margin-right: 10px'>RM" + productsCheckout[i].price + "</span></td></div></td>";
                content += "</tr>";
                total += productsCheckout[i].price;
            }

            // order total 
            content += "<tr><td rowspan='6' ></td></tr>";
            content += "<tr><td style='margin-right: 10px'>Order Subtotal:</td><td>RM" + total + "</td></tr>";
            content += "<tr><td style='margin-right: 10px'>Shipping Fee:</td><td>RM2</td></tr>";
            content += "<tr style='margin-right: 10px; border-bottom-left-radius: 10px'><td>Order Total:</td><td id='order-total'>RM" + (total + 2) + "</td></tr>";
            table.innerHTML = content; 
          </script>
        </div>
    </div>

    <!--buttons at the bottom-->
    <a href="cart.php"><button class="previous-button" style="float: left;">Back to My Cart</button></a>
    <a href="shipping&billing.php"><button class="next-button">Continue</button></a>
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

<!--Add to Cart Function-->
<script src="js/addToCart.js"></script>
<script>

// Display Account Drop Down List
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


