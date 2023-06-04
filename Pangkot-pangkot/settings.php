<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php';
    ?>

    <link rel="stylesheet" type="text/css" href="style/settings.css">
</head>
<body>
    <?php
        include 'header.php';
        include 'ads.php';
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
    ?>


    <div class="settings-container">
        <div class="profile-info">
            <div class="profile-picture">
                <img src="images/profile.png" alt="Profile Picture">
            </div>
            <div class="profile-name-section">
                <h2> <?php echo $username; ?></h2>
            </div>
        </div>
        <div class="settings-info">
            <form action="dbSettingsName.php" method="post">
                <div class="email-section">
                    <label for="username">Current Name:</label>
                    <span> <?php echo $username; ?></span>
                </div>
                <div class="display-name-section">
                    <label for="display-name">New Username:</label>
                    <input type="text" id="display-name" name="new_username">
                    <button type="submit">Confirm</button>
                </div>
            </form>
            <form action="dbSettingsEmail.php" method="post">
                <div class="email-section">
                    <label for="email">Current Email:</label>
                    <span> <?php echo $email; ?></span>
                </div>
                <div class="change-email-section">
                    <label for="new-email">New Email:</label>
                    <input type="email" id="new-email" name="new_email">
                    <button type="submit">Confirm</button>
                </div>
            </form>
            <form action="dbSettingsPassword.php" method="post">
                <div class="change-password-section">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" name="current_password">
                    <br>
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new_password">
                    <br>
                    <label for="confirm-password">Confirm New Password:</label>
                    <input type="password" id="confirm-password" name="confirm_password">
                    <button type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    
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
