<?php session_start();
	if(!isset($_SESSION['uusername']) || $_SESSION['uusername']=="")
	{
		
		  
	}
	else{
		$uusername=$_SESSION['uusername'];
		$upassword=$_SESSION['upassword'];
		$cas_uid=$_SESSION['cas_uid'];
		$umobile=$_SESSION['umobile'];
		$uemail=$_SESSION['uemail'];
		$uname=$_SESSION['uname'];
		$auction=$_SESSION['auction'];
		
		
		//$a=$_GET['a'];
		//if ($a=='mp') {
    			//$auction = "Manheim Pennsylvania";
				//} else if ($a=='mcp'){
    					//$auction = "Manheim Central Penn";
						//}else if ($a=='DEM'){
    							//$auction = "Demonstration";}
    								//else {$auction="unknown";}
		
		
		
	 } 
		?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>SUCCESS! User Follow-up to CAS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="../common/css/home.css" type="text/css" />
		<link rel="stylesheet" href="../common/css/login.css" type="text/css" />
		
		<link rel="stylesheet" href="../common/css/purebuttons.css" type="text/css" />
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		


</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
	
        <a class="pure-button" href="index.php">Home</a>
       
       		<?php if(!isset($_SESSION['uusername']) || $_SESSION['uusername']==""){}else{echo '<a class="pure-button"     href="/areg/stepone.php">Register Vehicles</a>';}?>
		<?php if(!isset($_SESSION['uusername']) || $_SESSION['uusername']==""){	echo '<a class="pure-button button-success" href="contactus.php">Contact Us</a>';}else{echo '<a class="pure-button button-success" href="contactcas.php">Contact CAS</a>';}?>
       </div>
<div id="section1">
<div id=headline"><span style="text-align:left;"> Success!  Your registration was successfully submitted.  You can use this form to send follow-up info only to CAS, not the auction. You will also receive a copy of this email for your records.</span>
<div id="leftcolumns1">
		
<form name="contactcas" id="contactcas"method="post"action="common/process/contactcas-form-process-success.php">
<small>All fields are required.</small></br>
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