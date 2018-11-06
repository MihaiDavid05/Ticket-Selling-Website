<?php

session_start();
$mysqli = new mysqli('localhost', 'root', "", 'loginsystem') or die(mysqli_error($mysqli));

if(isset($_GET['deleteev'])){
	$id=$_GET['deleteev'];
	$mysqli->query("DELETE FROM evenimente WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("Location: admin.php");

}