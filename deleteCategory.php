<?php
include("config.php");

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Delete the associated products
    $sqlDeleteProducts = "DELETE FROM Product WHERE PCategoryID = $categoryId";
    $resultDeleteProducts = mysqli_query($conn, $sqlDeleteProducts);

    // Check if the deletion of the products was successful
    if ($resultDeleteProducts) {
        // Delete the category
        $sqlDeleteCategory = "DELETE FROM Category WHERE id = $categoryId";
        $resultDeleteCategory = mysqli_query($conn, $sqlDeleteCategory);

        // Check if the deletion of the category was successful
        if ($resultDeleteCategory) {
            echo "Category and associated products deleted successfully";
            header("Location: home.php");
        } else {
            echo "Error deleting category: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting products: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>