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
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        @media only screen and (max-width: 600px) {
            th, td {
                display: block;
                width: 100%;
            }
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
        } else {
            echo "No records found in the user_reviews table.";
        }
    }

    $conn->close();
?>

</body>
</html>
