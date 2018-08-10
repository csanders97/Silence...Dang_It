<?php
    session_start();
    header("Access-Control-Allow-Origin: *");

    include 'dbconfig.php';

    $getHeader = "select * from pages where parent = 'None'";
    $result = $mysqli->query( $getHeader );
    $num_results = $result->num_rows;
    if( $num_results > 0) {
        echo "<header><ul>";
            while( $row = $result->fetch_assoc() ) {
                extract($row);
                echo "<a href='base.php?page={$category}'><li>{$category}</li></a>";
            }
        echo "</ul><ul class='right'>";
        echo "<a href='base.php?page={$category}&theme=theme1'><li>Theme 1</li></a>";
        echo "<a href='base.php?page={$category}&theme=theme2'><li>Theme 2</li></a>";
        echo "<a href='base.php?page={$category}&theme=theme3'><li>Theme 3</li></a>";
        if ($_SESSION['admin'] === 'true') {
            echo "<a href='logout.php'><li>Logout</li></a>";
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