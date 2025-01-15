<?php
include("config.php");

// Check if the ID was received from the form submission
if (isset($_POST['id'])) {
    // Get the ID value
    $id = $_POST['id'];
    
    // Prepare and execute the SQL query to delete the user
    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Check if the deletion was successful
    if ($result) {
        echo "User deleted successfully";
        header("Location: Customer.php");
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>