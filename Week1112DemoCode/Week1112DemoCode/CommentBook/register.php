<?php

include 'db_connect.php';

$username = $_POST['username'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];

$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, pwd, email) VALUES (?, ?, ?)");

$stmt->bind_param("sss",$username,$hashed_pwd, $email);

if($stmt->execute()){
    echo "Registration successfuly! <a href='login.html'>Login Here</a>";
}else{
    echo "Error: "  .$stmt->error;
}

$stmt->close();
$conn->close();


?>