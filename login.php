<?php

include('includes/connect.php');
if(isset($_POST['login']))
{


    $username=$_POST['username'];
    $pword=md5($_POST['password']);
    $sql="SELECT * FROM registert WHERE username='$username' AND password='$pword' ";
    $result=mysqli_query($con, $sql) or die("Could not execute query");

    $match=mysqli_num_rows($result);
	  $msg='Null';

        if($match!=0){
			 session_start();
			 $_SESSION['username']=$username;
			 //$check=mysql_fetch_assoc($result);

			header('Location:user/index.php');

            }
        else{
             $msg="Wrong username or password!";
            }

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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

    <div class="navbar navbar-fixed-top custom-navbar" role="navigation" style="background:rgb(0,66,130);">
    	<div class="container">

    		<!-- navbar header -->
    		<div class="navbar-header">
    			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    				<span class="icon icon-bar"></span>
    				<span class="icon icon-bar"></span>
    				<span class="icon icon-bar"></span>
    			</button>
    			<div style="padding-top:10px;"><img src="images/babcock/logo1.png" width=40 height="40"> <span><a href="#" style="color:white; font-size:25px;">Social Activities Management System</a></span></div>
    		</div>



    	</div>
    </div>


    <section id="register" class="parallax-section">
    	<div class="container">
    		<div class="row">

    			<div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="0.6s">
    				<h2>Login</h2>
    				<h3>Fill in your correct details to view your account</h3>
    				<p style="color:white;">Just follow these simple steps to get your account ready and join the <!-- put a count variable to know the number of registered people in the database --> number and start managing your events.</p>
    				<p> <?php if(isset($_POST['login'])) echo "<button type='button' class='btn btn-danger'>".$msg."</button>"; ?> </p>
    				<p style="color:white;"> Dont have an account? <a href = "index.php">Register</a> </p>
    			</div>

    			<div class="wow fadeInUp col-md-5 col-sm-5" data-wow-delay="1s">
    				<form action="login.php" method="post">
    					<input name="username" type="text" class="form-control" id="email" placeholder="Email Address">
              <input name="password" type="password" class="form-control" id="email" placeholder="Password" required>
    					<div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">
    						<input name="login" type="submit" class="form-control" id="submit" value="LOGIN">
    					</div>
    				</form>
    			</div>

    			<div class="col-md-1"></div>

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





  </body>
</html>
