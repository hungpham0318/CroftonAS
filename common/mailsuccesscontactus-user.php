<?php ob_start();
session_start();
	if(!isset($_SESSION['uusername']) || $_SESSION['uusername']=="")
	{
			  
	}
	else{
		$uusername=$_SESSION['uusername'];
		$upassword=$_SESSION['upassword'];
		$cas_uid=$_SESSION['cas_uid'];
		$umobile=$_SESSION['umobile'];
		$uemail=$_SESSION['uemail'];
		$uname=$_SESSION['uname'];
		
	 } 
		?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="../common/css/home.css" type="text/css" />
		<link rel="stylesheet" href="../common/css/login.css" type="text/css" />
		
		<link rel="stylesheet" href="../common/css/purebuttons.css" type="text/css" />
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="css/datepicker.css">

 
</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
	
        <a class="pure-button" href="../index.php">Home</a>
       
       		<?php if(!isset($_SESSION['uusername']) || $_SESSION['uusername']==""){}else{echo '<a class="pure-button"     href="../../areg/stepone.php">Register Vehicles</a>';}?>
		<?php if(!isset($_SESSION['uusername']) || $_SESSION['uusername']==""){	echo '<a class="pure-button button-success" href="../contactus.php">Contact Us</a>';}else{echo '<a class="pure-button" href="../contactcas.php">Contact CAS</a>';}?>
       </div>
		<div id="section1">
<div id="leftcolumn">


		
Your Message was successfully sent. 
     
		
	

</div>
<div id="rightcolumns1">
	<?php 
	if(!isset($_SESSION['uusername']) || $_SESSION['uusername']=="")
	{
			include 'loginform.php';
	}
	else{ $foo = strtolower($uname);
		$bar = ucwords($foo);
	
		include 'loggedinform.php';
		
	 }?> 
	 </div>

	 </div>
	
	 
	

		
		
</div>
 		



 		
 		<div class="footcontainer" >
	
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color: #801323;" href="tel:301-706-7951">301-706-7951</a></p>
</div>

</body>
</html>