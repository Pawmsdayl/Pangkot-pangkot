<?php
include 'dbConnector.php';

$group_id = 1;
$account_id = $_SESSION['account_id'];
$member_count = 1;

$sql = "SELECT *
        FROM pangkot_group
        WHERE group_id = $group_id
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$group_name = $row['group_name'];
$group_description = $row['group_description'];

$sql = "SELECT *
        FROM account
        WHERE account_id = $account_id
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$admin_name = $row['username'];
$creation_date = $row['join_date'];

$sql = "SELECT COUNT(group_id) AS quiz_count
        FROM quiz
        WHERE group_id = $group_id
        AND account_id = $account_id
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$quiz_count = $row['quiz_count'];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $group_name; ?></title>
    <meta charset="UTF-8">

    <?php
        include 'commonHead.php';
    ?>

    <link rel="stylesheet" href="style/cards.css">
</head>
<body>
    <?php
        include 'header.php';
        include 'ads.php';
    ?>

    <div class="contentBackground">
        <div class="groupCard card">   
            <h1 class="groupTitle lightColor"> <?php echo $group_name; ?> </h1>
            <h2 class="groupDescription textOnDark"> Description:
                <?php echo $group_description; ?>
            </h2>
            <h2 class="groupDetails textOnDark">
                Admin: <?php echo $admin_name; ?> <br>
                Member Count: <?php echo $member_count; ?> <br>
                Quiz Count: <?php echo $quiz_count; ?> <br>
                Creation Date: <?php echo $creation_date; ?> <br>
                <br>
            </h2>
        </div>
    <?php
        include 'dbQuizCardGenerate.php';
        generateQuizCard($group_id);
    ?>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>