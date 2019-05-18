<?php
session_start();
require_once('script/functions.php');
authenticate();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Account</title>
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

<?php include_once('functions.php'); ?>

  <body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

    <div class="preloader">

    	<div class="sk-rotating-plane"></div>

    </div>

    <section id="intro" class="parallax-section">
    	<div class="container">
    		<div class="row">

    			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s" style="float:right;">
    				<h3>Welcome to Babcock University Online Event Management System. On this platform, we'll help manage your events and programmes.</h3>
    				<p>All you need to do is to create your account with us and you'll be able to make bookings for your different events that you have planned in the school.</p>
    				<p>Also, You can view already approved events and you'll be able to choose which you'll be interested in attending. Don't forget, your programme or event has to be approved first before it can be made open to the school.</p>
    			</div>

    			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
    			</div>

    		</div>
    	</div>
    </section>


<div class="navbar navbar-fixed-top custom-navbar" role="navigation" style="background:rgb(0,66,130);">
    	<div class="container">

    		<!-- navbar header -->
    		<div class="navbar-header">
    			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    				<span class="icon icon-bar"></span>
    				<span class="icon icon-bar"></span>
    				<span class="icon icon-bar"></span>
    			</button>
          <div style="padding-top:10px;"><img src="images/babcock/logo1.png" width=70 height="70" style="padding-bottom:10px;"> <span><a href="#" style="color:white; font-size:25px;">Social Activities Management System</a></span></div>
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

    <section  id="overview" class="parallax-section" style="margin-bottom:40px;">
    	<div class="container">
    		<div class="row">

    			<div class="col-md-12 col-sm-12">

    				<h2 class="wow bounceIn" data-wow-delay="0.9s"><?php echo "Today is " . date("D, d  M , Y"). " " . date("h:i:sa") ; ?></h2>
    				<br>
    				<h3 class="wow fadeInUp" data-wow-delay="1.0s">
    					<?php


    			include 'includes/connect.php';
    			$eventListHTML = '';
    			$eventVenue = '';
    			$date = date("Y-m-d");
    			//Get events based on the current date
    			$result = $con->query("SELECT title, venue FROM events WHERE dateAdded = '".$date."' AND stats = 'Approved'");
    			if($result->num_rows > 0){
    				$eventListHTML = '<h2>Todays Event is </h2>';
    				$eventListHTML .= '<ul>';
    				while($row = $result->fetch_assoc()){
    					$eventListHTML .= '<li>'.$row['title'].'----------'.$eventVenue = '<b>VENUE: </b>'.$row['venue'].'</li>';

    				}
    				$eventListHTML .= '</ul>';
    			}
    			else{
    				echo "There Are No Events Today";
    			}
    			echo "<center>";
    			echo "<div>";
    			echo "<span>".$eventListHTML."</span>";
    			echo "</div>";
    			echo "</center>";

    					?>
    				</h3>




    				<a href="#detail" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="2.0s">LEARN MORE</a>
    				<a href="#register" class="btn btn-lg btn-danger smoothScroll wow fadeInUp" data-wow-delay="2.0s" style="background:rgb(0,66,130)">REGISTER NOW</a>
    			</div>

    		</div>
    						<center class="btn btn-default" data-wow-delay="" style="float:right; margin-bottom:30px;">
    						<span class = "smoothScroll wow fadeInUp" data-wow-delay="2.5s">VIEW UPCOMING EVENTS HERE</span>
    							<div id = "later" style="color:black;width:500px;height:px;margin:10px;padding:10px;">

    								<?php
    								include('includes/connect.php');

    								$date = date('y-m-d');

    								$sql = "SELECT id, title, dateAdded, eventTime, venue FROM events WHERE dateAdded > '".$date."' AND stats = 'Approved'  ORDER BY id DESC LIMIT 5";
    								$result = mysqli_query($con, $sql);
    								if (!$result) {
    								    printf("Error: %s\n", mysqli_error($con));
    								    exit();
    								  }
    								 ?>
    								 <div class="module">
    								  <div class="module-body table">
    								  <table class="table table-bordered datatable-1 table table-bordered table-striped	 display">
    								  <thead>

    								    <tr>
    								      <th style="text-align:center;">S/N</th>
    								      <th style="text-align:center;">Title</th>
    								      <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Time</th>
    								      <th style="text-align:center;">Venue</th>
    								    </tr>
    								  </thead>
    								  <tbody>
    										<?php

    										$count = 1;

    										while($row=mysqli_fetch_array($result))
    										{
    										?>


    																				<tr>
    										                     <td><?php echo $count;?></td>
    										                     <td><?php echo htmlentities($row['title']);?></td>
    										                     <td><?php echo htmlentities($row['dateAdded']);?></td>
                                             <td><?php echo htmlentities($row['eventTime']);?></td>
    										                     <td><?php echo htmlentities($row['venue']);?></td>
    																				</tr>

    																				<?php  $count = $count + 1; }    ?>
    									</tbody>
    								</table>
    								</div>
    							</div>

    								<div>

    							</center>
    	</div>
    </section>



    <section id="detail" class="parallax-section">
    	<div class="container">
    		<div class="row">

    			<div class="wow fadeInLeft col-md-4 col-sm-4" data-wow-delay="0.3s">
    				<i class="fa fa-group"></i>
    				<h3>Student Events</h3>
    				<p>All event on-campus done within and outside the school and are managed by the students with the help of some lecturers to make that event one to remember.</p>
    			</div>

    			<div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
    				<i class="fa fa-envelope"></i>
    				<h3>Current Programs</h3>
    				<p>On this platform, you'll get to know the currrent events going round campus and the various times that they will be done, so you dont feel left out of any.</p>
    			</div>

    			<div class="wow fadeInRight col-md-4 col-sm-4" data-wow-delay="0.9s">
    				<i class="fa fa-clock-o"></i>
    				<h3>Open Dates</h3>
    				<p>To avoid your event date clashing with other events, and venues being occupied, you'll get to know the various times and venues that they will be done so you don't have any issues.</p>
    			</div>

    		</div>
    	</div>
    </section>

    <section id="contact" class="parallax-section" style="background:url('images/babcock/fresh.jpg');">
    	<div class="container">
    		<div class="row">

    			<div class="wow fadeInUp col-md-10" data-wow-delay="0.9s">
    				<div class="contact_detail">
    					<div class="section-title">
    						<h2>New Event</h2>
                <h4>Select Event Type</h4>
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Special Guest Invitation</a></li>
                  <li><a data-toggle="tab" href="#menu1">Music Auditing</a></li>
                  <li><a data-toggle="tab" href="#menu2">Drama Auditing</a></li>
                </ul>
    					</div>

              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">

                  <form action="add_event.php" method="post">
                    <div class="row">
                        <div class="col-md-12 panel-info">
                        <div class="content-box-large box-with-header">
                            <div>

                              <div class="row">

                                <div class="col-sm-12">
                                  <input name="clubName" type="text" class="form-control" id="email" placeholder="Club Name">
                                </div>
                                </div>

                              <hr>

                            <div class="row">

                              <div class="col-sm-6">
                                <input name="eventName" type="text" class="form-control" id="email" placeholder="Event Name">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="eventDate" class="form-control" id="email" title="Choose your desired date"  min="<?php echo date('Y-m-d'); ?>"/>
                              </div>

                            </div>

                            <hr>
                            <div class="row">

                              <div class="col-sm-6">
                                <input name="eventTime" type="time" class="form-control" id="email" placeholder="Event Time">
                              </div>
                              <div class="col-sm-6" style="margin-top:10px;">
                                <select class="form-control" name="venue" id="name">
                                  <option value="" disabled>SELECT VENUE</option>
                                  <?php $sql = "SELECT venue FROM venues";
                                      $result = mysqli_query($con, $sql);
                                  if (mysqli_num_rows($result) > 0) {


                                        while($row = mysqli_fetch_assoc($result))
                                   {
                                    ?>
                                    <option value="<?php echo htmlentities($row['venue']);?>"><?php echo htmlentities($row['venue']);?></option>
                                  <?php
                                  }}
                                  else{
                                      echo "0 results";
                                  }
                                  ?>
                                </select>
                              </div>




                            </div>
              <hr>

              <div class="row">

                <div class="col-sm-12">
                  <select class="form-control" name="info" id="name">
                    <option value="">Proposed Guest</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>

              </div>
              <hr>

              <div class="Yes approve">

                <div class="row">

                <div class="col-sm-6">
                <input name="gName" type="text" class="form-control" id="name" placeholder="Guest Name">
                </div>
                <div class="col-sm-6">
                <input name="gStatus" type="text" class="form-control" id="name" placeholder="Guest Status">
                </div>
              </div>

              <hr>

              <div class="row">

              <div class="col-sm-6">
              <input name="gShip" type="text" class="form-control" id="name" placeholder="Guest Relationship">
              </div>
              <div class="col-sm-6">
              <input name="gRole" type="text" class="form-control" id="name" placeholder="Guest Role">
              </div>
            </div>

            <hr>

            <div class="row">

              <div class="col-sm-12">
                <input type="date" name="gDate" class="form-control" id="email" title="Choose Proposed Date"  min="<?php echo date('Y-m-d'); ?>"/>
              </div>
              </div>

              <hr>

          <div class="row">

          <div class="col-sm-12">
          <select class="form-control" name="awareness" id="name">
            <option value="">Level of Would-be Guest Awareness of BU's Philosophy and Standards </option>
            <option value="High">High</option>
            <option value="Average">Average</option>
            <option value="Low">Low</option>
          </select>
          </div>
        </div>

        <hr>

          <div class="row">
          <div class="col-sm-12">
          <select class="form-control" name="standards" id="name">
            <option value="">Do You Undertake to Communicate to the Intended Guest Necessary Information Concerning BU's Philosophy and Standard?</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            </select>
          </div>
        </div>

        <hr>
              </div>

              <div class="row">

              <div class="col-sm-6">
              <input name="sponsName" type="text" class="form-control" id="name" placeholder="Sponsors Name">
              </div>
              <div class="col-sm-6">
              <input name="presName" type="text" class="form-control" id="name" placeholder="Presidents Name">
              </div>
            </div>

            <hr>

              <div class="col-md-6 col-sm-10">
                <input name="submit" type="submit" class="form-control" id="submit" value="SEND">
              </div>
                          </div>

                        </div>
                        </div>
                      </div>
              </form>


                </div>


                <div id="menu1" class="tab-pane fade">

                  <form action="audit/musicaudit.php" method="post">
                        <div class="row">
                            <div class="col-md-12 panel-info">
                            <div class="content-box-large box-with-header">
                                <div>

                                  <div class="row">

                                    <div class="col-sm-6">
                                      <input name="title" type="text" class="form-control" id="email" placeholder="Music Title">
                                    </div>

                                    <div class="col-sm-6">
                                      <input name="length" type="text" class="form-control" id="email" placeholder="Music Length (in mins)">
                                    </div>
                                    </div>

                                  <hr>

                                <div class="row">

                                  <div class="col-sm-4">
                                    <input type="date" name="dateAdded" class="form-control" id="email" title="Choose Proposed Date"  min="<?php echo date('Y-m-d'); ?>"/>
                                  </div>

                                  <div class="col-sm-4"  style="padding-top:12px;">
                                    <select class="form-control" name="venue" id="name">
                                      <option value="" disabled>SELECT VENUE</option>
                                      <?php $sql = "SELECT venue FROM venues";
                                          $result = mysqli_query($con, $sql);
                                      if (mysqli_num_rows($result) > 0) {


                                            while($row = mysqli_fetch_assoc($result))
                                       {
                                        ?>
                                        <option value="<?php echo htmlentities($row['venue']);?>"><?php echo htmlentities($row['venue']);?></option>
                                      <?php
                                      }}
                                      else{
                                          echo "0 results";
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="col-sm-4">
                                    <input name="auditTime" type="time" class="form-control" id="email" placeholder="Time">
                                  </div>

                                </div>

                                <hr>
                                <div class="row">

                              <div class="col-sm-12">

                                    <input name="genre" type="text" class="form-control" id="email" placeholder="Genre">

                              </div>


                                </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="summary" rows="5" class="form-control" id="message" placeholder="Narrative Summary of Music"></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="sdimensions" rows="5" class="form-control" id="message" placeholder="Social Dimensions (How Does the Music Appeal to the Human Mind)"></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="cdimensions" rows="5" class="form-control" id="message" placeholder="Cognitive Dimensions (How Does it Enhance the Moral Spiritual Life of Students)"></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="fcomment" rows="5" class="form-control" id="message" placeholder="Other Comments..."></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <input name="artist" type="text" class="form-control" id="email" placeholder="Who are the Artist, What do they Represent?">
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="scomment" rows="5" class="form-control" id="message" placeholder="Other Comments..."></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="col-md-6 col-sm-10">
                    <input name="submit" type="submit" class="form-control" id="submit" value="SUBMIT">
                  </div>
                              </div>

                            </div>
                            </div>
                          </div>
                  </form>


                </div>



                <div id="menu2" class="tab-pane fade">

                  <form action="audit/dramaaudit.php" method="post">
                        <div class="row">
                            <div class="col-md-12 panel-info">
                            <div class="content-box-large box-with-header">
                                <div>

                                  <div class="row">

                                    <div class="col-sm-6">
                                      <input name="title" type="text" class="form-control" id="email" placeholder="Drama Title">
                                    </div>

                                    <div class="col-sm-6">
                                      <input name="length" type="text" class="form-control" id="email" placeholder="Drama Length">
                                    </div>
                                    </div>

                                  <hr>

                                <div class="row">

                                  <div class="col-sm-4">
                                    <input type="date" name="dateAdded" class="form-control" id="email" title="Choose Proposed Date"  min="<?php echo date('Y-m-d'); ?>"/>
                                  </div>

                                  <div class="col-sm-4"  style="padding-top:12px;">
                                    <select class="form-control" name="venue" id="name">
                                      <option value="" disabled>SELECT VENUE</option>
                                      <?php $sql = "SELECT venue FROM venues";
                                          $result = mysqli_query($con, $sql);
                                      if (mysqli_num_rows($result) > 0) {


                                            while($row = mysqli_fetch_assoc($result))
                                       {
                                        ?>
                                        <option value="<?php echo htmlentities($row['venue']);?>"><?php echo htmlentities($row['venue']);?></option>
                                      <?php
                                      }}
                                      else{
                                          echo "0 results";
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="col-sm-4">
                                    <input name="auditTime" type="time" class="form-control" id="email" placeholder="Time">
                                  </div>

                                </div>

                                <hr>
                                <div class="row">

                              <div class="col-sm-12">

                                    <input name="genre" type="text" class="form-control" id="email" placeholder="Drama Genre (Christian or Secular)">

                              </div>


                                </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="summary" rows="5" class="form-control" id="message" placeholder="Narrative Summary of Drama"></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="sdimensions" rows="5" class="form-control" id="message" placeholder="Social Dimensions (How Does the Drama Appeal to the Human Mind)"></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="cdimensions" rows="5" class="form-control" id="message" placeholder="Cognitive Dimensions (How Does it Enhance the Moral Spiritual Life of Students)"></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="fcomment" rows="5" class="form-control" id="message" placeholder="Other Comments..."></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <input name="artist" type="text" class="form-control" id="email" placeholder="Who are the Artist, What do they Represent?">
                    </div>


                  </div>
                  <hr>

                  <div class="row">

                    <div class="col-sm-12">
                      <textarea name="scomment" rows="5" class="form-control" id="message" placeholder="Other Comments..."></textarea>
                    </div>


                  </div>
                  <hr>

                  <div class="col-md-6 col-sm-10">
                    <input name="submit" type="submit" class="form-control" id="submit" value="SUBMIT">
                  </div>
                              </div>

                            </div>
                            </div>
                          </div>
                  </form>


                </div>


              </div>











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

	<section id="overviewb" class="parallax-section" style="background:url('images/img_61');">
    	<div class="container">
    		<div class="row">

<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
    				<div class="section-title">
    					<h2 style="color:white;">Events</h2>
    					<p style="color:white;">Know if your event have been approved...</p>
    				</div>




    			</div>
          <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#first" style="color:white;">Special Guest Invitation</a></li>
            <li><a data-toggle="tab" href="#second" style="color:white;">Music Auditing</a></li>
            <li><a data-toggle="tab" href="#third" style="color:white;">Drama Auditing</a></li>
          </ul>



<div id="first" class="tab-pane fade">
<?php
include('includes/connect.php');

$sql = "SELECT id, title, dateAdded, eventTime, venue, stats FROM events WHERE eventID = '".$_SESSION['username']."' ORDER BY id DESC LIMIT 5";
$result = mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  }
 ?>

<div class="module">
 <div class="module-body table">
 <table class="table table-bordered datatable-1 table table-bordered table-striped	 display">
 <thead>

   <tr>
     <th style="text-align:center;">S/N</th>
     <th style="text-align:center;">Title</th>
     <th style="text-align:center;">Date</th>
     <th style="text-align:center;">Time</th>
     <th style="text-align:center;">Venue</th>
     <th style="text-align:center;">Status</th>
   </tr>
 </thead>
 <tbody>
<?php

$count = 1;

while($row=mysqli_fetch_array($result))
{
?>


										<tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo htmlentities($row['title']);?></td>
                                            <td><?php echo htmlentities($row['dateAdded']);?></td>
                                            <td><?php echo htmlentities($row['eventTime']);?></td>
                                            <td><?php echo htmlentities($row['venue']);?></td>

											<td><center>
                                                <?php
                                                if($row['stats'] == 'Unapproved'){
                                                ?>

                                                <button type="button" class="btn btn-danger">Unapproved</button>
                                            <?php }

                                            else if($row['stats'] == ' '){
                                                ?>
                                            <button type="button" class="btn btn-primary">Pending</button>
                                            <?php }
                                            else if($row['stats']=='Approved'){
                                                ?>
                                             <button type="button" class="btn btn-success">Approved</button>
                                             <?php }
                                             ?>
                                           </center>
                                            </td>
											</tr>

										<?php  $count = $count + 1; }    ?>
	 </tbody></table>

</div>


</div>

</div>

<div id="second" class="tab-pane fade">
<?php
include('includes/connect.php');

$sql = "SELECT id, title, length, dateAdded, venue, auditTime, artist FROM musicaudit WHERE eventID = '".$_SESSION['username']."' ORDER BY id DESC LIMIT 5";
$result = mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  }
 ?>

<div class="module">
 <div class="module-body table">
 <table class="table table-bordered datatable-1 table table-bordered table-striped	 display">
 <thead>

   <tr>
     <th style="text-align:center;">S/N</th>
     <th style="text-align:center;">Music Title</th>
     <th style="text-align:center;">Length (in mins)</th>
     <th style="text-align:center;">Date</th>
     <th style="text-align:center;">Venue</th>
     <th style="text-align:center;">Time</th>
     <th style="text-align:center;">Artist</th>
   </tr>
 </thead>
 <tbody>
<?php

$count = 1;

while($row=mysqli_fetch_array($result))
{
?>


										<tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo htmlentities($row['title']);?></td>
                                            <td><?php echo htmlentities($row['length']);?></td>
                                            <td><?php echo htmlentities($row['dateAdded']);?></td>
                                            <td><?php echo htmlentities($row['venue']);?></td>
                                            <td><?php echo htmlentities($row['auditTime']);?></td>
                                            <td><?php echo htmlentities($row['artist']);?></td>


											</tr>

										<?php  $count = $count + 1; }    ?>
	 </tbody></table>

</div>


</div>

</div>

<div id="third" class="tab-pane fade">
<?php
include('includes/connect.php');

$sql = "SELECT id, title, length, dateAdded, venue, auditTime, artist FROM dramaaudit WHERE eventID = '".$_SESSION['username']."' ORDER BY id DESC LIMIT 5";
$result = mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  }
 ?>

<div class="module">
 <div class="module-body table">
 <table class="table table-bordered datatable-1 table table-bordered table-striped	 display">
 <thead>

   <tr>
     <th style="text-align:center;">S/N</th>
     <th style="text-align:center;">Drama Title</th>
     <th style="text-align:center;">Length (in mins)</th>
     <th style="text-align:center;">Date</th>
     <th style="text-align:center;">Venue</th>
     <th style="text-align:center;">Time</th>
     <th style="text-align:center;">Artist</th>
   </tr>
 </thead>
 <tbody>
<?php

$count = 1;

while($row=mysqli_fetch_array($result))
{
?>


										<tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo htmlentities($row['title']);?></td>
                                            <td><?php echo htmlentities($row['length']);?></td>
                                            <td><?php echo htmlentities($row['dateAdded']);?></td>
                                            <td><?php echo htmlentities($row['venue']);?></td>
                                            <td><?php echo htmlentities($row['auditTime']);?></td>
                                            <td><?php echo htmlentities($row['artist']);?></td>


											</tr>

										<?php  $count = $count + 1; }    ?>
	 </tbody></table>

</div>


</div>

</div>

        </div>

    		</div>
    	</div>
    </section>

    <section id="register" class="parallax-section">
    	<div class="container">
    		<div class="row">

          <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
    				<div class="section-title">
    					<h2>Event Calendar</h2>
    					<p style="color:white">Know The Different Events That are Happening Round Campus...</p>
    				</div>
    			</div>

          <div id="calendar_div" style="margin-top:90px;">
      <?php echo getCalender(); ?>
      </div>

    		</div>
    	</div>
    </section>


    <?php
    include("script/footer.php");
    ?>

    <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.parallax.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
function myFunction() {
    document.getElementById("Demo").classList.toggle("w3-show");
}
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
            $("." + optionValue).show();
            } else{
                $(".Yes").hide();
            }
        });
    }).change();
});
</script>



  </body>

</html>
