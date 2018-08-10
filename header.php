<?php
    header("Access-Control-Allow-Origin: *");

    include 'dbconfig.php';

    $getHeader = "select * from pages where parent = 'None'";
    $result = $mysqli->query( $getHeader );
    $num_results = $result->num_rows;
    if( $num_results > 0) {
        echo "<header>";
            while( $row = $result->fetch_assoc() ) {
                extract($row);
                echo "<div><a href='base.php?page={$category}'>{$category}</a></div>";
            }
            // if ($_SESSION["authenticated"]) {
            //     echo "<div><a href='logout.php'>Logout</a></div>";
            // }
            // else if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
            //     echo "<div><a href='login.php'>Admin Login</a></div>";
            // }
        echo "</header>";
        $result->free();
        $mysqli->close();
    }
?>