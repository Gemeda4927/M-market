<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM wallet_account WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $amount = $row['amount']; // Correct variable name

            echo "<script>alert('Wow! Your Account Balance is: ".$amount."')</script>";
            
            // Clear form fields
            $username = $_POST['username'] = "";
            $email = $_POST['email'] = "";
            $amount = $_POST['amount'] = "";
            $card = $_POST['card'] = "";
        } else {
            echo "<script>alert('Woops! Email not found.')</script>";
        }
    } else {
        echo "SQL Query Error: " . mysqli_error($conn);
    }
    
    // Close the connection
    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="mycss/walletadd.css">

	<title>Wallet ask Form - M-Wallet</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: linear-gradient(rgba(0, 0, 0, 0.22), rgba(0, 0, 0, 0.566)), url(image/sh1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    }
    .container {
        background-color: transparent; 
        
    }
    .login-email {
    background-color: transparent; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    border-radius: 12px; 
    box-shadow: 2px 2px 2px #ff2770;
    padding: 20px;
    max-width: 400px;
    width: 100%;
    /* margin: 2rem auto; */
    }
    .login-email p {
        color: #fff !important;
        margin-bottom: .7rem;
    }
    #login-text {
        text-align: center;
        color: #ff2700 !important;
        margin-bottom: 20px;
    }
    .login-register-text a{
        color: #ff2700;
    }
    </style>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" id="login-text" style="font-size: 2rem; font-weight: 800;">M-Wallet</p>
            <p>User Name</p>
            <?php ?>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
            <p>Email</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
            <div class="input-group">
				<button name="submit" class="btn">Ask</button>
			</div>
			<p class="login-register-text">Donot Have an account? <a href="CreateWalletAcount.php">click Here</a>.</p>
            <p class="login-register-text">go back to home? <a href="shewawallet.php">M-Wallet</a>.</p>
		</form>
	</div>
</body>
</html>