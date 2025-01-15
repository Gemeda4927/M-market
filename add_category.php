<?php
include("config.php");
// Assuming you have already established a connection to the database

// Get the category name from the form
$categoryName = $_POST['categoryName'];

// Check if a file was uploaded
if (isset($_FILES['categoryImage'])) {
    $categoryImage = $_FILES['categoryImage']['name'];
    $categoryImageTmp = $_FILES['categoryImage']['tmp_name'];
    $categoryImageSize = $_FILES['categoryImage']['size'];
    $categoryImageType = $_FILES['categoryImage']['type'];

    // Check if the uploaded file is an image
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $fileExtension = strtolower(pathinfo($categoryImage, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Error: Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    // Specify the directory to store the uploaded image
    $uploadDirectory = "category_images/";

    // Create the directory if it doesn't exist
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory);
    }

    // Generate a unique file name to avoid overwriting existing files
    $targetFilePath = $uploadDirectory . uniqid() . '_' . $categoryImage;

    // Move the uploaded file to the destination directory
    if (!move_uploaded_file($categoryImageTmp, $targetFilePath)) {
        echo "Error: Failed to upload category image.";
        exit();
    }
} else {
    echo "Error: No category image was uploaded.";
    exit();
}

// Create the SQL query with the correct column names
$sql = "INSERT INTO Category (category_name, imageUrl) VALUES ('$categoryName', '$targetFilePath')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Category added successfully.";
    header("Location: home.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

