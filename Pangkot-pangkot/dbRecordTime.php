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

// header("Location: index.php");
// exit();

switch($group_id) {
    case 1:
        header("Location: private.php");
        exit();
    case 2:
        header("Location: index.php");
        exit();
    default:
        header("Location: group.php?group_id=". $group_id);
        exit();
}

?>