<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["name"]) || $_POST["name"] == "" ||
        !isset($_POST["description"]) || $_POST["description"] == "")
    {
        header("Location: /topics/showAll.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "INSERT INTO topics (name, description) VALUES ('" . $_POST["name"] . "', '" . $_POST["description"] . "')";
    $conn->query($sql);
    $conn->close();

    header("Location: /topics/showAll.php");
    die();
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>