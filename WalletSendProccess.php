<?php
include 'config.php';
error_reporting(0);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $adminCardNumber = $_POST['admin_card'];

    // Check if the user's email exists
    $userQuery = "SELECT * FROM wallet_account WHERE email=?";
    $userStmt = mysqli_prepare($conn, $userQuery);
    mysqli_stmt_bind_param($userStmt, "s", $email);
    mysqli_stmt_execute($userStmt);
    $userResult = mysqli_stmt_get_result($userStmt);

    if (mysqli_num_rows($userResult) > 0) {
        $userRow = mysqli_fetch_assoc($userResult);
        if ($adminCardNumber != "1111") {
            echo '<script>alert("Invalid Account Number!"); setTimeout(function() { window.location.href = "walletsend.php"; }, 100);</script>';
            exit();;
        } else {
            if ($userRow['amount'] > $amount) {
                $userNewAmount = $userRow['amount'] - $amount;
                // Start transaction
                mysqli_begin_transaction($conn);

                // Deduct amount from user's account
                $userUpdate = "UPDATE wallet_account SET amount=? WHERE email=?";
                $userStmt = mysqli_prepare($conn, $userUpdate);
                mysqli_stmt_bind_param($userStmt, "ds", $userNewAmount, $email);
                $userResult = mysqli_stmt_execute($userStmt);

                // Check if user update is successful
                if ($userResult) {
                    // Retrieve admin account details
                    $adminQuery = "SELECT * FROM wallet_account WHERE card_number=?";
                    $adminStmt = mysqli_prepare($conn, $adminQuery);
                    mysqli_stmt_bind_param($adminStmt, "s", $adminCardNumber);
                    mysqli_stmt_execute($adminStmt);
                    $adminResult = mysqli_stmt_get_result($adminStmt);

                    // Check if admin account found
                    if (mysqli_num_rows($adminResult) > 0) {
                        $adminRow = mysqli_fetch_assoc($adminResult);
                        $adminNewAmount = $adminRow['amount'] + $amount;

                        // Update admin's account with the new amount
                        $adminUpdate = "UPDATE wallet_account SET amount=? WHERE card_number=?";
                        $adminStmt = mysqli_prepare($conn, $adminUpdate);
                        mysqli_stmt_bind_param($adminStmt, "ds", $adminNewAmount, $adminCardNumber);
                        $adminResult = mysqli_stmt_execute($adminStmt);

                        // Check if admin update is successful
                        if ($adminResult) {
                            // Commit the transaction
                            mysqli_commit($conn);
                            echo '<script>alert("Transaction successfully completed! Amount deducted from user with email ' . $email . ' and added to admin with card number ' . $adminCardNumber . '. User\'s Account Balance is: ' . $userNewAmount . '."); setTimeout(function() { window.location.href = "walletsend.php"; }, 100);</script>';
                            exit(); // Make sure to exit after the redirect
                        } else {
                            // Rollback the transaction on admin update failure
                            mysqli_rollback($conn);
                            echo '<script>alert("Woops! Something went wrong while updating admin account. Admin update failed."); setTimeout(function() { window.location.href = "walletsend.php"; }, 100);</script>';
                            exit();
                        }
                    } else {
                        // Rollback the transaction if admin card number not found
                        mysqli_rollback($conn);
                        echo '<script>alert("Woops! Incorrect Account Number."); setTimeout(function() { window.location.href = "walletsend.php"; }, 100);</script>';
                        exit();
                    }
                } else {
                    // Rollback the transaction on user update failure
                    mysqli_rollback($conn);
                    echo '<script>alert("Woops! Something went wrong while updating user account. User update failed."); setTimeout(function() { window.location.href = "walletsend.php"; }, 100);</script>';
                    exit();
                }
            } else {
                echo '<script>alert("Your Balance is insufficient!"); setTimeout(function() { window.location.href = "walletsend.php"; }, 100);</script>';
                exit();
            }
        }
    } else {
        echo '<script>alert("Woops! User Email not found."); setTimeout(function() { window.location.href = "walletsend.php"; }, 100);</script>';
        exit();
    }

    // Close prepared statements
    mysqli_stmt_close($userStmt);
    mysqli_stmt_close($adminStmt);

    // Close the connection
    mysqli_close($conn);
}
?>