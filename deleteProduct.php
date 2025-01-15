<?php
include("config.php");

// Check if the ID was received from the form submission
if (isset($_POST['id'])) {
    // Get the ID value
    $id = $_POST['id'];

    // Prepare and execute the SQL query to delete the product
    $sql = "DELETE FROM Product WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Product deleted successfully";
        header("Location: ProductDetail.php");
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>