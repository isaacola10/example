<?php
include('includes/connect.php');

if(isset($_POST['submit'])){

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$username = $_POST['username'];
$number = $_POST['phone'];
$pword  = md5($_POST['password']);
$conpword  = md5($_POST['con_password']);
$email  = $_POST['email'];
$department  = $_POST['dept'];
$errorMessage = "";

if($fname == '' && $lname == '' && $number == ''){
echo "<script type = 'text/javascript'> alert('Please Fill in all Fields'); window.location = '#register'; </script>";
$errorMessage = "<button type='button' class='btn btn-danger'>Please Fill in all Fields</button>";
}

else{

	if (!preg_match("/^[a-zA-Z ]*$/",$fname) && !preg_match("/^[a-zA-Z ]*$/",$lname)) {
echo "<script type = 'text/javascript'> alert('Only Whitespace and Letters Allowed'); window.location = '#register'; </script>";
$errorMessage = "<button type='button' class='btn btn-danger'>Only Whitespace and Letters Allowed</button>";
	  }

	  else{
		  if(!preg_match("/^(?=.*[A-Za-z])[0-9a-zA-Z_]{5,11}$/", $username)){
			echo "<script type = 'text/javascript'> alert('Username Must Be More Than 5 Characters and Contain Numbers'); window.location = '#register'; </script>";
			$errorMessage = "<button type='button' class='btn btn-danger'>Username Must Be More Than 5 Characters and Contain Numbers</button>";
		  }
		  else{
			if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,32}$/', $pword) && !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,32}$/', $conpword)){
				echo "<script type = 'text/javascript'> alert('Your Password Must Be 9 Characters Long'); window.location = '#register'; </script>";
				$errorMessage = "<button type='button' class='btn btn-danger'>Your Password Must Be More Than 8 Characters</button>";

			}
			else{
				$sql = "INSERT INTO registert (firstname, lastname, username, phone, password, email, dept) VALUES ('$fname', '$lname', '$username', '$number', '$pword', '$email', '$department')";

				if (mysqli_query($con, $sql)) {
				echo "<script type = 'text/javascript'> alert('Record Added Successfully'); </script>";

		$errorMessage = "<button type='button' class='btn btn-success'>Record Added Successfully</button>";


					}

					 else {
								$errorMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
				}

			}
		  }

	  }



}

}

if(isset($_POST['send'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$sql = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";

		if (mysqli_query($con, $sql)) {
header('Location:#contact');
$errorMessage = "<button type='button' class='btn btn-success'>Feedback Sent Successfully</button>";

			} else {
						$errorMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
		}


}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Group 10 Project</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>

<!--...................................................................................................................................-->

<div class="navbar navbar-fixed-top custom-navbar" role="navigation" style="background:rgb(0,66,130);">
	<div class="wrap">

		<!-- navbar header -->
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<div style="padding-top:10px;"><img src="images/babcock/logo1.png" width=70 height="70" style="padding-bottom:10px;"> <span><a href="#" style="color:white; font-size:20px;">Social Activities Management System</a></span></div>
		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right" style="padding-top: 8px;">
				<li><a href="#intro" class="smoothScroll" style="color:white;">Intro</a></li>
				<li><a href="#overview" class="smoothScroll" style="color:white;">Overview</a></li>
				<li><a href="#register" class="smoothScroll" style="color:white;">Register</a></li>
				<li><a href="user/login.php" class="smoothScroll" style="color:white;">Login</a></li>
				<li><a href="#contact" class="smoothScroll" style="color:white;">Contact</a></li>
				</ul>

		</div>



	</div>
</div>

<!--...................................................................................................................................-->

<!--...................................................................................................................................-->

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

<!--...................................................................................................................................-->


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
				<i class="fa fa-search"></i>
				<h3>Search For Events</h3>
				<p><form action="result.php" method="POST" >
					<input type="text" name="name" class="form-control" size="20" placeholder="Find Events Here..."> <br>
					<input type="submit" class="btn btn-lg btn-primary btn-sm" id="submit" name="submit" value="Search">
					</form></p>
			</div>

		</div>
	</div>
</section>

<!--...................................................................................................................................-->



<!--...................................................................................................................................-->

<section id="register" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="0.6s">
				<h2>Register Here</h2>
				<h3>Create your account on this platform, doing that, you'll be able to track your events to know if they have been approved</h3>
				<p>Just follow these simple steps to get your account ready and join the <!-- put a count variable to know the number of registered people in the database --> number and start managing your events.</p>
				<p> <?php if(isset($_POST['submit'])) echo $errorMessage; ?> </p>
				<p> Already have an account? <a href = "user/login.php">Login</a> </p>
			</div>


			<div class="contact_detail">
			<div class="wow fadeInUp col-md-5 col-sm-5" data-wow-delay="1s">
				<form action="index.php" method="post">
					<input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name">
					<input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name">
					<input name="username" type="text" class="form-control" id="username" placeholder="Username">
					<input name="phone" type="telephone" class="form-control" id="phone" placeholder="Phone Number">
					<input name="password" type="password" class="form-control" id="email" placeholder="Password (min 9 characters)">
					<input name="con_password" type="password" class="form-control" id="email" placeholder="Confirm Password (min 9 characters)">
					<input name="email" type="email" class="form-control" id="email" placeholder="Email Address">
					<select class="form-control" name="dept" id="name">
						<option value="" disabled>SELECT DEPARTMENT</option>
						<?php $sql = "SELECT deptName FROM department";
								$result = mysqli_query($con, $sql);
						if (mysqli_num_rows($result) > 0) {


									while($row = mysqli_fetch_assoc($result))
						 {
							?>

							<option value="<?php echo htmlentities($row['deptName']);?>"><?php echo htmlentities($row['deptName']);?></option>
						<?php
						}}
						else{
								echo "0 results";
						}
						?>
					</select>
					<div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">
						<input name="submit" type="submit" class="form-control" id="submit" value="REGISTER">
					</div>
				</form>
			</div>
		</div>

			<div class="col-md-1"></div>

		</div>
	</div>
</section>

<!--...................................................................................................................................-->



<!--...................................................................................................................................-->

<section id="contact" class="parallax-section" style="background:url('images/babcock/wop1.jpg')">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-offset-1 col-md-5 col-sm-6" data-wow-delay="0.6s">
				<div class="contact_des">
					<h3 style="color:white;">IF YOU HAVE ANY ISSUES, YOU COULD REACH US HERE</h3>
				</div>
			</div>

			<div class="wow fadeInUp col-md-5 col-sm-6" data-wow-delay="0.9s">
				<div class="contact_detail">
					<div class="section-title">
						<h2>Keep in touch</h2>
					</div>
					<form action="index.php" method="post">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
					  	<input name="email" type="email" class="form-control" id="email" placeholder="Email">
					  	<textarea name="message" rows="5" class="form-control" id="message" placeholder="Message"></textarea>
						<div class="col-md-6 col-sm-10">
							<input name="send" type="submit" class="form-control" id="submit" value="SEND">
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>

<!--...................................................................................................................................-->

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
</body>
</html>
