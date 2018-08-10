<?php
    session_start();
    if ($_SESSION['admin'] === 'false') {
        header('Location: base.php?page=Home');
    }
    else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="theme1.css"></script>
        <title>CMS - SILENCE</title>
    </head>
    <body>
        <?php include 'header.php' ?>
        <h1>Welcome, Admin</h1>
    </body>
</html>
<?php } ?>