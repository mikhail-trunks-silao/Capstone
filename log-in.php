<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Log-in</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Admin Log-in</h1>
        <form action= "./script/script.log-in.php" method= "post">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="log-in-submit">Log-in</button>
        </form>
        <script src="" async defer></script>
    </body>
</html>
