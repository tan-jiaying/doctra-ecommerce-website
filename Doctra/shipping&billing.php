<?php
include("auth.php");
if(!isset($_SESSION["email"])){
  header("Location: login2.php");
  exit(); }
$handler = mysqli_connect("localhost", "root", "", "doctra"); // connect to database 
?>
<!DOCTYPE html>
<html>
<title>Doctra | Shipping & Billing Info</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/cart.css" type="text/css">
<link rel="stylesheet" href="css/products.css" type="text/css">
<link rel="stylesheet" href="css/shipping&billing.css" type="text/css">
<head>
  <!--Icon Library-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        // show first name if user is logged in
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
  <div class="background" style="height: 1010px">
    <h1>Shipping & Billing Information</h1>

      <!--Progress Bar-->
      <div class="progress-bar-container">
        <ul class="progress-bar">
            <li class="previous">Cart</li>
            <li class="previous">Total</li>
            <li class="active">Details</li>
            <li>Complete</li>
        </ul>
      </div>
      <br>

    <div id="error"></div>
          <!--Shipping Info -->
          <form class="form" id="ship&bill-form" action="purchasesummary.php" method="post" autocomplete="on">
            <div>
              <div class="div-container">
                <div class="left-div">
                  <h2>Delivery Information</h2>
                  <!--Delivery Address-->
                  <div class="form-control">
                    <label for="d-street">Street: </label>
                    <input type="text" id="d-street" name="d-street" placeholder="1, Jalan SS2 1C/29" required>
                    <small>Error message</small>
                  </div>

                    <div class="form-control">
                      <label for="d-city">City: </label>
                      <input type="text" id="d-city" name="d-city" placeholder="Petaling Jaya" required>
                      <small>Error message</small>
                    </div>

                  <div class="form-control">
                    <label for="d-state">State: </label>
                    <input type="text" id="d-state" name="d-state" placeholder="Selangor" required>
                    <small>Error message</small>
                  </div>

                  <div class="form-control">
                    <label for="d-postcode">Postcode: </label>
                    <input type="number" id="d-postcode" name="d-postcode" placeholder="47301" required>
                    <small>Error message</small>
                  </div>
    
                  <!--Delivery Date-->
                  <div class="form-control">
                      <label for="delivery-date">Select Delivery Date: </label>
                      <input type="date" id="delivery-date" name="delivery-date" value="<?php echo date('Y-m-d'); ?>" />
                      <small>Error message</small>
                  </div>
                </div>

                <div class="right-div">
                    <h2>Billing Information</h2>
                    <!--Billing Address-->
                    <div class="form-control">
                      <label for="b-street">Street: </label>
                      <input type="text" id="b-street" name="b-street" placeholder="1, Jalan SS2 1C/29" required>
                      <small>Error message</small>
                    </div>
                    
                    <div class="form-control">
                      <label for="b-city">City: </label>
                      <input type="text" id="b-city" name="b-city" placeholder="Petaling Jaya" required>
                      <small>Error message</small>
                    </div>
                    
                    <div class="form-control">
                      <label for="billing_state">State: </label>
                      <input type="text" id="b-state" name="b-state" placeholder="Selangor" required>
                      <small>Error message</small>
                    </div>
                    
                    <div class="form-control">
                      <label for="b-postcode">Postcode: </label>
                      <input type="number" id="b-postcode" name="b-postcode" placeholder="47301" required>
                      <small>Error message</small>
                    </div>
                    
                    <!--Bank-->
                    <label for="bank">Select Bank: </label>
                    <select name="bank" id="bank">
                        <option value="CIMB">CIMB</option>
                        <option value="Maybank">Maybank</option>
                        <option value="HSBC">HSBC</option>
                        <option value="Public Bank">Public Bank</option>
                        <option value="AmBank">AmBank</option>
                    </select> 

                    <!--Card Number--> 
                    <div class="form-control">
                      <label for="card-number">Card Number: </label>
                      <input type="number" id="card-number" name="card-number" placeholder="1234567890123456" required>
                      <small>Error message</small>
                    </div>

                    <!--Name on Card--> 
                      <div class="form-control">
                      <label for="card-name">Cardholder Name: </label>
                      <input type="text" id="card-name" name="card-name" placeholder="Samantha Lim" required>
                      <small>Error message</small>
                    </div>

                    <!--Payment Method-->
                    <label for="payment-method">Payment Method: </label>
                    <select name="payment-method" id="payment-method">
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                    </select> 
                    <br>
                </div>
              </div>

              <!--Products to be Checked Out-->
              <input type="hidden" id="products" name="products-checkout" value="">
                
              <!--Order Total-->
              <input type="hidden" id="total" name="order-total" value="">

              <script>
                // retrieve products to be checked out from local storage 'toCheckout'
                let productsCheckout = JSON.parse(localStorage.getItem('toCheckout'));
                if (!productsCheckout) {
                    productsCheckout = []; 
                }

                // assign products to be checked out to value of form input field 
                productsString = JSON.stringify(productsCheckout); 
                document.getElementById('products').value = productsString;

                // calculate order total 
                let total = 0;
                for (let i=0; i<productsCheckout.length; i++) {
                  total += productsCheckout[i].price;
                }

                // assign order total to value of form input field 
                document.getElementById('total').value = total + 2; // shipping fee = rm2
              </script>
              <!--Order Date --> 
              <input type="hidden" id="total" name="order-date" value="<?php echo date('Y-m-d'); ?>" />
              
              <!--Buttons-->
              <br>
              <div class="order-button">
                  <a><button type="submit" class="next-button" style="transform: translate(770px);">Continue</button></a>
              </div>
            </div>
          </form>

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
// show account drop down list
function showLogoutDiv() {
  var x = document.getElementById("logout-box");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
<script src="js/form3InputsCheck.js"></script>

</body>
</html>

