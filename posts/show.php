<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    if (!isset($_POST["id"]))
    {
        header("Location: /home.php");
        die();
    }
    
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $sql = "SELECT * FROM posts WHERE (id=" . $_POST["id"] . ")";
    $data = $conn->query($sql);
    $post = $data->fetch_assoc();
    
    $sql = "SELECT * FROM comments WHERE (post_id='" . $_POST["id"] . "')";
    $data = $conn->query($sql);
    
    if (!is_null($_SESSION["user_id"]) )
    {
        $sql = "UPDATE posts SET views=views + 1 WHERE (id=" . $_POST["id"] . ")";
        $conn->query($sql);
    }
?>

<div class="div_custom">
    
    <div>
        <?php
        echo "<h2>" . $post["title"] . "</h2>";
        echo "<h3>" . $post["time"] . "</h3>";
            if ($_SESSION["user_id"] == $post["user_id"] || $_SESSION["user_id"] == 2)
            {
                echo "<form action='/posts/delete.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $post["id"] . "'/>";
                    echo "<input class='button_custom_2' type='submit' value='Delete'/>";
                echo "</form>";
            }
        ?>
    </div>
    <div>
        <p><?php echo $post["text"]; ?></p>
    </div>
    
    <br>
    <h4>Comments</h4>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td align='middle' style='vertical-align:middle;'>User</td>
                <td align='middle' style='vertical-align:middle;'>Text</td>
                <td align='middle' style='vertical-align:middle;'>Time</td>
                <?php
                    if (isset($_SESSION["user_id"]))
                    {
                        echo "<form action='/comments/new.php' method='post'>";
                            echo "<input type='hidden' name='post_id' value='" . $post["id"] . "'/>";
                            echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom' type='submit' value='Add'/></td>";
                        echo "</form>";
                    }
                ?>
            </tr>
            <?php
                while($comment = $data->fetch_assoc())
                {
                    $sql = "SELECT username FROM users WHERE (id=" . $comment["user_id"] . ")";
                    $user_data = $conn->query($sql);
                    $user = $user_data->fetch_assoc();
                    echo "<tr>";
                        echo "<td align='middle' style='vertical-align:middle;'>" . $user["username"] . "</td>";
                        echo "<td align='middle' style='vertical-align:middle;'>" . $comment["text"] . "</td>";
                        echo "<td align='middle' style='vertical-align:middle;'>" . $comment["time"] . "</td>";
                        if ($_SESSION["user_id"] == $post["user_id"] || $_SESSION["user_id"] == $comment["user_id"] || $_SESSION["user_id"] == 2)
                        {
                            echo "<form action='/comments/delete.php' method='post'>";
                                echo "<input type='hidden' name='id' value='" . $comment["id"] . "'/>";
                                echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom' type='submit' value='Delete'/></td>";
                            echo "</form>";
                        }
                        else echo "<td></td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
        </table>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>