<?php
	include "connect.php";
	$did=mysql_real_escape_string($_POST['did']);
	$dname= strtoupper(mysql_real_escape_string($_POST['dname']));
	$dnumber = mysql_real_escape_string($_POST['dnumber']);
	$dcity = strtoupper(mysql_real_escape_string($_POST['dcity']));
	$dcontact = strtoupper(mysql_real_escape_string($_POST['dcontact']));
	$dphone= mysql_real_escape_string($_POST['dphone']);
	$dsdphone= mysql_real_escape_string($_POST['dsdphone']);
	$dmailAcctNum = strtoupper(mysql_real_escape_string($_POST['dmailAcctNum']));
	$dnotes = strtoupper(mysql_real_escape_string($_POST['dnotes']));
	$daddress = strtoupper(mysql_real_escape_string($_POST['daddress']));
	$dstate = strtoupper(mysql_real_escape_string($_POST['dstate']));
	$dzip = strtoupper(mysql_real_escape_string($_POST['dzip']));




	$update=mysql_query("UPDATE `dealers` SET `did`= $did, `dname`='$dname', `dnumber`='$dnumber',`dcity`='$dcity',`dcontact`='$dcontact',`dphone`='$dphone',`dsdphone`='$dsdphone', `dmailAcctNum` ='$dmailAcctNum', `dnotes` ='$dnotes', `daddress` ='$daddress', `dstate` = '$dstate', `dzip` ='$dzip' WHERE did = $did") or die("Not Connected");
	//echo "Dealer Was Successfully Updated....";
	mysql_close();
	echo $did;
	echo "<meta http-equiv='refresh' content='1;url=/admin/invoice/invoicesteptwo.php?did=".$did."'>";
?>