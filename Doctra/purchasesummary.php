<?php
include("auth.php");
if(!isset($_SESSION["email"])){
  header("Location: login2.php");
  exit(); }
// connect to database 
$handler = mysqli_connect("localhost", "root", "", "doctra");

// shipping info
$dStreet = $_POST['d-street'];
$dCity = $_POST['d-city'];
$dState = $_POST['d-state'];
$dPostcode = $_POST['d-postcode'];
$deliveryDate = $_POST['delivery-date'];

// billing info
$bStreet = $_POST['b-street'];
$bCity = $_POST['b-city'];
$bState = $_POST['b-state'];
$bPostcode = $_POST['b-postcode'];
$bank = $_POST['bank'];
$cardNo = $_POST['card-number'];
$cardName = $_POST['card-name'];
$paymentMethod = $_POST['payment-method'];

// products 
$products = $_POST['products-checkout'];

// order total 
$orderTotal = $_POST['order-total'];
$orderDate = $_POST['order-date'];

// insert data into order table 
$result = mysqli_query($handler, "SELECT * from customers where email ='".$_SESSION['email']."'");
$current_row_result = mysqli_fetch_assoc($result);
$customerID = $current_row_result["customerID"]; // retrieving customer id from database
$sql_query = "INSERT INTO order_list (customerID, products,  orderTotal, orderDate, deliveryStreet, deliveryCity, deliveryState, deliveryPostcode, deliveryDate, 
                          billingStreet, billingCity, billingState, billingPostcode, bank, cardNo, nameOnCard, paymentMethod)
              VALUES ('$customerID', '$products', '$orderTotal', '$orderDate', '$dStreet', '$dCity', '$dState', '$dPostcode', '$deliveryDate', 
                      '$bStreet', '$bCity', '$bState', '$bPostcode', '$bank', '$cardNo', '$cardName', '$paymentMethod')";
$insert = mysqli_query($handler, $sql_query);

echo "<br>";

// if ($insert){
//     echo "Form submitted successfully";
// } else {
//     echo "Form not submitted";
// }

// retrieve order ID from database 
$sql_query1 = "SELECT orderID FROM order_list ORDER BY orderID DESC LIMIT 1";
$result_set_identifier = mysqli_query($handler, $sql_query1);
$result = mysqli_fetch_assoc($result_set_identifier);
?>

<!DOCTYPE html>
<html>
<title>Doctra | Purchase Summary</title>
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
    <script>
      alert("Your order has been placed!");
    </script>
  
  <h1>Purchase Summary</h1>

  <!--Progress Bar-->
  <div class="progress-bar-container">
      <ul class="progress-bar">
        <li class="previous">Cart</li>
        <li class="previous">Total</li>
        <li class="previous">Details</li>
        <li class="active">Complete</li>
      </ul>
  </div>
  <br>

  <!--Products-->
  <div>
    <div class="table-title">Product Ordered
      <span style="padding-left: 170px">Quantity</span>
      <span style="padding-left: 300px">Subtotal</span>
    </div>
      <div class="cart-container" id="style-1">  
        <table class="cart-table" id="cart-table3" >
        </table>
        <!--Other Details-->
        <div style="background-color: black; width: 888px; height: 2px; margin-top: 5px"></div>
        <div class="order-summary-details">
            <br>
            <strong>Order ID: </strong>#<?php echo $result["orderID"] ;?>
            <br>
            <strong>Delivery Address: </strong><?php echo $dStreet .', ' . $dPostcode .' '. $dCity .', '. $dState; ?>
            <br>
            <strong>Delivery Date: </strong><?php echo $deliveryDate ;?>
            <br>
            <strong>Billing Address: </strong><?php echo $bStreet .', ' . $bPostcode .' '. $bCity .', '. $bState; ?>
            <br>
        </div>
        </div>

        <!--Button-->
        <a href="index.php"><button class="next-button" style="transform: translate(815px,40px)">Back to Home Page</button></a>
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
    // retrieve products to be checked out from local storage 'toCheckout'
    let productsCheckout = JSON.parse(localStorage.getItem('toCheckout'));
    if (!productsCheckout) {
        productsCheckout = []; 
    }

    // retrieve products from local storage 'shoppingCart'
    let productsInCart2 = JSON.parse(localStorage.getItem('shoppingCart'));
    if (!productsInCart2) {
      productsInCart2 = [];
    }

    // assign elements to variable names
    let table = document.getElementById('cart-table3');

    // dynamically populate table with products in cart 
    let total = 0; 
    let content = "";
    for (let i = 0; i < productsCheckout.length; i++) {
        content += "<tr style='background-color: #e8e8e8;'>";
        content += "<td><div class='item'><img src='" + productsCheckout[i].image + "'><div>" + productsCheckout[i].name + "<br><small>" + productsCheckout[i].code + "</small>" + "<br><br><small>Price: RM" + productsCheckout[i].basePrice + "</small></div><td>x" + productsCheckout[i].qty + "</td><td><span style='float: right;'>RM" + productsCheckout[i].price + "</span></td></div></td>";
        content += "</tr>";
        total += productsCheckout[i].price;
    }

    // order total 
    content += "<tr><td rowspan='6'></td></tr>";
    content += "<tr><td>Order Subtotal:</td><td>RM" + total + "</td></tr>";
    content += "<tr><td>Shipping Fee:</td><td>RM2</td></tr>";
    content += "<tr><td>Order Total:</td><td>RM" + (total + 2) + "</td></tr>";
    table.innerHTML = content;

    // remove ordered products from local storage key 'shoppingCart'
    productsInCart2 = productsInCart2.filter(function(obj) {
      return !this.has(obj.id);
    }, new Set(productsCheckout.map(obj => obj.id)));
    localStorage.setItem('shoppingCart',JSON.stringify(productsInCart2));

    // remove local storage key 'toCheckout'
    window.localStorage.removeItem('toCheckout');
</script>

<!--Add to Cart Function-->
<script src="../js/addToCart.js"></script>
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

</body>
</html>