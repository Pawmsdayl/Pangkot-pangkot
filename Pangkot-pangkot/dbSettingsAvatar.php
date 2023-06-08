<?php
include 'dbConnector.php';

$avatar_id = $_POST['avatar_id'];
$_SESSION['avatar_id'] = $avatar_id;
$account_id = $_SESSION['account_id'];

$sql = "UPDATE account
        SET avatar_id = '$avatar_id'
        WHERE account_id = '$account_id'
;";
$result = $conn->query($sql);

$sql = "SELECT file_path
        FROM avatar
        WHERE avatar_id = '$avatar_id'
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$_SESSION['avatar_path'] = $row['file_path'];
header("Location: settings.php?success=Avatar changed.");
exit();
?>