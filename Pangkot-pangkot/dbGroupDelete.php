<?php
include 'dbConnector.php';

$group_id = $_POST['group_id'];

$sql = "DELETE FROM pangkot_group
        WHERE group_id = $group_id
;";
$result = $conn->query($sql);
if($result == FALSE) {
    header("Location: index.php?error=Error deleting group");
    exit();
}

header("Location: index.php?success=Group deleted successfully");
exit();
?>