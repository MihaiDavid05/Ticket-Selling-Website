<?php

session_start();
$mysqli = new mysqli('localhost', 'root', "", 'loginsystem') or die(mysqli_error($mysqli));

if(isset($_GET['change'])){
	$id=$_GET['change'];
	$mysqli->query("UPDATE users SET type=1 WHERE user_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Admin has been added!";
	$_SESSION['msg_type'] = "success";

	header("Location: admin.php");
}