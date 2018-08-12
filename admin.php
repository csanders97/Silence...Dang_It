<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="theme1.css"/>
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Hanalei+Fill|Josefin+Slab|Open+Sans|Poiret+One|Ultra" rel="stylesheet">
        <title>CMS - SILENCE</title>
    </head>
    <body>
        <?php include 'header.php' ?>
        <h1>Welcome, Admin</h1>
        <h3>Current Page Hierarchy</h3>
        <?php
            include 'dbconfig.php';

            $getContent = "select * from pages where parent='None'";
            $result = $mysqli->query( $getContent );
            $num_results = $result->num_rows;
            if( $num_results > 0) {
                while( $row = $result->fetch_assoc() ) {
                    extract($row);
                    echo "<div class='main'>{$html}<a class='editBtn' href='edit.php?page='$category''>Edit &#10000;</a></div>";
                    $getSubContent = "select * from pages where parent = '$category'";
                    $subResult = $mysqli->query( $getSubContent );
                    $num_sub = $subResult->num_rows;
                    if( $num_sub > 0) {
                        while( $row = $subResult->fetch_assoc() ) {
                            extract($row);
                            echo "<div class='subcat'><span>&#9866;</span>{$html}<a class='editBtn' href='edit.php?page='$category''>Edit &#10000;</a></div>";
                        }
                    }
                    echo "<a class='editBtn' href='edit.php?parent='$category''>Add Sub-Section &#10010;</a></div>";
                }
                echo "<a class='editBtn' href='edit.php'>Add Section &#10010;</a></div>";
                $result->free();
                $mysqli->close();
            }
        ?>
    </body>
</html>