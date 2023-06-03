<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer Quiz</title>

    <?php
        include 'dbConnector.php';
        include 'commonHead.php';
    ?>

    <link rel="stylesheet" type="text/css" href="style/quiz.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>

    <div class="quit-and-info">
        <button class="quit-button">Quit</button>
        <div class="quiz-info">
            <span>Cards Left: --:--</span>
            <span>Time Left: --:--</span>
        </div>
    </div>

    <div class="flashcard-container">
        <div class = "flashcard">
            <table class="flashcard-info">
                <tr>
                    <th class="card-title" colspan="2">Flashcard Title</th>
                </tr>
                <tr>
                    <td colspan="2">Timer: 00:00</td>
                </tr>
                <tr>
                    <td colspan="2">Card: 1 of 10</td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <ul>
                            <li>Date Created:</li>
                            <li>Your Last Answer:</li>
                            <li>Your Average Score:</li>
                            <li>Your Average Time:</li>
                            <li>Total Average Score</li>
                            <li>Total Average Time:</li>
                            <li>Your Best Score:</li>
                            <li>Your Best Time:</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <div class="next-back-buttons">
            <button id="back-button">&#8249;</button>
            <button id="next-button" onclick="nextCard()">&#8250;</button>
        </div>
        <div class="start-quiz-container">
            <button class="start-quiz-button">Start Quiz</button>
        </div>
        
    </div>
    <div class="flashcard-behind"></div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>
