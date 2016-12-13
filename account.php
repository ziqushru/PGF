<?php include 'upper.php'; ?>

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
    </div>
</div>

<?php include 'lower.php'; ?>