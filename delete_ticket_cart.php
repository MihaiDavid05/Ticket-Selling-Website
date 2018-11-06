<?php

include $_SERVER['DOCUMENT_ROOT'].'/loginsystem/includes/dbh-inc.php';
$updated_items = array();

if(isset($_GET['deletetk'])){
	$id=$_GET['deletetk'];


                                $evenimentQ = $conn->query("SELECT * FROM evenimente WHERE id='{$eveniment_id}'");
                                $eveniment = mysqli_fetch_assoc($evenimentQ);
                                $available= $eveniment['cantitate'];




	$mysqli->query("DELETE FROM cos WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("Location: admin.php");

}

<?php
	include $_SERVER['DOCUMENT_ROOT'].'/loginsystem/includes/dbh-inc.php';

	$mode = sanitize($_POST['mode']);
	$edit_id =  sanitize($_POST['edit_id']);
	$cartQ = $conn->query("SELECT * FROM cos WHERE id = '{$cart_id}'");
	$result = mysqli_fetch_assoc($cartQ);
	$items = json_decode($result['items'],true);
	$updated_items = array();
	$domain = (($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false);
	if($mode == 'removeone'){
		foreach($items as $item){
			if($item['id'] == $edit_id){
				$item['quantity'] = $item['quantity'] - 1;
			}
			if($item['quantity'] > 0){
				$updated_items[] = $item;
			}
		}
	}

	if($mode == 'addone'){
		foreach($items as $item){
			if($item['id'] == $edit_id){
				$item['quantity'] = $item['quantity'] + 1;
			}
			$updated_items[] = $item;	
		}
	}

	if(!empty($updated_items)){
		$json_updated = json_encode($updated_items);
		$conn->query("UPDATE cos SET items = '{$json_updated}' WHERE id = '{$cart_id}'");
	}

?>
