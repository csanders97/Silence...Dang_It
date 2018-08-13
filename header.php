<?php
    include 'dbconfig.php';

    if (isset($_GET['theme'])) {
        $theme = $_GET['theme'];
    }
    else {
        $theme = 'theme1';
    }

    $getHeader = "select * from pages where parent = 'None'";
    $result = $mysqli->query( $getHeader );
    $num_results = $result->num_rows;
    if( $num_results > 0) {
        echo "<header><ul>";
            while( $row = $result->fetch_assoc() ) {
                extract($row);
                echo "<a href='base.php?page={$category}&theme={$theme}'><li>{$category}</li></a>";
            }
        echo "</ul><ul class='right'>";
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            echo "<a href='base.php?page={$page}&theme=theme1'><li>Theme 1</li></a>";
            echo "<a href='base.php?page={$page}&theme=theme2'><li>Theme 2</li></a>";
            echo "<a href='base.php?page={$page}&theme=theme3'><li>Theme 3</li></a>";
        }
        if ($_SESSION['authenticated'] === 'true') {
            echo "<a href='logout.php?theme={$theme}'><li>Logout</li></a>";
            if ($_SESSION['admin'] === 'true') {
                echo "<a href='admin.php'><li>Admin</li></a>";
            }
        }
        else {
            echo "<a href='login.php'><li>Login</li></a>";
        }
        echo "</ul>";
        echo "</header>";
        $result->free();
        $mysqli->close();
    }
?>