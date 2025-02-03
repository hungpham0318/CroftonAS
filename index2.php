<?php session_start();

require('caslog/includes/config.php'); 
if( $user->is_logged_in() ){ header('Location: /caslog/userlanding.php'); } 
header("Cache-Control: max-age=36000"); //30days (60sec * 60min * 24hours * 30days)
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

$quid = $_SESSION['uid'];

//define page title
$title =  'Index';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;?></title>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"/>	
	<link rel="stylesheet" href="/common/css/homepageonly.css" type="text/css"/> 
<!-- <link rel="stylesheet" href="/common/css/loginuser.css" type="text/css"/> -->
	<!--**-->
	<link href="./images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
<style>
body{
   background-attachment: fixed;
    background-position: center;
    background-image: url(/images/wideaerial-sm3.jpg);
    background-repeat: no-repeat;
    background-size: cover;}
</style>

</head>
 <!-- <body style="background-attachment:fixed;background-position: center;background-image:url(/images/auctionaerialcoll2.jpg)">
 <body style="background-attachment:fixed;background-position: center;background-image:url(/images/wideaerial-sm3.jpg)">-->
<!--<body style="background-image:url(/images/wideaerial.jpg)">-->
<!--<div class="container-fluid container">-->
<div class="container-noboot" style="background-color: rgba(255, 255, 255, 0.95);background-color: rgba(255, 255, 255, 0.1);transition: 1s all ease-out;">
<!--<div class="row baner">

	

	
	<div class="middlespan col-xs-12">-->
		<div class="wrapper" style="">




			<span id="banner">
				<img src="images/banner4.png" alt="crofton auction services banner for website" />
			<span class="clearfix"></span></span><!--banner-->
		
		<div id="navigation" >
			<?php require "./caslog/includes/navcontents.html"; ?>
		<span class="clearfix"></span></div><!--navigation-->
	
		<span id="headline">Your Pipeline through the Auction!<span class="clearfix"></span></span>
			<span class="intoday">In today&apos;s wholesale environment dealers are sourcing their used inventory from a multitude of inventory channels. This leaves the disposal of aged and unwanted wholesale inventory as a second thought to many dealers. Fear of the auctions or a lack of time to devote to moving this challenging inventory leads to a lower return and a higher risk than necessary.
		</span><!--intoday1 col-xs-10-->
	
	
	
	<span class="leftcolumns2 wehavea"> 
			We have a streamlined, and effective way to consistently turn this inventory for you. We use the strengths of Manheim Auctions, our personal experience with the Auction process, and selected vendors. Our process begins with an online registration for the vehicles that need to be sold. The dealer would select the level of clean up required and the floor price. From there we can help provide transportation or track your trucker&apos;s delivery to the auction.<br><br>
	<span class="clearfix"></span></span>	<!--col-md-05 for left col text-->
 		
 		
	<span class="leftcolumns2 deskpic"><img src="images/line1.jpg"  alt="line1"/>
			<span class="clearfix"></span>
	</span> 
	
	
		
		

	<div class="rightcolumns2 fromthere">
		From there we:<br>
		<ul>
			<li>Provide the necessary clean up</li>
			<li>Advise any other repairs necessary</li>
			<li>Move unit to auction for Condition Report</li>
			<li>Audit select condition reports for accuracy</li>
			<li>Register in our reserved Lane and Run number order</li>
			<li>Represent the vehicle on sale day with integrity</li>
			<li>Arrange for OVE listings for unsold inventory</li>
			<li>Facilitate any arbitration issues for accuracy and/or repair</li>
		</ul><span class="clearfix"></span>
	</div>
	
	<span class="rightcolumns2 linepic">
		<img src="images/auctiondesk.jpg" alt="auction desk picture"/>
	<span class="clearfix"></span></span><!-- end: image line1 -->
	<span class="clearfix"></span><span class="clearfix"></span>
	<div id="fulllower">
Your safety and security are maintained by having the vehicles registered under your auction access number. Titles are sent directly to the auction&apos;s title department and all checks for vehicles are issued by the auction to the selling dealer. Charges for clean up and ancillary services are charged when services are rendered. Our fee for representation is only charged upon the successful completion of the sale.</div>
</div><!--wrapperw-->
<span class="footcontainer">
	<br>Crofton Auction Services
	<br>5 Park Place &nbsp;Suite 519
	<br>Annapolis, MD 21401
	<br><a style="color: #801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a>
</span> <!-- footcontainer	-->
<!-- </div> -middleRow Closed 
	<span class="col-md-1 "><span class="behindwrapper"></span> 
</span>-->
	
<!--	</div> row-->
</div><!--container-->


<script type="text/javascript" charset="utf-8" src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--

<script> 
if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var home = document.getElementById("home").getElementsByTagName('a')[0];
home.className = 'btn-current';
}
</script>
-->


 <script> 
if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var index = document.getElementById("index").getElementsByTagName('a')[0];
index.className = 'btn-current';
}
</script>

</body>
</html>
