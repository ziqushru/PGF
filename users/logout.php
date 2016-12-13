<?php include $_SERVER['DOCUMENT_ROOT'] . '/upper.php'; ?>

<?php
    session_destroy();
    header("Location: /home.php");
    die();    
?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/lower.php'; ?>