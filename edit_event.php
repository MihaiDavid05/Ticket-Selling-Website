<?php

session_start();

$mysqli = new mysqli('localhost', 'root', "", 'loginsystem') or die(mysqli_error($mysqli));


$id = 0;
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$titlu =$_POST['title'];
	$pret =$_POST['price'];
	$data =$_POST['date'];
	$categorie = $_POST['category'];
	$imagine = $_POST['image'];
	$descriere = $_POST['description'];
	$apare = $_POST['appearance'];
	$cantitate = $_POST['quantity'];

	$mysqli->query("UPDATE evenimente SET titlu='$titlu' , pret='$pret' , data='$data' , categorie='$categorie' , imagine='$imagine' , descriere='$descriere' , apare='$apare' , cantitate='$cantitate' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "success";

	header("Location: admin.php");
}


