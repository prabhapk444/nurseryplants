<?php
require '././PHPMailer/src/Exception.php';
require '././PHPMailer/src/PHPMailer.php';
require '././PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
   
    $to = $email;
    $subject = "Order Confirmation";
    $message = "Dear $username,<br><br>"
             . "Your order for $product has been confirmed.<br>"
             . "Delivery Address: $address, $city, $pincode<br>"
             . "Delivery Date: $delivery<br>"
             . "Total Amount: $total_amount<br><br>"
             . "Thank you for shopping with us!<br><br>"
             . "Best Regards,<br>"
             . "Nursery Plant";

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';       
        $mail->SMTPAuth = true;
        $mail->Username = 'karanprabha22668@gmail.com'; 
        $mail->Password = 'hrmq uoyw zory obcg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;                       

      
        $mail->setFrom('karanprabha22668@gmail.com', 'Admin');
        $mail->addAddress($to);     

    
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        http_response_code(200); 
    } catch (Exception $e) {
        http_response_code(500); 
    }
} else {
    http_response_code(500); 
}

$conn->close();
?>
