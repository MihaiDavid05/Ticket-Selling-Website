<?php


include 'includes/dbh-inc.php';

$sql = "SELECT * FROM evenimente WHERE data <= '2018-12-30' AND cantitate>0 ";
$apare = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Global | Services</title>

<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="icon" href="data:;base64,iVBORw0KGgo=">
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

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
            if($e_admin == 1){
            echo ' <li><a href="admin.php">Administration</a></li>';
            }    
        ?>
        </ul>
        <div class="social-icons">

         <?php
          if(isset($_SESSION['u_id'])){
            echo '<form action="includes/logout-inc.php" method="POST">
          <button class="button-login1" type="submit" name="submit" style="height: 33px;padding-bottom: 8px;padding-top: 2px;"">Logout</button>
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
  <br>
  <section id="content">
    <div class="container_12">
      <div class="grid_12">
      	 <div class="container-fluid">
   <div class="row">
   	<!--==Left Sidebar==-->
      <div class="col-md-2">
       
              </div>
                 	<!--== Main content==-->

       <div class="col-md-8">
       		<h2 class="text-center">Fast approaching</h2>
          <div class="row mb-3">
       		<?php while($eveniment = mysqli_fetch_assoc($apare)) : ?>
        
        <br><br>
        
        <div class="col=md-3 mr-3">
          <h4><?php echo $eveniment['titlu']; ?></h4>
          <img src="<?php echo $eveniment['imagine']; ?>" alt="<?php echo $eveniment['titlu']; ?>" class="img-thumb"/>
          <p class="price">Date: <?php echo $eveniment['data']; ?></p>
          <p class="price">Price: <?php echo $eveniment['pret']; ?> RON</p>
          <button type="button" class="btn btn-sm btn-success btn-details mb-3" onclick="detailsmodal(<?= $eveniment['id']; ?>)">Details</button>

        </div>
       
          <?php endwhile; ?>
          </div>
       	</div>
       	<!--==Right Sidebar==-->
       <div class="col-md-2">
        
       </div>
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

<?php include 'includes/footer.php'; ?>
