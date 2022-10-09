<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "capstone";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

If(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}