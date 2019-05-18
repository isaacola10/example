<?php
		if(!isset($_SESSION['username']))
		   {
		?>
        <div id="sign_in"><i class = "fa fa-sign-in"></i><a href="index.php">Login</a>
        </div>
		<?php
		   }
		   else
		   {
		?>
        <div id="sign_in"><a href="logout.php"> <i class = "fa fa-sign-out"></i> Logout</a>
        </div>
        <?php
		   }
		?>



        <?php
