<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Flashcard Quiz</title>
    <?php
        include 'dbConnector.php';
        include 'commonHead.php'
    ?>
    <link rel="stylesheet" type="text/css" href="style/quiz.css">
</head>

<body>
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <form action="dbQuizCreate.php" method="POST">
        <div class="content">
            <div class="card-and-time">
                <div class="card-time-info">
                    <h2>
                        <span>Cards: <span id="card-count">0</span> </span>
                        <span>Time Left: --:--</span>
                    </h2>
                </div>
            </div>
            <div class="flashcard">
                <table class="flashcard-info">
                    <tr>
                        <td  colspan="2">
                            <input type="text" id="card-title" name="quiz_name" placeholder="-Edit Title Here-" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Timer:
                            <input type="number" id="minutes" name="minutes" min="0" required>
                            <label for="minutes">minutes</label>
                            <!-- <span>:</span> -->
                            <input type="number" id="seconds" name="seconds" min="0" max="59" required>
                            <label for="seconds">seconds</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description"></label>
                            <textarea maxlength="100" type="text" id="description" name="quiz_description" placeholder="-Edit Description Here-" required></textarea>

                        </td>
                        <td>
                            <ul>
                                <li>Date Created: yyyy/mm/dd </li>
                                <li>Your Last Answer: yyyy/mm/dd </li>
                                <li>Your Average Time: 00:00 out of 00:00</li>
                                <li>Total Average Time: 00:00 out of 00:00</li>
                                <li>Your Best Time: 00:00 out of 00:00</li>
                            </ul>
                        </td>
                    </tr>
                    <div id="question-container"></div>
                </table>
                <div id="choose-group-container">
                    <label for="group-select"></label>
                    <select id="group-select" name="group_id">
                        <?php
                            include 'dbChooseGroup.php'
                        ?>
                    </select>
                </div>
            </div>  
        </div>
        <div class="submit-container">
            <button id="submit-btn" type="submit">Submit</button>
        </div>
    </form>

    <div class="button-container">
        <button id="back-btn">&#8249;</button>
        <button id="next-btn">&#8250;</button>
    </div>

    <?php
        include 'footer.php';
    ?>

    <script src="create-quiz.js"></script>
</body>
</html>