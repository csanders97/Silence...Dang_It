<?php
    session_start();
    $_SESSION['admin'] = 'false';
    $_SESSION['authenticated'] = 'false';
    header('Location: base.php?page=Contact');
?>