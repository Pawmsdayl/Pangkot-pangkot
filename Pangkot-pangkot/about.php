<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php';
    ?>
    
    <link rel="stylesheet" type="text/css" href="style/about.css">

</head>
<body>
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <div class="aboutTeam">
        <h3 class="meet">Meet the Developers</h3>
        <!-- <hr class="lineLeft">
        <hr class="lineRight"> -->
        
        <div class="memberCard member1">
            <img class="memberPic" src="Images/member1.jpg" alt="Palmsdale Cordero">
            <h4 class="memberName">Palmsdale Cordero</h4>
            <h5 class="memberDetails">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
            </h5>
            <a href="https://www.facebook.com/" class="memberSocial"> <img class="logo" src="Images/FB-logo.png" alt="FB"> </a>
            <a href="https://www.linkedin.com/" class="memberSocial"> <img class="logo" src="Images/linkedin-logo.png" alt="LinkedIn"> </a>
            <a href="https://github.com/" class="memberSocial"> <img class="logo" src="Images/github-logo.png" alt="GitHub"> </a>
            <a href="https://mail.google.com" class="memberSocial"> <img class="logo" src="Images/gmail-logo.png" alt="Gmail"> </a>
        </div>
        
        <div class="memberCard member2">
            <img class="memberPic" src="Images/member2.jpg" alt="Franz Ferrer">
            <h4 class="memberName">Franz Ferrer</h4>
            <h5 class="memberDetails">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
            </h5>
            <a href="https://www.facebook.com/" class="memberSocial"> <img class="logo" src="Images/FB-logo.png" alt="FB"> </a>
            <a href="https://www.linkedin.com/" class="memberSocial"> <img class="logo" src="Images/linkedin-logo.png" alt="LinkedIn"> </a>
            <a href="https://github.com/" class="memberSocial"> <img class="logo" src="Images/github-logo.png" alt="GitHub"> </a>
            <a href="https://mail.google.com" class="memberSocial"> <img class="logo" src="Images/gmail-logo.png" alt="Gmail"> </a>
        </div>

        <div class="memberCard member3">
            <img class="memberPic" src="Images/member3.jpg" alt="Joshua Villanueva">
            <h4 class="memberName">Joshua Villanueva</h4>
            <h5 class="memberDetails">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
            </h5>
            <a href="https://www.facebook.com/" class="memberSocial"> <img class="logo" src="Images/FB-logo.png" alt="FB"> </a>
            <a href="https://www.linkedin.com/" class="memberSocial"> <img class="logo" src="Images/linkedin-logo.png" alt="LinkedIn"> </a>
            <a href="https://github.com/" class="memberSocial"> <img class="logo" src="Images/github-logo.png" alt="GitHub"> </a>
            <a href="https://mail.google.com" class="memberSocial"> <img class="logo" src="Images/gmail-logo.png" alt="Gmail"> </a>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>