<?php
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #34495e;
            color: #fff;
        }

        td {
            background-color: #fff;
        }

  
        td:first-child, th:first-child {
            width: 50px;
        }

        * {
            background-color: #fffffe;
            font-family: Arial, sans-serif;
        }
        .back-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.back-button:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

.back-button:active {
    background-color: #1c6d8c;
}


        @media only screen and (max-width: 600px) {
            table, th, td {
                display: block;
                width: 100%;
            }

            th {
                text-align: right;
                font-weight: bold;
            }

            td {
                text-align: right;
                padding-left: 50%;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                padding-right: 10px;
            }
        }
    </style>
</head>
<body>
<center><h2>User Orders</h2></center>


<?php
    $selectQuery = "SELECT * FROM orders";
    $result = $conn->query($selectQuery);
    if ($result === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>S.No</th>
                  <th>Username</th>
                  <th>Product</th>
                  <th>Email</th>
                  <th>Number</th>
                  <th>City</th>
                  <th>Total Amount</th>
                  <th>Payment Method</th></tr>";
            
            $index = 1; 
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $index++ . "</td>";  
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['product'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['number'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>₹" . $row['total_amount'] . "</td>";
                echo "<td>" . $row['payment_method'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No orders found</td></tr>";
        }
    }

    $conn->close();
?> 
<a href="dashboard.php" class="back-button">Back</a>

</body>
</html>
