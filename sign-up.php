<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Sign-up</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Admin Sign-up</h1>
        <form action= "./script/script.sign-up.php" method= "post">
            <input type="email" name="email" placeholder="Email...">
            <input type="text" name="fname" placeholder="First name...">
            <input type="text" name="lname" placeholder="Last name...">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="sign-up-submit">Sign-up</button>
        </form>
        <a href="./log-in.php">Log-in</a>
        <script src="" async defer></script>
    </body>
</html>

<?php

?>