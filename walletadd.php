

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="mycss/walletadd.css">

    <title>Wallet add Form - M-Wallet</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.22), rgba(0, 0, 0, 0.566)), url(image/sh1.jpg);
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            height: 100%;
            margin: .5rem auto;
        }
        .container .login-email .input-group {
            width: 100%;
            height: 50px;
            margin-bottom: .15em;
        }
        .login-text {
            color:#ff2700 !important;
        }
        .input-group #btns {
            padding: .4rem;
            margin-top: 1rem;
        }
        .login-register-text a{
            color: #ff2700;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="WalletAddProccess.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">M-Wallet Deposit</p>
            <p>User Name</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <p>Email</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <p>Amount</p>
            <div class="input-group">
                <input type="number" placeholder="Ammount" name="ammount" required>
            </div>
            <p>Card Number</p>
            <div class="input-group">
                <input type="number" placeholder="Card Number" name="card" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn" id="btns">ADD</button>
            </div>
            <p class="login-register-text">Donot Have an account? <a href="CreateWalletAcount.php">click Here</a>.</p>
            <p class="login-register-text">go back to home? <a href="shewawallet.php">M-Wallet</a>.</p>
        </form>
    </div>
</body>
</html>
