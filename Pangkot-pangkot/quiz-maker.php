<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>

    <?php
        include 'dbConnector.php';
        include 'commonHead.php';
    ?>

    <link rel="stylesheet" type="text/css" href="style/quiz.css">
    <script src="create-quiz.js"></script>
</head>
<body>
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <div class="flashcard-container">
        <div class = "flashcard" id="frontcard">
            <table class="flashcard-info">
                <form>
                    <tr>
                        <th class="card-title" colspan="2">Flashcard Title</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Timer:
                            <input type="number" id="minutes" name="minutes">
                            <label for="minutes">minutes</label>
                            <!-- <span>:</span> -->
                            <input type="number" id="seconds" name="seconds">
                            <labe for="seconds">seconds</labe>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="cards-number">Cards:</label>
                            <input type="number" id="cards-number" name="cards-number">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description"></label>
                            <textarea type="text" id="description" name="description" placeholder="-Edit Description Here-"></textarea>
                            
                        </td>
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
                </form>
            </table>
        </div>
        <div class="next-back-buttons">
            <button id="back-button">&#8249;</button>
            <button id="next-button" onclick="nextCard()">&#8250;</button>
        </div>
        <div class="start-quiz-container">
            <button class="start-quiz-button">Start Quiz</button>
        </div>
        
        <form class="choose-group-container">
            <select id="choose-group-container">
                <option value="private">Private</option>
                <option value="public">Public</option>
                <option value="group">Group 1</option>
            </select>
        </form>

        <form class="choose-color-container">
            <select id="choose-color-container">
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="red">Red</option>
                <option value="Vioet">Violet</option>
            </select>
        </form>
        
    </div>
    <div class="flashcard-behind"></div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>