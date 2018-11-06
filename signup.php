<?php

session_start();
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
    <div class="container_12">
      <div class="grid_12">
       <section class="main-container">
  <div class="main-wrapper">
    <h2>Signup</h2>
    <form class="signup-form" action="includes/signup-inc.php" method="POST">
      <input type="text" name="first" placeholder="First name">
      <input type="text" name="last" placeholder="Last name">
      <input type="text" name="email" placeholder="E-mail">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">
      <button type="submit" name="submit">Sign up</button>
    </form>
    <br>
  </div>
</section>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
    <div class="col-md-12 text-center" style="color: white">&copy; Copyright 2018-2019 Ticket Website</div>
  </footer>
</body>
</html>
