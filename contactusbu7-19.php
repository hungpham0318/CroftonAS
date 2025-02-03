<?php session_start();
header("Cache-Control: max-age=28800"); //8hrs not30days (60sec * 60min * 24hours * 30days)
require('./caslog/includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

$quid = $_SESSION['uid'];

//define page title
$title =  'Contact Us'; 
//-----------------------------
$uusername=$_SESSION['username'];
		$upassword=$_SESSION['password'];
		$cas_uid=$_SESSION['uid'];
		$umobile=$_SESSION['umobile'];
		$uemail=$_SESSION['email'];
		$uname=$_SESSION['uname'];
//-----------------------------
$msg=$_GET['msg'];
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<!-- ***Edit Meta Data*** -->
    <title><?php echo $title;?></title>
	<meta name="Description" content="Online Vehicle Registration for Auction">
	
	<!-- ***Additional meta data, including social, mircrodata, and JSON-LD goes here*** -->
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
 

<!-- BootStrap CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" type="text/css">
 
  <!-- jQuery CSS -->

   
	
	<!-- ***Include additional CSS resources here*** -->
<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css">	
<!--<link rel="stylesheet" href="/common/css/home.css" type="text/css" />-->

<!--<link rel="stylesheet" href="/common/css/login.css" type="text/css" /> -->
<link rel="stylesheet" href="/common/css/loginuser.css" type="text/css" />
<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
		

		
		



</head>
<body style="background-attachment:fixed;background-position: center;background-image:url(/images/wideaerial-sm3.jpg)">
<div class="container-noboot" >
<div id="banner">
<img src="../images/banner4.png" alt="crofton auction services banner for website" style="opacity:.9;" />
</div>
<div id="navigation">
<?php require "./caslog/includes/navcontents.html"; ?>
</div>
<form name="contactcas" id="contactcas" class="contactusfrm" method="post" action="common/process/contactcas-form-process.php">
<?php echo $msg;
if($msg === 1){echo'<fieldset><legend style="">Thank you!  Your message has been sent. </legend><br><br>';

}else{
echo'<fieldset><legend style="">Send us a Message or Ask a Question</legend><br><br>';}?>
<table class="label-input">
<tr>
<td><label>Name:</label></td><td><input type="text" name="uname" id="uname" value="<?php echo $uname; ?>"  required>
</td></tr><tr><td><label>Email: </label></td><td><input type="email" id="uemail" name="uemail" value="<?php echo $uemail; ?>" required>
</td></tr><tr><td><label>Phone: </label></td><td><input type="text" id="umobile" name="vphone" style="border:1px solid #660000;" value="<?php echo $umobile; ?>" required> 
</td></tr><tr><td><label style="white-space: nowrap;">Message or Request: </label>
</td></tr><tr><td><textarea rows="5" cols="30" class="" style="border:1px solid #660000;margin-left:5px;margin-right:5px;line-height:2em;"  name="txtmessage"  required></textarea>
</td></tr><tr><td><input type="hidden" id="cas_uid" name="cas_uid" value="<?php echo $cas_uid; ?>" class="inputbox "/>
	</td><td><input type="hidden" id="your_phone" name="umobile" value="<?php echo $umobile; ?>" class="inputbox "/></td></tr></table>
</fieldset><br><fieldset>
	<button type="submit" style="margin:0 auto; margin-top:40px;display:block;width:30px;" class="btn btn-primary" >Send</button>
</fieldset><br>
        </form>
       <div style="clear:both;"></div>
			 </div>
	




	
<div class="footcontainer" >
	
Crofton Auction Services<br>
5 Park Place<br>
Suite 519<br>
Annapolis, MD 21401<br>
<a style="color: #550000; text-decoration:none;" href="tel:301-706-7951">301-706-7951</a>
</div>




      <!-- jQuery(necessary for Bootstrap's JavaScript plugins) -->
<script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <!-- BootStrap -->
<script type="text/javascript" charset="utf-8" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

     

      <!-- DataTables -->

	
      <!-- Core Logic -->
<script type="text/javascript">
if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var home = document.getElementById("home").getElementsByTagName('a')[0];
home.className = 'btn-current';
}
</script>
</body>
</html>



