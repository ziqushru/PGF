<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["id"]))
    {
        header("Location: /topics/show.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "DELETE FROM posts WHERE (id='" . $_POST["id"] . "')";
    $conn->query($sql);
    $conn->close();

    header("Location: /topics/show.php");
    die();
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>