<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminlogin.php");
    exit;
}
$username = $_SESSION['username'];
include("db.php");

$result = $conn->query("SELECT COUNT(*) AS product_count FROM products");
$productCount = $result->fetch_assoc()['product_count'];

$result = $conn->query("SELECT COUNT(*) AS order_count FROM orders");
$orderCount = $result->fetch_assoc()['order_count'];

$result = $conn->query("SELECT COUNT(*) AS register_count FROM register");
$registerCount = $result->fetch_assoc()['register_count'];

$result = $conn->query("SELECT COUNT(*) AS review_count FROM user_reviews");
$reviewCount = $result->fetch_assoc()['review_count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        #sidebar {
            background-color: #34495e;
            color: #fff;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 20px 15px;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        #sidebar.active {
            left: -250px;
        }

        #sidebar .sidebar-header {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }

        #sidebar ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        #sidebar ul li {
            padding: 12px 0;
            font-size: 1.2rem;
            text-align: center;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #sidebar ul li:hover {
            background-color: #2c3e50;
        }

        #sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #main-content {
            margin-left: 250px;
            flex-grow: 1;
            transition: margin-left 0.3s ease;
            padding: 40px;
        }

        #main-content.active {
            margin-left: 0;
        }

        .sidebar-close {
        display: none;
    }

        .navbar {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar button {
            background-color: #34495e;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 4px;
        }

        .navbar button:hover {
            background-color: #2c3e50;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 25px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.15);
        }

        .card i {
            font-size: 25px;
            color: #fff;
            background-color: #2ecc71;
            padding: 15px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .card h4 {
            font-size: 20px;
            color: #2c3e50;
            margin-top: 10px;
        }

        .counter {
            font-size: 30px;
            font-weight: bold;
            color: #2c3e50;
        }

        .card.product-card i {
            background-color: #3498db;
        }

        .card.order-card i {
            background-color: #e74c3c;
        }

        .card.user-card i {
            background-color: #2ecc71;
        }

        .card.review-card i {
            background-color: #f39c12;
        }

    
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                width: 100%;
                top: 0;
                left: -100%;
                z-index: 1000;
            }

            #sidebar.active {
                left: 0;
            }

            #main-content {
                margin-left: 0;
            }

            .navbar button {
                display: block;
            }

            .sidebar-close {
                display:block;
                font-size: 30px;
                color: #fff;
                cursor: pointer;
                background-color: transparent;
                border: none;
                position: absolute;
                top: 30px;
                right: 40px;
                display: none; 
            }

            #sidebar.active .sidebar-close {
                display: block; 
            }
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar">
            <div class="sidebar-header">
                <button class="sidebar-close" id="sidebarClose"><i class="fa fa-times"></i></button>
            </div>
            <ul>
                <li><a href="users.php">Users</a></li>
                <li><a href="addproducts.php">Products</a></li>
                <li><a href="viewreviews.php">Reviews</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="payments.php">Payments</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div id="main-content">
            <div class="navbar">
                <button id="sidebarToggle"><i class="fa fa-bars"></i></button>
            </div>
            <div class="card-container">
                <div class="card product-card">
                    <i class="fa fa-box"></i>
                    <h4>Products</h4>
                    <div class="counter"><?php echo $productCount; ?></div>
                </div>
                <div class="card order-card">
                    <i class="fa fa-shopping-cart"></i>
                    <h4>Orders</h4>
                    <div class="counter"><?php echo $orderCount; ?></div>
                </div>
                <div class="card user-card">
                    <i class="fa fa-users"></i>
                    <h4>Users</h4>
                    <div class="counter"><?php echo $registerCount; ?></div>
                </div>
                <div class="card review-card">
                    <i class="fa fa-comments"></i>
                    <h4>Reviews</h4>
                    <div class="counter"><?php echo $reviewCount; ?></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const sidebarToggle = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("main-content");
        const sidebarClose = document.getElementById("sidebarClose");

        sidebarToggle.addEventListener("click", function () {
            sidebar.classList.toggle("active");
            mainContent.classList.toggle("active");
        });

        sidebarClose.addEventListener("click", function () {
            sidebar.classList.remove("active");
            mainContent.classList.remove("active");
        });
    </script>
</body>

</html>

