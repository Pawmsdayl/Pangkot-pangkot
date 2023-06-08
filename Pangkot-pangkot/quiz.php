<?php
    include 'dbConnector.php';
    $quiz_id = $_GET['quiz_id'];
    $account_id = $_SESSION['account_id'];

    $sql = "SELECT *
            FROM quiz
            WHERE quiz_id = $quiz_id
    ;";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $group_id = $row['group_id'];
    $quiz_account_id = $row['account_id'];
    $quiz_name = $row['quiz_name'];
    $quiz_description = $row['quiz_description'];
    $creation_date = $row['creation_date'];
    $timer = $row['timer'];
    $timer_minutes = floor($timer / 60);
    $timer_seconds = $timer % 60;
    $total_timer = $timer_minutes. ":". $timer_seconds;

    switch($group_id) {
    case 1:         // Public
        $quit_href = "index.php?success=You have quit the quiz.";
        break;

    case 2:         // Private
        $quit_href = "private.php?success=You have quit the quiz.";
        if ($account_id != $quiz_account_id) {
            header("Location: index.php?error=You are not authorized to view this quiz.");
            exit();
        }
        break;

    default:        // Group
        $quit_href = "group.php?group_id=". $group_id. "&success=You have quit the quiz.";
        $sql = "SELECT *
                FROM membership
                WHERE group_id = $group_id
                AND account_id = $account_id
        ;";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            header("Location: index.php?error=You are not authorized to view this quiz.");
            exit();
        }
        break;
    }

    $sql = "SELECT *
            FROM flashcard
            WHERE quiz_id = $quiz_id
    ;";
    $allFlashcards = $conn->query($sql);

    $sql = " SELECT MAX(flashcard_number) AS card_count
             FROM flashcard
             WHERE quiz_id = $quiz_id
    ;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $card_count = $row['card_count'];
    $total_card_count = $card_count;

    $sql = "SELECT MAX(date_taken) AS last_trial_date, AVG(time_took) AS ave_time, MIN(time_took) AS best_time
            FROM record
            WHERE quiz_id = $quiz_id
            AND account_id = $account_id
    ;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $last_trial_date = (isset($row['last_trial_date'])) ? $row['last_trial_date'] : "yyyy/mm/dd";
    $ave_minutes = floor($row['ave_time'] / 60);
    $ave_minutes = str_pad($ave_minutes, 2, "0", STR_PAD_LEFT);
    $ave_seconds = $row['ave_time'] % 60;
    $ave_seconds = str_pad($ave_seconds, 2, "0", STR_PAD_LEFT);
    $ave_time = $ave_minutes. ":". $ave_seconds;
    $best_minutes = floor($row['best_time'] / 60);
    $best_minutes = str_pad($best_minutes, 2, "0", STR_PAD_LEFT);
    $best_seconds = $row['best_time'] % 60;
    $best_seconds = str_pad($best_seconds, 2, "0", STR_PAD_LEFT);
    $best_time = $best_minutes. ":". $best_seconds;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcard Quiz</title>
    <?php
        include 'commonHead.php';
    ?>
    <link rel="stylesheet" type="text/css" href="style/answer.css">
</head>

<body>
    <?php
        include 'header.php';
    ?>

    <div class="quiz-info">
        <a href= "<?php echo $quit_href; ?>" >
            <button class="quit-button" onclick="quitQuiz()">Quit</button>
        </a>
        <div class="info-right">
            <div class="cards-left">Cards Left: <span id="cardsLeft"><?php echo $card_count; ?></span></div>
            <div class="time-left">Time Left: <span id="timeLeft"> <?php echo $timer_minutes. ":". $timer_seconds; ?> </span></div>
        </div>
    </div>
    <div class="flashcard">
        <table class="flashcard-info">
            <tr>
                <th class="card-title" colspan="2"> <?php echo $quiz_name; ?></th>
            </tr>
            <tr>
                <td colspan="2">Timer: <span id="timer"><?php echo $total_timer ?></span></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="cards-number">Cards: <span id="card-count"><?php echo $total_card_count; ?></span></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description"></label>
                    <textarea id="description" name="description" placeholder="-Edit Description Here-"></textarea>
                </td>
                <td>
                    <ul>
                        <li>Date Created: <?php echo $creation_date; ?></li>
                        <li>Your Last Answer:  <?php echo $last_trial_date; ?></li>
                        <li>Your Average Time:  <?php echo $ave_time; ?></li>
                        <li>Your Best Time:  <?php echo $best_time; ?></li>
                    </ul>
                </td>
            </tr>
        </table>
        <div class="start-button-container">
            <button class="start-quiz-button">Start Quiz</button>
        </div>
    </div>
    <div id="card-container" class="card-container">
    <!-- Cards will be dynamically added here -->
    </div>
    <div class="card-buttons">
        <button class="back-button" disabled>&#8249;</button>
        <button class="next-button" disabled>&#8250;</button>
    </div>
    <div class="submit-container">
        <form action ="dbRecordTime.php" method="POST">
            <input hidden type="number" name="time_took" id="time_took">
            <button id="submit-quiz-btn" type="submit">Submit</button>
        </form>
    </div>

    <script>
        var currentTime;
        var initialTime;


        var startButton = document.querySelector('.start-quiz-button');
        startButton.addEventListener('click', startQuiz);

        var cardContainer = document.getElementById('card-container');
        var maxCardCount = <?php echo $total_card_count ?> ;
        console.log("maxCardCount: " + maxCardCount);
        var currentCardIndex = 0;

        var cards = [
        ];
        <?php 
            while ($row = $allFlashcards->fetch_assoc()) {
                $question = $row['question'];
                $answer = $row['answer'];
                $flashcard_number = $row['flashcard_number'] - 1;
                echo "cards['$flashcard_number'] = { question: '$question', answer: '$answer' };";
            }
        ?>
        console.log(cards);

        function createCard(question, answer) {
        var card = document.createElement('div');
        card.className = 'card';

        var cardFront = document.createElement('div');
        cardFront.className = 'card-front';
        cardFront.innerHTML = `<h3>${question}</h3>`;

        var cardBack = document.createElement('div');
        cardBack.className = 'card-back';
        cardBack.innerHTML = `<h3>${answer}</h3>`;

        card.appendChild(cardFront);
        card.appendChild(cardBack);

        // Add event listener to flip the card on click
        card.addEventListener('click', function () {
            card.classList.toggle('flipped');
        });

        return card;
        }

        function startQuiz() {
            // Hide the flashcard info
            var flashcardInfo = document.querySelector('.flashcard-info');
            flashcardInfo.style.display = 'none';

            // Clear the card container
            cardContainer.innerHTML = '';

            // Reset the current card index
            currentCardIndex = 0;

            // Shuffle the cards array
            shuffleArray(cards);

            // Enable the Next and Back buttons
            var nextButton = document.querySelector('.next-button');
            nextButton.disabled = false;

            var backButton = document.querySelector('.back-button');
            backButton.disabled = false;

            // Display the first card
            displayCard(currentCardIndex);
            document.getElementById("cardsLeft").innerHTML = maxCardCount - currentCardIndex - 1;
            startTimer();

            if (cards.length === 1) {
                showSubmitButton();
            }
        }

        function displayCard(cardIndex) {
        // Check if the card index is within the valid range
            if (cardIndex >= 0 && cardIndex < cards.length) {
                // Get the current card from the cards array
                var currentCard = cards[cardIndex];

                // Create a card element
                var card = createCard(currentCard.question, currentCard.answer);

                // Clear the card container
                cardContainer.innerHTML = '';

                // Append the card to the card container
                cardContainer.appendChild(card);

                // Disable the Back button if it's the first card
                var backButton = document.querySelector('.back-button');
                backButton.disabled = cardIndex === 0;

                // Disable the Next button if it's the last card
                var nextButton = document.querySelector('.next-button');
                nextButton.disabled = cardIndex === cards.length - 1;
            }
        }

        function showNextCard() {
            if (currentCardIndex < maxCardCount - 1) {
                // Increment the current card index
                currentCardIndex++;

                // Display the next card
                displayCard(currentCardIndex);

                var isLastCard = currentCardIndex === cards.length - 1;
                document.getElementById("cardsLeft").innerHTML = maxCardCount - currentCardIndex - 1;
                // Show the submit button if it's the last card
                if (isLastCard) {
                    showSubmitButton();
                }
            }
        }

        function showPreviousCard() {
            if (currentCardIndex > 0) {
                // Decrement the current card index
                currentCardIndex--;

                // Display the previous card
                displayCard(currentCardIndex);
                document.getElementById("cardsLeft").innerHTML = maxCardCount - currentCardIndex - 1;
            }
        }

        function showSubmitButton() {
            var submitButtonContainer = document.querySelector('.submit-container');
            submitButtonContainer.style.display = 'block';
            // alert("adsgfb");

        }

        // Add the event listener to the submit button
        var submitButton = document.querySelector('#submit-quiz-btn');
        // Add the submitQuiz function
        submitButton.addEventListener('click', submitQuiz);
        // window.onload=function(){
        // }

        function submitQuiz() {
            document.getElementById("time_took").value = initialTime - currentTime;
            // alert("initialTime: " + initialTime + "currentTime: " + currentTime + "time_took: " + document.getElementById("time_took").value);
            // Handle the quiz submission
            // For example, calculate the score, show results, etc.
        }   
        
        function startTimer() {
            var timeContainer = document.getElementById('time-container');
            var timeDisplay = document.getElementById('timeLeft');
            
            <?php 
                echo "initialTime = $timer;"; 
            ?> //  in seconds
            // var currentTime;
            
            // Set the current time to the initial time
            currentTime = initialTime;
            console.log("currentTime: " + currentTime);

            // Display the initial time
            updateTimeDisplay();

            // Start the timer
            var timer = setInterval(function () {
                // Decrement the current time
                currentTime--;

                // Update the time display
                updateTimeDisplay();



                // Check if the time has reached 0
                if (currentTime === 0) {
                    clearInterval(timer);
                    // Time's up, handle it here
                    // For example, show a message or end the quiz
                    alert('Time\'s up!');
                    handleTimeUp();
                }
            }, 1000); // Update every second
        
            // Add the handleTimeUp function
            function handleTimeUp() {
                // Check if it's the last card
                <?php echo "var isLastCard = currentCardIndex ===". $total_card_count - 1 .";"; ?>
                

                // Disable the Next and Back buttons
                var nextButton = document.querySelector('.next-button');
                nextButton.disabled = true;

                var backButton = document.querySelector('.back-button');
                backButton.disabled = true;


                showSubmitButton();
            }

            function updateTimeDisplay() {
            // Format the current time as minutes and seconds
                var minutes = Math.floor(currentTime / 60);
                var seconds = currentTime % 60;

                // Add leading zeros if necessary
                var formattedTime =
                    ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2);

                // Update the time display
                timeDisplay.textContent = formattedTime;
            }
        }

        // Attach event listeners to the next and back buttons
        var nextButton = document.querySelector('.next-button');
        nextButton.addEventListener('click', showNextCard);

        var backButton = document.querySelector('.back-button');
        backButton.addEventListener('click', showPreviousCard);

        // Disable the Next and Back buttons initially
        nextButton.disabled = true;
        backButton.disabled = true;

        // Function to shuffle the cards array
        function shuffleArray(array) {
            for (var i = array.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = array[i];
                array[i] = array[j];
                array[j] = temp;
            }
        }

    </script>
</body>
</html>