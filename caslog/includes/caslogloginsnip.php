<?php session_start();
//include config
require_once('config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: /home.php'); } else{

//process login form if submitted


	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
	$username = $_SESSION['username'] ;
	$uname = $_SESSION['uname'];
	$email = $_SESSION['email'];
	$umobile = $_SESSION['umobile'] ;
	$uid = $_SESSION['uid'];
	
		header('Location: /home.php');
		exit;
	}
	?>

	


