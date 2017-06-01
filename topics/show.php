<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    
    $sql = "SELECT name FROM topics WHERE (id=" . $_POST["id"] . ")";
    $data = $conn->query($sql);
    $topic = $data->fetch_assoc();
    $sql = "SELECT * FROM posts WHERE (topic_id=" . $_POST["id"] . ")";
    $data = $conn->query($sql);
    $conn->close();
?>

<div class="div_custom">
    <h1><?php echo $topic["name"]; ?></h1>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td align='middle' style='vertical-align:middle;'>Views</td>
                <td align='middle' style='vertical-align:middle;'>Title</td>
                <?php
                    if (isset($_SESSION["user_id"]))
                    {
                        echo "<form action='/posts/new.php' method='post'>";
                            echo "<input type='hidden' name='topic_id' value='" . $_POST["id"] . "'/>";
                            echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom' type='submit' value='Add'/></td>";
                        echo "</form>";
                    }
                ?>
            </tr>
            <?php
                while ($post = $data->fetch_assoc())
                {
                    echo "<tr>";
                        echo "<form action='/posts/show.php' method='post'>";
                        echo "<input type='hidden' name='id' value='" . $post['id'] . "'/>";
                        echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom_2' type='submit' value='" . $post['views'] . "'/></td>";
                        echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom_2' type='submit' value='" . $post['title'] . "'/></td>";
                        echo "</form>";
                        if ($_SESSION["username"] == "admin")
                        {
                            echo "<form action='/posts/delete.php' method='post'>";
                                echo "<input type='hidden' name='id' value='" . $post['id'] . "'/>";
                                echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom' type='submit' value='Delete'/></td>";
                            echo "</form>";
                        }
                    echo "</tr>";
                }
            ?>
            </tr>
        </table>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>