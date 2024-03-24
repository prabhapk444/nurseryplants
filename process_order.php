<?php
include("db.php");
$username = $_POST['username'];
$product = $_POST['product'];
$email = $_POST['email'];
$number = $_POST['number'];
$city = $_POST['city'];
$address = $_POST['address'];
$confirmaddress = $_POST['confirmaddress'];
$pincode = $_POST['pincode'];
$delivery = $_POST['delivery'];
$total_amount = $_POST['totalAmount'];
$payment_method = $_POST['payment'];


$sql = "INSERT INTO orders (username, product, email, number, city, address, confirmaddress, pincode, delivery, total_amount, payment_method)
        VALUES ('$username', '$product', '$email', '$number', '$city', '$address', '$confirmaddress', '$pincode', '$delivery', '$total_amount', '$payment_method')";

if ($conn->query($sql) === TRUE) {
   
    http_response_code(200);
} else {

    http_response_code(500);
}


$conn->close();


?>