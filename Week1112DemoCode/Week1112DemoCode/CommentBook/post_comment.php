<?php
    include 'db_connect.php';

    $username = $_POST['username'];
    $comment_text = $_POST['comment_text'];

    $user_query = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $user_query->bind_param("s", $username);
    $user_query->execute();

    $user_result = $user_query->get_result();

    if($user_result->num_rows > 0){
        $user_row = $user_result->fetch_assoc();
        $user_id = $user_row['id'];

    }else{
        $user_id = NULL;
    }

    $stmt = $conn->prepare("INSERT INTO comments (username, comment_text, users_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $comment_text, $user_id);

    if($stmt->execute()){
        echo "Comment posted successfully! <a href='comment_form.html'>Post another</a> or <a href='login.html'>Login to view your comments</a>";
    }else{
        echo "Error: "  .$stmt->error;
    }

    $stmt->close();
    $user_query->close();
    $conn->close();
?>