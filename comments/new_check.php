<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (isset($_POST["post_id"]) && $_POST["post_id"] != "" ||
        isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "" ||
        isset($_POST["text"]) && $_POST["text"] != "")
    {
    }
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "INSERT INTO comments (post_id, user_id, text) VALUES (" . $_POST["post_id"] . "," . $_SESSION["user_id"] . ",'" . $_POST["text"] . "')";
    $conn->query($sql);
    $conn->close();
?>
    
<form action='/posts/show.php' method='post' id='postsShow'>
    <input type='hidden' name='id' value='<?php echo $_POST['post_id']; ?>'/>
</form>

<script type="text/javascript">
    document.getElementById('postsShow').submit();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>