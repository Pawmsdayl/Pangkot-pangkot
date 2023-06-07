var cardCount = 0;
var currentCardIndex = -1;
var cards = [];

function createCard() {
  var card = document.createElement('div');
  card.className = 'card';
  card.innerHTML = `
    <h2>Question ${cardCount}</h2>
    <label for="question-${cardCount}"></label>
    <textarea id="question-${cardCount}" class="question-input" name="question-${cardCount}" placeholder="-Add Question Here-" required></textarea>
    <label for="answer-${cardCount}"></label>
    <textarea id="answer-${cardCount}" class="answer-input" name="answer-${cardCount}"  placeholder="-Add Answer Here-" required></textarea>
  `;
  return card;
}

function addCard() {
  cardCount++;
  var card = createCard();
  cards.push(card);
  document.getElementById('card-count').textContent = cardCount;
  // document.getElementById('next-btn').disabled = true;
  // document.getElementById('back-btn').disabled = false;
  
}

function showCard(index) {
  var questionContainer = document.getElementById('question-container');
  // var flashcardInfo = document.getElementById('flashcard-info');
  questionContainer.style.display = 'block';
  questionContainer.innerHTML = '';
  questionContainer.appendChild(cards[index]);
  document.getElementById('card-count').textContent = cardCount;
  document.getElementById('back-btn').disabled = index === -1;
} 

function onNextClick() {
    
  if (currentCardIndex === cardCount - 1) {
    addCard();
  }
  currentCardIndex++;
  showCard(currentCardIndex);
  console.log(cards);
}

function onBackClick() {
if (currentCardIndex > 0) {
currentCardIndex--;
showCard(currentCardIndex);
} else {
hideCard()
currentCardIndex = -1;
}
}

function hideCard() {
  var questionContainer = document.getElementById('question-container');
  questionContainer.style.display = 'none';
}

// Add event listener to the next button
document.getElementById('next-btn').addEventListener('click', onNextClick);
document.getElementById('back-btn').addEventListener('click', onBackClick);

// Assuming you have buttons with ids "next-btn" and "back-btn" to trigger the card changes
const nextButton = document.getElementById('next-btn');
const backButton = document.getElementById('back-btn');

nextButton.addEventListener('click', () => {
  const currentCard = document.querySelector('.card');
  currentCard.classList.add('hidden-next');
  
  // Simulating a delay before showing the next card
  setTimeout(() => {
    currentCard.classList.remove('hidden-next');
  }, 500);
});

backButton.addEventListener('click', () => {
  const currentCard = document.querySelector('.card');
  currentCard.classList.add('hidden-back');
  
  // Simulating a delay before showing the previous card
  setTimeout(() => {
    currentCard.classList.remove('hidden-back');
  }, 500);
});

document.getElementById('showTimeButton').addEventListener('click', function() {
    var currentTimeElement = document.getElementById('currentTime');
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
    var day = ('0' + currentDate.getDate()).slice(-2);
    var hours = ('0' + currentDate.getHours()).slice(-2);
    var minutes = ('0' + currentDate.getMinutes()).slice(-2);
    var currentTime = year + '/' + month + '/' + day + ' ' + hours + ':' + minutes;
    currentTimeElement.textContent = 'Current time: ' + currentTime;
  });