<?php include "connecti.php";
	$a_uid= mysqli_real_escape_string($con, $_POST['auid']);
	$a_aid=mysqli_real_escape_string($con, $_POST['a_id']);
	$result=mysqli_query($con, "INSERT INTO `a_relate`(`a_aid`, `a_uid`) VALUES ('$a_aid','$a_uid')") or die("Not Connected");
	echo "Relationship has been successfully added..." ;
	//mysqli_close();
	echo "<meta http-equiv='refresh' content='1;url=../worldview/viewusers.php'>";
	//header("Location: http://www.manheimas.com/admin/newrelate.php");
	?>