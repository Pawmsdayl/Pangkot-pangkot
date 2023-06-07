<?php
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    if (empty($data) || $data == null || $data == "") {
        header("Location: quiz-maker.php?error=Complete all fields");
        exit();
    }
    
    return $data;
}

$data = json_encode($_POST);
echo "<script>console.log($data);</script>";

if (!isset($_POST['question-1'])) {
    // header("Location: quiz-maker.php?error=Add at least one question");
    // exit();
}

include 'dbConnector.php';

$data = json_encode($_POST);
echo "<script>console.log($data);</script>";

$account_id = $_SESSION['account_id'];
$quiz_name = validateInput($_POST['quiz_name']);
$quiz_description = validateInput($_POST['quiz_description']);
$minutes = validateInput($_POST['minutes']);
$seconds = validateInput($_POST['seconds']);
$timer = (60 * $minutes) + $seconds;
$group_id = $_POST['group_id'];

$sql = "INSERT INTO quiz (account_id, quiz_name, quiz_description, timer, group_id) 
        VALUES ($account_id, '$quiz_name', '$quiz_description', $timer, $group_id)
;";
$request = $conn->query($sql);
if ($request === FALSE) {
    echo "Error: ". $sql. "<br>". $conn->error;
}

$quiz_id = $conn->insert_id;
$number = 1;
while (isset($_POST['question-' . $number])) {
    $question = validateInput($_POST['question-' . $number]);
    $answer = validateInput($_POST['answer-' . $number]);
    $sql = "INSERT INTO flashcard (quiz_id, question, answer, flashcard_number) 
            VALUES ($quiz_id, '$question', '$answer', $number)
    ;";
    $request = $conn->query($sql);
    if ($request === FALSE) {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
    $number++;
}

header("Location: index.php?success=Quiz created successfully");
header("Location: group.php?group_id=$group_id");
exit();
?>