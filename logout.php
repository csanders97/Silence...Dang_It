<?php
    session_start();
    $_SESSION['admin'] = 'false';
    header('Location: base.php?page=Contact');
?>