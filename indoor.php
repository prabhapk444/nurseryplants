<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoor plants</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <center>
        <h2>Product List</h2>
    </center>

    <?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, type, price, quantity, availability, description, image, product_id FROM products WHERE category ='indoor'";
    $result = $conn->query($selectQuery);

    if ($result === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<div class="product-details">';
                echo '<h5>' . $row["product_name"] . '</h5>';
                echo '<p><strong>Category:</strong> ' . $row["category"] . '</p>';
                echo '<p><strong>Type:</strong> ' . $row["type"] . '</p>';
                echo '<p name="' . $row["price"] . '"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<button class="btn btn-success view_prod" data-id="' . $row['product_id'] . '">ID Number</button>';
                echo '<label name="quantity_' . $row['product_id'] . '" id="count-' . $row['product_id'] . '">0</label>';
                echo '<form method="post" action="add_to_cart.php">'; 
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo 'Quantity: <input type="number" name="quantity" value="1" min="1"><br>';
                echo '<button type="submit" class="btn btn-success add_to_cart_btn" name="add_to_cart">Add to Cart</button>'; // Add to Cart button
                echo '</form>';
                echo '</div>';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';
                echo '</div>';
            }
        } else {
            echo "No records found in the products table.";
        }
    }
    $conn->close();
    ?>

    <script>
        $(document).ready(function() {
            $('.view_prod').click(function() {
                var productId = $(this).data('id');
                var productName = $(this).closest('.product-card').find('h5').text();
                Swal.fire({
                    title: productName,
                    html: '<p><strong>Product ID:</strong> ' + productId + '</p>',
                    icon: 'info',
                    confirmButtonText: 'Close'
                });
            });

            
        });
    </script>

    <?php
    include("footer.php");
    ?>
</body>

</html>
