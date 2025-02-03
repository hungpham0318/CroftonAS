<?php include "connect.php";
	$uid= mysql_real_escape_string($_POST['uid']);
	$did=mysql_real_escape_string($_POST['did']);
	$result=mysql_query("INSERT INTO `ud_relate`(`u_id`, `d_id`) VALUES ('$uid','$did')") or die("Not Connected");
	echo "Relationship has been successfully added..." ;
	mysql_close();
	echo "<meta http-equiv='refresh' content='1;url=../newrelate.php'>";
	//header("Location: http://www.manheimas.com/admin/newrelate.php");
	?>