<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>

    <?php
        include 'dbConnector.php';
        include 'commonHead.php'
    ?>
    
    <link rel="stylesheet" href="style/forgot-password.css">
</head>

<body>    
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <div class="forgot-password-container">
        <h2>Forgot Password</h2>
        <p>Please provide your username and email to reset your password.</p>
        <form>
            <div class="form-group">
                <input type="text" id="username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-group">
                <input type="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <button class="reset-btn" type="submit">Get Password</button>
        </form>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>

</html>
