<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php'
    ?>
    
    <link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>    
    
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <main>
        <div class="login-container">
            <div class="logo-container">
                <img src="images/pplogo.png" alt="logo">
            </div>
            <div class="form-container">
                <form>
                    <div class="form-group">
                        <input type="email" id="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" required>
                        <label for="password">Password</label>
                    </div>
                    <button class="login-btn" type="submit">Login</button>
                </form>
                <p class="forgot-password"><a href="forgot_password.html">Forgot Password</a></p>
            </div>
        </div>
    </main>

    <?php
        include 'footer.php';
    ?>

</body>
</html>
