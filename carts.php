<?php
include('header.php');
include('config.php');

// Check if the remove button is clicked
if (isset($_POST['remove'])) {
    $productId = $_POST['product_id'];
    $userId = $_SESSION['userId'];

    // Delete the item from the cart table
    $deleteQuery = "DELETE FROM cart WHERE user_id = $userId AND product_id = $productId";
    mysqli_query($conn, $deleteQuery);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .product-image {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        .product-details {
            flex-grow: 1;
        }
    </style>
</head>

<body>

<form method="post" action="orderHandler.php">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <h1>Cart</h1>
        <div class="cart-items">
            <?php
            // Retrieve the cart items from the database
            $sql = "SELECT p.ProductImage, p.ProductName, p.price, c.product_id FROM cart c
                    JOIN Product p ON c.product_id = p.id
                    WHERE c.user_id = ".$_SESSION['userId'];

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <input style="display: none;" type="text" name="my_array[]" value="<?php echo $row['product_id']; ?>">
                    <div class="product-row">
                        <img src="<?php echo $row['ProductImage']; ?>" alt="Product Image" class="product-image">
                        <div class="product-details">
                            <h4><?php echo $row['ProductName']; ?></h4>
                            <p>Price: $<?php echo $row['price']; ?></p>
                        </div>
                        <div class="item-counter">
                            <button class="btn btn-secondary btn-sm minus-btn">-</button>
                    <input type="number" name="my_array2[]"  min="1" value="1" class="form-control item-quantity">
                            <button class="btn btn-secondary btn-sm plus-btn">+</button>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <a class="btn btn-danger btn-sm remove-btn" href="removeFromCart.php?pid=<?php echo $row['product_id']; ?>" >Remove</a>

                    </div>
                    <?php
                }
            } else {
                echo "No items in the cart.";
            }
            ?>
        </div>
        <button type="submit" name="submit" class="btn btn-danger btn-sm remove-btn">Order</button>
    </div>
</form>

<?php

include('config.php');

if (isset($_POST['submit'])) {
    $userId = $_SESSION['userId'];
    $totalPrice = 0;

    $productIds = $_POST['my_array'];
    
    foreach ($productIds as $productId) {
        echo $productId . "<br/>";
    }

    // Rest of the code...
}
?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            // Increment item quantity
            $('.plus-btn').click(function(e) {
                e.preventDefault();
                var quantityInput = $(this).siblings('.item-quantity');
                var quantity = parseInt(quantityInput.val());
                quantityInput.val(quantity + 1);
            });

            // Decrement item quantity
            $('.minus-btn').click(function(e) {
                e.preventDefault();
                var quantityInput = $(this).siblings('.item-quantity');
                var quantity = parseInt(quantityInput.val());
                if (quantity > 1) {
                    quantityInput.val(quantity - 1);
                }
            });

            // Handle final order button click
            $('.final-order-btn').click(function(e) {
                e.preventDefault();
                // Add your logic to process the final order here
            });
        });
    </script>
</body>
</html>