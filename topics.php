<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    
    $sql = "SELECT * FROM topics";
    $data = $conn->query($sql);
    $conn->close();
?>

<div class="div_custom">
    <h1>Account Information</h1>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td align="middle">Name</td>
                <td align="middle">Description</td>
                <td align="middle"></td>
            </tr>
            <?php
                if ($_SESSION["user_id"] == 2)
                {
                    echo "<form action='/new_topic.php' method='post'>";
                        echo "<tr>";
                            echo "<td align='middle' style='vertical-align:middle;'><input style='border: none;' type='text' name='name'/></td>";
                            echo "<td align='middle' style='vertical-align:middle;'><input style='border: none;' type='text' name='description'/></td>";
                            echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom' type='submit' value='Add'/></td>";
                        echo "</tr>";
                    echo "</form>";
                }
                while ($topic = $data->fetch_assoc())
                {
                    echo "<tr>";
                        echo "<form action='/topic.php' method='get'>";
                        echo "<input type='hidden' name='name' value='" . $topic['name'] . "'/>";
                        echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom_2' type='submit' value='" . $topic['name'] . "'/></td>";
                        echo "<td align='middle' style='vertical-align:middle;'><input class='button_custom_2' type='submit' value='" . $topic['description'] . "'/></td>";
                        echo "</form>";
                        if ($_SESSION["user_id"] == 2)
                        {
                            echo "<form action='/delete_topic.php' method='post'>";
                                echo "<input type='hidden' name='id' value=" . $topic["id"] . "/>";
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