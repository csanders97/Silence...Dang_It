<?php
    header("Access-Control-Allow-Origin: *");

    include 'dbconfig.php';

    $username = null;
    $password = null;
    $anotherPass = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $anotherPass = $_POST["re-password"];

        if( $password === $anotherPass ) {
            $query = "select * from users where username = '$username' and password = '$password'";
            $result = $mysqli->query( $query );
            $num_results = $result->num_rows;
            if ( $num_results === 0) {
                $sql = "INSERT INTO users (username, password, email, level) VALUES ('$username', '$password', '$email', 'Default')";
                if ($mysqli->query($sql) === TRUE) {
                    $result->free();
                    $mysqli->close();
                    header('Location: login.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
            }
        }
        else {
            header('Location: register.php');
        }

    } else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CMS - Register</title>
    </head>
    <body>
        <div id="page">
            <header id="banner">
                <hgroup>
                    <h1>Register</h1>
                </hgroup>
            </header>
            <section id="content">
                <form id="register" method="post">
                    <label for="username">Username:</label>
                    <input id="username" name="username" type="text" required>
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="text" required>
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" required>
                    <label for="re-password">Re-Enter Password:</label>
                    <input id="re-password" name="re-password" type="password" required>
                    <br />
                    <input type="submit" value="Register">
                </form>
            </section>
            <footer>
                <summary>Copyright 2018 &emsp; || &emsp; Silence... Dang It&trade;. All Rights Reserved.</summary>
            </footer>
        </div>
    </body>
</html>
<?php } ?>