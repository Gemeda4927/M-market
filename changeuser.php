<?php 

include 'config.php';

session_start();

error_reporting(0);


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows >= 0) {
			$sql = "UPDATE  `users` SET username='$username' WHERE `users`.`email` = '$email'";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Username chenged Completed.')</script>";
                $_POST['password'] = "";
                include 'logout.php';
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="mycss/style.css">

	<title>Change name Form - ShewaberOnline</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Change name</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
			<div class="input-group">
				<button name="submit" class="btn">Change</button>
			</div>
			div class="input-group">
				<input type="text" placeholder="Username" name="username" value="New Username" required>
			</div>
			<p class="login-register-text"><a href="profile.php">Back Home</a>.</p>
		</form>
	</div>
</body>
</html>