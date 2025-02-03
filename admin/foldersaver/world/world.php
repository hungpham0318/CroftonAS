<?php session_start();
//admin/regman/soldhtml.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){
	//header('Location: /admin/index.php');}else{
		$ausername=$_SESSION['ausername'];
		//$apassword=$_SESSION['apassword'];
		$admin_perms=$_SESSION['aperms'];
		$title =  'The World: Step One!';  
		$page_perms = 3;
		

//session_start();
//header("Cache-Control: max-age=36000"); //30days (60sec * 60min * 24hours * 30days)
//require('caslog/includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 
}?>
<?php 
// session_start();
//include config
// require_once('includes/config.php');

//check if already logged in move to home page
// if( $user->is_logged_in() ){ header('Location: /index.php'); } 


//$quid = $_SESSION['uid'];

//define page title
//$title =  'The World: Step One!';  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"/>	
	<!--<link rel="stylesheet" href="/common/css/admin.css" type="text/css"/>-->
	<link rel="stylesheet" href="/common/css/world.css" type="text/css"/>
	<link href="./images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	
	
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
body{
	background-color:#660000;
	 font-size: 14px;
        font-weight: normal;
        font-family:'Open Sans';
	color: #ffffff;
	line-height: 1.6em;
	width:100%;
	margin:0 auto;
}
.wrap-it{
	background-color:#ffffff;
	border-radius:.5em;
	display:inline:block;
	margin: auto;
}
.wrap-it>.admin-wrap{
	min-width:980px;
	min-width:85%;
	margin:auto;
}
.banner{
	display:inline-block;
	width:100%;
	margin:0 auto;
}
.banner img {
    width: 100%;
    margin: 0 auto;
    padding: 1em;
    border-radius: .3em;
}
#navigation{
	background-color:#dec9a5;

}
.btn-group>.open:active{background-color:#660000;}
.btn>.btn-primary>.dropdown-toggle.{background-color:#660000;}
.dropdown-divider{}
.dropdown-item{
	color:#660000;
}
.dropdown-menu{
background-color:ffffff;
border:none;
color:#660000;
padding-left:.2em;
width:auto;
margin:0;
line-height:1.2em;	
}
</style>
	

	

</head>
<body>
<div class="wrap-it admin-wrap">
<div class="banner">
<img src="/images/croftonasbanner3.png">
</div>
<!--navigation div-->

			<?php require "../../caslog/includes/navcontents-admin.html"; ?>



</div>
<span class="container"></span>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


 <script> 
if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var home = document.getElementById("home").getElementsByTagName('a')[0];
home.className = 'btn-current';
}
</script>
</body>
</html>