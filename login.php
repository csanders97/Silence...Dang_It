<?php
    header("Access-Control-Allow-Origin: *");

    include 'dbconfig.php';

    $username = null;
    $password = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "select * from users where username = '$username' and password = '$password'";
        $result = $mysqli->query( $query );
        $num_results = $result->num_rows;
        if( $num_results > 0) {
            $row = $result->fetch_assoc();
            extract($row);
            if ($level === 'Admin') {
                session_start();
                $_SESSION["authenticated"] = 'true';
                $result->free();
                $mysqli->close();
                header('Location: admin.php');
            }
            else {
                header('Location: login.php');
            }
        }
        else {
            header('Location: login.php');
        }

    } else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CMS - Login</title>
    </head>
    <body>
        <div id="page">
            <header id="banner">
                <hgroup>
                    <h1>Login</h1>
                </hgroup>
            </header>
            <section id="content">
                <form id="login" method="post">
                    <label for="username">Username:</label>
                    <input id="username" name="username" type="text" required>
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" required>
                    <br />
                    <input type="submit" value="Login">
                </form>
                <a href="register">Register</a>
            </section>
            <footer>
                <summary>Copyright 2018 &emsp; || &emsp; Silence... Dang It&trade;. All Rights Reserved.</summary>
            </footer>
        </div>
    </body>
</html>
<?php } ?>