<?php
    header("Access-Control-Allow-Origin: *");

    include 'dbconfig.php';

    $page = $_GET['page'];

    $getContent = "select * from pages where category = '$page'";
    $result = $mysqli->query( $getContent );
    $num_results = $result->num_rows;
    if( $num_results > 0) {
        while( $row = $result->fetch_assoc() ) {
            extract($row);
            echo "<div>{$html}</div>";
        }
        $result->free();
        $mysqli->close();
    }
?>