<?php
	session_start();
	if(!isset($_SESSION['uusername']) || $_SESSION['uusername']=="")
	{
		echo "Please login to see this page.....";
		exit();	  
	}
	else{
		$uusername=$_SESSION['uusername'];
		$upassword=$_SESSION['upassword'];
		$cas_uid=$_SESSION['cas_uid'];
		$umobile=$_SESSION['umobile'];
		$uemail=$_SESSION['uemail'];
		$uname=$_SESSION['uname'];
		}?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>StepOne</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content=""/>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="../common/css/home.css" type="text/css" />
		<link rel="stylesheet" href="../common/css/login.css" type="text/css" />
		<link rel="stylesheet" href="../common/css/purebuttons.css" type="text/css" />
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="../../common/css/datepicker.css">
</head>
<body>
    <script>
   $(function () {
    $('#datepicker').datepicker({ minDate: 1,dateFormat: "mm-dd-yy" });
});
  </script>
	<div class="container">
		<div id="banner">
<img src="../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
<a class="pure-button" href="../index.php">Home</a>
<?php if(!isset($_SESSION['uusername']) || $_SESSION['uusername']==""){}else{echo '<a class="pure-button button-success"     href="../../areg/stepone.php">Register Vehicles</a>';}?>
<?php if(!isset($_SESSION['uusername']) || $_SESSION['uusername']==""){	echo '<a class="pure-button button" href="contactus.php">Contact Us</a>';}else{echo '<a class="pure-button" href="../contactcas.php">Contact CAS</a>';}?>
</div>
<div id="section1">
<div id="leftcolumns1">	
<form name="stepone" id="stepone">
<small>All fields are are required.</small></br></br>
<div id="selectauctionfield">
<label>Auction</label></br>
<select id="selectauction" required onchange="check()">
<option value="">Choose Auction Location</option>
			<?php include_once '../areg/common/selectajaxauction.php';?>
<!--<option value="auction/registration.php">Manheim Pennsylvania</option>
       <option value="auction2/registration.php">Demonstration</option>-->
        <!-- <option value="auction3/registration.php">Manheim Central Penn</option>
         <option value="auction4/paste.php">Demonstration</option> </select> -->
       </div>
        </br>
        <label>Name</label></br><input type="text" name="uname" id="uname" value="<?php echo $uname; ?>"  required  /><br />
	</br><label>Email</label></br><input type="type="email" id="uemail" name="uemail" value="<?php echo $uemail; ?>" required  /><br />
	</br><label>Requested Sale Date</label></br><input class="datepicker"  required type="text" name="sale_date" id="datepicker" value=""/></br></br>
	<input type="hidden" id="cas_uid" name="cas_uid" value="<?php echo $cas_uid; ?>" class="inputbox "/>
	<input type="hidden" id="your_phone" name="umobile" value="<?php echo $umobile; ?>" class="inputbox "/>
<input type="hidden" id="auction" name="auction" value="<?php echo $auction; ?>" class="inputbox "/>
	<button type="submit" class="pure-button button-success" id="cf_ce-submit-button">Continue</button>
        </form>

</div>
<div id="rightcolumns1">
	<?php 
	if(!isset($_SESSION['uusername']) || $_SESSION['uusername']=="")
	{
			include '../common/loginform.php';
	}
	else{ $foo = strtolower($uname);
		$bar = ucwords($foo);
		include '../common/loggedinform.php';
	 }?> 
	 </div>
	 </div>
</div>
<div class="footcontainer" >
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>
	
<script type="text/javascript">
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