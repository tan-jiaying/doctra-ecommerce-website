<?php
session_start(); // Session start for each page that requires login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { // Login Check
    $handler1 = mysqli_connect("localhost", "root", "", "doctra"); // connect to database
    $query = "SELECT * FROM `customers` WHERE email ='".$_SESSION['email']."'"; // retrive user details from database
    $result = mysqli_query($handler1, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['fname'] = $row["fname"]; // retrieve user's first name
} 
?>