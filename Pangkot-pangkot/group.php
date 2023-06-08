<?php
include 'dbConnector.php';

if (!isset($_GET['group_id'])) {
    echo "<script>alert('No group id')</script>";
    header("Location: index.php");
    exit();
}
$group_id = $_GET['group_id'];
$account_id = $_SESSION['account_id'];

$sql = "SELECT * 
        FROM membership 
        WHERE group_id = $group_id 
        AND account_id = $account_id
;";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    header("Location: index.php?error=You are not a member of this group");
    exit();
}
$row = $result->fetch_assoc();
$join_date = $row['join_date'];

$sql = "SELECT COUNT(account_id) AS member_count 
        FROM membership 
        WHERE group_id = $group_id 
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$member_count = $row['member_count'];

$sql = "SELECT *
        FROM pangkot_group
        WHERE group_id = $group_id
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$group_name = $row['group_name'];
$group_description = $row['group_description'];
$creation_date = $row['creation_date'];
$admin_id = $row['account_id'];
$join_code = $row['join_code'];

$sql = "SELECT *
        FROM account
        WHERE account_id = $admin_id
;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$admin_name = $row['username'];

$sql = "SELECT COUNT(group_id) AS quiz_count
        FROM quiz
        WHERE group_id = $group_id
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
                Membership Date: <?php echo $join_date; ?> <br>
                <br>
                <?php 
                    if ($admin_id == $account_id) {
                        echo "
                        Join Code: $join_code
                        ";
                    }
                ?>
            </h2>

            <?php 
                if ($admin_id == $account_id) {
                    echo "
                    <form action='dbGroupDelete.php' method='POST'>
                        <input type='number' hidden name='group_id' value='$group_id'>
                        <button class='redButton button' type='submit'>Delete</button>
                    </form>
                    ";

                    // <form action='groupEdit.php' method='POST'>
                    //     <input type='number' hidden name='group_id' value='$group_id'>
                    //     <button class='greenButton button' type='submit'>Edit</button>
                    // </form>
                } else {
                    echo "
                    <form action='dbGroupLeave.php' method='POST'>
                        <input type='number' hidden name='group_id' value='$group_id'>
                        <input type='number' hidden name='account_id' value='$account_id'>
                        <button class='redButton button' type='submit'>Leave</button>
                    </form>
                    ";
                }
            ?>
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