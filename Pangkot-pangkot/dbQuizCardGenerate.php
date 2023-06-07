<?php
function generateQuizCard($group_id) {
    include 'dbConnector.php';
    
    $sql = "SELECT * 
            FROM quiz
            WHERE group_id = $group_id
    ;";
    $result = $conn->query($sql);
    
    while ($quizRow = $result->fetch_assoc()) {
        $quiz_name = $quizRow['quiz_name'];
        $quiz_description = $quizRow['quiz_description'];
        $creation_date = $quizRow['creation_date'];
        
        $quiz_id = $quizRow['quiz_id'];
        $account_id = $_SESSION['account_id'];
        
        $sql = "SELECT MAX(date_taken) AS last_trial_date, AVG(time_took) AS ave_time, MIN(time_took) AS best_time
                FROM record
                WHERE quiz_id = $quiz_id
                AND account_id = $account_id
        ;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (!isset($row['last_trial_date']) || $group_id == 2) {
            $last_trial_date = "yyyy/mm/dd";
            $ave_minutes = "00";
            $ave_seconds = "00";
            $best_minutes = "00";
            $best_seconds = "00";
        } else {
            $last_trial_date = $row['last_trial_date'];
            $ave_minutes = floor($row['ave_time'] / 60);
            $ave_minutes = str_pad($ave_minutes, 2, "0", STR_PAD_LEFT);
            $ave_seconds = $row['ave_time'] % 60;
            $ave_seconds = str_pad($ave_seconds, 2, "0", STR_PAD_LEFT);
            $best_minutes = floor($row['best_time'] / 60);
            $best_minutes = str_pad($best_minutes, 2, "0", STR_PAD_LEFT);
            $best_seconds = $row['best_time'] % 60;            
            $best_seconds = str_pad($best_seconds, 2, "0", STR_PAD_LEFT);
        }

        echo '
        <div class="quizCard card">
            <div class="quizMain">
                <a href="quiz.php?quiz_id='. $quiz_id. ' ">
                    <div class="quizHead"> 
                        <h1 class="quizTitle">'. $quiz_name. '</h1>
                    </div>
                    <h2 class="quizDescription textOnDark">'. 
                        $quiz_description. '
                    </h2>
                </a>    
            </div>
            <div class="quizSide">
                <h2 class="quizDetails">
                    Date Created: '. $creation_date. ' <br> 
                    Your Last Answer: '. $last_trial_date. ' <br>
                    Your Ave. Time: '. $ave_minutes. ':'. $ave_seconds. ' out of 00:00 <br>
                    Your Best Time: '. $best_minutes. ':'. $best_seconds. ' out of 00:00
                </h2>
            </div>
        </div>
        ';
    }
    
}
?>