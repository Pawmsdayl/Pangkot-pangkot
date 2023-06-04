<?php
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        if (empty($data) || $data == null || $data == "") {
            header("Location: login.php?error=Complete all fields");
            exit();
        }
    
        return $data;
    }

    include 'dbConnector.php';

    $username = validate_input($_POST['username']) ;
    $account_password = validate_input($_POST['account_password']);

    $sql = "SELECT * 
            FROM account 
            WHERE username = '$username' 
            AND account_password = '$account_password'";
    $request = $conn->query($sql);
    if ($request === FALSE) {
        echo "Error: ". $sql. "<br>". $conn->error;
    }

    if ($request->num_rows > 0) {
        $row = $request->fetch_assoc();
        $account_id = $row['account_id'];
        $username = $row['username'];
        $email = $row['email'];
        $avatar_id = $row['avatar_id'];

        $sql = "SELECT file_path 
                FROM avatar 
                WHERE avatar_id = $avatar_id";
        $request = $conn->query($sql);
        if ($request === FALSE) {
            echo "Error: ". $sql. "<br>". $conn->error;
        }
        $row = $request->fetch_assoc();
        $avatar_path = $row['file_path'];
        
        $_SESSION['account_id'] = $account_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['avatar_path'] = $avatar_path;

        if (session_status() === PHP_SESSION_ACTIVE) {
            $sessionData = $_SESSION;
            $sessionJson = json_encode($sessionData);
            echo "<script>console.log('Session Data:', $sessionJson);</script>";
        } else {
            echo "<script>console.log('Session Data: None');</script>";
        }
        header("Location: login.php?success=Login successful. Welcome, $username!");
        exit();
    } else {
        header("Location: login.php?error=Invalid username or password");
        exit();
    }
?>