<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flashcard Quiz</title>
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" type="text/css" href="answer.css">
  <script src="../navBar.js"></script>  
</head>

<body>
  <header>
        <div id="burgerNav" class="burgerNav">
            <a href="javascript:void(0)" class="closeBurger" onclick="closeBurger()">&times;</a>
            <div class="navButtons">
                <a href="index.html">Home</a>
                <a href="create-quiz.html">Create Quiz</a>
                <a href="groupJoin.html">Join Group</a>
                <a href="groupCreate.html">Create Group</a>
                <a href="group1.html">Group 1</a>
                <a href="group2.html">Group 2</a>
            </div>
        </div>
        <span class="burgerIcon" onclick="openBurger()">&#9776;</span>
        <a class="banner-link" href="index.html">
            <div class="header-banner">
                <div class="logo">
                    <img src="../images/pplogo.png" alt="logo">
                    <h1>PANGKOT<br>PANGKOT</h1>
                </div>
            </div>
        </a>
        <div class="user-profile">
            <button class="user-profile-button">User Profile</button>
            <div class="user-content">
                <a href="login.html">Login</a>
                <a href="signup.html">Sign Up</a>
            </div>
    </div> 
    </header>
  
    <div class="quiz-info">
        <button class="quit-button" onclick="quitQuiz()">Quit</button>
        <div class="info-right">
            <div class="cards-left">Cards Left: <span id="cardsLeft">0</span></div>
            <div class="time-left">Time Left: <span id="timeLeft">00:00</span></div>
        </div>
    </div>

    <div class="flashcard">
        <table class="flashcard-info">
            <tr>
                <th class="card-title" colspan="2">Flashcard Title</th>
            </tr>
            <tr>
                <td colspan="2">Timer: <span id="timer">00:00</span></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="cards-number">Cards: <span id="card-count">0</span></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description"></label>
                    <textarea id="description" name="description" placeholder="-Edit Description Here-"></textarea>
                </td>
                <td>
                    <ul>
                        <li>Date Created:</li>
                        <li>Your Last Answer:</li>
                        <li>Your Average Time:</li>
                        <li>Total Average Time:</li>
                        <li>Your Best Time:</li>
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

    <script>
        var startButton = document.querySelector('.start-quiz-button');
startButton.addEventListener('click', startQuiz);

var cardContainer = document.getElementById('card-container');
var maxCardCount = 10;
var currentCardIndex = 0;

var cards = [
  { question: 'Question 1', answer: 'Answer 1' },
  { question: 'Question 2', answer: 'Answer 2' },
  { question: 'Question 3', answer: 'Answer 3' },
  { question: 'Question 4', answer: 'Answer 4' },
  { question: 'Question 5', answer: 'Answer 5' },
  { question: 'Question 6', answer: 'Answer 6' },
  { question: 'Question 7', answer: 'Answer 7' },
  { question: 'Question 8', answer: 'Answer 8' },
  { question: 'Question 9', answer: 'Answer 9' },
  { question: 'Question 10', answer: 'Answer 10' },
  // Add more cards here
];

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
  }
}

function showPreviousCard() {
  if (currentCardIndex > 0) {
    // Decrement the current card index
    currentCardIndex--;

    // Display the previous card
    displayCard(currentCardIndex);
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