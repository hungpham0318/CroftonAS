<?php session_start();
//adminlogin.php
if(isset($_SESSION['url'])) {
   $url = $_SESSION['url']; // holds url for last page visited.
}else{ 
  	include "adminconnect.php";
	$ausername=mysql_real_escape_string($_POST['ausername']);
	$apassword=mysql_real_escape_string($_POST['apassword']);
	$sql="SELECT * FROM admin_users WHERE ausername='$ausername' and apassword='$apassword'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		$_SESSION['ausername']=$ausername;
		$_SESSION['apassword']=$apassword;
$_SESSION['uid']=$result['uid'];

	     header('Location: ' . $_SERVER['HTTP_REFERER']);
          }
	else{
	header("Location: "../worldview/");}
	}
	exit;?>