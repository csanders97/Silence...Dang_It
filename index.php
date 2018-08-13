<?php
    session_start();
    $_SESSION['admin'] = 'false';
    $_SESSION['authenticated'] = 'false';
    if (isset($_GET['theme'])) {
        $theme = $_GET['theme'];
    }
    else {
        $theme = 'theme1';
    }
    header("Location: base.php?page=Home&theme={$theme}");
?>