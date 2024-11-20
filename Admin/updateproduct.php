<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 20px;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <center><h2>Update Product</h2></center>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_id">Product Id:</label>
                <input type="text" id="product_id" name="product_id" required>
            </div>

            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="indoor">Indoor</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="plant">Water</option>
                    <option value="gardening">Gardening</option>
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
    </div>
    <?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"];
    $productName = $_POST["product_name"];
    $category = $_POST["category"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $imagePath = null;

    if (!empty($_FILES["image"]["name"])) {
        $uploadsDir = $_SERVER['DOCUMENT_ROOT'] . "/nursery/uploads/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
        }
        $imagePath = $uploadsDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $updateQuery = "UPDATE products SET 
                    product_name = ?, category = ?, type = ?, description = ?, 
                    price = ?, quantity = ?" . ($imagePath ? ", image = ?" : "") . "
                    WHERE product_id = ?";

    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($imagePath) {
        mysqli_stmt_bind_param($stmt, "sssssisi", $productName, $category, $type, $description, $price, $quantity, $imagePath, $productId);
    } else {
        mysqli_stmt_bind_param($stmt, "sssssii", $productName, $category, $type, $description, $price, $quantity, $productId);
    }

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

</body>
</html>
