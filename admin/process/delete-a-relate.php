<?php include "connecti.php";
	$a_uid= mysqli_real_escape_string($con, $_POST['auid']);
	$a_aid=mysqli_real_escape_string($con, $_POST['a_id']);
	
	$result=mysqli_query($con,"DELETE FROM `a_relate` WHERE `a_uid`=$a_uid AND `a_aid`=$a_aid") or die("Not Connected");
	echo "Relationship has been successfully deleted..." ;
	//mysql_close();
	echo "<meta http-equiv='refresh' content='1;url=../worldview/viewusers.php'>";
	//header("Location: http://www.manheimas.com/admin/newrelate.php");
	?>