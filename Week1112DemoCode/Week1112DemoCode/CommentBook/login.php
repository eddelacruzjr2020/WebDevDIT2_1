<?php

session_start();

include 'db_connect.php';

$username = $_POST['username'];
$pwd = $_POST['pwd'];

$stmt = $conn->prepare("SELECT id, pwd FROM users WHERE username = ?");

$stmt->bind_param("s", $username);

$stmt->execute();

$stmt->store_result();

if($stmt->num_rows == 1){
    $stmt->bind_result($user_id, $hashed_pwd);
    $stmt->fetch();

    if(password_verify($pwd, $hashed_pwd)){
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;

        header("Location: my_comments.php");
        exit;
    }else{
        echo "Incorrect password. <a href='login.html'>Try again</a>";
    }
}else{
    echo "User not found. <a href=register.html'>Register here</a>";
}

$stmt->close();
$conn->close();

?>