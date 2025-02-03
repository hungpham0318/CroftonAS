<?php
	include "connect.php";
	$did=mysql_real_escape_string($_POST['did']);
	$dname= strtoupper(mysql_real_escape_string($_POST['dname']));
	$dnumber = mysql_real_escape_string($_POST['dnumber']);
	$dcity = strtoupper(mysql_real_escape_string($_POST['dcity']));
	$dcontact = strtoupper(mysql_real_escape_string($_POST['dcontact']));
	$dphone= mysql_real_escape_string($_POST['dphone']);
	$dsdphone= mysql_real_escape_string($_POST['dsdphone']);
	$update=mysql_query("UPDATE `dealers` SET `did`= $did, `dname`='$dname', `dnumber`='$dnumber',`dcity`='$dcity',`dcontact`='$dcontact',`dphone`='$dphone',`dsdphone`='$dsdphone' WHERE did = $did") or die("Not Connected");
	echo "Dealer Was Successfully Updated....";
	mysql_close();
	echo $did;
	//echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
?>