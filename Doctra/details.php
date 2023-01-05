<?php
session_start();
if(!isset($_SESSION["email"])){ 
header('login.php'); // redirect user to log in 
}
?>
<!DOCTYPE html>
<html>
<title>Doctra | Details</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/website.css" type="text/css">
<link rel="stylesheet" href="css/products.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<link rel="icon" href="img/template-image/favicon.png">
</head>
<body style="height: 1500px;" id="style-1">
<!-- Navigation Bar -->
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

        <a class="nav-list" href="products.php">Products</a>
        <a class="nav-list" href="details.php">Details<div class="nav-active"></div></a>
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
  <div class="background" style="height: 1650px">
  
    <div class="aboutus-page">
      <br><br><b>About Us</b>
      <div class="title-line"></div>
      <div class="aboutus-col1">
        <p><b>Our Company</b></p><br><br>
        <p><b>Our Aim</b></p>
      </div>
      <div class="aboutus-col2">
        <p>Founded in 2015, Doctra is a pharmaceutical company that has a diverse portfolio of products, with a focus in the areas of skincare and healthcare products. As part of our unwavering commitment to improve people’s lives and confidence, we are continuing to expand our commercial product portfolio and our research and development pipeline in areas that can leverage our unique expertise. 
          Everything we do at Doctra is focused on two things:<br>
             &nbsp;&nbsp;&nbsp;• Addressing customer’s needs and putting them first.<br>
             &nbsp;&nbsp;&nbsp;• Living our core values – collaboration, integrity, passion and pursuit of excellence.</p>
        <p><br>Our aim is to be the premier Shopping Mall servicing company in Malaysia and we seek to achieve this by striving and maintaining our swift and secure approach for our job while maintaining the utmost quality and standards.

        </p>
      </div>
    </div>
    <div class="aboutus-page" style="height: 650px">
        <br><br><b>Contact Us</b>
        <p class="contacts">5, Jalan Universiti, Bandar Sunway, 47500 Petaling Jaya, Selangor<br><br>+(60)12-3456789<br><br>doctra@gmail.com</p>
        <div class="title-line"></div>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="500" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=sunway%20university&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-org.net"></a><br><style>.mapouter{position:relative;text-align:right;height:350px;width:500px;}</style><a href="https://www.embedgooglemap.net">how to add a google map to a website</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:500px;}</style></div></div>
        <img class="icons" src="img/details-image/contacts.svg">
        </div>
          </p>
        </div>
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

// Display account drop down list 
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