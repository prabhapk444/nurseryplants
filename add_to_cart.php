<?php
include("db.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<?php
include("header.php");
?>
<center>
    <h2>Product List</h2>
</center>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product_id = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);
    $quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);

    if (!$product_id || !$quantity || $quantity <= 0) {
        handleError("Invalid product or quantity.");
    }
    $user_id = $_SESSION['user_id'];

    $checkCartStmt = $conn->prepare("SELECT quantity FROM cart WHERE user_id = ? AND product_id = ? AND status = 1");
    $checkCartStmt->bind_param("ii", $user_id, $product_id);
    $checkCartStmt->execute();
    $checkResult = $checkCartStmt->get_result();

    if ($checkResult && $checkResult->num_rows > 0) {
        $existingItem = $checkResult->fetch_assoc();
        $existingQuantity = $existingItem['quantity'];
        $newQuantity = $existingQuantity + $quantity;
        $stmt = $conn->prepare("SELECT quantity FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $row = $result->fetch_assoc()) {
            $availableQuantity = (int)$row['quantity'];

            if ($newQuantity > $availableQuantity) {
                handleError("Insufficient stock for the product.");
            }
            $updateCartStmt = $conn->prepare("UPDATE cart SET quantity = ?, amount = ? WHERE user_id = ? AND product_id = ?");
            $amount = $newQuantity * floatval(preg_replace('/[^\d.]/', '', $row['price'])); 
            $updateCartStmt->bind_param("iiis", $newQuantity, $amount, $user_id, $product_id);

            if ($updateCartStmt->execute()) {
                echo "<script>
                    Swal.fire({
                        title: 'Cart Updated',
                        text: 'Your cart has been updated with the new quantity.',
                        icon: 'success'
                    })
                </script>";
            } else {
                handleError("Failed to update cart.");
            }
        }
    } else {
        $stmt = $conn->prepare("SELECT price, product_name, quantity FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $row = $result->fetch_assoc()) {
            $price = floatval(preg_replace('/[^\d.]/', '', $row['price']));
            $availableQuantity = (int)$row['quantity'];
            $product_name = $row['product_name'];

            if ($quantity > $availableQuantity) {
                handleError("Insufficient stock for $product_name.");
            }

            $amount = $quantity * $price; 

            $insertCartStmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, amount, status) VALUES (?, ?, ?, ?, 1)");
            $insertCartStmt->bind_param("iiis", $user_id, $product_id, $quantity, $amount);

            if ($insertCartStmt->execute()) {
                $updateProductStmt = $conn->prepare("UPDATE products SET quantity = quantity - ? WHERE product_id = ?");
                $updateProductStmt->bind_param("ii", $quantity, $product_id);
                if ($updateProductStmt->execute()) {
                    echo "<script>
                        Swal.fire({
                            title: 'Added to Cart',
                            text: '$product_name has been added to your cart.',
                            icon: 'success'
                        })
                    </script>";
                } else {
                    handleError("Failed to update product stock.");
                }
            } else {
                handleError("Failed to add product to the cart.");
            }
        } else {
            handleError("Product not found.");
        }
    }
}

function handleError($message) {
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: '$message',
            icon: 'error',
        });
    </script>";
    exit;
}


if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    die("User not logged in. Please log in to view your cart.");
}

$user_id = $_SESSION['user_id'];

$selectQuery = "
SELECT
    c.cart_id,
    p.category,
    c.amount,
    p.type,
    r.Username AS user_name,
    p.product_id,
    p.image,
    p.product_name AS product_name,
    c.quantity AS quantity,
    p.price AS price,  
    p.description
FROM
    cart c
JOIN
    register r ON c.user_id = r.id
JOIN
    products p ON c.product_id = p.product_id
WHERE
    c.user_id = '$user_id' AND c.status = 1;";

$result = $conn->query($selectQuery);
if ($result === false) {
    echo "Error retrieving data: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<div class="product-details">';
            echo '<form action="order.php" method="post">';
            echo '<h5>' . $row["product_name"] . '</h5>';
            echo '<p><strong>Category:</strong> ' . $row["category"] . '</p>';
            echo '<p><strong>Type:</strong> ' . $row["type"] . '</p>';
            echo '<p><strong>Price:</strong> ' . $row["price"] . ' </p>';
            echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
            echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
            echo '<p><strong>Total amount:</strong> ₹<strong><span name="totalAmount">' . $row["amount"] . '</span></strong></p>';
            echo '<input type="hidden" name="productId" value="' . $row['product_id'] . '">';
            echo '<input type="hidden" name="productName" value="' . $row['product_name'] . '">';
            echo '<input type="hidden" name="totalAmount" value="' . $row['amount'] . '">';
            echo '<button type="submit" class="btn btn-success">Order Now</button>';
            echo '</form>';
            echo '<form action="delete_from_cart.php" method="post">';
            echo '<input type="hidden" name="cart_id" value="' . $row['cart_id'] . '">';
            echo '<button type="submit" class="btn btn-danger">Delete</button>';
            echo '</form>';
    
            echo '</div>';
            echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';
            echo '</div>';
        }
    } else {
        echo "No records found in the cart.";
    }
    
}
$conn->close();
        ?>
 
<?php
include("footer.php");
?>

</body>
</html>
