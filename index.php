<?php
    session_start();
    $_SESSION['admin'] = 'false';
    // if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: base.php?page=Home');
    // }
?>