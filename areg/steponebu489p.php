<?php session_start();
header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
require('../caslog/includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

$quid = $_SESSION['uid'];

//define page title
$title =  'Step One'; 
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
	

<!-- ***Additional meta data, including social, mircrodata, and JSON-LD goes here*** -->
<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/normalize.css">	
 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

 <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
		<link rel="stylesheet" type="text/css" href="/common/css/stepone.css" >
		<!--<link rel="stylesheet" type="text/css" href="/common/css/login.css">-->
	
		<link rel="stylesheet" type="text/css" href="/common/css/sb-btn.css" type="text/css">	


<style> 


table {
	font-size: 1em;
}

.ui-draggable, .ui-droppable {
	background-position: top;
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
    border: 1px solid #660000;
    background: #dec9a4;
    font-weight: normal;
    color: #454545;}

.ui-widget-header {
    border: 1px solid #660000;
    background: #660000;
    color:#ffffff;}
.ui-icon, .ui-widget-content .ui-icon {
    background-image: url(http://croftonas.com/areg/css/images/ui-icons_ffffff_256x240.png);
    ui-state-default ui-state-active {
    
    }
}
</style>


</head>
<body>
 <div class="wrapper" style="">




 
		<div id="banner">
<img src="../images/banner4.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
<?php require "../caslog/includes/navcontents.html"; ?>
</div>

<div id="section1">

<form name="stepone" id="stepone" style="">
<small>All fields are are required.</small>
<div id="selectauctionfield"><br><br>
<label>Auction</label><br>
<select id="selectauction" required onchange="check()">
<option value="">Click to Choose Auction Location</option>
			<?php include_once '../areg/common/selectajaxauction.php';?>
<!--<option value="auction/registration.php">Manheim Pennsylvania</option>
       <option value="auction2/registration.php">Demonstration</option>-->
        <!-- <option value="auction3/registration.php">Manheim Central Penn</option>
         <option value="auction4/paste.php">Demonstration</option> </select> -->
       </div>
        <br>
        <label>Name</label><br><input type="text" name="uname" id="uname" value="<?php echo $uname; ?>"  required  /><br>
	<label>Email</label><br><input type="type="email" id="uemail" name="uemail" value="<?php echo $uemail; ?>" required  /><br>
	<div id="mydatepicker"><label>Requested Sale Date</label></br><p><input type="text" class="inputbox" name="sale_date" id="datepicker" placeholder="Click here to Request Sale Date" required /></p></div></br></br>

	<input type="hidden" id="cas_uid" name="cas_uid" value="<?php echo $cas_uid; ?>" class="inputbox"/>
	<input type="hidden" id="your_phone" name="umobile" value="<?php echo $umobile; ?>" class="inputbox"/>
<input type="hidden" id="auction" name="auction" value="<?php echo $auction; ?>" class="inputbox "/>
	<button type="submit" class="btn btn-primary" id="submit-button">Continue</button>
        </form>

</div>

</div>
<div class="footcontainer" >
<p>Crofton Auction Services</p>
<p>5 Park Place, Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
  <script type="text/javascript" charset="utf8" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


  <script>
  $( function() {
    $( "#datepicker" ).datepicker({minDate: 0});
    
  
    
    
    
  } );
  </script>



<script>

if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var home = document.getElementById("home").getElementsByTagName('a')[0];
home.className = 'btn-current';
}
 

function check() {
var f = document.getElementById('stepone');
var s = document.getElementById('selectauction');
if( s.selectedIndex == 1 ) { 
f.setAttribute("method","POST");
f.setAttribute("action",s.options[1].value) ; 
$auction="Manheim Pennsylvania" 
}
if( s.selectedIndex == 2 ) { 
f.setAttribute("method","POST");
f.setAttribute("action",s.options[2].value) ; 
$auction="Demonstration"  
}
if( s.selectedIndex == 3 ) { 
f.setAttribute("method","POST");
f.setAttribute("action",s.options[3].value) ;  
$auction="Bel Air"  
}
if( s.selectedIndex == 4 ) { 
f.setAttribute("method","POST");
f.setAttribute("action",s.options[4].value) ;  
$auction="Test"
}
}
</script>
</body>
</html>