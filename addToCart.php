<?php
session_start();
include("config.php");

// Check if the ID was received from the URL parameter
if (isset($_GET['id'])) {
    // Get the ID value
    $id = $_GET['id'];
    $userId = $_SESSION['userId'];

    // Check if the product exists in the database
    $sql = "SELECT * FROM Product WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the product details
        $product = mysqli_fetch_assoc($result);

        // Check if the product is already added to the cart for the user
        $sqlCheckCart = "SELECT * FROM cart WHERE user_id = $userId AND product_id = $id";
        $resultCheckCart = mysqli_query($conn, $sqlCheckCart);

        if ($resultCheckCart && mysqli_num_rows($resultCheckCart) > 0) {
            echo "The product is already added";
        } else {
            // Add the product to the cart
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            
            // Add the product to the cart array
            $_SESSION['cart'][] = $product;
            
            // Insert the userId and productId into the cart table
            $sqlInsertCart = "INSERT INTO cart (user_id, product_id) VALUES ($userId, $id)";
            $resultInsertCart = mysqli_query($conn, $sqlInsertCart);

            if ($resultInsertCart) {
                echo "Product added to cart successfully";
            } else {
                echo "Error adding product to cart: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Invalid product";
    }
} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>