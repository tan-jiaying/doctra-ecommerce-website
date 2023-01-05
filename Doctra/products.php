<?php
include('auth.php');
?>
<!DOCTYPE html>
<html>
<title>Doctra | Products</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/products.css" type="text/css">
<head>
  <link rel="icon" href="img/template-image/favicon.png">
  <!--Icon Library-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="checkurl()" id="style-1" style="display: flex;  justify-content: center; align-items: center; flex-direction: column;">
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

    <!--Account Drop Down List-->
    <div id="logout-box" style="left: 50%; transform: translate(550px);">
        <div class="account-button"><a href="profile.php">My Account</a></div>
        <div class="account-button"><a href="purchasehistory.php">Purchase History</a></div>
        <div class="account-button"><a href="logout.php">Log Out</a></div>
    </div>
</div>  

<!-- Main Content -->
<div class="background">
      <h1 style="margin-top: 130px;">Products</h1>
    <!--Filter-->
    <div id="ButtonContainer">
        <a href="#AllProducts"><button class="button active" onclick="filterSelection('all');">All Products</button></a>
        <a href="#Supplements"><button class="button" onclick="filterSelection('Supplements');">Supplements</button></a>
        <a href="#NutritionalDrinks"><button class="button" onclick="filterSelection('ndrinks');"> Nutritional Drinks</button></a>
        <a href="#SkincareProducts"><button class="button" onclick="filterSelection('sproducts');">Skincare Products</button></a>
        <input type="text" id="searchBarInput" onkeyup="searchFunction()" placeholder="Search for Product Name or Code ..">
        <svg style="height:24px; width:24px;transform: translate(-38px, 8px)" viewBox="0 0 24 24"  fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
    </div>
    <!--Filter-->
    <!--Product List-->
    <div class="product-box" id="search1">
        <div class="product product-card filterDiv Supplements" id="search2">
            <div class="product-img">
                <img src="img/product-image/atomy fish oil.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="1">Add to cart</button>
            </div>
            <div class="description" id="search3">
                <h3 class="product-name">Fish Oil</h3>
                <p class="product-code">Product Code: <span class="codeValue">SU001</span></p>
                <p class="price">RM<span class="priceValue">75.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv Supplements">
            <div class="product-img">
                <img src="img/product-image/atomy vitamin c.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="2">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Vitamin C</h3>
                <p class="product-code">Product Code: <span class="codeValue">SU002</span></p>
                <p class="price">RM<span class="priceValue">78.50</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv Supplements">
            <div class="product-img">
                <img src="img/product-image/usana iron.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="3">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Iron</h3>
                <p class="product-code">Product Code: <span class="codeValue">SU003</span></p>
                <p class="price">RM<span class="priceValue">89.00</span></p>
            </div>
        </div>     

        <div class="product product-card filterDiv Supplements">
            <div class="product-img">
                <img src="img/product-image/usana calcium.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="4">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Calcium</h3>
                <p class="product-code">Product Code: <span class="codeValue">SU004</span></p>
                <p class="price">RM<span class="priceValue">78.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv Supplements">
            <div class="product-img">
                <img src="img/product-image/usana zinc.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="5">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Zinc</h3>
                <p class="product-code">Product Code: <span class="codeValue">SU005</span></p>
                <p class="price">RM<span class="priceValue">100.00</span></p>
            </div>
        </div>
      
        <div class="product product-card filterDiv ndrinks">
            <div class="product-img">
                <img src="img/product-image/herbalife meal replacement.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="6">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Meal Replacement</h3>
                <p class="product-code">Product Code: <span class="codeValue">ND001</span></p>
                <p class="price">RM<span class="priceValue">89.00</span></p>
            </div>
        </div>    
    
        <div class="product product-card filterDiv ndrinks">
            <div class="product-img">
                <img src="img/product-image/herbalife electrolyte.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="7">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Electrolyte Drink</h3>
                <p class="product-code">Product Code: <span class="codeValue">ND002</span></p>
                <p class="price">RM<span class="priceValue">109.00</span></p>
            </div>
        </div>
   
        <div class="product product-card filterDiv ndrinks">
            <div class="product-img">
                <img src="img/product-image/herbalife collagen.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="8">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Collagen Powder</h3>
                <p class="product-code">Product Code: <span class="codeValue">ND003</span></p>
                <p class="price">RM<span class="priceValue">168.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv ndrinks">
            <div class="product-img">
                <img src="img/product-image/myprotein impact diet whey.jfif" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="9">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Dietary Drink</h3>
                <p class="product-code">Product Code: <span class="codeValue">ND004</span></p>
                <p class="price">RM<span class="priceValue">85.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv ndrinks">
            <div class="product-img">
                <img src="img/product-image/protein powder.jfif" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="10">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Protein Powder</h3>
                <p class="product-code">Product Code: <span class="codeValue">ND005</span></p>
                <p class="price">RM<span class="priceValue">329.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv ndrinks">
            <div class="product-img">
                <img src="img/product-image/energy drink.jfif" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="11">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Energy Drink</h3>
                <p class="product-code">Product Code: <span class="codeValue">ND006</span></p>
                <p class="price">RM<span class="priceValue">7.90</span></p>
            </div>
        </div>
  
        <div class="product product-card filterDiv sproducts">
            <div class="product-img">
                <img src="img/product-image/kiehls toner.jfif" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="12">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Toner</h3>
                <p class="product-code">Product Code: <span class="codeValue">SP001</span></p>
                <p class="price">RM<span class="priceValue">149.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv sproducts">
            <div class="product-img">
                <img src="img/product-image/kiehls moisturizer.jfif" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="13">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Moisturizer</h3>
                <p class="product-code">Product Code: <span class="codeValue">SP002</span></p>
                <p class="price">RM<span class="priceValue">129.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv sproducts">
            <div class="product-img">
                <img src="img/product-image/kiehls sun screen.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="14">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Sun Screen</h3>
                <p class="product-code">Product Code: <span class="codeValue">SP003</span></p>
                <p class="price">RM<span class="priceValue">163.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv sproducts">
            <div class="product-img">
                <img src="img/product-image/kiehls acne cream.jfif" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="15">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Acne cream</h3>
                <p class="product-code">Product Code: <span class="codeValue">SP004</span></p>
                <p class="price">RM<span class="priceValue">160.00</span></p>
            </div>
        </div>

        <div class="product product-card filterDiv sproducts">
            <div class="product-img">
                <img src="img/product-image/laneige cleanser.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="16">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Cleanser</h3>
                <p class="product-code">Product Code: <span class="codeValue">SP005</span></p>
                <p class="price">RM<span class="priceValue">100.00</span></p>
            </div>
        </div>
  
        <div class="product product-card filterDiv sproducts">
            <div class="product-img">
                <img src="img/product-image/laneige face mask.jpg" class="thumbnail" alt="">
                <button class="card-btn addToCart" data-product-id="17">Add to cart</button>
            </div>
            <div class="description">
                <h3 class="product-name">Face Mask</h3>
                <p class="product-code">Product Code: <span class="codeValue">SP006</span></p>
                <p class="price">RM<span class="priceValue">74.00</span></p>
            </div>
        </div>
    </div>
    <div id="no-products">
        <img id="no-products-found" src="img/product-image/no-results-found.jpg">
        <span>No products found.</span>
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
<script>

filterSelection("all")
function filterSelection(c) { // Function for Product Categories
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        removeClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
    }
    
}

function addClass(element, name) { // Function for adding Class used for filterSelection Function
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

function removeClass(element, name) { // Function for adding Class used for filterSelection Function
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

var btnContainer = document.getElementById("ButtonContainer"); 
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

// Function to toggle between hidden and shown for the logout-box
function showLogoutDiv() {
  var x = document.getElementById("logout-box");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

// Function to check url and change the product categories accordingly
function checkurl() {
    if (window.location.href.indexOf('Supplements') > 0) {
        filterSelection('Supplements');
    } else if (window.location.href.indexOf('NutritionalDrinks') > 0) {
        filterSelection('ndrinks');
    } else if (window.location.href.indexOf('SkincareProducts') > 0) {
        filterSelection('sproducts');
    } else if (window.location.href.indexOf('AllProducts') > 0) {
        filterSelection('all');
    }
}

// Search Bar function
function searchFunction() {
        document.location.href = "products.php#AllProducts";
        checkurl();
        var a, b, i, txtValue;
        var input = document.getElementById("searchBarInput");
        var filter = input.value.toUpperCase();
        var x = document.getElementsByClassName("product-name");
        var y = document.getElementsByClassName("product-card");
        var z = document.getElementsByClassName("codeValue");
        var count = 0;
        for (i = 0; i < x.length; i++) {
            a = x[i]
            b = z[i]
            txtValue = a.textContent || a.innerText;
            codeValue = b.textContent || b.innerText;
            if ((txtValue.toUpperCase().indexOf(filter) > -1) || (codeValue.toUpperCase().indexOf(filter) > -1)) {
                y[i].style.display = "";
                count += 1;
            } else {
                y[i].style.display = "none";
            }
        }
        if (count == 0) {
            document.getElementById("no-products").style.display = "block";
        }
        else {
            document.getElementById("no-products").style.display = "none";
        }
    }   
window.onload
</script>

<!--Add to Cart Function-->
<script src="js/addToCart.js"></script>
</body>
</html>