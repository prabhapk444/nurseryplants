<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewards</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
         * {
            font-family: 'Roboto', sans-serif;
        }
        
         .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        .content {
            max-width: 600px; 
            padding: 10px;
            text-align: justify;
            color: #2d334a;
            font-size:20px;
        }
        .h3{
            color:#272343;
            font-weight:bold;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-right: 20px;
            border-radius: 8px;
        }


        
        @media screen and (max-width: 992px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }
            img {
                margin-right: 0;
                margin-bottom: 20px;
            }}
    </style>
</head>
<body>
    <?php
    include("header.php");
    ?><br><br><br>
     <div class="container">
        <img src="./images/rewards.webp" alt=""data-aos="fade-up"
     data-aos-duration="3000">
        <div class="content" data-aos="fade-up">
            <p class="h3">About</p>
            The program gives you access to exclusive perks, attractive discounts, and a fun way to engage in gardening shopping every time you log in to our store.
<br><br>
*Join & Earn <br><br>
*Refer friends to earns
        </div>
    </div><br><br>


    
<center>
    <h3>Rose Plants</h3>
</center><br> <?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, type, price, quantity, availability, description, image, product_id,discount_amount FROM products WHERE product_id =33";
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
                echo '<p name="' . $row["price"] . '"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p name="'.$row['discount_amount'].'"<strong>50%discount:₹</strong>'.$row['discount_amount'].'</p>';
                echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<button class="btn btn-success view_prod" data-id="' . $row['product_id'] . '">ID Number</button>';
                echo '<label name="quantity_' . $row['product_id'] . '" id="count-' . $row['product_id'] . '">0</label>';
                echo '<form method="post" action="add_to_cart.php">'; 
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo 'Quantity: <input type="number" name="quantity" value="1" min="1"><br>'; 
                echo '<button type="submit" class="btn btn-success add_to_cart_btn" name="add_to_cart">Add to Cart</button>'; 
                echo '</form>';
                echo '</div>';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';

                echo '</div>';
            }
        } else {
            echo "No records found in the products table.";
        }
    }
    $conn->close();
    ?><br><br>

<?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, type, price, quantity, availability, description, image, product_id,discount_amount FROM products WHERE product_id =34";
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
                echo '<p name="' . $row["price"] . '"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p name="'.$row['discount_amount'].'"<strong>50%discount:₹</strong>'.$row['discount_amount'].'</p>';
                echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<button class="btn btn-success view_prod" data-id="' . $row['product_id'] . '">ID Number</button>';
                echo '<label name="quantity_' . $row['product_id'] . '" id="count-' . $row['product_id'] . '">0</label>';
                echo '<form method="post" action="add_to_cart.php">'; 
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo 'Quantity: <input type="number" name="quantity" value="1" min="1"><br>'; 
                echo '<button type="submit" class="btn btn-success add_to_cart_btn" name="add_to_cart">Add to Cart</button>'; 
                echo '</form>';
                echo '</div>';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';

                echo '</div>';
            }
        } else {
            echo "No records found in the products table.";
        }
    }
    $conn->close();
    ?>
<br><br>

<?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, type, price, quantity, availability, description, image, product_id,discount_amount FROM products WHERE product_id =35";
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
                echo '<p name="' . $row["price"] . '"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p name="'.$row['discount_amount'].'"<strong>50%discount:₹</strong>'.$row['discount_amount'].'</p>';
                echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<button class="btn btn-success view_prod" data-id="' . $row['product_id'] . '">ID Number</button>';
                echo '<label name="quantity_' . $row['product_id'] . '" id="count-' . $row['product_id'] . '">0</label>';
                echo '<form method="post" action="add_to_cart.php">'; 
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo 'Quantity: <input type="number" name="quantity" value="1" min="1"><br>'; 
                echo '<button type="submit" class="btn btn-success add_to_cart_btn" name="add_to_cart">Add to Cart</button>'; 
                echo '</form>';
                echo '</div>';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';

                echo '</div>';
            }
        } else {
            echo "No records found in the products table.";
        }
    }
    $conn->close();
    ?><br><br>
    
<?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, type, price, quantity, availability, description, image, product_id,discount_amount FROM products WHERE product_id =36";
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
                echo '<p name="' . $row["price"] . '"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p name="'.$row['discount_amount'].'"<strong>50%discount:₹</strong>'.$row['discount_amount'].'</p>';
                echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<button class="btn btn-success view_prod" data-id="' . $row['product_id'] . '">ID Number</button>';
                echo '<label name="quantity_' . $row['product_id'] . '" id="count-' . $row['product_id'] . '">0</label>';
                echo '<form method="post" action="add_to_cart.php">'; 
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo 'Quantity: <input type="number" name="quantity" value="1" min="1"><br>'; 
                echo '<button type="submit" class="btn btn-success add_to_cart_btn" name="add_to_cart">Add to Cart</button>'; 
                echo '</form>';
                echo '</div>';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';

                echo '</div>';
            }
        } else {
            echo "No records found in the products table.";
        }
    }
    $conn->close();
    ?>
<br><br>

<?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, type, price, quantity, availability, description, image, product_id,discount_amount FROM products WHERE product_id =37";
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
                echo '<p name="' . $row["price"] . '"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p name="'.$row['discount_amount'].'"<strong>50%discount:₹</strong>'.$row['discount_amount'].'</p>';
                echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<button class="btn btn-success view_prod" data-id="' . $row['product_id'] . '">ID Number</button>';
                echo '<label name="quantity_' . $row['product_id'] . '" id="count-' . $row['product_id'] . '">0</label>';
                echo '<form method="post" action="add_to_cart.php">'; 
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo 'Quantity: <input type="number" name="quantity" value="1" min="1"><br>'; 
                echo '<button type="submit" class="btn btn-success add_to_cart_btn" name="add_to_cart">Add to Cart</button>'; 
                echo '</form>';
                echo '</div>';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';

                echo '</div>';
            }
        } else {
            echo "No records found in the products table.";
        }
    }
    $conn->close();
    ?>
<br><br>

<?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, type, price, quantity, availability, description, image, product_id,discount_amount FROM products WHERE product_id =38";
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
                echo '<p name="' . $row["price"] . '"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p name="'.$row['discount_amount'].'"<strong>50%discount:₹</strong>'.$row['discount_amount'].'</p>';
                echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<button class="btn btn-success view_prod" data-id="' . $row['product_id'] . '">ID Number</button>';
                echo '<label name="quantity_' . $row['product_id'] . '" id="count-' . $row['product_id'] . '">0</label>';
                echo '<form method="post" action="add_to_cart.php">'; 
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo 'Quantity: <input type="number" name="quantity" value="1" min="1"><br>'; 
                echo '<button type="submit" class="btn btn-success add_to_cart_btn" name="add_to_cart">Add to Cart</button>'; 
                echo '</form>';
                echo '</div>';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';

                echo '</div>';
            }
        } else {
            echo "No records found in the products table.";
        }
    }
    $conn->close();
    ?>


<script>
        $(document).ready(function() {
            $('.view_prod').click(function() {
                var productId = $(this).data('id');
                var productName = $(this).closest('.product-card').find('h5').text();
                Swal.fire({
                    title: productName,
                    html: '<p><strong>Product ID:</strong> ' + productId + '</p>',
                    icon: 'info',
                    confirmButtonText: 'Close'
                });
            });
        });
    </script>
</body>
<?php
include("footer.php");
?>
</html>