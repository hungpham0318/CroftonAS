<?php
	include "connect.php";
	$uusername = mysql_real_escape_string($_POST['uusername']);
	$upassword = mysql_real_escape_string($_POST['upassword']);
	$uname = strtoupper(mysql_real_escape_string($_POST['uname']));
	$uemail= mysql_real_escape_string($_POST['uemail']);
	$umobile= mysql_real_escape_string($_POST['umobile']);
	$ufax= mysql_real_escape_string($_POST['ufax']);
	$uofficeph=mysql_real_escape_string($_POST['uofficeph']);
	$insert=mysql_query("INSERT INTO `users`(`uid`, `uname`, `uemail`, `umobile`, `ufax`, `uofficeph`, `uusername`, `upassword`) VALUES 
	(null,'$uname','$uemail','$umobile','$ufax','$uofficeph','$uusername','$upassword')") or die("Not Connected");
	echo "New User Was Successfully Registered....";
	mysql_close();
	echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
?>