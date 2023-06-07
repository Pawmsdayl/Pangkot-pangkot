<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Join Group</title>
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php'
    ?>

    <link rel="stylesheet" href="style/cards.css">
</head>
<body>
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <div class="contentBackground">
        <div class="groupCard card">
            <h1 class="groupTitle lightColor">Join Group</h1>
            <form action="dbGroupJoin.php" method="POST" >
                <input class="inputGroupPassword" type="text" id="join_code" name="join_code" placeholder="Join Code">
                <input class="joinButton button" type="submit" value="Join">
            </form>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>