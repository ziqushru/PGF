<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (empty($_POST["username"]) || empty($_POST["password"]))
    {
        header("Location: /users/register.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    
    $sql = "INSERT INTO users (username, password, email) VALUES ('" . $_POST["username"] . "', '" . $_POST["password"] . "', '" . $_POST["email"] . "')";

    if ($conn->query($sql) === FALSE)
        header("Location: /users/signup.php");
    else if ($_SESSION["username"] == "admin")
        header("Location: /account.php");
    else
        header("Location: /users/login.php");
    $conn->close();
    die();
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>