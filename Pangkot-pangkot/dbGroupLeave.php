<?php
include 'dbConnector.php';

$group_id = $_POST['group_id'];
$account_id = $_SESSION['account_id'];

$sql = "DELETE FROM membership
        WHERE group_id = $group_id
        AND account_id = $account_id
        ;";
$result = $conn->query($sql);

if($result === TRUE) {
    header("Location: index.php?success=You have left the group");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>