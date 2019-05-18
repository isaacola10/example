
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
			<div style="padding-top:10px;"><img src="images/babcock/logo1.png" width=70 height="70" style="padding-bottom:10px;"> <span><a href="index.php" style="color:white; font-size:20px;">Social Activities Management System</a></span></div>
		</div>


	</div>
</div>


<section  id="overview" class="parallax-section" style="margin-bottom:40px;">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<br>
				<h3 class="wow fadeInUp" data-wow-delay="1.0s">

				</h3>


        <?php
          $connect = mysqli_connect("localhost", "root", "mata4life","eventSystem");


        //search code
        error_reporting(0);
        if($_REQUEST['submit']){
        $name = $_POST['name'];
        ?>
        <form action="result.php" method="POST" style="padding:10px;">
        <input type="text" name="name" class="form-control" size="" value="<?php echo $name; ?>">
        <br>
        <input type="submit" class="btn btn-lg btn-primary btn-sm" name="submit" value="Search">
				<a href="index.php" class="btn btn-lg btn-primary btn-sm"> Go Back </a>
        </form>
        <?php
        if(empty($name)){
        $make = '<h4>You must type a word to search!</h4>';
        }else{
        $make = '<h4>No match found!</h4>';
        $query = "SELECT * FROM events WHERE title LIKE '%$name%' OR venue LIKE '%$name%'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          $count = 1;


?>
<section id="detail" class="parallax-section" style="padding:10px; text-align:left;">
	<div class="container">
		<div class="row">
      <?php

            echo "<h2> Search Results...  </h2>";

						while($row = mysqli_fetch_assoc($result)){

            echo '<span style="font-size:30px">'. $count.'. Event Title						: '.$row['title'].'</span>';
            echo '<br> Event Date 						: '.$row['dateAdded'];
            echo '<br> Event Time 						: '.$row['eventTime'];
            echo '<br> Event Venue 						: '.$row['venue'];
						echo "<br>";
             $count = $count + 1;
          }
          ?>
        </div>
      </div>
      </section

      <?php
        }else
        {
        echo'<h2> Search Result</h2>';

        print ($make);
        }
        mysqli_free_result($result);

        }
        }

        ?>

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
