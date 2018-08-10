<?php
    header("Access-Control-Allow-Origin: *");

    include 'dbconfig.php';

    $header = null;
    $section = null;

    $existingHeader = "";
    $existingText = "";

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        $sql = "select * from pages where category = '$page'";
        $result = $mysqli->query( $sql );
        $num_results = $result->num_rows;
        if ( $num_results > 0) {
            $row = $result->fetch_assoc();
            extract($row);
            $existingHeader = $category;
            if (preg_match('/(<p(>|\s+[^>]*>).*?<\/p>)/i', $html, $regs)) {
                $existingText = $regs[1];
            } else {
                $existingText = "";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $header = $_POST["header"];
        $section = $_POST["newText"];

        $newHtml = '<section class="home"><h1>'.$header.'</h1><p>'.$section.'</p></section>';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $sql = "Delete from pages where category = '$existingHeader'";
            $query = "Update pages set category = '$header' AND html = '$newHtml' where category = '$page'";
            if ($mysqli->query($query) === TRUE) {
                $mysqli->close();
                header('Location: base.php?page='.$header.'');
            } else {
                echo "Error: " . $query . "<br>" . $mysqli->error;
            }
        }
        else {
            $query = "INSERT INTO pages (`category`, `type`, `parent`, `html`) VALUES ('$header', 'Main', 'None', '$newHtml')";
            if ($mysqli->query($query) === TRUE) {
                $mysqli->close();
                header('Location: base.php?page='.$header.'');
            } else {
                echo "Error: " . $query . "<br>" . $mysqli->error;
            }
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
                <input type="text" class="header" name="header" value=<?php echo $existingHeader ?> required />
                <label>Text:</label>
                <textarea rows="4" cols="50" type="text" class="newText" name="newText" value=<?php echo $existingText ?> required></textarea>
                <input type="submit" value="Submit" />
            </form>
        </body>
    </html>
<?php } ?>