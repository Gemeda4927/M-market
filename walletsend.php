<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="mycss/walletsend.css">
    <title>Wallet Send Form - ShewaWallet</title>
  <style>
body {
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
    background-image: linear-gradient(rgba(0, 0, 0, 0.22), rgba(0, 0, 0, 0.566)), url(image/sh1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    /* padding: 2rem; */
    /* filter: blur(5px); */
}
/* body {
    width: 100%;
    height: 100%;
    background-image: linear-gradient(rgba(0, 0, 0, 0.22), rgba(0, 0, 0, 0.566)), url(image/sh1.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    } */

.container {
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
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

.login-text {
    text-align: center;
    color: #333333;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 1rem;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555555;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #dddddd;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input:focus {
    outline: none;
    border-color: #3498db;
}

.btn {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.btn:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

.login-register-text {
    text-align: center;
    margin-top: 15px;
    color: #555555;
}

.login-register-text a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

.login-register-text a:hover {
    text-decoration: underline;
    color: #2980b9;
}
.login-text{
    color :#ff2700;
}
.login-register-text a{
    color: #ff2700;
}


</style>
</head>
<body>
    <div class="container">
        <form action="WalletSendProccess.php" method="POST" class="login-email">
            <h2 class="login-text" >M-Market Payment</h2>
            
            <!-- User Name -->
            <div class="input-group">
                <label for="username">User Name</label>
                <input type="text" id="username" placeholder="Username" name="username" required>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email" name="email" required>
            </div>

            <!-- Amount -->
            <div class="input-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" placeholder="Amount" name="amount" required>
            </div>

            <!-- Beneficary Account Number -->
            <div class="input-group">
                <label for="card">Beneficiary Account Number</label>
                <input type="number" id="card" placeholder="Card Number" name="admin_card" required>
            </div>

            <!-- Submit Button -->
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Send</button>
            </div>

            <!-- Registration and Home Links -->
            <p class="login-register-text">Don't have an account? <a href="CreateWalletAcount.php">Create Account</a>.</p>
            <p class="login-register-text">Go back to home? <a href="shewawallet.php">M-Wallet</a>.</p>
        </form>
    </div>
</body>
</html>
