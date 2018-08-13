<?php
    session_start();
    $_SESSION['admin'] = 'false';
    $_SESSION['authenticated'] = 'false';
    $theme = $_GET['theme'];
    header("Location: index.php?theme={$theme}");
?>