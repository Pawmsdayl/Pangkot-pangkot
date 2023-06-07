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
            <form>
                <input class="inputGroupPassword" type="text" id="groupPassword" name="groupPassword" placeholder="Join Code">
            </form>
            <input class="joinButton button" type="submit" value="Join">
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>