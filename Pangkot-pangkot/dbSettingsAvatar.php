<?php
    include 'dbConnector.php';

    $avatar_id = $_POST['avatar_id'];
    $account_id = $_SESSION['account_id'];

    $sql = "UPDATE account
            SET avatar_id = '$avatar_id'
            WHERE account_id = '$account_id'
    ;";
    $result = $conn->query($sql);
    
?>