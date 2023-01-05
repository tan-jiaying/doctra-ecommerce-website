<!DOCTYPE html>
<html>
<title>Doctra | My Account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/cart.css" type="text/css">
<link rel="stylesheet" href="css/products.css" type="text/css">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
  <link rel="icon" href="img/template-image/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="style-1">

<?php
include('auth.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$handler1 = mysqli_connect("localhost", "root", "", "doctra"); // connect to database
    $query = "SELECT * FROM `customers` WHERE email ='".$_SESSION['email']."'"; // retrieve user info
    $result = mysqli_query($handler1, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['fname'] = $row["fname"];
    $_SESSION['lname'] = $row["lname"];
    $_SESSION['email'] = $row["email"];
    $_SESSION['password'] = $row["password"];
    $_SESSION['phone'] = $row["phone"];
  ?>

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
        <a class="nav-list" href="products.php">Products</a>
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
<div class="background" style="height: auto; padding-bottom: 70px; margin-bottom: 100px;">
  <h1>My Account</h1>
  <img class="account-image" src="img/template-image/account.png" width="200px" height="200px">
  <div class="account-details">
  <div class="account-image-box"></div>

    <!-- Display user details -->
    <p><strong>First Name: </strong><?php echo $_SESSION['fname']; ?></p>
    <p><strong>Last Name: </strong><?php echo $_SESSION['lname']; ?></p>
    <p><strong>E-mail: </strong><?php echo $_SESSION['email']; ?></p>
    <p><strong>Phone Number: </strong><?php echo $_SESSION['phone']; ?></p>

    <!-- Edit profile button -->
    <input onclick="showEditDiv()" id="change" type="button" value="Edit Profile">
    <svg class="edit-icon" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
    
    <div id="editDiv">
    <!-- Form for user to update details -->
    <form class="signup-form" style="margin-top: 15px;" id="update-form" method="post" name="update" >
      <div class="form-control">
        <input class="edit-account-details" type="text" id="fname" name="fname" placeholder="First Name" required>
        <div class="form-error"><small>Error message</small></div>
      </div>
      <div class="form-control">
        <input class="edit-account-details" type="text" id="lname" name="lname" placeholder="Last Name" required>
        <div class="form-error"><small>Error message</small></div>
      </div>
      <div class="form-control">
        <input class="edit-account-details" type="password" id="password" name="password" placeholder="Password" required>
        <div class="form-error"><small>Error message</small></div>
      </div>
      <div class="form-control">
        <input class="edit-account-details" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <div class="form-error"><small>Error message</small></div>
      </div>
      <div class="form-control">
        <input class="edit-account-details" type="text" id="phone" name="phone" pattern="[+][6]{1}[0]{1}[0-9]{9,10}" title="+60123456789" placeholder="Contact Number (+60)" onkeyup="saveValue(this);" required>
        <div class="form-error"><small>Error message</small></div>
      </div>
      <input class="update-button" type="submit" name="update" value="Update Profile" >
    </form> 
    </div>
  </div>
</div>

<?php
$db =  mysqli_select_db($handler1,'doctra');
  if(count($_POST)>0) {
    // update user details in database
    mysqli_query($handler1,"UPDATE customers SET fname='" . $_POST['fname'] . "', lname='" . $_POST['lname'] . "',password='" .md5($_POST['password']) . "' ,phone='" . $_POST['phone'] . "' WHERE email ='".$_SESSION['email']."'");
    echo '<script>alert("Your account details have been successfully updated.")</script>';
    echo '<script>window.location.href = "login.php"</script>'; // redirect user to login page
}
?>

<script>
    // show update form
    function showEditDiv() {
      var x = document.getElementById("editDiv");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
}
</script>
</div>
</body>

<!-- Footer -->
<footer>
  <div class="footer-content">
    <p id="copy">+(60)12-3456789</p>
    <p id="copy">doctra@gmail.com</p>
    <img class="bottom-logo" src="img/template-image/favicon.png">
    <div class="bottom-line" style="right: 0"></div>
    <img class="bottom-icon1" src="img/template-image/icon1.svg">
    <img class="bottom-icon2" src="img/template-image/icon2.svg">
    
    
  <span>Copyright ©️ 2021 Doctra Sdn Bhd</span>
  </div>
</footer>

</body>

<script src="js/addToCart.js"></script>
<script src="js/form4InputsCheck.js"></script>

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
</html>
