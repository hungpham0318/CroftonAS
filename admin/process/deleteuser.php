<?php
	include "connect.php";
	$uid=$_GET['uid'];
	//echo $uid;
	//echo intVal($uid);
	$query=mysql_query("DELETE FROM users WHERE uid = $uid") or die("A MySQL error has occurred.<br />Your Query: " . $query . "<br /> Error: (" . mysql_errno() . ") " . mysql_error());
	//echo "User Deleted....";
	mysql_close();
	echo header('location:../displayusers.php');
	//echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
?>