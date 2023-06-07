<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php'
    ?>
    
    <link rel="stylesheet" type="text/css" href="style/login.css">

</head>
<body>    
    
    <?php
        include 'header.php';
        include 'ads.php';

        if (session_status() === PHP_SESSION_ACTIVE) {
            $sessionData = $_SESSION;
            $sessionJson = json_encode($sessionData);
            echo "<script>console.log('Session Data:', $sessionJson);</script>";
        } else {
            echo "<script>console.log('Session Data: None');</script>";
        }
    ?>

    <main>
        <div class="login-container">
            <div class="logo-container">
                <img src="images/pplogo.png" alt="logo">
            </div>
            <div class="form-container">
                <form action="dbLogin.php" method="post">
                    <div class="form-group">
                        <input type="text" id="username" name="username" >
                        <label for="username">Username</label>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="account_password" >
                        <label for="password">Password</label>
                    </div>
                    <button class="login-btn" type="submit">Login</button>
                </form>
                <p class="forgot-password"><a href="forgot_password.php">Forgot Password</a></p>
            </div>
        </div>
    </main>

    <?php
        include 'footer.php';
    ?>

</body>
</html>
