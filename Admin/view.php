<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .product-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            transition: transform 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-details {
            flex: 1;
            margin-right: 20px;
        }

        .product-details h5 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-details p {
            margin-bottom: 8px;
            color: #495057;
        }

        .product-image {
            max-width: 250px;
            max-height: 250px;
            border-radius: 8px;
        }

        @media screen and (max-width: 992px) {
            .product-card {
                flex-direction: column;
            }
        }
    </style>
</head>


<body>
    <div class="container">
        <center>
            <h2>Product List</h2>
        </center>
        <?php
        include("db.php");

        $selectQuery = "SELECT product_name, category, type, price, quantity, description,image FROM products";
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
                    echo '<p><strong>Price:</strong> ' . $row["price"] . ' </p>';
                    echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                    // echo '<p><strong>Availability:</strong> ' . $row["availability"] . '</p>';
                    echo '<p><strong>description</strong> ' . $row["description"] . '</p>';
                    echo '</div>';
                    echo '<img src="./../nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';

                    echo '</div>';
                }
            } else {
                echo "No records found in the products table.";
            }
        }

        $conn->close();
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
