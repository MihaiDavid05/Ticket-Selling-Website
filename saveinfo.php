<?php

session_start();

	

$mysqli = new mysqli('localhost', 'root', "", 'loginsystem') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
	$titlu=$_POST['title'];
	$pret=$_POST['price'];
	$data=$_POST['date'];
	$categorie=$_POST['category'];
	$imagine=$_POST['image'];
	$descriere=$_POST['description'];
	$apare=$_POST['appearance'];
	$cantitate=$_POST['quantity'];

	$mysqli->query("INSERT INTO evenimente(titlu, pret, data, categorie, imagine, descriere, apare, cantitate) VALUES('$titlu', '$pret', '$data', '$categorie', '$imagine', '$descriere', '$apare', '$cantitate')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("Location: admin.php");
	
}


