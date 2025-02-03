<?php session_start();
//admin/cas_new/displayallindexed.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<link rel="stylesheet" href="../../../common/css/login.css" type="text/css" />
		
		
		<link href="../../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'cas_new-incmenu.htm';
	}?>
	
	</div>
	
	
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
	echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';

$Userid=$_POST['uid'];
echo $Userid.'</br>';
include "../process/connect.php";

$result = mysql_query("SELECT * FROM users WHERE uid = $Userid");

 while($row = mysql_fetch_array($result))
    {
     	$uid=$row['uid'];
	$uname=$row['uname'];
	$umobile=$row['umobile'];
	$uusername=$row['uusername'];
	$uemail=$row['uemail'];
	$upassword=$row['upassword'];
	$uofficeph=$row['uofficeph'];
	$ufax=$row['ufax'];
	
	echo '<span style="font-weight:bold;">'.$uname.'</br></br>';
	echo 'Dealer ID&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDealer Name</span></br>';
	//$relatives = mysql_query("SELECT * FROM ud_relate, dealers WHERE u_id = $Userid AND did = d_id");
 $relatives = mysql_query("SELECT * FROM ud_relate RIGHT JOIN dealers ON ud_relate.d_id=dealers.did WHERE ud_relate.u_id = $Userid AND dealers.did = ud_relate.d_id ");
	//$relatives = mysql_query("SELECT u_id, d_id FROM `ud_relate`, `dealers`  WHERE u_id = $Userid AND d_id = dealers.did ");
	//$relatives2 = mysql_query("SELECT dname FROM `ud_relate`, `dealers`  WHERE u_id = $Userid AND d_id = dealers.did ");
	
 while($row = mysql_fetch_array($relatives))
    {
	$uuid=$row['u_id'];
	$ddid=$row['d_id'];
	$did=$row['did'];
	$dname=$row['dname'];
	
	echo $uuid." ".$ddid.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$dname.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	echo '<a href="../process/deleterelative.php?d_id='. $ddid . '&u_id='.$uuid.'">Delete</a></br>';
	
   
    }echo '</br>';
	
    }
         mysql_close();
         
        
         ?>
         
   
</html>
<?php

}
//session_destroy();
?>