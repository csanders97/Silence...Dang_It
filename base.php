<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php
            if(isset($_GET["theme"])) {
                $themeQ = urldecode($_GET["theme"]);
            } else {
                $themeQ = "theme1";
            }
        ?>
        <link rel="stylesheet" type="text/css" href=<?php echo $themeQ ?> + ".css"/>
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Hanalei+Fill|Josefin+Slab|Open+Sans|Poiret+One|Ultra" rel="stylesheet">
        <title>CMS - SILENCE</title>
    </head>
    <body>
        <?php include 'header.php' ?>
        <div id="subbody">
            <?php include 'content.php' ?>
        </div>
        <footer>
            <summary>Copyright 2018 &emsp; || &emsp; Silence... Dang It&trade;. All Rights Reserved.</summary>
        </footer>
    </body>
</html>