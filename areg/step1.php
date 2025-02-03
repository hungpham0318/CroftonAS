<?php session_start();
	include "manconn.php";
	$uusername=mysql_real_escape_string($_POST['uusername']);
	$upassword=mysql_real_escape_string($_POST['upassword']);
	$sql="SELECT * FROM users WHERE uusername='$uusername' and upassword='$upassword'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		$_SESSION['uusername']=$uusername;
		$_SESSION['upassword']=$upassword;
while ($row = mysql_fetch_assoc($result)) {
        $cas_uid=$row['uid'];
        $uname=$row['uname'];
        $umobile=$row['umobile']; 
      	$uemail=$row['uemail'];
      	$uname=$row['uname'];
      	}
      	
      	$_SESSION['cas_uid']=$cas_uid;
      	$_SESSION['uname'] =$uname;
      	$_SESSION['umobile'] =$umobile;
      	$_SESSION['uemail'] =$uemail;
	
	header("Location: ../index.php");
	}
else
	{
		echo "Login Attempt Failed";
		include '../common/loginfailed.php';
		exit();		
	}
?>