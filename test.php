<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Show Hide Elements Using Select Box</title>
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

<style type="text/css">
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .red{ background: #ff0000; }
    .green{ background: #228B22; }
    .blue{ background: #0000ff; }
</style>
<script src="jquery/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".guest").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".guest").hide();
            }
        });
    }).change();
});
</script>
</head>
<body>
    <div>
        <select>
            <option>Choose Color</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="red box">You have selected <strong>red option</strong> so i am here</div>
    <div class="green box">You have selected <strong>green option</strong> so i am here</div>
    <div class="blue box">You have selected <strong>blue option</strong> so i am here</div>

    <section id="contact" class="parallax-section" style="background:url('images/crop.png');">
    	<div class="container">
    		<div class="row">

    			<div class="wow fadeInUp col-md-10" data-wow-delay="0.9s">
    				<div class="contact_detail">
    					<div class="section-title">
    						<h2>New Event</h2>
    					</div>
              <form action="add_event.php" method="post">
                    <div class="row">
                        <div class="col-md-12 panel-info">
                        <div class="content-box-large box-with-header">
                            <div>
                            <div class="row">

                              <div class="col-sm-6">
                                <input name="title" type="text" class="form-control" id="name" placeholder="Event Name">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="dateAdded" class="form-control" id="email" title="Choose your desired date"  min="<?php echo date('Y-m-d'); ?>"/>
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
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </div>




                            </div>
              <hr>

              <div class="row Yes guest">

                <div class="col-sm-6">
                <input name="title" type="text" class="form-control" id="name" placeholder="Guest Name">
                </div>
                <div class="col-sm-6">
                <input name="title" type="text" class="form-control" id="name" placeholder="Guest Relationship">
                </div>

              </div>

              <hr>

              <div class="row">

                <div class="col-sm-6">
                  <textarea name="descp" rows="5" class="form-control" id="message" placeholder="Event Description"></textarea>
                </div>
                <div class="col-sm-6">
                  <input type="date" name="dateAdded" class="form-control" id="email" title="Choose your desired date"  min="<?php echo date('Y-m-d'); ?>"/>
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
