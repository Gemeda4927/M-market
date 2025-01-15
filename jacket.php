a<?php
session_start();
include "config.php";

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    // Fetch data from the "products" table where PCategoryID is equal to 1
    $sql = "SELECT * FROM product WHERE PCategoryID = '$categoryId'";
    $result = mysqli_query($conn, $sql);
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <style>
        .maincontainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin: auto;
        }

        a {
            color: black;
            text-decoration: none;
        }

        .container {
            width: 22%;
            margin: 5px;
            padding: 10px;
            border: 2px solid lightgray;
            text-align: center;
            word-wrap: break-word;
            border-radius: 10px;
        }

        .container h2 {
            margin-top: 10px;
        }

        .container p {
            white-space: normal;
        }

        .container img {
            width: 100%;
            height: 300px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .btn-container button {
            width: 45%;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .btn-container button.add-to-cart {
            background-color: #ff2770;
            color: white;
        }

        .btn-container button.buy-now {
            width: 100%;
            height: 50px;
            padding: 10px 30px;
            background-color: #4CAF50;
            color: white;
            border: 2px solid #45a049;
            border-radius: 8px;
            margin-top: 3px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-container button.buy-now:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
    </style>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script>
</head>
<body>
    <h2><a href="shop.php"><- Back to Category</a></h2>
  
        <div class="maincontainer">
                 <?php
            // Display the fetched data
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $productName = $row['ProductName'];
                    $productPrice = $row['Price'];
                    $productImage = $row['ProductImage'];
                    $productDescription = $row['ProductDescription'];

                    // Output the data as desired
                    echo "<div class='container'>";
                    echo "<img src='{$productImage}' alt='Product Image'>";
                    echo "<h2>$productName</h2>";
                    echo "<h2>$productPrice birr</h2>";
                    echo "<p>$productDescription</p>";
                    echo "<div class='btn-container'>";
                    echo "<a href='addToCart.php?id=" . $row['id'] . "' class='btn btn-primary'>Add to Cart</a>";
                    echo "<a href='walletsend.php'><button class='buy-now'>Buy</button></a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </div>

    <script>
        function addToCart(productId) {
           
            // Create an AJAX request using jQuery
            $.ajax({
    type: "POST",
    url: "jacket.php",  // Check if this is the correct path to your PHP file
    data: { product_id: productId },
    success: function (response) {
        alert("Item added to cart!");
    },
    error: function () {
        alert("Error adding item to cart!");
    }
});

        }

        function buyNow() {
            // Buy now logic here
            alert("Redirecting to checkout...");
        }
    </script>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
