<?php
require('includes/config.php');

//collect values from the url
$uid = trim($_GET['x']);
$active = trim($_GET['y']);

//if id is number and the active token is not empty carry on
if(is_numeric($uid) && !empty($active)){

	//update users record set the active column to Yes where the uid and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE users SET active = 'Yes' WHERE uid = :uid AND active = :active");
	$stmt->execute(array(
		':uid' => $uid,
		':active' => $active
	));

	//if the row was updated redirect the user
	if($stmt->rowCount() == 1){

		//redirect to login page
		header('Location: login.php?action=active');
		exit;

	} else {
		echo "Your account could not be activated."; 
	}
	
}
?>