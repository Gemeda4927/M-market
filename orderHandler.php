<?php
session_start();
include('config.php');

if (isset($_POST['submit'])) {
    $userId = $_SESSION['userId'];
    $totalPrice = 0;

    // Check if 'my_array' is set in the POST data
    if (isset($_POST['my_array']) && is_array($_POST['my_array'])) {
        $productIds = $_POST['my_array'];

        // Check if 'my_array2' is set in the POST data
        if (isset($_POST['my_array2']) && is_array($_POST['my_array2'])) {
            $arr2 = $_POST['my_array2'];

            // Check if both 'my_array' and 'my_array2' have the same count
            if (count($productIds) === count($arr2)) {
                // Loop through the productIds array
                for ($i = 0; $i < count($productIds); $i++) {
                    $productId = $productIds[$i];
                    $quantity = $arr2[$i];

                    // Add your logic to process each product here
                    // For example, you can insert the data into the 'order' table
                    $insertQuery = "INSERT INTO `order` (product_id, user_id, quantity) VALUES ($productId, $userId, $quantity)";
                    mysqli_query($conn, $insertQuery);

                    // Calculate the total price for this order (replace this with your actual logic)
                    $totalPrice += $quantity * 10; // Assuming $10 is the price per quantity
                    $message = "Order completed successfully";
                    echo "<script>alert('$message');</script>";
                }
            } else {
                echo "Mismatch in array counts.";
            }
        } else {
            echo "No 'my_array2' found in the POST data.";
        }
    } else {
        echo "No 'my_array' found in the POST data.";
    }
}

// Display the back button
echo "<a href='./carts.php'> Back </a>";
?>
