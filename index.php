<?php

include 'includes/dbh-inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Global</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.x.js"></script>
<script>
$(document).ready(function(){				   	
	$('.slider')._TMS({
		show:0,
		pauseOnHover:true,
		prevBu:false,
		nextBu:false,
		playBu:false,
		duration:1000,
		preset:'fade',
		pagination:true,
		pagNums:false,
		slideshow:7000,
		numStatus:true,
		banners:'fromRight',
		waitBannerAnimation:false,
		progressBar:false
	})		
});
</script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="main" style="border-top-width: 0px;">
  <!--==============================header=================================-->
  <header>
    <h1><a href="index.php"><img src="images/logoul.png" alt=""></a></h1>
    
    <div class="clear"></div>
    <nav class="box-shadow">
      <div>
        <ul class="menu">
          <li class="home-page current"><a href="index.php"><span></span></a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Events</a></li>
          <li><a href="contacts.php">Contacts</a></li>
          <?php
					if(isset($_SESSION['u_id'])){
						echo ' <li><a href="mytickets.php">My tickets</a></li>';
						}		
				?>
          
        </ul>
        <div class="social-icons">

         <?php
					if(isset($_SESSION['u_id'])){
						echo '<form action="includes/logout-inc.php" method="POST">
					<button class="button-login" type="submit" name="submit">Logout</button>
				</form>';
				}else{
					echo '<span>Log in:</span> <a href="login1.php" class="icon-1"></a>';
			}
				?>

     	</div>
        <div class="clear"></div>
      </div>
    </nav>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div id="slide" class="box-shadow">
      <div class="slider">
        <ul class="items">
          <li><img src="images/slide1.jpg" alt="" />
            <div class="banner">Have fun alongside your friends!&nbsp;</div>
          </li>
          <li><img src="images/slide2.jpg" alt="" />
            <div class="banner">Let your inpiration flow !&nbsp;</div>
          </li>
          <li><img src="images/slide3.jpg" alt="" />
            <div class="banner">Live incredible moments !&nbsp;</div>
          </li>
        </ul>
      </div>
    </div>
    <div class="container_12">
      <div class="grid_12">
        <div class="pad-0 border-1">
        	 <h2 class="top-1 p0">
        	<?php
			if(isset($_SESSION['u_id'])){
        $var_id=$_SESSION['u_first'];
				 echo'Welcome ' . $var_id;  
				 echo '!';
			}
			else{
				echo 'Music means experience !';
			}
		?>
		</h2>
          <p class="p2">Participate in the most hyped events in your country and share the experience with your friends. Get your ticket fast and easy and don't bother bringing up anything beside
          your phone and a lot of joy and excitement.</p>
        </div>
        <div class="wrap block-1 pad-1">
          <div>
            <h3>Most affordable</h3>
            <img src="images/page1img1.jpg" alt="" class="img-border">
            <p>Time to take part in the our best priced events. Get your ticket because they are running out in no time.</p>
            <a href="most_affordable.php" class="button">More</a> </div>
          <div>
            <h3>Fast approaching</h3>
            <img src="images/repede.jpg" alt="" class="img-border">
            <p>Hurry up ! There's no time to waste.Events are passing by and you still hang in the balance. Why ? </p>
            <a href="fast_approaching.php" class="button">More</a> </div>
          <div class="last">
            <h3>Alternative choices</h3>
            <img src="images/page1img3.jpg" alt="" class="img-border">
            <p>If you want to try something new participate in these special events. Leave your doubts beside ! </p>
            <a href="alternative.php" class="button">More</a> </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="aside">
      <div class="container_12">
        <div class="grid_12">
          <div class="pad-2 block-2 wrap">
           
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
    <div class="col-md-12 text-center" style="color: white">&copy; Copyright 2018-2019 Ticket Website</div>
  </footer>
</body>
</html>
