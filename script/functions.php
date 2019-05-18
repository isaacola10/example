<?php

function authenticate(){
    if(!isset($_SESSION['username']))
    {
        header('Location:index.php');
    }
    else{

    }
}


?>
