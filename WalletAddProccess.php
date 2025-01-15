<?php 
include 'config.php';
error_reporting(E_ALL); // Enable error reporting for debugging

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $amount = $_POST['ammount']; 
    $card = $_POST['card'];

    $sql = "SELECT * FROM wallet_account WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $newAmount = $amount + $row['amount']; 

            $update = "UPDATE `wallet_account` SET amount='$newAmount' WHERE `email` = '$email'";
            $result = mysqli_query($conn, $update);

            if ($result) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>alert('Wow! Coin added to wallet. Your Account Balance is: ".$newAmount."')</script>";
                    // Clear form fields
                    $username = $_POST['username'] = "";
                    $email = $_POST['email'] = "";
                    $amount = $_POST['amount'] = "";
                    $card = $_POST['card'] = "";
                } else {
                    echo "<script>alert('Wallet table not updated.')</script>";
                    echo "SQL Update Error: " . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
                echo "SQL Error: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Woops! Email Does not found')</script>";
        }
    } else {
        echo "SQL Query Error: " . mysqli_error($conn);
    }
    
    // Close the connection
    mysqli_close($conn);
}
?>
