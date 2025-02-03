<?php include "connecti.php";
	$uid= mysqli_real_escape_string($con,$_POST['uid']);
	$did=mysqli_real_escape_string($con,$_POST['did']);
	$result=mysqli_query($con,"DELETE FROM `ud_relate` WHERE `u_id`=$uid AND `d_id`=$did") or die("Not Connected");
	echo "Relationship has been successfully deleted..." ;
	//mysql_close();
	echo "<meta http-equiv='refresh' content='1;url=../worldview/viewusers.php'>";
	//header("Location: http://www.manheimas.com/admin/newrelate.php");
	?>