<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["id"]))
    {
        header("Location: /home.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "SELECT post_id FROM comments WHERE (id=" . $_POST["id"] . ")";
    $data = $conn->query($sql);
    $comment = $data->fetch_assoc();
    $sql = "DELETE FROM comments WHERE (id=" . $_POST["id"] . ")";
    $conn->query($sql);
    $conn->close();
?>

<form action='/posts/show.php' method='post' id='postsShow'>
    <input type='hidden' name='id' value='<?php echo $comment['post_id']; ?>'/>
</form>

<script type="text/javascript">
    document.getElementById('postsShow').submit();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>