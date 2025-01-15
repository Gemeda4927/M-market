<?php 

include 'config.php';
error_reporting(0);


if (isset($_POST['submit'])) {
	$cash=20;
	$email = $_POST['email'];
	$ammount = $_POST['ammount'];
	
		$sql = "SELECT * FROM wallet WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows >= 0) {
            $row = mysqli_fetch_assoc($result);
           // $dataammount=intval($rwo['ammount']);
            $fristamount =$ammount;
            $ammount *=$cash;
            $ammount = $row['ammount'] - $ammount;
			$update = "UPDATE  `wallet` SET ammount='$ammount' WHERE `wallet`.`email` = '$email'";
			$result = mysqli_query($conn, $update);
			if ($result) {
				echo "<script>alert('Wow!".$row['user']." buy ".$fristamount ." jacket. Your Account Balance is: ".$ammount."')</script>";
	            $email =$_POST['email']="";
	            $ammount = $_POST['ammount']="";
	            
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Doesnot found')</script>";
		}
		
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="mycss/walletadd.css">

	<title>ShewaOnline Form - ShewaWallet</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">ShewaOnline Change</p>
            
            <p>Email</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
            <p>Amount</p>
			<div class="input-group">
				<input type="number" placeholder="Ammount" name="ammount" value="<?php echo $ammount?>" required>
            </div>
			<div class="input-group">
				<button name="submit" class="btn">Buy</button>
			</div>
			<p class="login-register-text">If you change your mind or finish <a href="jacket.php">click Here</a>.</p>
            
		</form>
	</div>
</body>
</html>