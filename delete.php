<?php
include 'dbconfig.php';
header("Access-Control-Allow-Origin: *");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $query = "DELETE FROM pages WHERE category = '{$page}'";

    if( $mysqli->query($query) === TRUE ){
        header("Location: admin.php");
        exit();
    }else{
        echo "Database Error: Unable to delete record.";
    }
    $mysqli->close();
}

?>
