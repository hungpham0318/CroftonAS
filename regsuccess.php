<?php session_start();

require('caslog/includes/config.php'); 

$quid = $_SESSION['uid'];
$msg=0;
$msg = $_GET['msg'];
//define page title
$title =  'Success!';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;?></title>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
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
	<?php if($msg <= '0'){echo'';}else{echo 'Thank you!  Your message has been sent.<br><br>';}?>
<div id="section1">
<div id=headline"><span style="text-align:left;"> Success!  Your registration was successfully submitted.  You can use this form to send follow-up info only to CAS, not the auction. You will also receive a copy of this email for your records.</span>

		
<form name="contactcas" id="contactcas"method="post"action="common/process/contactcas-form-process-success.php">
<fieldset style="margin-left:100px;width:500px;"><legend>
<small>All fields are required.</small></br></legend>
        </br>
        <label>Auction</label></br><input type="text" name="auction" id="auction" value="<?php echo $auction; ?>"  required  /><br />
	
        </br><label>Name</label></br><input type="text" name="uname" id="uname" value="<?php echo $uname; ?>"  required  /><br />
	</br><label>Email</label></br><input type="email" id="uemail" name="uemail" value="<?php echo $uemail; ?>" required  /><br />
	</br><label>Email</label></br><input type="text" id="umobile" name="umobile" value="<?php echo $umobile; ?>" required  /><br />
	</br><label>Message</label></br><textarea rows="10" cols="50" class="" required type="textarea" name="txtmessage" id="message" value="" required></textarea></br></br>
	<input type="hidden" id="cas_uid" name="cas_uid" value="<?php echo $cas_uid; ?>" class="inputbox "/>
	<input type="hidden" id="your_phone" name="umobile" value="<?php echo $umobile; ?>" class="inputbox "/>
	<input type="hidden" id="auction" name="auction" value="<?php echo $auction; ?>" class="inputbox "/>


	
	<button type="submit" class="pure-button button-success" id="cf_ce-submit-button">Send</button>
</fieldset>
        </form>
       
		
	

</div>

<div id="rightcolumns1">
	<?php 
	if(!isset($_SESSION['uusername']) || $_SESSION['uusername']=="")
	{
			include 'common/loginform.php';
	}
	else{ $foo = strtolower($uname);
		$bar = ucwords($foo);
	
		include 'common/loggedinform.php';
		
	 }?> 
	 </div>
	 </div>
	
</div></div>
	
 		<div class="footcontainer" >
	
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color: #801323; text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>
</body>
</html>