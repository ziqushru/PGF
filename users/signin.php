<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (empty($_POST["username"]) || empty($_POST["password"]))
    {
        header("Location: /users/login.php");
        die();
    }

    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    
    session_unset();
    $sql = "SELECT id, username FROM users WHERE (username='" . $_POST["username"] . "' AND password='" . $_POST["password"] . "')";
    $data = $conn->query($sql);
    $conn->close();
    
    $user = $data->fetch_assoc();
    
    if ($data->num_rows == 0)
        header("Location: /users/login.php");
    else
    {
        if ($_SESSION["username"] == "admin")
            header("Location: /account.php");
        session_name("User");
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Location: /home.php");
    }
    
    die();
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>