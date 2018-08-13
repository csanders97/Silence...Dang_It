<?php
    session_start();
    include 'dbconfig.php';

    $header = null;
    $section = null;
    $pageVariable = null;
    $parentVariable = null;

    $existingHeader = "";
    $existingText = "";

    if(isset($_GET['page'])) {
        $pageVariable = $_GET['page'];
        $page = $_GET['page'];
        $sql = "select * from pages where category = '$page'";
        $result = $mysqli->query( $sql );
        $num_results = $result->num_rows;
        if ( $num_results > 0) {
            $row = $result->fetch_assoc();
            extract($row);
            $existingHeader = $category;
            if (preg_match('/(<p>)(.*)(<\/p>)/', $html, $regs)) {
                $existingText = $regs[2];
            } else {
                $existingText = "";
            }
        }
    } else if (isset($_GET['parent'])) {
        $parentVariable = $_GET['parent'];
    }

    if ($_SESSION['admin'] === 'false') {
        header('Location: base.php?page=Home');
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $header = $_POST["header"];
            $section = $_POST["newText"];

            $newHtml = "<section class=".$header."><h1>".$header.'</h1><hr/><p>'.$section.'</p></section>';
            if ($_POST['pageVar'] != '/') {
                $page = $_POST['pageVar'];
                $query = "UPDATE pages SET category = '$header', html = '$newHtml' WHERE category = '$page'";
                if ($mysqli->query($query) === TRUE) {
                    if ($mysqli->query("SELECT * FROM pages WHERE category='$page'")) {
                        $newResult = $mysqli->query("SELECT * FROM pages WHERE category='$page'");
                        $new_num = $newResult->num_rows;
                        if ($new_num > 0) {
                            while( $row = $newResult->fetch_assoc() ) {
                                extract($row);
                                if ($parent === 'None') {
                                    header('Location: base.php?page='.$header.'');
                                } else {
                                    header('Location: base.php?page='.$parent.'');
                                }
                            }
                            $mysqli->close();
                        }
                    }
                } else {
                    echo "Error: ".$query."<br>".$mysqli->error;
                }
            } else if ($_POST['parentVar'] != '/') {
                //echo $POST['parentVar'];
                $parent = $_POST['parentVar'];
                $query = "INSERT INTO pages (`category`, `type`, `parent`, `html`) VALUES ('$header', 'Sub', '$parent', '$newHtml')";
                if ($mysqli->query($query) === TRUE) {
                    header('Location: base.php?page='.$parent.'');
                    $mysqli->close();
                } else {
                    echo "Error: " . $query . "<br>" . $mysqli->error;
                }
            } else {
                $query = "INSERT INTO pages (`category`, `type`, `parent`, `html`) VALUES ('$header', 'Main', 'None', '$newHtml')";
                if ($mysqli->query($query) === TRUE) {
                    header('Location: base.php?page='.$header.'');
                    $mysqli->close();
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
            <link rel="stylesheet" type="text/css" href="theme1.css"/>
            <title>CMS - SILENCE</title>
        </head>
        <body>
            <?php include 'header.php' ?>
            <form action="edit" method="POST">
                <label>Header:</label>
                <input type="text" class="header" name="header" value="<?php echo $existingHeader ?>" required /><br />
                <label>Text:</label>
                <textarea rows="4" cols="50" type="text" class="newText" name="newText"><?php echo $existingText ?></textarea><br />
                <input class="submit" type="submit" value="Submit" />
            </form>
            <footer>
                <summary>Copyright 2018 &emsp; || &emsp; Silence... Dang It&trade;. All Rights Reserved.</summary>
            </footer>
        </body>
    </html>
<?php } 
} ?>