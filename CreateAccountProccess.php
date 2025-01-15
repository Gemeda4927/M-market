<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Fetch data from POST request
    $username = $_POST["username"];
    $email =  $_POST["email"];
    $cardNumber = $_POST["cardNumber"];
    $amount =  $_POST["amount"];

    // Perform the insertion
    $sql = "INSERT INTO wallet_account (username, email, card_number, amount) VALUES ('$username', '$email', '$cardNumber', '$amount')";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
