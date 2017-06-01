<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    
    $sql = "SELECT * FROM users WHERE (id='" . $_SESSION["user_id"] . "')";
    $data = $conn->query($sql);
    $conn->close();
    
    $user = $data->fetch_assoc();
?>

<div class="div_custom">
    <h1>Account Information</h1>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>ID</td>
                <td><?php echo $user["id"]; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $user["username"]; ?></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><?php echo $user["email"]; ?></td>
            </tr>
            <tr>
                <td>Posts</td>
                <td><?php echo $user["posts"]; ?></td>
            </tr>
        </table>
        <?php
            if ($user["username"] != "admin")
            {
                echo "<form action='/users/delete.php' method='post'>";
                    echo "<input type='hidden' name='user_id' value='" . $user["id"] . "'/>";
                    echo "<input class='button_custom' type='submit' value='Delete'/>";
                echo "</form>";
            }
            else
            {
                $conn = new mysqli($ip_db, $username_db, $password_db, $name_db);
                if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
                
                $sql = "SELECT * FROM users WHERE (username <> 'admin')";
                $data = $conn->query($sql);
                $conn->close();
                
                echo "<table class='table'>";
                echo "<tr><td align='middle' style='vertical-align:middle;'>Username</td><td align='middle' style='vertical-align:middle;'>Password</td><td align='middle' style='vertical-align:middle;'>Email</td><td></td></tr>";
                echo "<tr><form action='/users/signup.php' method='post'>";
                echo "<td align='middle' style='vertical-align:middle;'><input style='border: none;' type='text' name='username'/></td>";
                echo "<td align='middle' style='vertical-align:middle;'><input style='border: none;' type='password' name='password'/></td>";
                echo "<td align='middle' style='vertical-align:middle;'><input style='border: none;' type='text' name='email'/></td>";
                echo "<td><input class='button_custom' type='submit' value='Add User'/></td>";
                echo "</form></tr>";
                
                echo "<tr><td align='middle' style='vertical-align:middle;'>Username</td><td align='middle' style='vertical-align:middle;'>E-mail</td><td align='middle' style='vertical-align:middle;'>Posts</td><td></td></tr>";
                
                while ($users = $data->fetch_assoc())
                {
                    echo "<tr><td align='middle' style='vertical-align:middle;'>" . $users["username"] . "</td><td align='middle' style='vertical-align:middle;'>" . $users["email"] . "</td><td align='middle' style='vertical-align:middle;'>" . $users["posts"] . "</td>";
                    echo "<td><form action='/users/delete.php' method='post'>";
                        echo "<input type='hidden' name='user_id' value='" . $users["id"] . "'/>";
                        echo "<input class='button_custom' type='submit' value='Delete'/>";
                    echo "</form></td>";
                }
            }
        ?>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>