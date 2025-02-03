<?php session_start();
header("Cache-Control: max-age=28800"); //8hrs not30days (60sec * 60min * 24hours * 30days)
require('./caslog/includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

$quid = $_SESSION['uid'];

//define page title
$title =  'Change Request'; 
//-----------------------------
$uusername=$_SESSION['username'];
		$upassword=$_SESSION['password'];
		$cas_uid=$_SESSION['uid'];
		$umobile=$_SESSION['umobile'];
		$uemail=$_SESSION['email'];
		$uname=$_SESSION['uname'];
//-----------------------------
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
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"> 
    <!-- DataTables CSS 
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">-->
	
	<!-- ***Include additional CSS resources here*** -->
		<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css">	
	<!--		<link rel="stylesheet" href="/common/css/loginuser.css" type="text/css" />-->
	<link rel="stylesheet" href="/common/css/contactcas.css" type="text/css" />
		<link rel="stylesheet" href="../common/css/purebuttons.css" type="text/css" />
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		

<style>
/*body{margin:0 auto; background:#660000;}*/
</style>

</head>
<body >

	<div class="wrapper">
	
		<div id="banner">
<img src="../images/banner4.png" alt="crofton auction services banner for website" />
</div>

<div id="navigation">
<?php require "./caslog/includes/navcontents.html"; ?>
</div>



<div id="section1">
<div id="leftcolumns1" style="width:45%;display:overflow;float:left;margin:0 auto;">
<table id="likelogin"><tbody><tr><td>		
<form name="contactcas" id="contactcas"method="post"action="common/process/contactcas-form-process-user.php">
        <label>Name</label></br><input type="text" name="uname" id="uname" value="<?php echo $uname; ?>"  required><br>
	<label>Email</label></br><input type="email" id="uemail" name="uemail" value="<?php echo $uemail; ?>" required><br>
	<label>Phone</label></br><input type="text" id="umobile" name="umobile" value="<?php echo $umobile; ?>" required><br>
	<label>Question or Changes:</label></br><textarea  class="" required type="textarea" name="txtmessage" id="message" value="" style="width:18.75em;" required></textarea></br>
	<input type="hidden" id="cas_uid" name="cas_uid" value="<?php echo $cas_uid; ?>" class="inputbox "/>
	<input type="hidden" id="your_phone" name="umobile" value="<?php echo $umobile; ?>" class="inputbox "/>
</td></tr>
<tr><td>
	
	<button type="submit" class="btn btn-primary" style="float:left;margin-left:150px;" id="cf_ce-submit-button">Send</button>
<br><br></td></tr></tbody></table>
        </form>
       
			 </div>
	



<div id="rightcolumns1" style="width:45%;display:overflow;float:right;margin:0 auto;">
	
	 <br><span style="text-align: center; font-size:1.2em; font-weight: 650; float:left;line-height:1.2em;min-height: 10em;">		
<p>Directly Text, Call or Email:</span><br>

Mike Dunne<br>301-706-7951</br>miked@croftonas.com</br></br>

Kelly Zeigler</br> 717-587-8707</br>kellyz@croftonas.com</br></br>

Missy Oswald</br> 717-330-2974</br> missyo@croftonas.com</br></br></p>
	 </div>

	
</div></div>
	</div>
 		<div class="footcontainer" >
	
<p>Crofton Auction Services</p>
<p>5 Park Place, Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color: #801323; text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>




      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <!-- BootStrap -->
<script type="text/javascript" charset="utf8" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

      <!-- <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>-->
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
	
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



