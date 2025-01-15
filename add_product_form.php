<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Form</title>
    <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #FFDAB9;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }        

                form {
                    background-color: #fff;
                    border-radius: 8px;
                    padding: 30px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    width: 400px;
                    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Added transitions */
                }

                h2 {
                    text-align: center;
                    color: #333;
                    margin-bottom: 20px;
                }

                label {
                    display: block;
                    margin-bottom: 8px;
                    color: #555;
                }

                input,
                textarea,
                select {
                    width: 100%;
                    padding: 12px;
                    margin-bottom: 20px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    box-sizing: border-box;
                    transition: border-color 0.3s ease, background-color 0.3s ease, transform 0.3s ease; /* Added background-color and transform transitions */
                    background-color: #f9f9f9;
                }

                input:hover,
                textarea:hover,
                select:hover {
                    background-color: #f1f1f1;
                }

                input:focus,
                textarea:focus,
                select:focus {
                    border-color: #4caf50;
                    background-color: #fff;
                    box-shadow: 0 0 8px rgba(0, 150, 136, 0.5);
                    transform: scale(1.02); /* Slight scale up when focused */
                }

                /* Additional color variations for each box */
                input[type="text"] {
                    background-color: rgba(248, 215, 218, 0.9);
                }

                input[type="file"] {
                    background-color: rgba(204, 229, 255, 0.9);
                }

                textarea {
                    background-color: rgba(212, 237, 218, 0.9);
                }

                select {
                    background-color: rgba(255, 243, 205, 0.9);
                }

                input[type="submit"] {
                    background-color: #4caf50;
                    color: #fff;
                    cursor: pointer;
                    border: none;
                    border-radius: 4px;
                    padding: 14px;
                    font-size: 16px;
                    transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
                }

                input[type="submit"]:hover {
                    background-color: #45a049;
                    transform: scale(1.05);
                    box-shadow: 0 0 15px rgba(0, 150, 136, 0.5); 
                }

                @media (max-width: 600px) {
                    form {
                        width: 90%;
                    }
                }

    </style>
</head>
<body>

<form action="ProductProccess.php" method="post" enctype="multipart/form-data">
    <h2>Add Product</h2>
    
    <!-- Product Name -->
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" required>

    <!-- Product Image -->
    <label for="productImage">Product Image:</label>
    <input type="file" id="productImage" name="productImage" required>

    <!-- Product Price -->
    <label for="productPrice">Product Price:</label>
    <input type="text" id="productPrice" name="productPrice" required>

    <!-- Product Description -->
    <label for="productDescription">Product Description:</label>
    <textarea id="productDescription" name="productDescription" rows="4" required></textarea>

    <!-- Product Category -->



    <label for="productCategory">Product Category:</label>
<select id="productCategory" name="productCategory" required>
    <?php
    include("config.php");
    // Assuming you have already established a connection to the database

    // Create the SQL query to fetch categories
    $sql = "SELECT * FROM Category";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Loop through each row and create an option for each category
        while ($row = mysqli_fetch_assoc($result)) {
            $categoryId = $row['id'];
            $categoryName = $row['category_name'];
            echo "<option value='$categoryId'>$categoryName</option>";
        }
    } else {
        echo "<option value=''>Error retrieving categories</option>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</select>



    <!-- Submit Button -->
    <input type="submit" value="Add Product">
</form>

</body>
</html>
