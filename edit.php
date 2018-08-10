<?php
    header("Access-Control-Allow-Origin: *");

    include 'dbconfig.php';

    $header = null;
    $section = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $header = $_POST["header"];
        $section = $_POST["newText"];

        $newHtml = '<section class="home"><h1>'.$header.'</h1><p>'.$section.'</p></section>';
        $query = "INSERT INTO pages (`category`, `type`, `parent`, `html`) VALUES ('$header', 'Main', 'None', '$newHtml')";
        if ($mysqli->query($query) === TRUE) {
            $mysqli->close();
            header('Location: base.php?page='.$header.'');
        } else {
            echo "Error: " . $query . "<br>" . $mysqli->error;
        }
    } else {
?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Create
            </title>
        </head>
        <body>
            <form action="edit" method="POST">
                <label>Header:</label>
                <input type="text" class="header" name="header" />
                <label>Text:</label>
                <textarea rows="4" cols="50" type="text" class="newText" name="newText" required></textarea>
                <input type="submit" value="Submit" />
            </form>
        </body>
    </html>
<?php } ?>