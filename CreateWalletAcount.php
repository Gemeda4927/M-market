<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Wallet Account</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #3498db; /* Blue background */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      width: 300px;
    }
    h2 {
      color: #3498db; /* Blue text */
      text-align: center;
    }
    label {
      display: block;
      margin: 10px 0 5px;
      color: #333;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      background-color: #2ecc71; /* Green button */
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }
    button:hover {
      background-color: #27ae60; /* Darker green on hover */
    }
    #feedbackMessage {
      padding: 10px;
      text-align: center;
      margin-bottom: 15px;
      border-radius: 4px;
    }
    .error {
      color: red;
      background-color: #ffcccc;
    }
    .success {
      color: green;
      background-color: #ccffcc;
    }
    .create {
      color: #ff2700;
    }
  </style>
</head>
<body>

<form id="walletForm" method="post" action="CreateAccountProccess.php">
  <div id="feedbackMessage"></div>
  <!-- Static CSRF token -->
  <input type="hidden" name="csrf_token" value="your_static_token_here">

  <h2 class="create">Create Wallet Account</h2>
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="cardNumber">Card Number:</label>
  <input type="text" id="cardNumber" name="cardNumber" required>

  <label for="amount">Amount:</label>
  <input type="number" id="amount" name="amount" min="0" required>

  <button type="submit">Create Account</button>
</form>
<!-- 
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('walletForm');
    const feedbackMessage = document.getElementById('feedbackMessage');

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      // Reset previous messages
      feedbackMessage.innerHTML = '';

      // Validate each input separately
      const username = form.querySelector('#username').value.trim();
      if (!isValidUsername(username)) {
        displayError('Invalid username. Please enter a valid username.');
        return;
      }

      const email = form.querySelector('#email').value.trim();
      if (!isValidEmail(email)) {
        displayError('Invalid email. Please enter a valid email address.');
        return;
      }

      const cardNumber = form.querySelector('#cardNumber').value.trim();
      if (!isValidCardNumber(cardNumber)) {
        displayError('Invalid card number. Please enter a valid 4-digit card number.');
        return;
      }

      const amount = form.querySelector('#amount').value.trim();
      if (!isValidAmount(amount)) {
        displayError('Your Balance is Insufficient');
        return;
      }

      // If all validation passes, submit the form
      displaySuccess('Account created successfully!');
    });

    function isValidUsername(username) {
      const usernameRegex = /^[A-Za-z]+$/;
      return usernameRegex.test(username) && username.length > 3;
    }

    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    function isValidCardNumber(cardNumber) {
      return /^\d{4}$/.test(cardNumber);
    }

    function isValidAmount(amount) {
      return !isNaN(amount) && parseFloat(amount) >= 0;
    }

    function displayError(message) {
      feedbackMessage.innerHTML = message;
      feedbackMessage.className = 'error';
    }

    function displaySuccess(message) {
      feedbackMessage.innerHTML = message;
      feedbackMessage.className = 'success';
    }
  });
</script> -->

</body>
</html>
