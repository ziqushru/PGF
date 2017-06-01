<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    $sql = "DELETE FROM comments WHERE (user_id='" . $_POST["user_id"] . "')";
    $conn->query($sql);
    $sql = "DELETE FROM posts WHERE (user_id='" . $_POST["user_id"] . "')";
    $conn->query($sql);
    $sql = "DELETE FROM users WHERE (id='" . $_POST["user_id"] . "')";
    $conn->query($sql);
    $conn->close();
    if ($_SESSION["username"] != "admin")
    {
        session_destroy();
        header("Location: /users/register.php");
        die();
    }
    header("Location: /account.php");
    die();
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>