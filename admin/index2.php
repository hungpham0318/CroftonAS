<?php session_start();
//admin/index.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		
		<link rel="stylesheet" href="css/admin.css" type="text/css" />
		<link rel="stylesheet" href="../common/css/login.css" type="text/css" />
		
		
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>


<div id="navigation">
 	<a class="pure-button button-success" href="index.php">Admin Home</a>
	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{
	//echo '<a class="pure-button " href="UsersDealers.php">DB Additions Menu</a>';
	//echo '<a class="pure-button " href="manage/manage.php">ManageIndex</a>';
	echo '<a class="pure-button " href="displayusers.php">Users</a>';
	echo '<a class="pure-button" href="displaydealers.php">Dealers</a>';
	echo '<a class="pure-button" href="displayallshort.php">Relatives</a>';
	//echo '<a class="pure-button " href="manage/currentregs.php">Current Regs</a>';
	echo '<a class="pure-button" href="manage/displaybydate.php">Registrations</a>';}?>
	<a class="pure-button" href="process/logoutms.php">Main Site</a>
        <?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{
	//echo '<a class="pure-button" href="process/logout.php">Log Out</a>';
	}?>
	</div>


		<div id="section1">
<div id="leftcolumn">
		<div id="headline" > Administration</div>
	
<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see administator menu</p></div>';}else{echo 'Use the menu to view records.</div>';} ?>
</div>

<div id="rightcolumn">
	<?php 
	if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{
			include 'forms/loginform.php';
	}
	else{
	
	$bar = $ausername;
		include 'forms/loggedinform.php';
	 }?> 
	 </div>
	 </div>
	 <div id="section2">
	 <div id="leftcolumn2">
	

 		</div></div></div></br></br>

</body>
</html>