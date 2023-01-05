<!DOCTYPE html>
<html>
<title>Doctra | Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/website.css" type="text/css">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
  <link rel="icon" href="img/template-image/favicon.png">
</head>
<body>
<?php
session_start();
session_destroy();
include('orderdb.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
  // removes backslashes
	$email = stripslashes($_REQUEST['email']);
  //escapes special characters in a string
	$email = mysqli_real_escape_string($handler1,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($handler1,$password);

	//Checking if user existing in the database or not
  $query = "SELECT * FROM `customers` WHERE email='$email' and password='".md5($password)."'";
	$result = mysqli_query($handler1, $query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
          $_SESSION['loggedin'] = true;
	        $_SESSION['email'] = $email;

      // Redirect user to checkout.php
	    header("Location: checkout.php");
         }else{ // incorrect email or/and password
          echo '<script>alert("Incorrect Username/Password\nPlease try again.")</script>';
          echo '<script>window.location.href = "login2.php"</script>';
	}
    }else{
?> 
<!-- Main Content -->
  <div class="login-background">
    <div class="login-left">
      <a href="cart.php">
        <img class="x-icon" src="img/reg&log-image/x-icon.png" alt="X" width="15px" height="15px">
      </a>
    <form class="login-form" action="" method="post" name="register">
      <label for="login"><h1>Log In</h1></label>
      <input class="logindetails" type="email" id=email" name="email" placeholder="E-mail"><br><br>
      <input class="logindetails" type="password" id="password" name="password" placeholder="Password"><br><br>
      <button type="submit" class="login-button" name="submit" value="submit">LOG IN</button>
      New to Doctra?&nbsp;
      <a href="register2.php">Sign Up Now</a>
    </form> 
    </div>
    <div class="triangle"></div>
    <div class="login-right">
      <img class="logo" src="img/template-image/favicon.png" alt="logo">
      <p>
        doctra
      </p>
    </div>
  </div>
<?php } ?>
</body>
</html>