<?php

session_start();

$mysqli = new mysqli('localhost', 'root', "", 'loginsystem') or die(mysqli_error($mysqli));

$titlu = "";
$pret = "";
$categorie = "";
$imagine = "";
$descriere = "";
$apare = "";
$data = "";
$cantitate = "";
$id = 0;
if(isset($_GET['edit'])){
	$id= $_GET['edit'];
	$rec= mysqli_query($mysqli,"SELECT * FROM evenimente WHERE id=$id");
	$record=mysqli_fetch_array($rec);
	$titlu= $record['titlu'];
	$pret= $record['pret'];
	$data= $record['data'];
	$id= $record['id'];
	$categorie = $record['categorie'];
	$imagine = $record['imagine'];
	$descriere = $record['descriere'];
	$apare = $record['apare'];
  $cantitate = $record['cantitate'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Global | About</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
      <div style="height: 66px;">
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
         <li class="current"><a href="admin.php">Administration</a></li>
        </ul>
        <div class="social-icons">

         <?php
          if(isset($_SESSION['u_id'])){
            echo '<form action="includes/logout-inc.php" method="POST">
          <button class="button-login1" type="submit" name="submit" style="height: 33px;padding-bottom: 8px;padding-top: 2px;"">Logout</button>
        </form>';
        }?>

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
    <h2>Welcome admin!</h2>
    <br><br>
      <p align='center' style='font-size: 30px'>Users list</p>
<br>
      <table class='tabeladmin'>
        <tr style='background-color: #ed6c3d'>
          <th>First name</th>
           <th>Last name</th>
            <th>Email</th>
             <th>Type</th>
			   <th>Actions</th>
        </tr>
  <?php
     $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "loginsystem";

    $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
      
      $var=mysqli_query($conn, "SELECT * FROM users");
      ?>
      <?php
      while($row=mysqli_fetch_assoc($var)): ?>
        <tr>
          <td><?php echo $row['user_first']; ?></td>
           <td><?php echo $row['user_last']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
              <td><?php echo $row['type']; ?></td>
              <td>
              	<a href="deleteuser.php?delete=<?php echo $row['user_id']; ?>" class="btn btn-danger">Delete</a>
				<a href="changeadmin.php?change=<?php echo $row['user_id']; ?>" class="btn btn-primary">Change admin</a>
			</td>
        </tr>
      <?php endwhile; ?>
      </table>
      <br>
      <br>
      <?php
        if(isset($_SESSION['message'])): ?>
          <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
          </div>
        <?php endif ?>
      <p align='center' style='font-size: 30px'>Events list</p>
      <br>
      <table class='tabeladmin'>
        <tr style='background-color: #ed6c3d'>
          <th>Title</th>
           <th>Price</th>
            <th>Date</th>
             <th>Category</th>
             <th>Image</th>
             <th>Description</th>
             <th>Appearance</th>
              <th>Quantity</th>
         <th>Actions</th>
        </tr>
  <?php
      $var1=mysqli_query($conn, "SELECT * FROM evenimente");
     
      while($row=mysqli_fetch_assoc($var1)): ?>
        <tr>
          <td><?php echo $row['titlu']; ?></td>
           <td><?php echo $row['pret']; ?></td>
            <td><?php echo $row['data']; ?></td>
              <td><?php echo $row['categorie']; ?></td>
               <td><?php echo $row['imagine']; ?></td>
                <td><?php echo $row['descriere']; ?></td>
                <td><?php echo $row['apare']; ?></td>
                 <td><?php echo $row['cantitate']; ?></td>
              <td>
                <a href="delete_event.php?deleteev=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                <a href="admin.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
      </td>
        </tr>
      <?php endwhile; ?>
      </table>
      <br>
      <div class="row">
      <div class="col-md-6">
      <h2> Add event</h2>
      <div class="row justify-content-center">
    <form class="login-form" action="saveinfo.php" method="POST">
      <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control" placeholder="Enter title">
        </div>
        <div class="form-group">
           <label>Price</label>
          <input type="text" name="price" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
           <label>Date</label>
          <input type="date" name="date" class="form-control" placeholder="Enter date">
        </div>
        <div class="form-group">
           <label>Category</label>
          <input type="text" name="category" class="form-control" placeholder="Enter category">
        </div>
        <div class="form-group">
           <label>Image</label>
          <input type="text" name="image" class="form-control" placeholder="Enter image">
        </div>
        <div class="form-group">
           <label>Description</label>
          <input type="text" name="description" class="form-control" placeholder="Enter description">
        </div>
        <div class="form-group">
           <label>Appearance</label>
          <input type="text" name="appearance" class="form-control" placeholder="Enter appearance">
        </div>
        <div class="form-group">
           <label>Quantity</label>
          <input type="text" name="quantity" class="form-control" placeholder="Enter quantity">
        </div>
        <div class="form-group">
          <button type="submit"  class="btn btn-primary" name="save">Save</button>
        </div>  
    </form>
      </div>
  </div>

  	<div class="col-md-6">
      <h2> Edit event</h2>
      <div class="row justify-content-center">
    <form class="login-form" action="edit_event.php" method="POST">
    	<input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" value="<?php echo $titlu; ?>" class="form-control" placeholder="Enter title">
      
        </div>
        <div class="form-group">
           <label>Price</label>
          <input type="text" name="price" value="<?php echo $pret; ?>" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
           <label>Date</label>
          <input type="date" name="date" value="<?php echo $data; ?>" class="form-control" placeholder="Enter date">
        </div>
        <div class="form-group">
           <label>Category</label>
          <input type="text" name="category" value="<?php echo $categorie; ?>" class="form-control" placeholder="Enter category">
        </div>
        <div class="form-group">
           <label>Image</label>
          <input type="text" name="image" value="<?php echo $imagine; ?>" class="form-control" placeholder="Enter image">
        </div>
        <div class="form-group">
           <label>Description</label>
          <input type="text" name="description" value="<?php echo $descriere; ?>" class="form-control" placeholder="Enter description">
        </div>
        <div class="form-group">
           <label>Appearance</label>
          <input type="text" name="appearance" value="<?php echo $apare; ?>" class="form-control" placeholder="Enter appearance">
        </div>
        <div class="form-group">
           <label>Quantity</label>
          <input type="text" name="quantity" value="<?php echo $apare; ?>" class="form-control" placeholder="Enter quantity">
        </div>
        <div class="form-group">
          <button type="submit"  class="btn btn-primary" name="update">Update</button>
        </div>  
    </form>
      </div>
  </div>
</div>

  </div>
  <br><br>
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
