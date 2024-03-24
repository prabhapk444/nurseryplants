<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    .container {
        display: flex;
        width: 80%;
        height: auto;
        justify-content: center;
        align-self: center;
        margin-top: 50px;
    }

    form {
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center; 
    }

    label {
        font-weight: bold;
        font-size: 18px;
    }
</style>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="id"> ID:</label>
            <input type="number" name="id" class="form-control" required>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $product_id = $_POST['id'];


    $deleteQuery = "DELETE FROM products WHERE product_id = $product_id";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Product deleted successfully.";
        header("location:dashboard.php");
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    exit();
}

$conn->close();
?>

</body>
</html>
