<?php
include 'dbConnector.php';

$account_id = $_SESSION['account_id'];

$sql = "SELECT * 
        FROM pangkot_group
        WHERE account_id = $account_id
;";
$result = $conn->query($sql);

if ($account_id!=1) {
    echo '
        <option value="1" >Private</option>
    ';
}


while($row = $result->fetch_assoc()) {
    $group_id = $row['group_id'];
    $group_name = $row['group_name'];
    echo '
        <option value="' . $group_id . '">' . $group_name . '</option>
    ';
}


?>