<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows >= 0) {
			$sql = "UPDATE  `users` SET password='$password' WHERE `users`.`email` = '$email'";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Password chenged Completed.')</script>";
                $_POST['password'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- <link rel="stylesheet" type="text/css" href="mycss/style.css"> -->

	<title>Forget Form - ShewaberOnline</title>

	<style>
	body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: rgba(173, 216, 230, 0.9); /* Light blue with 0.9 opacity */
    margin: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #ffffff; /* White container background color */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
.login-email {
    text-align: center;
}

.login-text {
    font-size: 2rem;
    font-weight: 800;
    color: #e44d26; /* Orange color for the title */
}

.input-group {
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input:focus {
    outline: none;
    border-color: #e44d26; /* Orange color when input is focused */
}

.btn {
    background-color: #e44d26; /* Orange button background color */
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #d1401d; /* Darker orange color on hover */
}

.login-register-text {
    text-align: center;
    margin-top: 20px;
}

.login-register-text a {
    color: #e44d26; /* Orange color for the link */
    text-decoration: none;
}

.login-register-text a:hover {
    text-decoration: underline;
}

@media only screen and (max-width: 600px) {
    .container {
        width: 80%;
    }
}

	</style>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Forget Password</p>
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
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Change</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>