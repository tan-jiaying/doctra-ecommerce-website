<?php
// create connection to server
$handler = mysqli_connect("localhost", "root", "");

// check connection
// if (!$handler) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connected successfully";
// }
// echo "<br>";

// create database to store products in cart
mysqli_query($handler, 'CREATE DATABASE doctra');
// // check if database is successfully created
// if (mysqli_query($handler, 'CREATE DATABASE doctra')) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($handler);
// }
// echo "<br>";

$handler1 = mysqli_connect("localhost", "root", "", "doctra");
// create table to store customer details
$customer_query = "CREATE TABLE customers (
    customerID INT AUTO_INCREMENT,
    fname VARCHAR(50),
    lname VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    phone VARCHAR(13),
    PRIMARY KEY (customerID)
    )";
mysqli_query($handler1, $customer_query);

// check if order table is successfully created
// if (mysqli_query($handler1, $customer_query)) {
//     echo "Table created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($handler1);
// }

// create table to store all orders
$order_query = "CREATE TABLE order_list (
    orderID INT(6) AUTO_INCREMENT,
    customerID INT,
    products JSON,
    orderTotal DECIMAL(7,2),
    orderDate DATE,
    deliveryStreet VARCHAR(100),
    deliveryCity VARCHAR(20),
    deliveryState VARCHAR(20),
    deliveryPostcode INT(5),
    deliveryDate DATE,
    billingStreet VARCHAR(80),
    billingCity VARCHAR(20),
    billingState VARCHAR(20),
    billingPostcode INT(5),
    bank VARCHAR(15),
    cardNo INT(16),
    nameOnCard VARCHAR(50),
    paymentMethod VARCHAR(15), 
    PRIMARY KEY (orderID), 
    FOREIGN KEY (customerID) REFERENCES customers(customerID)
    )";
mysqli_query($handler1, $order_query);

// check if order table is successfully created
// if (mysqli_query($handler1, $order_query)) {
//     echo "Table created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($handler1);
// }

?>


