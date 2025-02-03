<?php session_start();
//admin/index.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		$uid=$_SESSION['uid'];
echo 'uid: '.$uid;
}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Admin Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="css/admin.css" type="text/css" />
		<link rel="stylesheet" href="../common/css/login.css" type="text/css" />
		
		
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

</head>
<body>

<div class="containerAdminIncludeClip">
	
		<!--<div id="banner"> 
<img src="../images/croftonasbanner3.png" alt="crofton auction services banner for website" style="width:400px!important;"/>
</div> -->
<div id="section1">
<div id="leftcolumnAdminIncludeClip"style=""><img src="../images/croftonasbanner3.png"  alt="crofton auction services banner for website"style="" />
		<div id="navigation"">
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{ include 'incmenu.htm';}?>
	<br/>
	</div>	
	<div id="headline" > Administration</div>
	 <div id="section2">
<div id="">

<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see administator menu</p></div>';}else{echo 'Use the menu to perform administrative tasks.</div>';} ?>
</div>

<div id=""style="">
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
	</br>
	</br>
</div>
</body>
</html>