<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php
include("db.php");
session_start();  

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    die("User not logged in. Please log in to delete items from your cart.");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cart_id'])) {
    $cart_id = filter_var($_POST['cart_id'], FILTER_VALIDATE_INT);

    if (!$cart_id) {
        handleError("Invalid cart item.");
    }
    $deleteStmt = $conn->prepare("DELETE FROM cart WHERE cart_id = ? AND user_id = ?");
    $deleteStmt->bind_param("ii", $cart_id, $_SESSION['user_id']);   
    if ($deleteStmt->execute()) {
        echo "<script>
            Swal.fire({
                title: 'Item Removed',
                text: 'The product has been removed from your cart.',
                icon: 'success'
            }).then(function() {
                window.location.href = 'home.php'; 
            });
        </script>";
    } else {
        handleError("Failed to remove item from the cart.");
    }
}
function handleError($message) {
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: '$message',
            icon: 'error'
        });
    </script>";
    exit;
}
$conn->close();
?>
 
</body>
</html>