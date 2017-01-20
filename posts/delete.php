<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["id"]))
    {
        header("Location: /home.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "DELETE FROM comments WHERE (post_id=" . $_POST["id"] . ");";
    $conn->query($sql);
    $sql = "SELECT topic_id FROM posts WHERE (id=" . $_POST["id"] . ");";
    $data = $conn->query($sql);
    $post = $data->fetch_assoc();
    $sql = "DELETE FROM posts WHERE (id=" . $_POST["id"] . ");";
    $conn->query($sql);
    $sql = "UPDATE users SET posts=posts-1 WHERE id=" . $_SESSION["user_id"];
    $conn->query($sql);
    $conn->close();
?>

<form action='/topics/show.php' method='post' id='topicsShow'>
    <input type='hidden' name='id' value='<?php echo $post['topic_id']; ?>'/>
</form>

<script type="text/javascript">
    document.getElementById('topicsShow').submit();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>