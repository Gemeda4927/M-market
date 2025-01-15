<?php
include("config.php");

// Check if the ID was received from the query string
if (isset($_GET['oid'])) {
    // Get the ID value
    $id = $_GET['oid'];

    // Prepare and execute the SQL query to delete the order
    $sql = "DELETE FROM `order` WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Order deleted successfully";
        // Redirect to a specific page after deletion if needed
        // header("Location: ProductDetail.php");
    } else {
        echo "Error deleting order: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>