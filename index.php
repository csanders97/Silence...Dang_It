<?php
    session_start();
    $_SESSION['admin'] = 'false';
    $_SESSION['authenticated'] = 'false';
    // if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: base.php?page=Home');
    // }
?>