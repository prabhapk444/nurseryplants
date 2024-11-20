<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM register WHERE id = ?";   
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header("Location:users.php");
        exit;
    } else {
        echo "Error deleting record.";
    }
}
$conn->close();
?>
