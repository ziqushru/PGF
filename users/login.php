<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<div class="div_custom">
    <h1>Log In</h1>
    <form action="/signin.php" method="post">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Username</td>
                <td><input style="border: none;" type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input style="border: none;" type="password" name="password"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="button_custom" type="submit" value="Log In"/></td>
            </tr>
        </table>
    </div>
    </<form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>