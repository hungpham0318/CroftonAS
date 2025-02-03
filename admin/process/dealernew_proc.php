<?php
	include "connect.php";
	$dname = strtoupper(mysql_real_escape_string($_POST['dname']));
	$dcity = strtoupper(mysql_real_escape_string($_POST['dcity']));
	$dphone= mysql_real_escape_string($_POST['dphone']);
	$dcontact= strtoupper(mysql_real_escape_string($_POST['dcontact']));
	$dsdphone= mysql_real_escape_string($_POST['dsdphone']);
	$dnumber= mysql_real_escape_string($_POST['dnumber']);
	$insert=mysql_query("INSERT INTO `dealers`(`did`, `dname`, `dcity`, `dphone`, `dcontact`, `dsdphone`, `dnumber`) VALUES 
	(null,'$dname','$dcity','$dphone','$dcontact','$dsdphone','$dnumber')") or die("Not Connected");
	echo "Successfully Registered....";
	mysql_close();
	echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
	//header("Location: ../admin/");
?>