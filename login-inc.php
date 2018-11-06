<?php

session_start();

if(isset($_POST['submit'])){

	include 'dbh-inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	// erori
	//verificam daca input-urile is goale
	if(empty($uid) || empty($pwd)){
		header("Location: ../login1.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../login1.php?login=error1");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				//de-hashing password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if($hashedPwdCheck == false){
					header("Location: ../login1.php?login=error");
					exit();
				}elseif ($hashedPwdCheck == true){
					//LOg in user aici
					$sql1="SELECT * FROM users WHERE user_uid='$uid' AND type=1";
					$result1 = mysqli_query($conn, $sql1);
					
					if($row1=mysqli_fetch_assoc($result1)){

					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					
					header("Location: ../admin.php?");
						exit();
					}
					else{
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../index.php?");
						exit();
					}
					
				}
				//echo $row['user_uid'];
			}
		}
	}

}else{
	header("Location: ../login1.php?login=error");
	exit();
}
