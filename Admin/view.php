<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            background: #ffffff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }


        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card.hidden {
            display: none !important;
        }

        .product-image {
    max-width: 100%;
    max-height: 200px;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
    margin-bottom: 15px;
}

        .product-details {
            margin-bottom: 15px;
        }

        .product-details h5 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .product-details p {
            margin: 8px 0;
            color: #555;
            font-size: 16px;
        }

        .delete-btn {
            display: block;
            padding: 12px 20px;
            margin-top: 15px;
            text-align: center;
            color: #fff;
            background-color: #d9534f;
            border: none;
            border-radius: 30px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .delete-btn:hover {
            background-color: #c9302c;
            transform: scale(1.05);
        }

       
    </style>
</head>

<body>
    <div class="container">
        <h2>Product List</h2>

        
        <div class="product-list" id="product-list">
            <?php
            include("db.php");

            $selectQuery = "SELECT product_id, product_name, category, type, price, quantity, description, image FROM products";
            $result = $conn->query($selectQuery);

            if ($result === false) {
                echo "Error retrieving data: " . $conn->error;
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product-card">';
                        echo '<img src="./../nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';
                        echo '<div class="product-details">';
                        echo '<h5>' . $row["product_name"] . '</h5>';
                        echo '<p><strong>Category:</strong> ' . $row["category"] . '</p>';
                        echo '<p><strong>Type:</strong> ' . $row["type"] . '</p>';
                        echo '<p><strong>Price:</strong> ' . $row["price"] . '</p>';
                        echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                        echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                        echo '</div>';
                        echo '<button class="delete-btn" onclick="deleteProduct(' . $row["product_id"] . ')">Delete</button>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No products found.</p>";
                }
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script>


        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                window.location.href = `delete_product.php?id=${productId}`;
            }
        }
    </script>
</body>

</html>
