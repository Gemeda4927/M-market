<?php 

include 'config.php';

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$comment = $_POST['comment'];
	$sql = "SELECT * FROM users WHERE email='$email' ";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];

			$sql = "INSERT INTO comment (user, email, comment)
					VALUES ('$username', '$email', '$comment')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Thank you for your feedback .')</script>";
				$username = "";
				$email = "";
				$comment = "";
			} else {
				echo "<script>alert('Woops! Your comment dose not inserted.')</script>";
			}

}
	 else {
		echo "<script>alert('Please Regester to give us a feedback!.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="mycss/style.css">
	<title>Comment Form  M-market</title>
	<style>

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right top, #a0d8ef, #8ecae6, #6f95d3, #3f67bd, #364f6b); /* Gradient background */
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container {
    width: 400px;
    background: linear-gradient(to right, #2196f3, #64b5f6); /* Blue gradient background */
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 20px;
    box-sizing: border-box;
}

.login-email {
    text-align: center;
    color: #fff;
}

.login-text {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 20px;
}

input {
    width: 100%;
	height: 160px;
    padding: 15px;
    box-sizing: border-box;
    border: none;
    border-radius: 4px;
    margin-bottom: 15px;
    background-color: rgba(255, 255, 255, 0.8);
}

input:focus {
    outline: none;
    background-color: rgba(255, 255, 255, 1);
}

.comment input {
    border-color: #1976d2; /* Darker blue border for comment input */
}

.btn {
    background-color: #ff6f61;
    color: #fff;
    padding: 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #e05148;
}

.login-register-text {
    text-align: center;
    margin-top: 20px;
}

.login-register-text a {
    color: #ff6f61;
    text-decoration: none;
}

.login-register-text a:hover {
    text-decoration: underline;
}


	</style>
</head>
<body>
	<div class="container">
		<form action="#" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">COMMENT</p>
            <div class="input-group comment">
				<input type="text" placeholder="Comment" name="comment" value="<?php echo $comment ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Post</button>
			</div>
			<p class="login-register-text"><a href="homepage.php">Back to Home!</a>.</p>
		</form>
	</div>
</body>
</html>