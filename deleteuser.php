<?php

session_start();
$mysqli = new mysqli('localhost', 'root', "", 'loginsystem') or die(mysqli_error($mysqli));

if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM users WHERE user_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "User has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("Location: admin.php");
}