<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <?php
  	include 'dbConnector.php';
  	include 'commonHead.php'
  ?>
	
    <link rel="stylesheet" type="text/css" href="signup.css">

</head>
<body>    
<?php
        include 'header.php';
        include 'ads.php';
?>
<div class="signup-form-container">
  <h2>Let's Get Started!</h2>
  <p class="signup-form-info">Create an Account to Enable Features</p>
  <form class="signup-form">
    <div class="form-group">
      <input type="text" placeholder="Username" required>
    </div>
    <div class="form-group">
      <input type="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <input type="password" placeholder="Password" required>
    </div>
    <div class="form-group">
      <input type="password" placeholder="Confirm Password" required>
    </div>
    <p class="terms-info">By signing up you agree to our <a href="privacypolicy.html">Terms of Services</a> and <a href="privacypolicy.html">Privacy Policy</a></p>
    <button type="submit" class="signup-btn">Sign Up</button>
  </form>
</div>    

<?php
        include 'footer.php';
?>
</body>
</html>
