<!DOCTYPE html>
<html>
<head>
    <title>My Quizzes</title>
    <meta charset="UTF-8" />

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
            <h1 class="groupTitle lightColor">Private</h1>
            <h2 class="groupDescription textOnDark">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. 
            </h2>
            <h2 class="groupDetails textOnDark">
                Admin: Lorem Ipsum <br>
                Topic: Lorem Ipsum <br>
                Member Count: 99999 <br>
                Quiz Count: 99999 <br>
                Date Created: yyyy/mm/dd <br>
                <br>
                You are member since: yyyy/mm/dd <br>
                Your Answered Quiz Count: 99999 <br>
                Total Answered Quiz Count: 99999
            </h2>
        </div>

        <div class="quizCard card">
            <div class="quizMain">
                <a href="quiz.php">
                    <div class="quizHead"> 
                        <h1 class="quizTitle">Quiz 1</h1>
                    </div>
                    <h2 class="quizDescription textOnDark">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.
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
                <button class="redButton button" onclick="deleteQuiz(event, quizID)">Delete</button>
            </div>
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