<?php
include 'dbConnector.php';

$join_code = validateInput($_POST['join_code']);

$sql = "SELECT * 
        FROM pangkot_group 
        WHERE join_code = '$join_code'
        ;";
$result = $conn->query($sql);
if ($result === FALSE) {
    echo "Error: ". $sql. "<br>". $conn->error;
    header("Location: groupJoin.php?error=Could not join group");
    exit();
}

if ($result->num_rows==0) {
    header("Location: groupJoin.php?error=Invalid join code");
    exit();
}

$row = $result->fetch_assoc();
$group_id = $row['group_id'];
$account_id = $_SESSION['account_id'];

switch($group_id) {
case 1:
    header("Location: private.php?error=This is your Private Group");
    exit();
case 2:
    header("Location: index.php?error=This is your Public Group");
    exit();
default:
    break;
}

$sql = "SELECT * 
        FROM membership 
        WHERE account_id = $account_id 
        AND group_id = $group_id
        ;";
$result = $conn->query($sql);
if ($result === FALSE) {
    echo "Error: ". $sql. "<br>". $conn->error;
    header("Location: groupJoin.php?error=Could not join group");
    exit();
}

if ($result->num_rows > 0) {
    header("Location: group.php?error=You are already a member of this group");
    header("Location: group.php?group_id=$group_id");
    exit();
}

$sql = "INSERT INTO membership (account_id, group_id)
        VALUES ($account_id, $group_id)
        ;";
$result = $conn->query($sql);
if ($result === FALSE) {
    echo "Error: ". $sql. "<br>". $conn->error;
    header("Location: groupJoin.php?error=Could not join group");
    exit();
}

header("Location: group.php?group_id=$group_id");
exit();

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    if (empty($data) || $data == null || $data == "") {
        header("Location: groupJoin.php?error=Complete all fields");
        exit();
    }

    return $data;
}
?>