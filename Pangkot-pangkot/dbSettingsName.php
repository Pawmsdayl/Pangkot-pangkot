<?php
include 'dbConnector.php';

$account_id = $_SESSION['account_id'];
$new_username = validateInput($_POST['new_username']);

$sql = "UPDATE account
        SET username = '$new_username'
        WHERE account_id = '$account_id'
;";
$result = $conn->query($sql);
$_SESSION['username'] = $new_username;
header("Location: settings.php?success=Username changed. Welcome, $new_username!");
exit(); 
    
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    if (empty($data) || $data == null || $data == "") {
        header("Location: settings.php?error=Username cannot be empty.");
        exit();
    }
    return $data;
}
?>