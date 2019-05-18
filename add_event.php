<?php
session_start();
require_once('script/functions.php');
authenticate();
?>

<?php

if(isset($_POST['new_event'])){
  include('includes/connect.php');


  $eventID = $_SESSION['username'];
  $clubName = $_POST['clubName'];
  $eventName = $_POST['eventName'];
  $eventDate = $_POST['eventDate'];
  $eventTime = $_POST['eventTime'];
  $venue = $_POST['venue'];
  $gName = $_POST['guestName'];
  $gStatus = $_POST['guestStatus'];
  $gShip = $_POST['relationship'];
  $gRole = $_POST['role'];
  $gDate = $_POST['dateApproved'];
  $awareness = $_POST['awareness'];
  $standards = $_POST['standards'];
  $sponsName = $_POST['sponsorsName'];
  $presName = $_POST['presidentsName'];

  $sql = mysqli_query($con, "SELECT id FROM eventload WHERE eventDate = $eventDate AND eventTime = '$eventTime' LIMIT 1");
  $dateMatch = mysqli_num_rows($sql); // count the output amount
    if ($dateMatch > 0) {
    echo 'Sorry You Cannot Have Two Events At The Same Venue At The Same Time on The Same Day, To Go Back <a href="account.php">click here</a>';
    exit();
  }


  $sql = "INSERT INTO eventload(

    eventID, clubName, eventName, eventDate, eventTime, venue, guestName, guestStatus, relationship, roles, dateApproved, awarenessL, standards, sponsorsName, presidentsName, protApprov, CampApprov, stats, description, ticket, attractions

  )
   VALUES (

    '$eventID', '$clubName', '$eventName', '$eventDate', '$eventTime', '$venue','$gName', '$gStatus', '$gShip', '$gRole', '$gDate', '$awareness', '$standards', '$sponsName', '$presName','processing', '', '', '', '', ''

  )";

  if (mysqli_query($con, $sql)){

  }
       else {

              echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }


}




 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Verify Details</title>
     <meta charset="utf-8">
     <title>Group 10 Project</title>
   	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   	<link rel="stylesheet" href="css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/animate.css">
   	<link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.theme.css">
   	<link rel="stylesheet" href="css/owl.carousel.css">
   	<link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css.css">
     <link rel="stylesheet" href="js/slide.css">
     <link type="text/css" rel="stylesheet" href="style.css"/>
     <link rel="stylesheet" href="css/font-awesome.min.css"/>
     <script src="js/jquery-1.10.2.min.js"></script>
     <script src="js/jquery.js"></script>
     <script src="jquery/jquery.min.js"></script>
     <script src="js/jquery-1.12.4.js"></script>
     <script src="js/jquery-ui.js"></script>
     <link rel="stylesheet" href="css/jquery-ui.css">
     <script src="js/jquery-1.12.4.js"></script>
     <script src="js/jquery-ui.js"></script>
     <link rel="stylesheet" href="css/jquery-ui.css">
   </head>

   <body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


     <div class="navbar navbar-fixed-top custom-navbar" role="navigation" style="background:rgb(0,66,130);">
         	<div class="container">

         		<!-- navbar header -->
         		<div class="navbar-header">
         			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         				<span class="icon icon-bar"></span>
         				<span class="icon icon-bar"></span>
         				<span class="icon icon-bar"></span>
         			</button>
               <div style="padding-top:10px;"><img src="images/babcock/logo1.png" width=70 height="70" style="padding-bottom:10px;"> <span><a href="#" style="color:white; font-size:25px;"> Online Event Management System</a></span></div>
         		</div>



         		<div class="collapse navbar-collapse" id = "slide_nav">

     			<ul class="nav navbar-nav navbar-right" style="padding-top: 8px;">

     		  <li><a href="#contact" class="smoothScroll" style="color:#FFF;">Add Event</a></li>

     		  <li><a href="#overviewb" class="smoothScroll" style="color:#FFF;">Manage Events</a></li>

               <li><a href="#register" class="smoothScroll" style="color:#FFF;">View Calendar</a></li>

               <li class="w3-hover">
         <a href="#" class="w3-text-white" onclick="myFunction()" style="font-size:10px;"> <img src="images/logo1.jpg" width = "34" height = "34" class="w3-spin  w3-circle"/> Welcome <?php echo $_SESSION['username']; ?> <i class="fa fa-caret-down"></i></a>
         <div id="Demo" class="w3-dropdown-content w3-card-4 w3-animate-bottom" style = "width:257px; padding:5px;">
           <span><?php include('script/header.php'); ?></span>
         </div>
       </li>

         			</ul>

         		</div>

         	</div>

         </div>


         <section id="contact" class="parallax-section" style="background:url('images/crop.png');">
         	<div class="container">
         		<div class="row">

         			<div class="wow fadeInUp col-md-10" data-wow-delay="0.9s">
         				<div class="contact_detail">
         					<div class="section-title">
         						<h2>Verify Details</h2>
                   </div>

 <?php
 if(isset($_POST['new_event'])){
 ?>

                       <form action="con_event.php" method="post">
                         <div class="row">
                             <div class="col-md-12 panel-info">
                             <div class="content-box-large box-with-header">
                                 <div>

                                   <div class="row">

                                     <div class="col-sm-12">
                                       <input name="clubName" type="text" class="form-control" id="email" placeholder="Club Name" value = "<?php echo $clubName; ?>">
                                     </div>
                                     </div>

                                   <hr>

                                 <div class="row">

                                   <div class="col-sm-6">
                                     <input name="eventName" type="text" class="form-control" id="email" placeholder="Event Name"  value = "<?php echo $eventName;?>">
                                   </div>
                                   <div class="col-sm-6">
                                     <input type="date" name="eventDate" class="form-control" id="email" title="Choose your desired date"  min="<?php echo date('Y-m-d'); ?>"  value = "<?php echo $eventDate;?>"/>
                                   </div>

                                 </div>

                                 <hr>
                                 <div class="row">

                                   <div class="col-sm-6">
                                     <input name="eventTime" type="time" class="form-control" id="email" placeholder="Event Time"  value = "<?php echo $eventTime;?>">
                                   </div>

                                   <div class="col-sm-6">
                                 <input name="venue" type="text" class="form-control" id="name" placeholder="Venue"  value = "<?php echo $venue;?>">
                                   </div>
                                   </div>
                   <hr>

                     <div class="row">

                     <div class="col-sm-6">
                     <input name="gName" type="text" class="form-control" id="name" placeholder="Guest Name"  value = "<?php echo $gName;?>">
                     </div>
                     <div class="col-sm-6">
                     <input name="gStatus" type="text" class="form-control" id="name" placeholder="Guest Status"  value = "<?php echo $gStatus;?>">
                     </div>
                   </div>

                   <hr>

                   <div class="row">

                   <div class="col-sm-6">
                   <input name="gShip" type="text" class="form-control" id="name" placeholder="Guest Relationship"  value = "<?php echo $gShip;?>">
                   </div>
                   <div class="col-sm-6">
                   <input name="gRole" type="text" class="form-control" id="name" placeholder="Guest Role"  value = "<?php echo $gRole;?>">
                   </div>
                 </div>

                 <hr>

                 <div class="row">

                   <div class="col-sm-12">
                     <input type="date" name="gDate" class="form-control" id="email" title="Choose Proposed Date"  min="<?php echo date('Y-m-d'); ?>"  value = "<?php echo $gDate;?>"/>
                   </div>
                   </div>

                   <hr>

                   <div class="row">

                     <div class="col-sm-12">
                   <input name="awareness" type="text" class="form-control" id="name" placeholder="Awareness Level"  value = "<?php echo $awareness;?>">
                     </div>
                     </div>

             <hr>

             <div class="row">

               <div class="col-sm-12">
             <input name="standards" type="text" class="form-control" id="name" placeholder="BU Standards"  value = "<?php echo $standards;?>">
               </div>
               </div>

             <hr>


                   <div class="row">

                   <div class="col-sm-6">
                   <input name="sponsName" type="text" class="form-control" id="name" placeholder="Sponsors Name"  value = "<?php echo $sponsName;?>">
                   </div>
                   <div class="col-sm-6">
                   <input name="presName" type="text" class="form-control" id="name" placeholder="Presidents Name"  value = "<?php echo $presName;?>">
                   </div>
                 </div>

               <?php } ?>

                 <hr>

                   <div class="col-md-6 col-sm-10">
                     <input name="submit" type="submit" class="form-control" id="submit" value="VERIFY">
                   </div>
                               </div>

                             </div>
                             </div>
                           </div>




                   </form>

     				</div>

     				<div class="wow fadeInUp col-md-7" data-wow-delay="1.0s">
         				<div class="section-title" style="margin-left:200px;">
         					<h2 style="color:white"></h2>
         					<p style="color:white"></p>
         				</div>
         			</div>

         		</div>
         	</div>
     	</section>






   </body>
 </html>
