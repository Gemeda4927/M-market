<?php
include 'config.php';
session_start();
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productImage = mysqli_real_escape_string($conn, $_FILES['productImage']['name']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']); 
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    $productCategory = mysqli_real_escape_string($conn, $_POST['productCategory']);

    // Ensure the file is an image
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $fileExtension = strtolower(pathinfo($_FILES['productImage']['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Error: Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    // Move the uploaded file to a designated folder
    $uploadDirectory = "uploads/";

    // Ensure the "uploads" directory exists
    if (!file_exists($uploadDirectory) && !mkdir($uploadDirectory, 0777, true)) {
        echo "Error: Failed to create 'uploads' directory.";
        exit();
    }

    // Generate a unique file name to avoid overwriting existing files
    $targetFilePath = $uploadDirectory . uniqid() . '_' . basename($_FILES['productImage']['name']);

    // Check if the file was successfully moved
    if (!move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFilePath)) {
        echo "Error: Failed to upload product image. " . $_FILES['productImage']['error'];
        exit();
    }

    // Insert data into the database
    $sql = "INSERT INTO Product (ProductName, ProductImage, price, ProductDescription, PCategoryID)
            VALUES ('$productName', '$targetFilePath', '$productPrice', '$productDescription', '$productCategory')";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully";

        header("Location: home.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
} else {
    // Redirect to the form if accessed directly without submission
    header("Location: add_product_form.php");
    exit();
}
?>
