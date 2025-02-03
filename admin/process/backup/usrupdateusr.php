<?php
	
include "connecti.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
$quid=mysqli_real_escape_string($con, $_POST['uid']);
	$uusername = mysqli_real_escape_string($con, $_POST['uusername']);
	$upassword = mysqli_real_escape_string($con, $_POST['upassword']);
	$uname = strtoupper(mysqli_real_escape_string($con, $_POST['uname']));
	$uemail= mysqli_real_escape_string($con, $_POST['uemail']);
	$umobile= mysqli_real_escape_string($con, $_POST['umobile']);
	$ufax= mysqli_real_escape_string($con, $_POST['ufax']);
	$uofficeph=mysqli_real_escape_string($con, $_POST['uofficeph']);
	$uaddress = mysqli_real_escape_string($con, $_POST['uaddress']);
	$ucity = mysqli_real_escape_string($con, $_POST['ucity']);
	$ustate = mysqli_real_escape_string($con, $_POST['ustate']);
	$uzip = mysqli_real_escape_string($con, $_POST['uzip']);
	$ucompany = mysqli_real_escape_string($con, $_POST['ucompany']);
	$unotes = mysqli_real_escape_string($con, $_POST['unotes']);
	$uactive = mysqli_real_escape_string($con, $_POST['uactive']);
	$uperms = mysqli_real_escape_string($con, $_POST['uperms']);
	
	
	
	echo "</br> uid: ".$quid;
	echo"</br> uusername: ". $uusername;
	echo "</br> upassword: ".$upassword;
	echo "</br> uname: ".$uname;
	echo "</br> uemail: ".$uemail;
	echo "</br> umobile: ".$umobile;
	echo "</br> ufax: ".$ufax;
	echo "</br> uofficeph: ".$uofficeph;
	echo "</br> uaddress: ".$uaddress;
	echo "</br> ucity: ".$ucity;
	echo "</br> ustate: ".$ustate;
	echo "</br> uzip: ".$uzip;
	echo "</br> ucompany: ".$ucompany;
	echo "</br> unotes: ".$unotes;
	echo "</br> uactive: ".$uactive;
	echo "</br> uperms: ".$uperms;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 $sql = "UPDATE `users` SET `uid`=$quid,`uname`='$uname',`email`='$uemail',`umobile`='$umobile',`ufax`='$ufax',`uofficeph`='$uofficeph', `username`='$uusername',`password`='$upassword',`uaddress`='$uaddress',`ucity`='$ucity',`ustate`='$ustate',`uzip`=$uzip,`ucompany`='$ucompany',`unotes`='$unotes',`uperms`=$uperms,`active`='$uactive' WHERE uid = $quid";
	 
	 
	 
	 if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}





























