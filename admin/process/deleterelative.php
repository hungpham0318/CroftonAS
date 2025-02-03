<?php	
$u_id=$_GET['u_id'];
$d_id=$_GET['d_id'];
	include "connecti.php";
	
	$query=mysqli_query($con, "DELETE FROM ud_relate WHERE u_id = $u_id AND d_id = $d_id") ;
	//echo "Relationship Deleted....";
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
echo "Relationship Deleted....";
	//echo header('location:../cas_new/choosedrelate.php');
	//echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
?>