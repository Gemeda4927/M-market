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
});
