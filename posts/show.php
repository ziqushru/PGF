<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["id"]))
    {
        header("Location: /topics.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "SELECT * FROM posts WHERE (id='" . $_POST["id"] . "')";
    $data = $conn->query($sql);
    $post = $data->fetch_assoc();
    
    $sql = "SELECT * FROM comments WHERE (post_id='" . $_POST["id"] . "')";
    $data = $conn->query($sql);
    $conn->close();
?>

<div class="div_custom">
    <h1><?php echo $post["title"]; ?></h1>
    <h3><?php echo $post["text"]; ?></h3>
    <h3><?php echo $post["time"]; ?></h3>
    <br>
    <h4>Comments</h4>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td align="middle">User</td>
                <td align="middle">Text</td>
                <td align="middle">Time</td>
            </tr>
            <?php
                while($comment = $data->fetch_assoc())
                {
                    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
                    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
                    $sql = "SELECT username FROM users WHERE (id='" . $comment["user_id"] . "')";
                    $data = $conn->query($sql);
                    $user = $data->fetch_assoc();
                    $conn->close();
                    echo "<tr>";
                        echo "<td align='middle' style='vertical-align:middle;'>" . $user["username"] . "</td>";
                        echo "<td align='middle' style='vertical-align:middle;'>" . $comment["text"] . "</td>";
                        echo "<td align='middle' style='vertical-align:middle;'>" . $comment["time"] . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
            <input class='button_custom' type='submit' value='Add'/>
        </form>
    </div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>