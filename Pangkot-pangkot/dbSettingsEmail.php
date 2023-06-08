<?php
include 'dbConnector.php';

$account_id = $_SESSION['account_id'];
$new_email = validateInput($_POST['new_email']);

$sql = "UPDATE account
        SET email = '$new_email'
        WHERE account_id = '$account_id'
;";
$result = $conn->query($sql);
$_SESSION['email'] = $new_email;
header("Location: settings.php?success=Email changed.");
exit(); 
    
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    if (empty($data) || $data == null || $data == "") {
        header("Location: settings.php?error=Email cannot be empty.");
        exit();
    }
    return $data;
}
?>