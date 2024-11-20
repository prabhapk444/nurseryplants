<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    include("db.php");

    if (isset($_GET['delete_id'])) {
        $delete_id = intval($_GET['delete_id']);
        $deleteQuery = "DELETE FROM user_reviews WHERE id = $delete_id";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "<script>alert('Review deleted successfully!');</script>";
            echo "<script>window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Error deleting review: " . $conn->error . "');</script>";
        }
    }
?>

</body>
</html>