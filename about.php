<?php

include 'includes/dbh-inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Global | About</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
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
          <li class="home-page"><a href="index.php"><span></span></a></li>
          <li class="current"><a href="about.php">About</a></li>
          <li><a href="services.php">Events</a></li>
          <li><a href="contacts.php">Contacts</a></li>
        <?php
          if(isset($_SESSION['u_id'])){
            echo ' <li><a href="mytickets.php">My tickets</a></li>';
            }    
            if($e_admin == 1){
            echo ' <li><a href="admin.php">Administration</a></li>';
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
    <div class="container_12">
      <div class="grid_12">
        <div class="wrap block-3 pad-2">
          <div style="margin-bottom: 10px;margin-top: 26px">
            <h3 class="p5">Who Are We</h3>
            <img src="images/noi.jpg" alt="" class="img-border">
            <p class="top-1"><strong>Events passioned team</strong></p>
            <p class="p4"> We truly believe in recharging your soul through music,fun and new experiences, so we came up with this site to make it easier for you to achieve this. </p>
            <p class="p4">A small team of two joyful IT engineers that build up the second ticket sale website on the local market. TICKETS! </p>
             </div>
          <div style="margin-top: 20px">
            <h3 class="p6">What have we done</h3>
            <div class="box-11" style="margin-left: 0px"> 
              <span>We sold about:</span>
            
            </div>
            <div class="box-112" style="margin-left: 0px">
              <span style="margin-right:40px ">3000 tickets</span>
            </div>
            <div class="box-11" style="margin-left: 0px">
             <span>at over:</span>

            </div>
            <div class="box-112 p4" style="margin-left: 0px">
              <span  style="margin-right:40px ">60 events</span>
            </div>
         
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="aside">
      <div class="container_12">
        <div class="grid_12">
          <div class="pad-2 wrap">
            
          </div>
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
