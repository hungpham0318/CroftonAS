<?php session_start();

require('caslog/includes/config.php'); 
if( $user->is_logged_in() ){ header('Location: /caslog/userlanding.php'); } 
header("Cache-Control: max-age=36000"); //30days (60sec * 60min * 24hours * 30days)
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

$quid = $_SESSION['uid'];

//define page title
$title =  'Home';?>
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
    
.background{
   background-attachment: fixed;
    background-position: center;
    background-image: url(/images/wideaerial-sm3.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    opacity:.5}
    
/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  margin:0;
  background-color: #ffffff;
  text-transform: uppercase;
  color: #440000;
  padding: .1rem .2vw .1rem .3vw;
  border: none;
  cursor: pointer;
  opacity: 1;
  position: fixed;
  bottom: 1.5rem;
  right: 2vw;
  width: auto;
  font-size: 1.5rem;
  letter-spacing: .15rem;
  font-weight: bold;
 /* font-family: "Calibri Light", "Arial Narrow", sans-serif;*/
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: absolute;
  /*top: 7.8rem;*/
  top: 70%;
  transform: translateY(-60%);
left: 50%;
  /*min-height: 30rem;*/
  z-index: 9;
  
}

.grecaptcha-badge {
display: none !important;
}

.footcontainer{width:1010px!important; margin:0 auto;}
.contact-area {
	/*max-width: 300px;*/
	font-size:2rem;
	letter-spacing:.15rem;
	font-weight:300;
	color:#440000;
	opacity:1;
	/*overflow:auto;*/
	float:left;
	width: 30vw;
	margin:1vw;
	padding:1rem 2vw 2rem 1vw;
	background-color: #ffffff;
	/*min-height: 30rem;*/
}

.contact-area h3 {
     margin: 0 0 0 .2vw; 
     padding: 0; 
     font-size:2rem;
     font-weight:normal;
}

.contact-area input, .contact-area textarea {
	width: 100%;
	padding: .3vw;
	margin: .7vw;
	background: #ffffff;
font: normal 16px 'Open Sans';
   	color:#440000;
  	   
        font-weight: normal;
     
  /*  font-family: Calibri, arial, sans-serif;
    	font-size: 2rem;
	font-weight:normal;
	letter-spacing: .15rem;*/

	background-color:transparent;
	border-top: 1px solid transparent;
	border-left: 1px solid transparent;
	border-bottom: 1px solid #440000;
	border-right: 1px solid transparent;
	margin-bottom:.15rem;
}

.contact-area textarea {
	height: 7rem;
	color:#440000;
	background-color:transparent;
	border-top: 1px solid transparent;
	border-left: 1px solid transparent;
	border-bottom: 1px solid #440000;
	border-right: 1px solid transparent;
  
}

.contact-area textarea:focus, .contact-area input:focus {
	background-color:#ffffff;
	border-top: 1px solid transparent;
	border-left: 1px solid transparent;
	border-bottom: 1px solid #440000;
	border-right: 1px solid transparent;
	color:#440000;
  
}

/*.contact-area .submit-button, .contact-area .cancel {*/
.submit-button {width:30rem!important;}
.contact-area  .contact-area .cancel {	
	text-transform:uppercase;
	font-size: 2rem;
    width: 100%;
    margin-left:1vw;
	padding: 1vw;
	color: #440000;
	background-color:transparent;
	border-top: 1px solid #440000;
	border-left: 1px solid #440000;
	border-bottom: 1px solid #440000;
	border-right: 1px solid #440000;
	cursor: pointer;
    -moz-transition:all 0.1s ease-in-out;
	-webkit-transition:all 0.1s ease-in-out;
	-o-transition:all 0.1s ease-in-out;
	-ms-transition:all 0.1s ease-in-out;
	transition:all 0.1s ease-in-out;
}

.contact-area .submit-button:hover, .contact-area .cancel:hover {

  color:#660000;
  background-color:#ffffff;


}


</style>

</head>
 <!-- <body style="background-attachment:fixed;background-position: center;background-image:url(/images/auctionaerialcoll2.jpg)">
 <body style="background-attachment:fixed;background-position: center;background-image:url(/images/wideaerial-sm3.jpg)">-->
<!--<body style="background-image:url(/images/wideaerial.jpg)">-->
<!--<div class="container-fluid container">-->
<div class="container-noboot" style="background-color: rgba(255, 255, 255, 0.95);background-color: rgba(255, 255, 255, 0.85);transition: .1s all ease-out;">
<!--<div class="row baner">

	

	
	<div class="middlespan col-xs-12">-->
		<div class="wrapper" style="">
<header>
 <?php include "template/newbuttons2.php";?>



			<span id="banner">
				<img src="/images/banner4.png" alt="crofton auction services banner for website" />
			<span class="clearfix"></span></span><!--banner-->
		</header>
		<div id="navigation" >
			<?php 
		
	echo '<div class="btn-toolbar" role="toolbar" aria-label="...">';
	
	echo '<div id="textalignright"  style = "float:left!important;" class="btn-group"><a class="btn btn-primary" href="/caslog/login.php" title="Users may log in">Log In</a></div>';
    
	echo '<div class="btn-group" style = "float:right!important;"><p  onclick="contactTab()" id="home" class="btn btn-primary">New Here?</p></div>';

        
       

			
			
			
			?>
		
		
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
