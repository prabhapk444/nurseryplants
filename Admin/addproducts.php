<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #34495e;
        }

        label {
            font-weight: bold;
            color: #34495e;
            display: block;
            margin-bottom: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            color: #555;
            outline: none;
            transition: border 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #3498db;
        }

        button {
            width: 100%;
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .update-link {
            margin-top: 20px;
            text-align: center;
        }

        .update-link a {
            color: #3498db;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
        }

        .update-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            button {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            label {
                font-size: 0.9rem;
            }

            input, select, textarea, button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <h2>Add Product</h2>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="indoor">Indoor</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="water">Water</option>
                    <option value="seeds">Seeds</option>
                    <option value="plastic">Plastic</option>
                    <option value="ceramic">Ceramic</option>
                    <option value="trowel">Trowel</option>
                    <option value="sprayer">Sprayer</option>
                    <option value="air">Air</option>
                    <option value="rose">Rose</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="tools">Tools</option>
                    <option value="plants">Plants</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" value="1.00" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" id="image" name="image">
            </div>
            <button type="submit">Submit</button>
        </form>
        <div class="update-link">
            <a href="updateproduct.php">Go to Update Products</a>
        </div>
    </div>
    <?php

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["product_name"];
    $category = $_POST["category"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $price = '₹' . $_POST["price"]; 
    $quantity = $_POST["quantity"];

 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

  
    $uploadsPath = $rootPath . "/nursery/nursery/uploads/";

    if (!is_dir($uploadsPath)) {
        mkdir($uploadsPath, 0755, true);
    }

 
    $targetFile = $uploadsPath . basename($_FILES["image"]["name"]);

    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO products (product_name, category, type, description, price, quantity,image)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss",$productName, $category, $type, $description, $price, $quantity,$targetFile);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Product added successfully!";
    } else {
        echo "Error adding product: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>


      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
