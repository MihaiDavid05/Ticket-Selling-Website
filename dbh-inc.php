<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

session_start();

include $_SERVER['DOCUMENT_ROOT'].'/loginsystem/config.php';
include BASEURL.'helpers.php';

$cart_id='';
$e_admin = '';
if(isset($_COOKIE[CART_COOKIE])){
	$cart_id = sanitize($_COOKIE[CART_COOKIE]);
}
if(isset($_SESSION['u_id'])){

$var1= $_SESSION['u_id'];
$query = $conn->query("SELECT * FROM users WHERE user_id= $var1");
$admin = mysqli_fetch_assoc($query);
$e_admin = $admin['type'];
}

