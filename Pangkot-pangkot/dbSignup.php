<?php
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        if (empty($data) || $data == null || $data == "") {
            header("Location: signup.php?error=Complete all fields");
            exit();
        }
    
        return $data;
    }

    include 'dbConnector.php';

    $username = validate_input($_POST['username']);
    $email = validate_input($_POST['email']);
    $account_password = validate_input($_POST['account_password']);
    $confirm_password = validate_input($_POST['confirm_password']);

    if ($account_password != $confirm_password) {
        header("Location: signup.php?error=Passwords do not match");
        exit();
    }

    $sql = "SELECT * 
            FROM account 
            WHERE username = '$username'";
    $request = $conn->query($sql);
    if ($request->num_rows > 0) {
        header("Location: signup.php?error=Username already used");
        exit();
    }

    $sql = "SELECT * 
            FROM account 
            WHERE email = '$email'";
    $request = $conn->query($sql);
    if ($request->num_rows > 0) {
        header("Location: signup.php?error=Email already used");
        exit();
    }

    $sql = "INSERT INTO account (username, email, account_password) 
            VALUES ('$username', '$email', '$account_password')";
    $request = $conn->query($sql);
    if ($request === FALSE) {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
    
    $sql = "SELECT account_id 
            FROM account 
            WHERE username = '$username'";
    $request = $conn->query($sql);
    if ($request->num_rows > 0) {
        $row = $request->fetch_assoc();
        $account_id = $row['account_id'];
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }

    $sql = "INSERT INTO membership (account_id, group_id, join_date)
            VALUES ('$account_id', 1, CURRENT_DATE())";
    $request = $conn->query($sql);
    if ($request === FALSE) {
        echo "Error: ". $sql. "<br>". $conn->error;
    } 

    $_SESSION['account_id'] = $account_id;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['avatar_path'] = "Images/Avatar/avatar1.png";
    header("Location: index.php?success=Account created successfully. Weclome, $username!");
    exit();
?>