<?php
session_start();
require_once('script/functions.php');
authenticate();
?>

<?php

if(isset($_POST['submit'])){
  include('includes/connect.php');


  $eventID = $_SESSION['username'];
  $clubName = $_POST['clubName'];
  $eventName = $_POST['eventName'];
  $eventDate = $_POST['eventDate'];
  $eventTime = $_POST['eventTime'];
  $venue = $_POST['venue'];
  $gName = $_POST['gName'];
  $gStatus = $_POST['gStatus'];
  $gShip = $_POST['gShip'];
  $gRole = $_POST['gRole'];
  $gDate = $_POST['gDate'];
  $awareness = $_POST['awareness'];
  $standards = $_POST['standards'];
  $sponsName = $_POST['sponsName'];
  $presName = $_POST['presName'];







  $sql = "INSERT INTO events(

    eventID, clubName, title, dateAdded, eventTime, created, modified, venue, protApprov, CampApprov, stats, description, ticket, attractions

  )
   VALUES (

    '$eventID', '$clubName', '$eventName', '$eventDate', '$eventTime', now(), now(), '$venue', 'Processing', '', '', '', '', ''

  )";
}

    if (mysqli_query($con, $sql)) {

      echo "<script type = 'text/javascript'> alert('Record Added Successfully'); window.location = '#contact'; </script>";
      echo header("Location:user/events.php");

        } else {

                echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }






 ?>
