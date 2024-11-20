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

        .product-table {
            width: 100%;
            margin-top: 20px;
        }

        .product-table th,
        .product-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-details h5 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-details p {
            margin-bottom: 8px;
            color: #495057;
        }

        @media screen and (max-width: 992px) {
            .product-card {
                flex-direction: column; 
            }

            .product-details h5 {
                font-size: 1.5em; 
            }

            .product-details p {
                font-size: 0.9em; 
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <center><h2>Product List</h2></center>
        <?php
            include("db.php");

            $selectQuery = "SELECT product_id, product_name, category, type, price, quantity FROM products";
            $result = $conn->query($selectQuery);

            if ($result === false) {
                echo "Error retrieving data: " . $conn->error;
            } else {
                if ($result->num_rows > 0) {
                    echo '<table class="product-table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>ProductID</th>';
                    echo '<th>Product Name</th>';
                    echo '<th>Category</th>';
                    echo '<th>Type</th>';
                    echo '<th>Price (&#8377;)</th>';
                    echo '<th>Quantity</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["product_id"] . '</td>';
                        echo '<td>' . $row["product_name"] . '</td>';
                        echo '<td>' . $row["category"] . '</td>';
                        echo '<td>' . $row["type"] . '</td>';
                        echo '<td>' . $row["price"] . '</td>';
                        echo '<td>' . $row["quantity"] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
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
