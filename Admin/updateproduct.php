<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <center><h2>Update Product</h2></center>
    <div class="container mt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="product_name">Product Id:</label>
                <input type="text" class="form-control" id="product_name" name="product_id" required>
            </div>

            <div class="form-group mb-2">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            
            <div class="form-group mb-2">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="indoor">Indoor</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="plant">Water</option>
                    <option value="gardening">Gardening</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="tools">Tools</option>
                    <option value="plants">Plants</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group mb-2">
                <label for="price">Price:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="price" value="1.00" name="price" step="0.01" required>
                </div>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group mb-2">
                <label for="image">Product Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
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
    $price = '₹' . $_POST["price"];
    $quantity = $_POST["quantity"];

    if ($_FILES["image"]["name"] != "") {
        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        
        $uploadsPath = $rootPath . "/nursery/nursery/uploads/";

        if (!is_dir($uploadsPath)) {
            mkdir($uploadsPath, 0755, true);
        }

        $targetFile = $uploadsPath . basename($_FILES["image"]["name"]);

        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

        $updateQuery = "UPDATE products SET 
                        product_name = ?, category = ?, type = ?, description = ?, 
                        price = ?, quantity = ?,image = ?
                        WHERE product_id = ?";

        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "sssssssi", $productName, $category, $type, $description, $price, $quantity, $availability, $targetFile, $productId);
    } else {
        $updateQuery = "UPDATE products SET 
                        product_name = ?, category = ?, type = ?, description = ?, 
                        price = ?, quantity = ?,
                        WHERE product_id = ?";

        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssi", $productName, $category, $type, $description, $price, $quantity, $availability, $productId);
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

  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
