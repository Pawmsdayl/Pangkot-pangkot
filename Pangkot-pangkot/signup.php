<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <?php
    include 'dbConnector.php';
    include 'commonHead.php'
    ?>

    <link rel="stylesheet" type="text/css" href="style/signup.css">

</head>
<body>    
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <main class="signup-form-container">
        <h2>Let's Get Started!</h2>
        <p class="signup-form-info">Create an Account to Enable Features</p>
        <form class="signup-form" action="dbSignup.php" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="account_password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
            </div>
            <p class="terms-info">By signing up you agree to our <a href="privacypolicy.php">Terms of Services</a> and <a href="privacypolicy.php">Privacy Policy</a></p>
            <button type="submit" class="signup-btn">Sign Up</button>
        </form>
    </main>

    <?php
            include 'footer.php';
    ?>
</body>

    <?php
        if (isset($_GET['error'])) {
            echo "<script>alert('". $_GET['error']. "')</script>";
        }

        if (isset($_GET['success'])) {
            echo "<script>alert('". $_GET['success']. "')</script>";
        }
    ?>
</html>