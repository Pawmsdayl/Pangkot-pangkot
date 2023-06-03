<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php';
    ?>

    <link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<body>
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

	<div class="login-container">
		<div class="logo-container">
			<img src="images/pplogo.png">
		</div>
		<div class="form-container">
			<form>
				<div class="form-group">
					<input type="text" name="username" id="username" required>
					<label for="username">Username</label>
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" required>
					<label for="password">Password</label>
				</div>
				<div class="form-group">
					<a href="#" class="forgot-password">Forgot your password?</a>
				</div>
				<div class="form-group">
					<button type="submit" class="login-btn">Login</button>
				</div>
				<div class="form-group">
					<p>Login with:</p>
					<button type="button" class="social-btn google-btn"><img src="images/google-logo.png" alt="Google"></button>
					<button type="button" class="social-btn microsoft-btn"><img src="images/Microsoft-Logo.png" alt="Microsoft"></button>
					<button type="button" class="social-btn yahoo-btn"><img src="images/Yahoo-Logo.png" alt="Yahoo"></button>
				</div>
				<div class="form-group">
					<p>Don't have an account yet?</p>
					<button type="button" class="signup-btn">Sign Up</button>
				</div>
			</form>
		</div>
	</div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>