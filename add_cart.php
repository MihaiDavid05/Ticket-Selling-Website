<?php

include $_SERVER['DOCUMENT_ROOT'].'/loginsystem/includes/dbh-inc.php';

$eveniment_id = sanitize($_POST['eveniment_id']);
$available = sanitize($_POST['available']);
$quantity = sanitize($_POST['quantity']);

 if(isset($_SESSION['u_id'])){
 		$u_id = sanitize($_SESSION['u_id']);
   }
$items = array();

$items[] = array(
'id' => $eveniment_id,
'user' => $u_id,
'quantity' => $quantity,

);
$domain = ($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false;
$query = $conn->query("SELECT * FROM evenimente WHERE id= '{$eveniment_id}'");
$eveniment=mysqli_fetch_assoc($query);

if($cart_id != ''){
	$cartQ=$conn->query("SELECT * FROM cos WHERE id = '{$cart_id}'");
	$cart=mysqli_fetch_assoc($cartQ);
	$previous_items = json_decode($cart['items'],true);
	$items_match = 0;
	$new_items = array();
	foreach ($previous_items as $pitems) {
		if($items[0]['id'] == $pitems['id'] && $items[0]['user'] == $pitems['user']){
			$pitems['quantity'] = (int)$pitems['quantity'] + (int)$items[0]['quantity'];
			if($pitems['quantity'] > $available){
				$pitems['quantity'] = $available;
			}
			$items_match =1;
		}
		$new_items[]= $pitems;
	}
	if($items_match != 1){
		$new_items = array_merge($items,$previous_items);
	}
	$items_json = json_encode($new_items);
	$cart_expire = date("Y-m-d H:i:s", strtotime("+30 days"));
	$conn->query("UPDATE cos SET items = '{$items_json}', expire_date='{$cart_expire}' WHERE id = '{$cart_id}'");
	setcookie(CART_COOKIE,'',1,"/",$domain,false);
	setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
}else{
	$items_json = json_encode($items);
	$cart_expire = date("Y-m-d H:i:s", strtotime("+30 days"));
	$conn->query("INSERT INTO cos (items,expire_date) VALUES ('{$items_json}','{$cart_expire}')");
	$cart_id = $conn->insert_id;
	setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
}
?>