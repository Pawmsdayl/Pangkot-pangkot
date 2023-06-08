<?php
include 'dbConnector.php';
$account_id = $_SESSION['account_id'];
$current_password = validateInput($_POST['current_password']);
$new_password = validateInput($_POST['new_password']);
$confirm_password = validateInput($_POST['confirm_password']);

$sql = "SELECT account_password
        FROM account
        WHERE account_id = '$account_id'
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$account_password = $row['account_password'];

if ($account_password != $current_password) {
    header("Location: settings.php?error=Current password is incorrect.");
    exit();
}

if ($new_password != $confirm_password) {
    header("Location: settings.php?error=New password and confirm password do not match.");
    exit();
}

$sql = "UPDATE account
        SET account_password = '$new_password'
        WHERE account_id = '$account_id'
;";
$result = $conn->query($sql);
header("Location: settings.php?success=Password changed.");

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    if (empty($data) || $data == null || $data == "") {
        header("Location: settings.php?error=Password inputs cannot be empty.");
        exit();
    }
    return $data;
}
?>