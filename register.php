<?php
include 'config.php';
error_reporting(E_ALL);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword =  md5($_POST['confirmPassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result || mysqli_num_rows($result) == 0) {
            $insertSql = "INSERT INTO users (username, email, password,role) VALUES (?, ?, ?,'user')";
            $insertStmt = mysqli_prepare($conn, $insertSql);
            mysqli_stmt_bind_param($insertStmt, "sss", $username, $email, $password);
            $insertResult = mysqli_stmt_execute($insertStmt);

            if ($insertResult) {
                $insertedId = mysqli_insert_id($conn);
                echo '<script>alert("You Have Registered Succefully.")</script>';

                // exit();
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['confirmPassword'] = "";
              header("Location: login.php");
            } else {
                echo '<script>alert("Something Went Wrong.");</script>';
                exit();
                // echo "MySQL Error: " . mysqli_error($conn);
            }
        } else {
            echo '<script>alert("Email Already Exists.");}, 100);</script>';
            exit();
        }
    } else {
        echo '<script>alert("Password Not Matched.");</script>';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form - M-Market</title>
    <link rel="stylesheet" href="mycss/Registertion.css">
    <script src="myjs/LoginValidation.js" defer></script>
<style>
        /* Reset some default styles */
   body, h3, p, table {
    margin: 0;
    padding: 0;
}
.container {
    width: 100%;
    height: 100vh;
    background: url('image/register.png');
    background-size: 100%; /* Adjust the percentage as needed */
    background-repeat: no-repeat;
    background-position: center; 
    padding-top: .25rem;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #333; /* Dark background color */
    color: #ecf0f1;
}


h3 {
    text-align: center;
    padding: 20px 0;
    color: #3498db;
}

a {
    text-decoration: none;
    color: #2980b9;
}

form {
    max-width: 400px;
    /* margin: 20px auto; */
    /* margin-top: 5rem; */
    margin-left: 2%;
    background-color: #2c3e50; /* Updated background color */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

table {
    width: 100%;
}

td {
    padding: 10px;
}

input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #34495e; /* Updated border color */
    border-radius: 4px;
    background-color: #2c3e50; /* Updated background color */
    color: #ecf0f1;
}

input:focus {
    outline: none;
    border-color: #3498db;
}

.error {
    color: #e74c3c;
    font-size: 12px;
}

input[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #27ae60;
}

/* Unique styles for each input type */
input[type="text"] {
    background-color: #3498db;
}

input[type="email"] {
    background-color: #e74c3c;
}

input[type="password"] {
    background-color: #f39c12;
}

/* Responsive styles */
@media only screen and (max-width: 600px) {
    form {
        width: 80%;
    }
}

</style>

</head>
<body>
<div class="container">
        <form action="" method="post" id="Yaali">
            <div id="successMessage"> <h3>Register</h3> </div>
            <table>
                <tr>
                    <td>User Name:</td>
                    <td>
                        <input type="text" name="username" id="Username" placeholder="Username" onkeyup="validateFirstName()">
                        <span id="firstNameError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" id="email" placeholder="Email" onkeyup="validateEmail()">
                        <span id="emailError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Password" onkeyup="validatePassword()">
                        <span id="passwordError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" onkeyup="validateConfirmPassword()">
                        <span id="confirmPasswordError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name ="submit" value="Register" onclick="return validate()"></td>
                    <td> <p class="login-register-text">Already have an account?<a href="login.php">Login</a>.</p></td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get references to input fields and error elements
            var firstNameInput = document.getElementById('Username');
            var firstNameError = document.getElementById('firstNameError');

            var emailInput = document.getElementById('email');
            var emailError = document.getElementById('emailError');

            var passwordInput = document.getElementById('password');
            var passwordError = document.getElementById('passwordError');

            var confirmPasswordInput = document.getElementById('confirmPassword');
            var confirmPasswordError = document.getElementById('confirmPasswordError');

            // Add event listeners for the 'input' or 'change' event on each field
            firstNameInput.addEventListener('input', function () {
                validateFirstName();
            });

            emailInput.addEventListener('input', function () {
                validateEmail();
            });

            passwordInput.addEventListener('input', function () {
                validatePassword();
            });

            confirmPasswordInput.addEventListener('input', function () {
                validateConfirmPassword();
            });

            // Function to validate the First Name
            function validateFirstName() {
                var firstNameValue = firstNameInput.value.trim();
                var firstNameRegex = /^[A-Za-z]+$/; // Regular expression to match alphabetic characters

                if (firstNameValue === "") {
                    showError(firstNameError, "Invalid");
                } else if (!firstNameRegex.test(firstNameValue)) {
                    showError(firstNameError, "Invalid");
                } else if (firstNameValue.length < 3 || firstNameValue.length > 15) {
                    showError(firstNameError, "Invalid");
                } else {
                    showSuccess(firstNameError, "Valid");
                }
            }

            // Function to validate the Email
            function validateEmail() {
                var emailValue = emailInput.value.trim();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regular expression for a valid email

                if (emailValue === "") {
                    showError(emailError, "Invalid");
                } else if (!emailRegex.test(emailValue)) {
                    showError(emailError, "Invalid");
                } else {
                    showSuccess(emailError, "Valid");
                }
            }

            // Function to validate the Password
            function validatePassword() {
                var passwordValue = passwordInput.value.trim();
                var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/; // Regular expression for a strong password

                if (passwordValue === "") {
                    showError(passwordError, "Invalid - Password cannot be empty");
                } else if (!passwordRegex.test(passwordValue)) {
                    showError(passwordError, "Invalid - Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit");
                } else {
                    showSuccess(passwordError, "Valid");
                }
            }

            // Function to validate the Confirm Password
            function validateConfirmPassword() {
                var confirmPasswordValue = confirmPasswordInput.value.trim();
                var passwordValue = passwordInput.value.trim();

                if (confirmPasswordValue === "") {
                    showError(confirmPasswordError, "Invalid - Confirm Password cannot be empty");
                } else if (confirmPasswordValue !== passwordValue) {
                    showError(confirmPasswordError, "Invalid - Passwords do not match");
                } else {
                    showSuccess(confirmPasswordError, "Valid");
                }
            }

            // General function to show error message
            function showError(element, message) {
                element.innerHTML = message;
                element.style.color = "red";
            }

            // General function to show success message
            function showSuccess(element, message) {
                element.innerHTML = message;
                element.style.color = "green";
            }

            // Function to clear success message
            function showSuccessMessage() {
                var successMessage = document.getElementById('successMessage');
                successMessage.innerHTML = 'Registered successfully!';
            }

            // Modify form submission logic to check all conditions
            var registrationForm = document.getElementById('Yaali');
            registrationForm.addEventListener('submit', function (event) {
                // event.preventDefault();

                // Validate each field
                validateFirstName();
                validateEmail();
                validatePassword();
                validateConfirmPassword();

                // Check if all conditions are met
                if (
                    firstNameError.innerHTML === 'Valid' &&
                    emailError.innerHTML === 'Valid' &&
                    passwordError.innerHTML === 'Valid' &&
                    confirmPasswordError.innerHTML === 'Valid'
                ) {
                    // All conditions met, show success message
                    showSuccessMessage('Registered successfully!');
                } else {
                    // Conditions not met, clear success message
                    clearSuccessMessage();
                }
            });
        });
    </script>
</body>
</html>




