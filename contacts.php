<?php

include 'includes/dbh-inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Global | Contacts</title>
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
          <li class="current"><a href="contacts.php">Contacts</a></li>
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
        <div class="wrap pad-3">
          <div class="block-5">
            <h3 class="p5">Find Us</h3>
            <div class="map img-border">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2783.8759317941226!2d21.22287971553034!3d45.75363317910548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47455d7fa3b45d27%3A0x9d50666bd751fbd1!2sPalatul+Lloyd%2C+Pia%C8%9Ba+Victoriei+2%2C+Timi%C8%99oara+300006!5e0!3m2!1sro!2sro!4v1539641059595" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <dl>
              <dt>Piata Victoriei 2,<br>
                Timisoara, 300006.</dt>
              <dd><span>Freephone: </span>0256 223 765</dd>
              <dd><span>Telephone: </span>+4 0732 261 893</dd>
              <dd><span>Fax: </span>0251 491 983</dd>
              <dd><span>E-mail: </span>site@personal.com</dd>
            </dl>
          </div>
          <div class="block-6">
            <h3>Get In Touch</h3>
            <form id="form" method="post" action="#">
              <fieldset>
                <label>
                  <input type="text" value="Name" onBlur="if(this.value=='') this.value='Name'" onFocus="if(this.value =='Name' ) this.value=''">
                </label>
                <label>
                  <input type="text" value="Email" onBlur="if(this.value=='') this.value='Email'" onFocus="if(this.value =='Email' ) this.value=''">
                </label>
                <label>
                  <input type="text" value="Phone" onBlur="if(this.value=='') this.value='Phone'" onFocus="if(this.value =='Phone' ) this.value=''">
                </label>
                <label>
                  <textarea onBlur="if(this.value==''){this.value='Message'}" onFocus="if(this.value=='Message'){this.value=''}">Message</textarea>
                </label><a href="javascript:alert('Email has been sent !');" class="button">Send</a></div>
              </fieldset>
            </form>
          </div>
        </div>
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
