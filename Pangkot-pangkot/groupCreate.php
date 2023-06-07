<!DOCTYPE html>
<html>
<head>
    <title>Create Group</title>
    <meta charset="UTF-8" />
    
    <?php
        include 'dbConnector.php';
        include 'commonHead.php';
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
            <form action="dbGroupCreate.php" method="POST">
                <input class="groupTitle groupTitleEditor" type="text" id="groupName" name="groupName" placeholder="Group Name">
                <textarea class="groupDescription groupDescriptionEditor" id="groupDescription" name="groupDescription" placeholder="Group Description"></textarea>
                <!-- <input class="groupPasswordEditor" type="text" id="groupPassword" name="groupPassword" placeholder="Group Password"> -->
                <input class="greenButton button" id="button1" type="submit" value="Create">
            </form>
        </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>