<?php

include("db.php");

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); 

    $deleteQuery = "DELETE FROM products WHERE product_id = $product_id";

   
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>
                alert('Product deleted successfully.');
                window.location.href = 'view_products.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Error deleting product: " . $conn->error . "');
                window.location.href = 'delete_product.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid product ID.');
            window.location.href = 'delete_product.php';
          </script>";
}


$conn->close();
?>
