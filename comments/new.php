<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["post_id"]) || $_POST["post_id"] == "")
    {
        header("Location: /posts/show.php");
        die();
    }
?>

<div class="div_custom">
    <h1>New Comment</h1>
    <h3>Text</h3>
    <form action='/comments/new_check.php' method='post' id='commentsNew_check'>
        <input type='hidden' name='post_id' value='<?php echo $_POST['post_id']; ?>'/>
        <textarea form='commentsNew_check' style='border: none;' name='text' rows='10' cols='35' wrap='soft'></textarea>
        <br>
        <input class='button_custom' type='submit' value='Add'/>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>