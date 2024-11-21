
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reviews</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .table-container {
            width: 90%;
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
            font-size: 1rem;
        }

        td {
            font-size: 0.9rem;
            word-wrap: break-word;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .delete-button {
            color: #fff;
            background-color: #e74c3c;
            border: none;
            padding: 5px 10px;
            font-size: 0.9rem;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            margin-left: 5%;
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
<body><br>
<center><h2>User Reviews</h2></center>
<?php
include("db.php");
    $selectQuery = "SELECT id, name, email, command, ratings, created_at FROM user_reviews";
    $result = $conn->query($selectQuery);
    if ($result === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo "<div class='table-container'>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Command</th><th>Ratings</th><th>Action</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["command"] . "</td>";
                echo "<td>" . $row["ratings"] . "</td>";
                echo "<td><a class='delete-button' href='delete_reviews.php?delete_id=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this review?');\">Delete</a></td>";
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
