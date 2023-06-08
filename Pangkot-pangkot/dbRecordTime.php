<?php
include 'dbConnector.php';

$account_id = $_SESSION['account_id'];
$quiz_id = $_POST['quiz_id'];
$time_took = $_POST['time_took'];

$sql = "SELECT COUNT(account_id) AS new_trial_number
        FROM record
        WHERE account_id = '$account_id'
        AND quiz_id = '$quiz_id'
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$new_trial_number = $row['new_trial_number'] + 1;

$sql = "INSERT INTO record (account_id, quiz_id, trial_number, time_took)
        VALUES ('$account_id', '$quiz_id', '$new_trial_number', '$time_took')
;";
$result = $conn->query($sql);

$sql = "SELECT group_id
        FROM quiz
        WHERE quiz_id = '$quiz_id'
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$group_id = $row['group_id'];

switch ($group_id) {
case 1:
    $url = "private.php";
    break;
case 2:
    $url = "index.php";
    break;
default:
    $url = "group.php?group_id=". $group_id;
    break;
}

if ($group_id == 1) {
    header("Location: $url");
} 

exit();
?>