<?php
	$hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
$ucas = $_POST['password'];
//$hashedpassword=$_POST['password'];
//echo $ucas."</br>";
//	echo $hashedpassword;	

			$username = $_POST['username'];
				$password = $hashedpassword;
				$email = $_POST['email'];
				$active = yes;
                $uname = $_POST['ufirst']." ".$_POST['ulast'];
				$umobile = $_POST['umobile'];
				$ucas = $_POST['password'];
				$ufirst = $_POST['ufirst'];
				$ulast = $_POST['ulast'];
				$uperms = 1;
include "../process/connecti.php";
$result = mysqli_query($con,"INSERT INTO `users` (`uid`, `uname`, `email`, `umobile`, `username`, `password`, `active`, `uperms`, `ucas`, `ufirst`, `ulast`) VALUES (NULL,'$uname', '$email','$umobile','$username','$password','$active',1,'$ucas','$ufirst','$ulast')");
			

			
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>