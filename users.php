<?php

$connection = new mysqli('localhost', 'root', 'password', 'users');

$search = $_GET['search'];
$search = $mysqli -> real_escape_string($search);

$query = "SELECT user_name FROM users WHERE user_name LIKE '%".$search."%'";
$result= $mysqli -> query($query);

while($row = $result -> fetch_object()){
    echo "<div id='link' onClick='addText(\"".$row -> user_name."\");'>" . $row -> user_name . "</div>";  
}


  ?>
