<?php

if(isset($_POST['submit'])){
	include_once 'dbh-inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	// erori
	//verificam campuri goale
	if(empty($first) || empty($last)|| empty($email)|| empty($uid)|| empty($pwd))
	{
		header("Location: ../signup.php?signup=empty");
		exit();
	}else{
		//verficam daca inputurile sunt corecte
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			header("Location: ../signup.php?signup=invalid");
			exit();
		}else{
			//verificam daca e valid mailu
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../signup.php?signup=invalid email");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck>0){
					header("Location: ../signup.php?signup=user taken");
					exit();
				}else{
					//hashing password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					$sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../login1.php?signup=succes");
					exit();									
				}
			}
		}
	}
}else{
	header("Location: ../signup.php");
	exit();
}