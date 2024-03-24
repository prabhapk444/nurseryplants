<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <center><h2>Add Product</h2></center>
    <div class="container mt-5">
        <form action="" method="post" enctype="multipart/form-data">
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
                    <option value="seeds">seeds</option>
                    <option value="plastic">Plastic</option>
                    <option value="ceramic">Ceramic</option>
                    <option value="trowel">Trowel</option>
                    <option value="sprayer">sprayer</option>
                    <option value="air">Air</option>
                    <option value="rose">Rose</option>
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
                <label for="availability">Availability:</label>
                <input type="number" class="form-control" id="availability" name="availability" required>
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
    $productName = $_POST["product_name"];
    $category = $_POST["category"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $price = '₹' . $_POST["price"]; 
    $quantity = $_POST["quantity"];
    $availability = $_POST["availability"];

 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

  
    $uploadsPath = $rootPath . "/nursery/nursery/uploads/";

    if (!is_dir($uploadsPath)) {
        mkdir($uploadsPath, 0755, true);
    }

 
    $targetFile = $uploadsPath . basename($_FILES["image"]["name"]);

    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO products (product_name, category, type, description, price, quantity, availability, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss",$productName, $category, $type, $description, $price, $quantity, $availability, $targetFile);
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
