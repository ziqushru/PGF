<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["topic_id"]) || $_POST["topic_id"] == "" ||
        !isset($_POST["title"]) || $_POST["title"] == "" ||
        !isset($_POST["text"]) || $_POST["text"] == "")
    {
        header("Location: /home.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "INSERT INTO posts (topic_id, user_id, title, text) VALUES (" . $_POST["topic_id"] . "," . $_SESSION["user_id"] . ",'" . $_POST["title"] . "','" . $_POST["text"] . "')";
    $conn->query($sql);
    $conn->close();
?>
    
<form action='/topics/show.php' method='post' id='topicsShow'>
    <input type='hidden' name='id' value="<?php echo $_POST['topic_id']; ?>"/>
</form>

<script type="text/javascript">
    document.getElementById('topicsShow').submit();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>