<?php
    $account_id = $_SESSION['account_id'];

    if ($account_id == 2) {
        $username = "LOG IN";
        $logbutton = "<a href=\"login.php\">Login</a>";
        $signup = "<a href=\"signup.php\">Sign Up</a>";
        $settings = "";
    } else {
        $username = strtoupper(substr($_SESSION['username'], 0, 15));
        $logbutton = "<a href=\"dbLogout.php\">Logout</a>";
        $signup = "";
        $settings = "<a href=\"settings.php\">Settings</a>";
    }

    // $settings = "";


    echo '
    <header>
        <div id="burgerNav" class="burgerNav">
            <a href="javascript:void(0)" class="closeBurger" onclick="closeBurger()">&times;</a>
            <div class="navButtons">
    ';
                createNavButtons();
    echo '
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
            <button class="user-profile-button">'. $username .'</button>
            <div class="user-content">
                '. $logbutton. '
                '. $signup. '
                '. $settings. '
            </div>
        </div>  
    </header>
    ';

    function createNavButtons() {
        include 'dbConnector.php';
        
        $account_id = $_SESSION['account_id'];

        if ($account_id == 2) {
            echo '
            <a href="login.php?error=Log in first">Create Quiz</a>
            <a href="login.php?error=Log in first">Join Group</a>
            <a href="login.php?error=Log in first">Create Group</a>
            <a href="index.php">Home</a>
            <a href="login.php?error=Log in first">Private</a>            
            ';
            return;
        }

        echo '
        <a href="quiz-maker.php">Create Quiz</a>
        <a href="groupJoin.php">Join Group</a>
        <a href="groupCreate.php">Create Group</a>
        <a href="index.php">Home</a>
        <a href="private.php">Private</a>
        ';

        $sql = "SELECT group_id 
                FROM membership 
                WHERE account_id = $account_id
                ORDER BY join_date DESC
                ";
        $membershipResult = $conn->query($sql);

        while ($membershipRow = $membershipResult->fetch_assoc()) {
            $group_id = $membershipRow['group_id'];
            
            $sql = "SELECT group_name
                    FROM pangkot_group 
                    WHERE group_id = $group_id
                    ;";
            $groupResult = $conn->query($sql);
            
            $groupRow = $groupResult->fetch_assoc();
            $group_name = $groupRow['group_name'];
            echo "<a href=\"group.php?group_id=$group_id\">$group_name</a>";
        }
    }
?>