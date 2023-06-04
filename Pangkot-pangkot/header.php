<?php

    if ($_SESSION['account_id'] == 2) {
        $logbutton = "<a href=\"login.php\">Login</a>";
        $settings = "";
    } else {
        $logbutton = "<a href=\"dbLogout.php\">Logout</a>";
        $settings = "<a href=\"settings.php\">Settings</a>";
    }
    
    echo
    '<header>
        <div id="burgerNav" class="burgerNav">
            <a href="javascript:void(0)" class="closeBurger" onclick="closeBurger()">&times;</a>
            <div class="navButtons">
                <a href="index.php">Home</a>
                <a href="private.php">Private</a>
                <a href="quiz-maker.php">Create Quiz</a>
                <a href="groupJoin.php">Join Group</a>
                <a href="groupCreate.php">Create Group</a>
                <a href="group1.php">Group 1</a>
                <a href="group2.php">Group 2</a>
            </div>
        </div>
        <span class="burgerIcon" onclick="openBurger()">&#9776;</span>
        <a class="banner-link" href="index.php">
            <div class="header-banner">
                <div class="logo">
                    <img src="images/pplogo.png" alt="logo">
                    <h1>PANGKOT<br>PANGKOT</h1>
                </div>
            </div>
        </a>
        <div class="user-profile">
            <button class="user-profile-button">User Profile</button>
            <div class="user-content">
                '. $logbutton. '
                <a href="signup.php">Sign Up</a>
                '. $settings. '
            </div>
        </div>  
    </header>';
?>