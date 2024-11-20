<?php
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reviews</title>
    <style>
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

    
        .table-container {
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

      
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
            font-size: 1.1rem;
        }

        td {
            font-size: 1rem;
        }

      
        tr:hover {
            background-color: #f2f2f2;
        }

  
        @media only screen and (max-width: 600px) {
            th, td {
                display: block;
                width: 100%;
                text-align: right;
                padding: 10px;
            }

            th {
                background-color: #34495e;
                color: #fff;
                font-size: 1.1rem;
                text-align: center;
            }

            td {
                text-align: left;
            }
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            margin-left:30px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<?php
    $selectQuery = "SELECT id, name, email, command, ratings, created_at FROM user_reviews";
    $result = $conn->query($selectQuery);
    if ($result === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo "<div class='table-container'>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Command</th><th>Ratings</th><th>Created At</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["command"] . "</td>";
                echo "<td>" . $row["ratings"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
        } else {
            echo "<p style='text-align: center; font-size: 1.2rem;'>No records found in the user_reviews table.</p>";
        }
    }

    $conn->close();
?>


<a href="dashboard.php" class="back-button">Back</a>

</body>
</html>
