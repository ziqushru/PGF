<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["topic_id"]) || $_POST["topic_id"] == "")
    {
        header("Location: /topics/show.php");
        die();
    }
?>

<div class="div_custom">
    <h1>New Post</h1>
    <div class="table-responsive">
        <form action='/posts/new_check.php' method='post'>
            <table class="table">
                <tr>
                    <td align="middle">Title</td>
                    <td align="middle">Text</td>
                </tr>
                <?php
                    echo "<tr>";
                        echo "<input type='hidden' name='topic_id' value='" . $_POST['topic_id'] . "'/>";
                        echo "<td align='middle' style='vertical-align:middle;'><input style='border: none;' type='text' name='title'/></td>";
                        echo "<td align='middle' style='vertical-align:middle;'><input style='border: none;' type='text' name='text'/></td>";
                    echo "</tr>";
                ?>
            </table>
            <input class='button_custom' type='submit' value='Add'/>
        </form>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>