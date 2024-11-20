<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            padding-top: 20px;
        }

        table {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #34495e;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            padding: 10px;
            width: 100%;
        }

        .search-container input {
            padding: 10px;
            width: 300px;
            max-width: 80%;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        .search-container input:focus {
            border-color: #4CAF50;
        }

        .action-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .action-btn:hover {
            background-color: #c0392b;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            margin-left: 30px;
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

        @media (max-width: 992px) {
            table {
                width: 95%;
            }

            th, td {
                font-size: 14px;
            }

            .search-container input {
                width: 90%;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>User Management</h1>
    <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for usernames...">
    </div>

    <?php
        session_start();
        include("db.php");

        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: adminlogin.php");
            exit;
        }

        $query = "SELECT id, username, email, address FROM register";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table id='userTable'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['username'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['address'] . "</td>
                        <td><button class='action-btn' onclick='confirmDelete(" . $row['id'] . ")'>Delete</button></td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p style='text-align: center;'>No records found.</p>";
        }

        $conn->close();
    ?>

    <a href="dashboard.php" class="back-button">Back</a>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('userTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cols = rows[i].getElementsByTagName('td');
                const usernameCol = cols[1];

                if (usernameCol) {
                    const txtValue = usernameCol.textContent || usernameCol.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        }

        function confirmDelete(id) {
            const confirmAction = confirm("Are you sure you want to delete this user?");
            if (confirmAction) {
                window.location.href = 'delete_user.php?id=' + id;
            }
        }
    </script>
</body>
</html>
