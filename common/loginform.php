<?php session_start();
//include config
require_once('./caslog/includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: /caslog/userlanding.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
	$username = $_SESSION['username'] ;
	$uname = $_SESSION['uname'];
	$email = $_SESSION['email'];
	$umobile = $_SESSION['umobile'] ;
	$uid = $_SESSION['uid'];
	
		header('Location: /caslog/userlanding.php');
		exit;
	

	} else {
		$error[] = 'Wrong username or password  -or-  your account has not yet been activated.';
	}

//end if submit
}?>
<a href="/caslog/login.php">
<div id="logindiv">
<!--../areg/step1.php
<form class="login" role="form" method="post" id="login" action="" autocomplete="off">-->
<form id="login" class="login" role="form" method="post" action="">
<!--<form id="login" method="post" action="./common/includes/caslogloginsnip.php">-->
    	<h2>.</h2>
    	<fieldset id="inputs">
    	<input id="username" type="text" placeholder="Username" name="username" autofocus >   
    	<input id="password" type="password" placeholder="Password" name="password" >
    	</fieldset>
    	<fieldset id="actions">
        <input type="disabled" id="submit" class="pure-button" value="Login">
       </fieldset>
    </form></div></a>