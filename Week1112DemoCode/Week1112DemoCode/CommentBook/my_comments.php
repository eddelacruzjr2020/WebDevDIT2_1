<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit;
}

include 'db_connect.php';

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$stmt = $conn->prepare("SELECT comment_text, created_at FROM comments WHERE users_id = ? OR username = ? ORDER BY created_at DESC");
$stmt->bind_param("is", $user_id, $username);
$stmt->execute();

$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Comments</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
    <a href="logout.php">Logout</a>
    <h3>Your Comments Here</h3>

    <?php if($result->num_rows > 0): ?>
        <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo nl2br(htmlspecialchars($row['comment_text'])); ?><br>
                <small><em>Posted on: <?php echo $row['created_at']; ?></em></small>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>You have no comment.</p>
    <?php endif; ?>

    <p><a href="comment_form.html">Add a new comment</a></p>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
