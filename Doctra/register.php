<!DOCTYPE html>
<html>
<title>Doctra | Sign Up</title>
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
include('orderdb.php');

// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
  $fname = stripslashes($_REQUEST['fname']);
	$fname = mysqli_real_escape_string($handler1,$fname);
  $lname = stripslashes($_REQUEST['lname']);
	$lname = mysqli_real_escape_string($handler1,$lname);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($handler1,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($handler1,$password);
	$phone = stripslashes($_REQUEST['phone']);
	$phone = mysqli_real_escape_string($handler1,$phone);

  $sql = "SELECT * FROM `customers` WHERE email='$email'"; // retrieve details from database
	$res = mysqli_query($handler1, $sql) or die(mysql_error());
	$rows = mysqli_num_rows($res);
        if($rows!=0){ // check if email already exists in database
          echo '<script>alert("E-mail is already taken. Please use another E-mail.")</script>';
          echo '<script>window.location.href = "register.php"</script>';
        } else { // insert details into database
          $query = "INSERT into `customers` (fname, lname, email, password, phone) VALUES ('$fname', '$lname', '$email', '".md5($password)."', '$phone')";
            $result = mysqli_query($handler1,$query);
            if($result){
              header("Location: login.php");
            }
        }
}else{
?>
<!-- Main Content -->
  <div class="login-background">
    <div class="login-left">
      <a href="index.php">
        <img class="x-icon" src="img/reg&log-image/x-icon.png" alt="X" width="15px" height="15px" autocomplete="on">
      </a>

    <!-- Registration form -->
    <form class="signup-form" style="margin-top: 55px;" id="signup-form" action="register.php" method="post" name="register" >
      <label for="login"><h1>Sign Up</h1></label>
      <div class="form-control">
        <input class="signupdetails" type="text" id="fname" name="fname" placeholder="First Name" onkeyup="saveValue(this);" required>
        <div class="form-error"><small>Error message</small></div>
      </div>

      <div class="form-control">
        <input class="signupdetails" type="text" id="lname" name="lname" placeholder="Last Name" onkeyup="saveValue(this);" required>
        <div class="form-error"><small>Error message</small></div>
      </div>

      <div>
        <input class="signupdetails" type="email" id="email" name="email" placeholder="E-mail" onkeyup="saveValue(this);" required>
      </div>

      <div class="form-control">
        <input class="signupdetails" type="password" id="password" name="password" placeholder="Password" required>
        <div class="form-error"><small>Error message</small></div>
      </div>

      <div class="form-control">
        <input class="signupdetails" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <div class="form-error"><small>Error message</small></div>
      </div>

      <div class="form-control">
        <input class="signupdetails" type="text" id="phone" name="phone" pattern="[+][6]{1}[0]{1}[0-9]{9,10}" title="+60123456789" placeholder="Contact Number (+60)" onkeyup="saveValue(this);" required>
        <div class="form-error"><small>Error message</small></div>
      </div>
      
      Have an account?&nbsp;
      <a href="login.php">Log In Now</a>
      <button type="submit" class="login-button" name="register" style="left: 367px; top: 470px;">SIGN UP</button>
      <br><br>
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

<script src="js/form1InputsCheck.js"></script>
<script>
  // script to save customer details when email entered is already taken
  let fname1 = document.getElementById('fname');
  fname1.value = getValue('fname');

  let lname1 = document.getElementById('lname');
  lname1.value = getValue('lname');

  let email = document.getElementById('email');
  email.value = getValue('email');

  let phone = document.getElementById('phone');
  phone.value = getValue('phone');

  // save value into local storage
  function saveValue(e) {
    let id = e.id;
    let value = e.value;
    localStorage.setItem(id, value);
  }

  // retrieve value from local storage
  function getValue(v) {
    if (!localStorage.getItem(v)) {
      return "";
    }
    else {
      return localStorage.getItem(v);
    }
  }
</script> 