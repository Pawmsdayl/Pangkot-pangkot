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
    ?>

    <div class="settings-container">
      <div class="profile-info">
        <div class="profile-picture">
          <img src="images/profile.png" alt="Profile Picture">
        </div>
        <div class="profile-name-section">
          <h2>John Doe</h2>
        </div>
      </div>
      <div class="settings-info">
        <div class="display-name-section">
          <label for="display-name">Display Name:</label>
          <input type="text" id="display-name" name="display-name">
          <button type="button">Confirm</button>
        </div>
        <div class="email-section">
          <label for="email">Email:</label>
          <span>johndoe@example.com</span>
        </div>
        <div class="change-name-section">
          <label for="new-name">New Name:</label>
          <input type="text" id="new-name" name="new-name">
          <button type="button">Confirm</button>
        </div>
        <div class="change-email-section">
          <label for="new-email">New Email:</label>
          <input type="email" id="new-email" name="new-email">
          <button type="button">Confirm</button>
        </div>
        <div class="change-password-section">
          <label for="current-password">Current Password:</label>
          <input type="password" id="current-password" name="current-password">
          <br>
          <label for="new-password">New Password:</label>
          <input type="password" id="new-password" name="new-password">
          <br>
          <label for="confirm-password">Confirm New Password:</label>
          <input type="password" id="confirm-password" name="confirm-password">
          <button type="button">Confirm</button>
        </div>
        <div class="dark-mode-section">
          <label for="dark-mode">Dark Mode:</label>
          <input type="checkbox" id="dark-mode" name="dark-mode">
        </div>
      </div>
    </div>
    
    <?php
        include 'footer.php';
    ?>
  </body>
</html>
