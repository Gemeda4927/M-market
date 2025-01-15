<?php
include 'config.php';

session_start();
error_reporting(0);

function customAlert($message) {
    echo "<script>
            var customAlert = document.createElement('div');
            customAlert.className = 'custom-alert';
            customAlert.innerHTML = '$message';
            document.body.appendChild(customAlert);
            setTimeout(function() {
                document.body.removeChild(customAlert);
            }, 3000);
          </script>";
}

if (isset($_SESSION['username'])) {
    header("Location: homepage.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        echo "<script>alert('" . $row['role'] . "');</script>";
    } else {
        customAlert('Woops! Email or Password is Wrong.');
    }
}

if (isset($_POST['submit2'])) {
    $email = "guest@gmail.com";
    $password = "0000";
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: homepage.php");
    } else {
        customAlert('Woops! Email or Password is Wrong.');
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

    <title>Login Form - ShewaberOnLline</title>
    <link rel="stylesheet" href="mycss/login.css">

    <style>
        .error-message {
            color: #ff4545;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .inputbox.error {
            border-bottom: 2px solid #ff4545 !important;
        }
    </style>
</head>

<body>
    <div class="box">
        <span class="border-line"></span>
        <form action="loginHandler.php" method="POST" class="login-email">
            <h2>Login</h2>
            <div class="inputbox">
                <input type="text" name="username" value="" required>
                <span>Username</span>
                <i></i>
                <div class="error-message username-error"></div>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required>
                <span>Password</span>
                <i></i>
                <div class="error-message password-error"></div>
            </div>
            <div class="links">
             <a href="forget.php">Forgot Password</a>
             <a href="register.php" style="background-color: #45a049; padding: 5px; width: 80px; color: black;">Register</a>
             </div>

            <div class="buttons">
                <input type="submit" name="submit" value="Login">
                <!-- <button name="submit2" class="btn">Guest</button> -->
            </div>
        </form>
    </div>

    <!-- <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevents the default form submission behavior
            // You can add additional processing or validation here

            // Example AJAX request to submit the form data
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "your_processing_file.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from the server
                    var response = xhr.responseText;
                    console.log(response);
                }
            };
            xhr.send(formData);
        });
    </script> -->
</body>

</html>