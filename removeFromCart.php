<?php
session_start();
include('config.php');

$productId = isset($_GET['pid']) ? $_GET['pid'] : null;

if ($productId !== null) {
    $userId = $_SESSION['userId'];
    $deleteQuery = "DELETE FROM cart WHERE user_id = $userId AND product_id = $productId";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "Item removed successfully";
        header("Location: Carts.php");
    } else {
        echo "Error removing item: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
