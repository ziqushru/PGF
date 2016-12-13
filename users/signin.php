<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    
    session_unset();
    $sql = "SELECT id FROM users WHERE (username='" . $_POST["username"] . "' AND password='" . $_POST["password"] . "')";
    $data = $conn->query($sql);
    $conn->close();
    
    $user_id = $data->fetch_assoc();
    
    if ($data->num_rows == 0)
        header("Location: /users/login.php");
    else
    {
        session_name("User");
        $_SESSION["user_id"] = $user_id["id"];
        header("Location: /home.php");
    }
    
    die();
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>