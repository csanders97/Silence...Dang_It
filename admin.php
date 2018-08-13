<?php
    session_start();
    if ($_SESSION['admin'] === 'false') {
        header('Location: base.php?page=Home');
    } else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="theme1.css"/>
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Hanalei+Fill|Josefin+Slab|Open+Sans|Poiret+One|Ultra" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>CMS - SILENCE</title>
    </head>
    <body>
        <?php include 'header.php' ?>
        <h1 style="margin-top: 10px;">Welcome, Admin</h1>
        <h3>Current Page Hierarchy</h3>
        <?php
            include 'dbconfig.php';

            $getContent = "select * from pages where parent='None'";
            $result = $mysqli->query( $getContent );
            $num_results = $result->num_rows;
            if( $num_results > 0) {
                while( $row = $result->fetch_assoc() ) {
                    extract($row);
                    echo "<div class='main'>{$category}<a class='editBtn' href='edit.php?page={$category}'>Edit &#10000;</a>";
                    if ($category != "Home") {
                        echo "<a class='editBtn' href='delete.php?page={$category}'>Delete &#10008;</a>";
                    }
                    echo "</div>";
                    $parentVar = $category;
                    $getSubContent = "select * from pages where parent = '$category'";
                    $subResult = $mysqli->query( $getSubContent );
                    $num_sub = $subResult->num_rows;
                    if( $num_sub > 0) {
                        while( $row = $subResult->fetch_assoc() ) {
                            extract($row);
                            echo "<div class='subcat'><span>&#9866;</span>{$category}<a class='editBtn' href='edit.php?page={$category}'>Edit &#10000;</a><a class='editBtn' href='delete.php?page={$category}'>Delete &#10008;</a></div>";
                        }
                    }
                    echo "<a class='editBtn' href='edit.php?parent={$parentVar}'>Add Sub-Section &#10010;</a>";
                }
                echo "<div class='btn'><a class='editBtn' href='edit.php'>Add Section &#10010;</a></div>";
                $result->free();
                $mysqli->close();
            }
        ?>
        <footer>
            <summary>Copyright 2018 &emsp; || &emsp; Silence... Dang It&trade;. All Rights Reserved.</summary>
        </footer>
    </body>
</html>
<?php } ?>