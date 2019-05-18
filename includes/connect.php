<?php
$host = "localhost";
$user = "root";
$password = "mata4life";
$database = "eventSystem";
$con = mysqli_connect($host,$user,$password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
