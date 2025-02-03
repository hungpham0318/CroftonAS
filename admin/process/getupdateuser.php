<?php
	include "connect.php";
	$uid=mysql_real_escape_string($_POST['uid']);
	$uusername = mysql_real_escape_string($_POST['uusername']);
	$upassword = mysql_real_escape_string($_POST['upassword']);
	$uname = strtoupper(mysql_real_escape_string($_POST['uname']));
	$uemail= mysql_real_escape_string($_POST['uemail']);
	$umobile= mysql_real_escape_string($_POST['umobile']);
	$ufax= mysql_real_escape_string($_POST['ufax']);
	$ucompany= mysql_real_escape_string($_POST['ucompany']);
        $uofficeph=mysql_real_escape_string($_POST['uofficeph']);
	$uaddress = mysql_real_escape_string($_POST['uaddress']);
	$ucity = mysql_real_escape_string($_POST['ucity']);
	$ustate = mysql_real_escape_string($_POST['ustate']);
	$uzip = mysql_real_escape_string($_POST['uzip']);
	$unotes = mysql_real_escape_string($_POST['unotes']);
	$uperms = mysql_real_escape_string($_POST['uperms']);
	$active = mysql_real_escape_string($_POST['active']);
	
	
	
	$update=mysql_query("UPDATE `users` SET `uid`=$uid,`uname`='$uname',`email`='$uemail',`umobile`='$umobile',`ufax`='$ufax',`uofficeph`='$uofficeph',`username`='$uusername'`uaddress`='$uaddress',`ucity`='$ucity,`ustate`='$ustate',`uzip`='$uzip',`ucompany`='$ucompany',`unotes`='$unotes',`uperms`='$uperms',`ucompany`='$ucompany',`active`='$active' WHERE uid = $uid") or die("Not Connected");
	
	//echo "User Was Successfully Updated....";
	mysql_close();
	echo header('location:../displayusers.php');
	//echo $uid;
	//echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
?>