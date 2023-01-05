<?php
include('auth.php');
// include('orderdb.php');
?>
<!DOCTYPE html>
<html>
    <title>Doctra | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" href="css/products.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        <a class="nav-list" href="details.php">Details</a>
        <a class="nav-list" href="index.php">Home<div class="nav-active"></div></div></a>
        
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
   <div class="blur-background"></div>
        <div class="slider">
        <div class="slide active">
            <img src="img/home-image/slide3.jpg" alt="">
            <div class="info">
                <div class="centered-left">
                    <h1 style="font-size: 40px;">
                      Your most trusted <br>
                      medical needs at <br>
                      your doorstep. <br>
                    </h1>
            
                    <h3 style="color: darkgreen; font-size: 15px;">
                      Providing over 10000<br>
                      households in Malaysia <br>
                      with widely approved <br>
                      medical supplies.
                    </h3>
                  </div>
            </div>
        </div>

        <!--Slide show-->
        <div class="slide">
            <img src="img/home-image/slide2.jpg" alt="">
            <div class="info">
                <div class="centered-left">
                    <h1 style="font-size: 40px;">
                      Your most trusted <br>
                      medical needs at <br>
                      your doorstep. <br>
                    </h1>
            
                    <h3 style="color: brown; font-size: 15px;">
                      Providing over 10000<br>
                      households in Malaysia <br>
                      with widely approved <br>
                      medical supplies.
                    </h3>
                  </div>
            </div>
        </div>
        <div class="slide">
            <img src="img/home-image/slide1.png" alt="">
            <div class="info">
                <div class="centered-left">
                    <h1 style="font-size: 40px;">
                      Your most trusted <br>
                      medical needs at <br>
                      your doorstep. <br>
                    </h1>
            
                    <h3 style="color: #008CB6; font-size: 15px;">
                      Providing over 10000<br>
                      households in Malaysia <br>
                      with widely approved <br>
                      medical supplies.
                    </h3>
                  </div>
            </div>
        </div>
        
        <div class="navigation">
            <i class="fas fa-chevron-left prev-btn"></i>
            <i class="fas fa-chevron-right next-btn"></i>
        </div>
        <div class="navigation-visibility">
            <div class="slide-icon active"></div>
            <div class="slide-icon"></div>
            <div class="slide-icon"></div>
        </div>
        </div>
    </div>

    <!--company details banner-->
    <div class="media">
        <div class="media-image"><img src="img/template-image/favicon.png" alt="logo" style="width: 60px"></div>
          <div class="content" style="color: white;"><p>Doctra is a pharmaceutical company that emphasises inner and outer beauty through the selection of the best products in each category</p></div>
      </div>
  
      <!--buttons for products-->
      <div class="bottom-btn">
      <button onclick="location.href='products.php#Supplements';"><div class="button-text">Supplements</div><img class="button-image" src="img/home-image/button-image2.jpg"></button>
      <button onclick="location.href='products.php#NutritionalDrinks';"><div class="button-text">Nutritional Drinks</div><img class="button-image" src="img/home-image/button-image1.jpg"></button>
      <button onclick="location.href='products.php#SkincareProducts';"><div class="button-text">Skin Care Products</div><img class="button-image" src="img/home-image/button-image3.jpg"></button>
      </div>
  </div>

    <script type="text/javascript">
        const slider = document.querySelector(".slider");
        const nextBtn = document.querySelector(".next-btn");
        const prevBtn = document.querySelector(".prev-btn");
        const slides = document.querySelectorAll(".slide");
        const slideIcons = document.querySelectorAll(".slide-icon");
        const numberOfSlides = slides.length;
        var slideNumber = 0;
    
        //image slider next button
        nextBtn.addEventListener("click", () => {
          slides.forEach((slide) => {
            slide.classList.remove("active");
          });
          slideIcons.forEach((slideIcon) => {
            slideIcon.classList.remove("active");
          });
    
          slideNumber++;
    
          if(slideNumber > (numberOfSlides - 1)){
            slideNumber = 0;
          }
    
          slides[slideNumber].classList.add("active");
          slideIcons[slideNumber].classList.add("active");
        });
    
        //image slider previous button
        prevBtn.addEventListener("click", () => {
          slides.forEach((slide) => {
            slide.classList.remove("active");
          });
          slideIcons.forEach((slideIcon) => {
            slideIcon.classList.remove("active");
          });
    
          slideNumber--;
    
          if(slideNumber < 0){
            slideNumber = numberOfSlides - 1;
          }
    
          slides[slideNumber].classList.add("active");
          slideIcons[slideNumber].classList.add("active");
        });
    
        //image slider autoplay
        var playSlider;
    
        var repeater = () => {
          playSlider = setInterval(function(){
            slides.forEach((slide) => {
              slide.classList.remove("active");
            });
            slideIcons.forEach((slideIcon) => {
              slideIcon.classList.remove("active");
            });
    
            slideNumber++;
    
            if(slideNumber > (numberOfSlides - 1)){
              slideNumber = 0;
            }
    
            slides[slideNumber].classList.add("active");
            slideIcons[slideNumber].classList.add("active");
          }, 4000);
        }
        repeater();
        </script>

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

</body>
<script src="js/addToCart.js"></script>
<script>

// display account drop down list 
function showLogoutDiv() {
  var x = document.getElementById("logout-box");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</html>
      