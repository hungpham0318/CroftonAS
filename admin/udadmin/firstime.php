<!DOCTYPE html>
<html>
  <head>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;?></title>
    
    <link rel="stylesheet" href="/common/css/caslog-index-signup.css" type="text/css">
 <link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css">	

<link rel="stylesheet" href="/common/css/caslogloginbegin.css" type="text/css" /> 
<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    
<style>

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  top: 11rem;
  right: 2.0rem;

  z-index: 9;
  
}


.contact-area {
	/*max-width: 300px;*/
	font-size:1vw;
	letter-spacing:.15vw;
	font-weight:300;
	color:#aeaeae;
	opacity:0.9;
	overflow:auto;
	float:left;
	width: 30vw;
	margin:1vw;
	padding:1vw 2vw 2vw 1vw;
	background-color: #3c3c3c;
	height: auto;
}

.contact-area h3 {
     margin: 0 0 0 .2vw; 
     padding: 0; 
     font-size:3vw;
     font-weight:normal;
}

.contact-area input, .contact-area textarea {
	width: 100%;
	padding: .3vw;
	margin: .7vw;
	background: #3c3c3c;
	font-size: 1vw;
    font-family: Calibri, arial, sans-serif;
	font-weight:normal;
	letter-spacing: .15vw;
	color:#aeaeae;
	background-color:transparent;
	border-top: 1px solid transparent;
	border-left: 1px solid transparent;
	border-bottom: 1px solid #aeaeae;
	border-right: 1px solid transparent;
	margin-bottom:.15vw;
}

.contact-area textarea {
	height: 10rem;
	color:#aeaeae;
	background-color:transparent;
	border-top: 1px solid transparent;
	border-left: 1px solid transparent;
	border-bottom: 1px solid #aeaeae;
	border-right: 1px solid transparent;
  
}

.contact-area textarea:focus, .contact-area input:focus {
	background-color:#3c3c3c;
	border-top: 1px solid transparent;
	border-left: 1px solid transparent;
	border-bottom: 1px solid #aeaeae;
	border-right: 1px solid transparent;
  
}

.contact-area .submit-button, .contact-area .cancel {
	
	text-transform:uppercase;
	font-size: 1vw;
    width: 100%;
    margin-left:1vw;
	padding: 1vw;
	color: #aeaeae;
	background-color:transparent;
	border-top: 1px solid #aeaeae;
	border-left: 1px solid #aeaeae;
	border-bottom: 1px solid #aeaeae;
	border-right: 1px solid #aeaeae;
	cursor: pointer;
    -moz-transition:all 0.1s ease-in-out;
	-webkit-transition:all 0.1s ease-in-out;
	-o-transition:all 0.1s ease-in-out;
	-ms-transition:all 0.1s ease-in-out;
	transition:all 0.1s ease-in-out;
}

.contact-area .submit-button:hover, .contact-area .cancel:hover {

  color:#3c3c3c;
  background-color:#aeaeae;


}


.btn-toolbar{box-sizing: border-box;
color: rgb(102, 0, 0);
display: block;
font-family: "Open Sans";
font-size: 16px;
font-stretch: 100%;
font-style: normal;
font-variant-caps: normal;
font-variant-east-asian: normal;
font-variant-ligatures: normal;
font-variant-numeric: normal;
font-weight: 400;
height: 31.75px;
line-height: 24px;
margin-left: -5px;
text-size-adjust: 100%;
width: 977px;
-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.btn-group{
border-bottom-left-radius: 16px;
border-bottom-right-radius: 16px;
border-top-left-radius: 16px;
border-top-right-radius: 16px;
box-sizing: border-box;
color: rgb(102, 0, 0);
display: block;
float: left;
font-family: "Open Sans";
font-size: 16px;
font-stretch: 100%;
font-style: normal;
font-variant-caps: normal;
font-variant-east-asian: normal;
font-variant-ligatures: normal;
font-variant-numeric: normal;
font-weight: 400;
height: 31.75px;
line-height: 24px;
margin-left: 5px;
max-width: 140px;
min-width: 140px;
position: relative;
text-size-adjust: 100%;
vertical-align: middle;
width: 140px;
-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

</style>


  </head>
  <body style="width:1024px;margin:0 auto;display:block;">
<!-- <body style="background-attachment:fixed;background-position: center;background-image:url(/images/auctionaerialcoll2.jpg)">
 <body style="background-attachment:fixed;background-position: center;background-image:url(/images/wideaerial-sm3.jpg)">-->
<!--<body style="background-image:url(/images/wideaerial.jpg)">-->
<!--<div class="container-fluid container">-->
<div class="container-noboot" style="background-color: rgba(255, 255, 255, 0.95);background-color: rgba(255, 255, 255, 0.85);transition: .1s all ease-out;">
<!--<div class="row baner">

	

	
	<div class="middlespan col-xs-12">-->
		<div class="wrapper" style="">




			<span id="banner">
				<img src="images/banner4.png" alt="crofton auction services banner for website" />
			<span class="clearfix"></span></span><!--banner-->
		
		<div id="navigation" >
			<div class="btn-toolbar" role="toolbar" aria-label="..."><div class="btn-group"><a href="/home.php" id="home" class="btn btn-primary">Home</a></div><div class="btn-group"><a class="btn btn-primary" href="/caslog/index.php" title="Sign me up!">Sign Me Up!</a></div><div class="btn-group"><a class="btn btn-primary" href="/contactus.php" title="Users may log in for User Contact Form which has name, email, and phone pre-filled">Contact Us</a></div><div id="textalignright" class="btn-group"><a class="btn btn-primary" href="/caslog/login.php" title="Users may log in">Log In</a></div></div>		<span class="clearfix"></span></div><!--navigation-->
	
			
			
			            

	
<h1>Simple Start</h1><br><br>
 <h1>Your Info</h1><br><br>
<form action = "">
Your Name: <input type = "text"name = "ufirst" placeholder = "First Name"  />
<!--<input type = "text"name = "ulast" placeholder = "Last Name" />-->
<br>
Your Email: <input type = "text"name = "email" placeholder = "Email Address" /><br>
Your Phone:<input type = "text"name = "umobile" placeholder = "Phone" /><br><br>
<h1>Dealership Info</h1><br><br>

Dealer Name:&nbsp;<input type = "text"name = "dname" placeholder = "Dealership Name" ><br>
Dealer Phone:&nbsp; <input type = "text"name = "dphone" placeholder = "Dealership Phone" ><br>
<!--Dealer Name:&nbsp; <input type = "text"name = "dcontact" placeholder = "Dealership Contact" ><br>-->
Dealer Location:&nbsp; <input type = "text"name = "dcity" placeholder = "Dealership City" >

<input type = "text"name = "dstate" placeholder = "Dealership State" ><br><br>
<!--<input type = "text"name = "dzip" placeholder = "Dealership Zip Code" >-->

<input type="submit" name="submit"  value="Send Info" style="margin:0 auto;width:4em;height:1.8em;" class="btn btn-primary" tabindex="16">

</form>

</div>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script>

function openContact() {
  document.getElementById("contact-us").style.display = "block";
}


function closeContact() {
  document.getElementById("contact-us").style.display = "none";
}


</script>
 <img onclick="openContact()" class="contact-sidebar" style="width: 3rem;" src="/bs_admin/template/sidebar/new-contact-btn-gray-bevel.png">

<div class="form-popup contact-area" id="contact-us">
                <div id="results">
        		<form method="post" action="/bs_admin/contact_message.php">
			        <h3 style="text-align:left;text-transform:uppercase;">Contact Us</h3>
                    <input type="text" name="contactName" id="contactName" placeholder="Name" />
        			<input type="text" name="contactEmail" id="contactEmail" placeholder="Email"/>
                    <input type="text" name="contactPhone" id="contactPhone" placeholder="Phone"/>
                    <input list="reasons" name="contactReason" id="contactReason" placeholder="Reason"/>
                        <datalist id="reasons">
                            <option value="Custom Product Request">
                            <option value="Printing Services">
                            <option value="Business Services">
                            <option value="Wholesale/Bulk Pricing">
                            <option value="Other Reason-Not Listed">
                        </datalist>  
                    <textarea name="contactMessage" rows="20" cols="20" id="contactMessage" placeholder="Message"></textarea>
                    <button type="submit" class="submit-button g-recaptcha" data-sitekey="6LfFyKMUAAAAAAJvll1IQ2rWenSYC3qno7Jen0hv" data-callback='onSubmit'>
                        Submit
                    </button>
                
				    <button type="button" class="btn cancel" onclick="closeContact()">
				        Close
				    </button>
	            </form>
                </div>
            </div>
</body>
</html>


<?php
/*
include "";


$ufirst=mysqli_real_escape_string($con, $$_POST['ufirst']);
$ulast=mysqli_real_escape_string($con, $ulast);
$email=mysqli_real_escape_string($con, $email);
$umobile=mysqli_real_escape_string($con, $umobile);
$dnumber=mysqli_real_escape_string($con, $dnumber);
$dname=mysqli_real_escape_string($con, $dname);
$dphone=mysqli_real_escape_string($con, $dphone);
$dcontact=mysqli_real_escape_string($con, $dcontact);
$dcity=mysqli_real_escape_string($con, $dcity);
$dstate=mysqli_real_escape_string($con, $dstate);
$dzip=mysqli_real_escape_string($con, $dzip);
*/
?>
