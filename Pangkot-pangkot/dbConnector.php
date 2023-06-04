<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "pangkotpangkot";
    
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }
    
    $sql = "CREATE DATABASE IF NOT EXISTS ". $db. ";";
    $request = $conn->query($sql);
    if ($request === FALSE) {
        echo "Error creating database". $conn->error;
    }
    
    $conn->select_db($db);
    
    $sql = "SELECT * 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'pangkotpangkot' 
                AND  TABLE_NAME = 'avatar'";
    $request = $conn->query($sql);
    if ($request->num_rows === 0) {
        $sql = "CREATE TABLE avatar (
                    avatar_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    file_path VARCHAR(30) NOT NULL
                )";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error creating table" . $conn->error;
        }

        $sql = "INSERT INTO avatar (file_path) 
                VALUES 
                    ('Images/Avatar/avatar1.png'),
                    ('Images/Avatar/avatar2.png'),
                    ('Images/Avatar/avatar3.png'),
                    ('Images/Avatar/avatar4.png'),
                    ('Images/Avatar/avatar5.png'),
                    ('Images/Avatar/avatar6.png');";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error inserting data" . $conn->error;
        }
    }
    
    $sql = "SELECT * 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'pangkotpangkot' 
                AND  TABLE_NAME = 'account'";
    $request = $conn->query($sql);
    if ($request->num_rows === 0) {
        $sql = "CREATE TABLE account (
                    account_id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(30) NOT NULL,
                    account_password VARCHAR(30),
                    email VARCHAR(50),
                    avatar_id INT(2) UNSIGNED DEFAULT 1,
                        CONSTRAINT fk_account_avatar_id
                        FOREIGN KEY (avatar_id) REFERENCES avatar(avatar_id)
                )";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error creating table" . $conn->error;
        }

        $sql = "INSERT INTO account (username, account_password, email) 
                VALUES 
                    ('admin', 'admin', 'pdcordero@up.edu.ph'),
                    ('guest', NULL, NULL);";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error inserting data" . $conn->error;
        }
    }       
    
    $sql = "SELECT * 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'pangkotpangkot' 
                AND  TABLE_NAME = 'pangkot_group'";
    $request = $conn->query($sql);
    if ($request->num_rows === 0) {
        $sql = "CREATE TABLE pangkot_group (
                    group_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    group_name VARCHAR(30) NOT NULL,
                    group_description VARCHAR(100),
                    account_id INT(9) UNSIGNED NOT NULL,
                        CONSTRAINT fk_group_account_id
                        FOREIGN KEY (account_id) REFERENCES account(account_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    creation_date DATE NOT NULl,
                    join_code CHAR(6) NOT NULL
                )";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error creating table" . $conn->error;
        } 

        $sql = "INSERT INTO pangkot_group (group_name, group_description, account_id, creation_date, join_code) 
                VALUES 
                    ('Public', 'This is the official public group of PANGKOT-PANGKOT', 1, CURRENT_DATE(), 'EVRYON');";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error inserting data" . $conn->error;
        }
    }

    $sql = "SELECT * 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'pangkotpangkot' 
                AND  TABLE_NAME = 'membership'";
    $request = $conn->query($sql);
    if ($request->num_rows === 0) {
        $sql = "CREATE TABLE membership (
                    account_id INT(9) UNSIGNED NOT NULL,
                    group_id INT(6) UNSIGNED,
                    join_date DATE NOT NULL,
                    PRIMARY KEY (account_id, group_id),
                    FOREIGN KEY(account_id) REFERENCES account(account_id),
                        CONSTRAINT fk_membership_account_id
                        FOREIGN KEY (account_id) REFERENCES account(account_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    FOREIGN KEY(group_id) REFERENCES pangkot_group(group_id),
                        CONSTRAINT fk_membership_group_id
                        FOREIGN KEY (group_id) REFERENCES pangkot_group(group_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE
                )";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error creating table" . $conn->error;
        }

        $sql = "INSERT INTO membership (account_id, group_id, join_date) 
                VALUES 
                    (1, 1, CURRENT_DATE());";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error inserting data" . $conn->error;
        }
    }

    $sql = "SELECT * 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'pangkotpangkot' 
                AND  TABLE_NAME = 'quiz'";
    $request = $conn->query($sql);
    if ($request->num_rows === 0) {
        $sql = "CREATE TABLE quiz (
                    quiz_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    quiz_name VARCHAR(30) NOT NULL,
                    quiz_description VARCHAR(100),
                    account_id INT(9) UNSIGNED NOT NULL,
                        CONSTRAINT fk_quiz_account_id
                        FOREIGN KEY (account_id) REFERENCES account(account_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    group_id INT(6) UNSIGNED NOT NULL,
                        CONSTRAINT fk_quiz_group_id
                        FOREIGN KEY (group_id) REFERENCES pangkot_group(group_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    creation_date DATE NOT NULL,
                    timer INT(6) UNSIGNED NOT NULL
                )";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error creating table" . $conn->error;
        }
    }

    $sql = "SELECT * 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'pangkotpangkot' 
                AND  TABLE_NAME = 'record'";
    $request = $conn->query($sql);
    if ($request->num_rows === 0) {
        $sql = "CREATE TABLE record (
                    quiz_id INT(6) UNSIGNED NOT NULL,
                        CONSTRAINT fk_record_quiz_id
                        FOREIGN KEY (quiz_id) REFERENCES quiz(quiz_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    account_id INT(9) UNSIGNED NOT NULL,
                        CONSTRAINT fk_record_account_id
                        FOREIGN KEY (account_id) REFERENCES account(account_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    PRIMARY KEY (quiz_id, account_id),
                    trial_number INT(3) UNSIGNED NOT NULL,
                    date_taken DATE NOT NULL,
                    time_took INT(6) UNSIGNED NOT NULL
                )";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error creating table" . $conn->error;
        }
    }

    $sql = "SELECT * 
                FROM INFORMATION_SCHEMA.TABLES 
                WHERE TABLE_SCHEMA = 'pangkotpangkot' 
                AND  TABLE_NAME = 'flashcard'";
    $request = $conn->query($sql);
    if ($request->num_rows === 0) {
        $sql = "CREATE TABLE flashcard (
                    quiz_id INT(6) UNSIGNED NOT NULL,
                        CONSTRAINT fk_flashcard_quiz_id
                        FOREIGN KEY (quiz_id) REFERENCES quiz(quiz_id)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    flascard_number INT(3) UNSIGNED NOT NULL,
                    PRIMARY KEY (quiz_id, flascard_number),
                    question VARCHAR(100) NOT NULL,
                    answer VARCHAR(100) NOT NULL
                )";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error creating table" . $conn->error;
        }
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['account_id']) === FALSE) {
        $_SESSION['account_id'] = 2;
        $_SESSION['username'] = "guest";
        $_SESSION['email'] = NULL;
        $_SESSION['avatar_path'] = "Images/Avatar/avatar1.png";
    }
?>