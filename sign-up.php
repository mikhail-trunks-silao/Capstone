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
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<p>Fill in all fields!</p>';
                }
                else if($_GET['error'] == "invalidemailfname"){
                    echo '<p>Invalid email and first name!</p>';
                }
                else if($_GET['error'] == "invalidemail"){
                    echo '<p>Invalid email!</p>';
                }
                else if($_GET['error'] == "invalidfname"){
                    echo '<p>Invalid first name!</p>';
                }
                else if($_GET['error'] == "invalidlname"){
                    echo '<p>Invalid last name!</p>';
                }
                else if($_GET['error'] == "emailtaken"){
                    echo '<p>Email is already taken!</p>';
                }
            } else if(isset($_GET['signup'])){
                if($_GET['signup'] == "success"){
                    echo '<p>Sign-up successful!</p>';
                }
            }
            
        ?>
        <ul>
            <form action= "./script/script.sign-up.php" method= "post">
                <li><input type="email" name="email" placeholder="Email..."></li>
                <li><input type="text" name="fname" placeholder="First name..."></li>
                <li><input type="text" name="lname" placeholder="Last name..."></li>
                <li><input type="password" name="password" placeholder="Password"></li>
                <li><button type="submit" name="sign-up-submit">Sign-up</button></li>
            </form>
        </ul>
        <a href="./log-in.php">Log-in</a>
        <script src="" async defer></script>
    </body>
</html>

<?php

?>