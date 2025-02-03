<?php session_start(); 
require('../../caslog/includes/config.php'); 
//require __DIR__ . "/../caslog/includes/config.php";
//require(__DIR__.'/../caslog/classes/config.php');



//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: /caslog/login.php'); } 




$title =  'Registration - Manheim-Pa'; 


if(!isset($_SESSION['username']) || $_SESSION['username']==""){	
		echo "Please login to see this page.....";
		exit();}else{ 
		if(isset($_SESSION['uid']) || $_SESSION['uid'] == $POST['uid']){
			$uusername=$_SESSION['username'];
			$upassword=$_SESSION['password'];
			$cas_uid=$_SESSION['uid'];
			$umobile=$_SESSION['umobile'];
			$uemail=$_SESSION['email'];
			$uname=$_SESSION['uname'];
			$uid=$_SESSION['uid'];
			
			$q=$uid;
			$auction='Manheim Pa';
			$_SESSION['auction']=$auction;
			}else{
			echo "There is a problem.  Please log out and come through the front door";
			
			exit();}}?>
<!DOCTYPE html>
<head>
	<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
    	<title>Auction</title>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    	<!--Next two are Meta thingies to hide address bar and menu bar on ipad-->
    	<meta name="apple-mobile-web-app-capable" content="yes">
    	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<link rel="icon" type="image/png" href="https://www.croftonas.com/favicon.png">
	<link rel="shortcut icon" href="https://www.croftonas.com/images/favicon.ico" sizes="256x256">
	<link rel="stylesheet" href="css/reg.css">
	<link rel="stylesheet" href="/common/css/datepicker.css">
	
	


</head>
<body style="background-image: url(/images/wideaerial-sm3.jpg);" onkeydown="javascript:EnterKeyFilter();">

	<?php $uid=$_POST['cas_uid'];?>
	<div id="wholeform">
	<form id="registration" name="registration" method="POST" action="process/form-process-reg.php">
    
        <div id="formtitle">
            <div id="hline4"><br></div>
            	Crofton Auction Services - Manheim Pennsylvania &nbsp;&nbsp;</div> <!-- end formtitle div -->
    <div id="userdealer">
	<table id="dealeruser">
       <colgroup>
        <col span="1" style="width: 14%;">
       <col span="1" style="width: 36%;">
        <col span="1" style="width: 12%;">
        <col span="1" style="width: 38%;">
	</colgroup> 
    	<tr>
            <th>Dealership:</th>
            <td><select id="dname" name="dname" tabindex="1" onchange="$(function()">
			<option value="">SELECT DEALERSHIP</option>
			<?php include_once '../common/selectajaxget.php';?>	
			<span class="errorFeedback errorClass" id="dnameError"></span></td>
            <th>Sale Date:</th>
         <!-- <td><input id="inpSaleDate" type="text" name="inpSaleDate"   pattern="\d{4}[\-]\d{2}[\-]\d{2}"  value="<?php echo $_POST['sale_date']; ?>" maxlength="10" required placeholder="" tabindex="6"> -->
            <td><input id="inpSaleDate" type="text" name="inpSaleDate"  value="<?php echo $_POST['sale_date']; ?>" maxlength="10" readonly placeholder="" tabindex="6" >
			<span class="errorFeedback errorSpan" id="inpSaleDateError"></span>
                    </td>
        </tr>
        <tr>
                    <th>Dealership Number:</th>
                    <td><input id="inpFiveMilNum" type="text" name="inpFiveMilNum" value="" maxlength="10" placeholder="" tabindex="2">
                    </td>
                    <th>Your Name:</th>
                    <td><input id="inpYourName" type="text" name="inpYourName" value="<?php echo  $_POST['uname']; ?>" maxlength="50" placeholder="" tabindex="7">
			<span class="errorFeedback errorSpan" id="inpYourNameError"></span>
			</td>
        </tr>
        <tr>
            <th>Sale Day Contact:</th>
            <td><input id="inpSDContact" type="text" name="inpSDContact" value="" maxlength="50" placeholder="" tabindex="3">
			<span class="errorFeedback errorSpan" id="inpSDContactError"></span></td>
            <th>Your Phone:</th>
            <td><input id="inpYourPhone" pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="xxx-xxx-xxxx" name="inpYourPhone" value="<?php echo $_POST['umobile']; ?>" maxlength="20" placeholder="" required tabindex="8">
			<span class="errorFeedback errorSpan" id="inpYourPhoneError"></span>
			</td>
		</tr>
        <tr>
            <th>Contact Phone:</th>
            <td><input id="inpDPhone" type="text" name="inpDPhone" value="" maxlength="20" placeholder="" tabindex="4">
			<span class="errorFeedback errorSpan" id="inpDPhoneError"></span></td>
            <th>Your Email:</th>
            <td><input id="inpYourEmail" style="text-transform: lowercase;" type="text" name="inpYourEmail" value="<?php echo  $_POST['uemail']; ?>" maxlength="100" placeholder="" tabindex="10">
			<span class="errorFeedback errorClass" id="inpYourEmailError"></span></td>
		</tr>
	</table>         <!-- end dealeruser table -->
	 </div>		<!-- end userdealer div-->
	 <div id="emailmessagediv">
    <table id="emailmessage">
        <colgroup>
       <col span="1" style="width: 14%;">
       <col span="1" style="width: 86%;">
    	</colgroup>
    	<tr>
            <th>Registration Message:</th>
            <td><textarea rows="3" name="inpemailtextarea" form="registration" id="inpemailtextarea" placeholder="Additional information you provide in this area is delivered automatically to the auction with registration. After successful registration you will be provided with the option to include other information to Crofton Auction Services." title="Additional information you provide in this area is delivered automatically to the auction with registration. After successful registration you will be provided with the option to include other information to Crofton Auction Services."></textarea></td>
        </tr>
    </table>	<!-- end emailmessage table-->
    </div> <!-- end emailmessage div-->
        
        <div id="hline">
            <br>
        </div>   <!-- end hline div-->
        <div id="lblUserMessage"></div>  <!-- end lblUserMessage-->
        	<div id="hline2">
		<br>
        	</div> <!-- end hline2 div-->
        <div id="hline3">
            <br>
        </div>                   <!-- end hline3 div -->
        <div id="vehiclegrid">
	<table id="vehiclegrid">
		<colgroup>
       <col span="1" style="width: 16%;">
       <col span="1" style="width: 4%;">
       <col span="1" style="width: 8%;">
       <col span="1" style="width: 7%;">
       <col span="1" style="width: 7%;">
       <col span="1" style="width: 5%;">
       <col span="1" style="width: 10%;">
       <col span="1" style="width: 8%;">
       <col span="1" style="width: 10%;">
       <col span="1" style="width: 10%;">
       <col span="1" style="width: 6%;">
       </colgroup>
   <tr>
            <th>VIN</th>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Color</th>
            <th>Mileage</th>
            <th>Announcement</th>
            <th>Stock No.</th>
            <th>Detailing Level</th>
            <th>Transportation</th>
            <th><span style="vertical-align:bottom;font-size:85%;color:red; ">(Include $500 flex)</br> </span><span style="vertical-align:bottom;">Floor</span></th>
            </tr>
        <tr>
            <td><input id="txtVIN1" type="text" name="txtVIN1" class="txtVIN 1" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear1" class="txtYear 1" type="text" name="txtYear1" value="" maxlength="4"></td>
            <td><input id="txtMake1" class="txtMake 1" type="text" name="txtMake1" value="" maxlength="50"></td>
            <td><input id="txtModel1" class="txtModel 1" type="text" name="txtModel1" value="" maxlength="50"></td>
            <td><input id="txtColor1" class="txtColor 1" type="text" name="txtColor1" value="" maxlength="100"></td>
            <td><input id="txtMileage1" class="txtMileage 1" type="text" name="txtMileage1" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            
            <td><input id="txtAnon1" class="txtAnon 1" type="text" name="txtAnon1" value=""></td>
            <td><input id="inpvehStock1" class="inpvehStock 1" type="text" name="inpvehStock1" value="" maxlength="100"></td>
            <td><select id="popDetail1" class="popDetail 1" name="popDetail1" title="Full or Partial(Wash & Wipe)">
                     <option id="full1" value="Full">Full ($200)</option>
                    <option id="partial1" value="Partial">Partial ($75)</span></option>
                </select></td>
            <td><input id="txtTrans1" class="txtTrans 1" type="text" name="txtTrans1" value=""></td>
            <td><input id="txtPrice1" class="txtPrice" type="text" name="txtPrice1"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> <span class="errorFeedback errorSpan" id="txtPrice1Error"></span></td>
        </tr>
        <tr>
            <td><input id="txtVIN2" type="text" name="txtVIN2" class="txtVIN 2" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear2" class="txtYear 2" type="text" name="txtYear2" value="" maxlength="4"></td>
            <td><input id="txtMake2" class="txtMake 2" type="text" name="txtMake2" value="" maxlength="50"></td>
            <td><input id="txtModel2" class="txtModel 2" type="text" name="txtModel2" value="" maxlength="50"></td>
			<td><input id="txtColor2" class="txtColor 2" type="text" name="txtColor2" value="" maxlength="100"></td>
			<td><input id="txtMileage2" class="txtMileage 2" type="text" name="txtMileage2" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon2" class="txtAnon 2" type="text" name="txtAnon2" value=""></td>
            <td><input id="inpvehStock2" class="inpvehStock 2" type="text" name="inpvehStock2" value="" maxlength="100"></td>
            <td><select id="popDetail2" class="popDetail 2" name="popDetail2" title="Full or Partial(Wash & Wipe)">
                    <option id="full2" value="Full">Full ($200)</option>
                    <option id="partial2" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans2" class="txtTrans 2" type="text" name="txtTrans2" value=""></td>
            <td><input id="txtPrice2" class="txtPrice" type="text" name="txtPrice2"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> <span class="errorFeedback errorSpan" id="inptxtPrice2"></span></td>
		<tr>
			<td><input id="txtVIN3" type="text" name="txtVIN3" class="txtVIN 3" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
			<td><input id="txtYear3" class="txtYear 3" type="text" name="txtYear3" value="" maxlength="4"></td>
			<td><input id="txtMake3" class="txtMake 3" type="text" name="txtMake3" value="" maxlength="50"></td>
			<td><input id="txtModel3" class="txtModel 3" type="text" name="txtModel3" value="" maxlength="50"></td>
			<td><input id="txtColor3" class="txtColor 3" type="text" name="txtColor3" value="" maxlength="100"></td>
			<td><input id="txtMileage3" class="txtMileage 3" type="text" name="txtMileage3" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
			<td><input id="txtAnon3" class="txtAnon 3" type="text" name="txtAnon3" value=""></td>
			<td><input id="inpvehStock3" class="inpvehStock 3" type="text" name="inpvehStock3" value="" maxlength="100"></td>
			<td><select id="popDetail3" class="popDetail 3" name="popDetail3" title="Full or Partial(Wash & Wipe)">
					<option id="full3" value="Full">Full ($200)</option>
					<option id="partial3" value="Partial">Partial ($75)</option>
				</select></td>
			<td><input id="" class="txtTrans 3" type="text" name="txtTrans3" value=""></td>
			<td><input id="txtPrice3" class="txtPrice 3" type="text" name="txtPrice3"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> 
				<span class="errorFeedback errorSpan" id="txtPrice3"></span></td>
		</tr>
		<tr>
			<td><input id="txtVIN4" type="text" name="txtVIN4" class="txtVIN 4" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
			<td><input id="txtYear4" class="txtYear 4" type="text" name="txtYear4" value="" maxlength="4"></td>
            <td><input id="txtMake4" class="txtMake 4" type="text" name="txtMake4" value="" maxlength="50"></td>
            <td><input id="txtModel4" class="txtModel 4" type="text" name="txtModel4" value="" maxlength="50"></td>
            <td><input id="txtColor4" class="txtColor 4" type="text" name="txtColor4" value="" maxlength="100"></td>
            <td><input id="txtMileage4" class="txtMileage 4" type="text" name="txtMileage4" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon4" class="txtAnon 4" type="text" name="txtAnon4" value=""></td>
            <td><input id="inpvehStock4" class="inpvehStock 4" type="text" name="inpvehStock4" value="" maxlength="100"></td>
            <td><select id="popDetail4" class="popDetail 4" name="popDetail4" title="Full or Partial(Wash & Wipe)">
                    <option id="full4" value="Full">Full ($200)</option>
                    <option id="partial4" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans4" class="txtTrans 4" type="text" name="txtTrans4" value=""></td>
            <td><input id="txtPrice4" class="txtPrice 4" type="text" name="txtPrice4"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> 
                <span class="errorFeedback errorSpan" id="txtPrice4Error"></span></td>
		</tr>
		<tr>
            <td><input id="txtVIN5" type="text" name="txtVIN5" class="txtVIN 5" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear5" class="txtYear 5" type="text" name="txtYear5" value="" maxlength="4"></td>
            <td><input id="txtMake5" class="txtMake 5" type="text" name="txtMake5" value="" maxlength="50"></td>
            <td><input id="txtModel5" class="txtModel 5" type="text" name="txtModel5" value="" maxlength="50"></td>
            <td><input id="txtColor5" class="txtColor 5" type="text" name="txtColor5" value="" maxlength="100"></td>
            <td><input id="txtMileage5" class="txtMileage 5" type="text" name="txtMileage5" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon5" class="txtAnon 5" type="text" name="txtAnon5" value=""></td>
            <td><input id="inpvehStock5" class="inpvehStock 5" type="text" name="inpvehStock5" value="" maxlength="100"></td>
            <td><select id="popDetail5" class="popDetail 5" name="popDetail5" title="Full or Partial(Wash & Wipe)">
                    <option id="full5" value="Full">Full ($200)</option>
                    <option id="partial5" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans5" class="txtTrans 5" type="text" name="txtTrans5" value=""></td>
            <td><input id="txtPrice5" class="txtPrice 5" type="text" name="txtPrice5" value="" maxlength="7"> <span class="errorFeedback errorSpan" id="txtPrice5Error"></span></td>
        </tr>
        <tr>
			<td><input id="txtVIN6" type="text" name="txtVIN6" class="txtVIN 6" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear6" class="txtYear 6" type="text" name="txtYear6" value="" maxlength="4"></td>
            <td><input id="txtMake6" class="txtMake 6" type="text" name="txtMake6" value="" maxlength="50"></td>
            <td><input id="txtModel6" class="txtModel 6" type="text" name="txtModel6" value="" maxlength="50"></td>
			<td><input id="txtColor6" class="txtColor 6" type="text" name="txtColor6" value="" maxlength="100"></td>
			<td><input id="txtMileage6" class="txtMileage 6" type="text" name="txtMileage6" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon6" class="txtAnon 6" type="text" name="txtAnon6" value=""></td>
            <td><input id="inpvehStock6" class="inpvehStock 6" type="text" name="inpvehStock6" value="" maxlength="100"></td>
            <td><select id="popDetail6" class="popDetail 6" name="popDetail6" title="Full or Partial(Wash & Wipe)">
                    <option id="full6" value="Full">Full ($200)</option>
                    <option id="partial6" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans6" class="txtTrans 6" type="text" name="txtTrans6" value=""></td>
            <td><input id="txtPrice6" class="txtPrice 6" type="text" name="txtPrice6"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7">
                    <span class="errorFeedback errorSpan" id="inptxtPrice6Error"></span></td>
        </tr>
        <tr>
            <td><input id="txtVIN7" type="text" name="txtVIN7" class="txtVIN 7" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear7" class="txtYear 7" type="text" name="txtYear7" value="" maxlength="4"></td>
            <td><input id="txtMake7" class="txtMake 7" type="text" name="txtMake7" value="" maxlength="50"></td>
            <td><input id="txtModel7" class="txtModel 7" type="text" name="txtModel7" value="" maxlength="50"></td>
            <td><input id="txtColor7" class="txtColor 7" type="text" name="txtColor7" value="" maxlength="100"></td>
            <td><input id="txtMileage7" class="txtMileage 7" type="text" name="txtMileage7" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon7" class="txtAnon 7" type="text" name="txtAnon7" value=""></td>
            <td><input id="inpvehStock7" class="inpvehStock 7" type="text" name="inpvehStock7" value="" maxlength="100"></td>
            <td><select id="popDetail7" class="popDetail 7" name="popDetail7" title="Full or Partial(Wash & Wipe)">
                    <option id="full7" value="Full">Full ($200)</option>
                    <option id="partial7" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans7" class="txtTrans 7" type="text" name="txtTrans7" value=""></td>
            <td><input id="txtPrice7" class="txtPrice 7" type="text" name="txtPrice7"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> 
                    <span class="errorFeedback errorSpan" id="inptxtPrice7Error"></span></td>
        </tr>
        <tr>
            <td><input id="txtVIN8" type="text" name="txtVIN8" class="txtVIN 8" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear8" class="txtYear 8" type="text" name="txtYear8" value="" maxlength="4"></td>
            <td><input id="txtMake8" class="txtMake 8" type="text" name="txtMake8" value="" maxlength="50"></td>
            <td><input id="txtModel8" class="txtModel 8" type="text" name="txtModel8" value="" maxlength="50"></td>
            <td><input id="txtColor8" class="txtColor 8" type="text" name="txtColor8" value="" maxlength="100"></td>
            <td><input id="txtMileage8" class="txtMileage 8" type="text" name="txtMileage8" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon8" class="txtAnon 8" type="text" name="txtAnon8" value=""></td>
            <td><input id="inpvehStock8" class="inpvehStock 8" type="text" name="inpvehStock8" value="" maxlength="100"></td>
            <td><select id="popDetail8" class="popDetail 8" name="popDetail8" title="Full or Partial(Wash & Wipe)">
                    <option id="full8" value="Full">Full ($200)</option>
                    <option id="partial8" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans8" class="txtTrans 8" type="text" name="txtTrans8" value=""></td>
            <td><input id="txtPrice8" class="txtPrice 8" type="text" name="txtPrice8"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> 
                    <span class="errorFeedback errorSpan" id="inptxtPrice8Error"></span></td>
        </tr>
        <tr>
            <td><input id="txtVIN9" type="text" name="txtVIN9" class="txtVIN 9" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear9" class="txtYear 9" type="text" name="txtYear9" value="" maxlength="4"></td>
            <td><input id="txtMake9" class="txtMake 9" type="text" name="txtMake9" value="" maxlength="50"></td>
            <td><input id="txtModel9" class="txtModel 9" type="text" name="txtModel9" value="" maxlength="50"></td>
            <td><input id="txtColor9" class="txtColor 9" type="text" name="txtColor9" value="" maxlength="100"></td>
            <td><input id="txtMileage9" class="txtMileage 9" type="text" name="txtMileage9" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon9" class="txtAnon 9" type="text" name="txtAnon9" value=""></td>
            <td><input id="inpvehStock9" class="inpvehStock 9" type="text" name="inpvehStock9" value="" maxlength="100"></td>
            <td><select id="popDetail9" class="popDetail 9" name="popDetail9" title="Full or Partial(Wash & Wipe)">
                    <option id="full9" value="Full">Full ($200)</option>
                    <option id="partial9" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans9" class="txtTrans 10" type="text" name="txtTrans9" value=""></td>
            <td><input id="txtPrice9" class="txtPrice 9" type="text" name="txtPrice9"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> 
                     <span class="errorFeedback errorSpan" id="inptxtPrice9Error"></span></td>
        </tr>
        <tr>
            <td><input id="txtVIN10" type="text" name="txtVIN10" class="txtVIN 10" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>
            <td><input id="txtYear10" class="txtYear 10" type="text" name="txtYear10" value="" maxlength="4"></td>
            <td><input id="txtMake10" class="txtMake 10" type="text" name="txtMake10" value="" maxlength="50"></td>
            <td><input id="txtModel10" class="txtModel 10" type="text" name="txtModel10" value="" maxlength="50"></td>
            <td><input id="txtColor10" class="txtColor 10" type="text" name="txtColor10" value="" maxlength="100"></td>
            <td><input id="txtMileage10" class="txtMileage 10" type="text" name="txtMileage10" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>
            <td><input id="txtAnon10" class="txtAnon 10" type="text" name="txtAnon10" value=""></td>
            <td><input id="inpvehStock10" class="inpvehStock 10" type="text" name="inpvehStock10" value="" maxlength="100"></td>
            <td><select id="popDetail10" class="popDetail 10" name="popDetail10" title="Full or Partial(Wash & Wipe)">
                    <option id="full10" value="Full">Full ($200)</option>
                    <option id="partial10" value="Partial">Partial ($75)</option>
                </select></td>
            <td><input id="txtTrans10" class="txtTrans 10" type="text" name="txtTrans10" value=""></td>
            <td><input id="txtPrice10" class="txtPrice 10" type="text" name="txtPrice10"  pattern="^[+-]?[0-9]{1,9}(?:\.[0-9]{1,2})?$" autofocus title="Remove commas if present" value="" maxlength="7"> 
					<span class="errorFeedback errorSpan" id="inptxtPrice10Error"></span></td>
        </tr>
                       
    </table> <!--end vehiclegrid table -->
           <input type="hidden" id="did" name="did" value="" class="inputbox"/>
            <input type="hidden" id="uid" name="uid" value="<?php echo $_POST['cas_uid'];?>" class="inputbox"/>
             <input type="hidden" id="auction" name="auction" value="<?php echo $auction;?>" class="inputbox"/>
             

<input type="hidden" id="hidnInptHeight" name="hidnInptHeight" value="" class="inputbox"/>
<input type="hidden" id="hidnInptAvailWidth" name="hidnInptAvailWidth" value="" class="inputbox"/>

			  
			


<script type="text/javascript">
var elem = document.getElementById("hidnInptHeight");
elem.value = screen.availHeight;
        					 
var elem = document.getElementById("hidnInptAvailWidth");
elem.value = screen.availWidth;


</script>
             
             
		
                  
           
         
           
             
             
        </div>  <!-- end vehiclegrid -->
        <div id="hline4">
            <br>
        </div> <!-- end hline4 div-->
        <div id="errorDiv"></div>
        <div id="errorFeedback"></div>
        <div id="hline4">
            <br>
        </div> <!-- end hline4 div-->
        <div id="bottomMsgBox">Registration Deadline is 48 Hours Prior to Sale Kickoff.</div>
        <div><table id="bottombuttons">
			<colgroup>
       <col span="1" style="width: 20%;">
       <col span="1" style="width: 20%;">
        <col span="1" style="width: 20%;">
       <col span="1" style="width: 20%;">
       </colgroup>
             
    <tr>
		<td><input type="button" class="my-button" value="Repick Auction/Date" onclick="rusureback()" /></td>
                <td><input type="button" class="my-button"  value="Log Out" onClick="rusurelogout();" )</td>
                <td><input type="button" class="my-button" value="Clear Form" onClick="rusureclear();"> </td>
     		<td><input type="submit"  id="btnSubmit" class="my-button success" value="Submit Form" name="submit"></td>
			</tr>
		</table> <!-- end bottombuttons table --></div>
 	<div id="errorbox " style="width:230px;height: auto; "><div id="errorDiv "></div></div>
</form>
</div><!-- end wholeform div -->
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="../common/form2.js" charset="utf-8"></script> 
	<script type="text/javascript" src="../common/processes3.js" charset="utf-8"></script> 
	<script type="text/javascript">
		function EnterKeyFilter(){
			if (window.event.keyCode == 13){
				event.returnValue=false;
        			event.cancel = true;}}
	</script>
<script>
    // jQuery plugin to prevent double submission of forms
        jQuery.fn.preventDoubleSubmission = function () {
            $(this).on('submit', function (e) {
                var $form = $(this);

                if ($form.data('submitted') === true) {
                    // Previously submitted - don't submit again
                    alert('Form already submitted. Please wait.');
                    e.preventDefault();
                } else {
                    // Mark it so that the next submit can be ignored
                    // ADDED requirement that form be valid
                    if($form.valid()) {
                        $form.data('submitted', true);
                    }
                }
            });

            // Keep chainability
            return this; 
};


function rusureclear(){
if (confirm("Are you sure?  Any input will be cleared") == true) {
  
    
    document.getElementById('registration').reset();

}
else {}
}
function rusureback(){
if (confirm("Are you sure you want to leave this form? Any input will be lost.") == true) {
history.back(-1);
}
else {}
}
function rusurelogout(){
if (confirm("Are you sure you want to log out?") == true) {
location.href = '../../common/logout.php';
}
else {}
}

</script>
</body>
</html> 