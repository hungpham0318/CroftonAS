<?php session_start();
//adminlogin.php
if(isset($_SESSION['url'])) {
   $url = $_SESSION['url']; // holds url for last page visited.
}else{ 
   $url = "../index.php"; // default page for 
	include "admin_i_connect.php";
	$ausername=mysqli_real_escape_string($con,$_POST['ausername']);
	$apassword=mysqli_real_escape_string($con,$_POST['apassword']);
	$sql="SELECT * FROM admin_users WHERE ausername='$ausername' and apassword='$apassword'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count == 1 ){
$_SESSION['ausername']=$result['ausername'];
$_SESSION['aperms']=$result['aperms'];
$_SESSION['uid']=$result['uid'];
          }
	else{header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
	?>
