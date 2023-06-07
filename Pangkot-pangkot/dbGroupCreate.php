<?php
include 'dbConnector.php';
session_start();

$account_id = $_SESSION['account_id'];
$groupName = validateInput($_POST['groupName']);
$groupDescription = validateInput($_POST['groupDescription']);
$joinCode = generateJoinCode();

$sql = "INSERT INTO pangkot_group (group_name, group_description, join_code, account_id)
        VALUES ('$groupName', '$groupDescription', '$joinCode', $account_id)
        ;";
$result = $conn->query($sql);
if ($result === FALSE) {
    echo "Error: ". $sql. "<br>". $conn->error;
    header("Location: groupCreate.php?error=Could not make group");
}

$group_id = $conn->insert_id;
$sql = "INSERT INTO membership (account_id, group_id)
        VALUES ($account_id, $group_id)
        ;";
$result = $conn->query($sql);
if ($result === FALSE) {
    echo "Error: ". $sql. "<br>". $conn->error;
    header("Location: groupCreate.php?error=Could not make group");
}

header("Location: groupCreate.php?success=Group created successfully!");
header("Location: group.php?group_id=$group_id");
exit();

function generateJoinCode() {
    include 'dbConnector.php';

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    $sql = "SELECT * 
            FROM pangkot_group 
            WHERE join_code = '$randomString'
            ;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $randomString = generateJoinCode();
    }

    return $randomString;
}

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    if (empty($data) || $data == null || $data == "") {
        header("Location: groupCreate.php?error=Complete all fields");
        exit();
    }
    
    return $data;
}
?>