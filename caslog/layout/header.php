<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="/common/css/home.css" type="text/css" />
	<link rel="stylesheet" href="/common/css/login.css" type="text/css" />
	<link href="./images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	
    	<link rel="stylesheet" href="style/main.css">
</head>
<body>
	<div class="container">
	<div id="banner">
<img src="../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<!--<div id="navigation">
        <a class="pure-button button-success" href="../../index.php">Home</a>
	<a class="pure-button" href="../../contactus.php" title="Users may log in for User Contact Form which has name, email, and phone pre-filled">Contact Us</a>
        <a class="pure-button" href="/areg/stepone.php">Register Vehicles</a>
</div> -->



<div id="navigation">
	
        <a class="pure-button button-success" href="index.php">Home</a>
       
       	
	
	<?php if(!isset($_SESSION['username']) || $_SESSION['username']==""){
echo '<a class="pure-button" href="contactus.php" title="Users may log in for User Contact Form which has name, email, and phone pre-filled">Contact Us</a>';

echo '<a class="pure-button" href="/caslog/index.php" title="Sign me up!">Sign Me Up!</a>';
}else{
echo '<a class="pure-button" href="contactcas.php">Contact CAS</a>';

echo '<a class="pure-button" href="/areg/stepone.php">Register Vehicles</a>';
echo '<a class="pure-button" href="/caslog/memberpage.php">caslog/memberpage</a>';
echo '<a class="pure-button" href="/memberpage.php">memberpage</a>';
echo $_SESSION['username'];
echo '<a class="pure-button" href="logout.php">Log Out</a>';
}?>
</div>
<div id="section1">
<div id="rightcolumns1">
	 <?php if(!isset($_SESSION['username']) || $_SESSION['username']==""){
echo '<a class="pure-button" href="/caslog/login.php" title="Users may log in">Log In</a>';

}else{

echo '<a class="pure-button" href="/caslog/logout.php" title="Log Out">Log Out</a></br>';
}?>
	 </div> 
