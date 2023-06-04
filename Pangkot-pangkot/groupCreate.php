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
            <form>
                <input class="groupTitle groupTitleEditor lightColor" type="text" id="groupName" name="groupName" placeholder="Group Name">
                <textarea class="groupDescription groupDescriptionEditor" id="groupDescription" name="groupDescription" placeholder="Group Description"></textarea>
                <input class="groupPasswordEditor" type="text" id="groupPassword" name="groupPassword" placeholder="Group Password">
                <select class="groupColorEditor" id="groupColor" name="groupColor">
                    <option value="blue">Blue</option>
                    <option value="red">Red</option>
            </form>
                <!-- <button class="redButton button" onclick="deleteQuiz(event, quizID)">Delete</button> -->
                <input class="greenButton button" type="submit" value="Create">
        </div>

        <div class="quizCard quizCreateCard card">
            <div class="quizMain">
                <a href="quiz-maker.php">
                    <div class="quizHead"> 
                        <h1 class="quizTitle">Create Quiz</h1>
                    </div>
                    <h2 class="quizDescription textOnDark">
                        Create quiz for your group.
                    </h2>
                </a>
            </div>
            <div class="quizSide">
                <h2 class="quizDetails">
                    Date Created: yyyy/mm/dd 00:00 <br>
                    Your Last Answer: yyyy/mm/dd 00:00 <br>
                    Your Ave. Score: 00/00 <br>
                    Your Ave. Time: 00:00 out of 00:00 <br>
                    Your Best Score: 00/00 <br>
                    Your Best Time: 00:00 out of 00:00 
                </h2>
            </div>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>