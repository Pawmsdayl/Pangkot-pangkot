<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php';
    ?>

    <link rel="stylesheet" type="text/css" href="style/settings.css">
    <script src="settings.js"></script>
</head>
<body>
    <?php
        include 'header.php';
        include 'ads.php';
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $avatar_id = $_SESSION['avatar_id'];
        $avatar_path = $_SESSION['avatar_path'];
    ?>


    <div class="settings-container">
        <div class="profile-info">
            <div class="profile-picture">
                <img id="avatar-image" src="<?php echo $avatar_path ?>" alt="Avatar Image">
            </div>
            <div class="profile-name-section">
                <h2> <?php echo $username; ?></h2>
            </div>
        </div>

        <div class="settings-info">
            <form action="dbSettingsAvatar.php" method="POST">
                <div class="avatar-section">
                    <label for="avatar-dropdown">Select Avatar:</label>
                    <select id="avatar-dropdown" name="avatar_id">
                        <option value="1" <?php if($avatar_id==1) {echo "selected";} ?> >Avatar 1</option>
                        <option value="2" <?php if($avatar_id==2) {echo "selected";} ?> >Avatar 2</option>
                        <option value="3" <?php if($avatar_id==3) {echo "selected";} ?> >Avatar 3</option>
                        <option value="4" <?php if($avatar_id==4) {echo "selected";} ?> >Avatar 4</option>
                        <option value="5" <?php if($avatar_id==5) {echo "selected";} ?> >Avatar 5</option>
                        <option value="6" <?php if($avatar_id==6) {echo "selected";} ?> >Avatar 6</option>
                    </select>
                    <button id="confirmAvatar" type="submit">Confirm</button>
                </div>
            </form>
            <form action="dbSettingsName.php" method="post">
                <div class="email-section">
                    <label for="username">Current Username:</label>
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
</html>
