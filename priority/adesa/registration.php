<?php session_start(); 
require('../../caslog/includes/config.php'); 
//require __DIR__ . "/../caslog/includes/config.php";
//require(__DIR__.'/../caslog/classes/config.php');



//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: /priority/login.php'); } 




$title =  'Registration - Adesa DC'; 

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
			$auction='Adesa DC';
			$_SESSION['auction']=$auction;
		
		
		
			$q = intval($_SESSION['uid']);
/*include '../../priority/common/test.php';

$conn=mysqli_connect("localhost","$username","$password","$db_name");

// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $result = mysqli_query($conn,"SELECT DISTINCT dname, dnumber, did FROM ud_relate, users, dealers WHERE ud_relate.u_id = $q AND ud_relate.d_id = dealers.did");

 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['dname']."'>".$row['dname']."</option>";
    $dnumber = $row['dnumber'];
        $did = $row['did'];
    }
    echo '</select>';
    echo $dnumber;
    echo '<p></p>';
    echo $did;
   // mysqli_close($conn);
 // ?>
		*/	}else{
			echo "There is a problem.  Please log out and come through the front door";
			
			exit();}}?>
<!DOCTYPE html>
<head>
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
    	<title>Auction</title>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    	<!--Next two are Meta thingies to hide address bar and menu bar on ipad-->
    	<meta name="apple-mobile-web-app-capable" content="yes">
    	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<link rel="icon" type="image/png" href="http://www.croftonas.com/favicon.png">
	<link rel="shortcut icon" href="/images/favicon.ico" sizes="256x256">
	<link rel="stylesheet" href="css/reg+col.css">
	<link rel="stylesheet" href="/common/css/datepicker.css">
	
	


</head>
<body style="width:99%!important;margin-left:10px;" onkeydown="javascript:EnterKeyFilter();">
    <!--
<body style="background-image: url(/images/wideaerial-sm3.jpg);" onkeydown="javascript:EnterKeyFilter();"> -->

	<?php //$uid=$_POST['cas_uid'];?>
	<div id="wholeform" style = "width: 100%">
	<form id="registration" style ="width:100%!important;" name="registration" method="POST" action="process/form-process-reg+column.php">
    
        <div id="formtitle">
            <div id="hline4"><br></div>
            	Adesa DC &nbsp;&nbsp;</div> <!-- end formtitle div -->
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
			<!--<option value="">SELECT DEALERSHIP</option>-->
			<?php include_once 'selectajaxdealer.php';?>	
			<span class="errorFeedback errorClass" id="dnameError"></span></td>
            <th></th>
         <!-- <td><input id="inpSaleDate" type="text" name="inpSaleDate"   pattern="\d{4}[\-]\d{2}[\-]\d{2}"  value="" maxlength="10" required placeholder="<?php echo $_POST['sale_date']; ?>" tabindex="6">
            <td><input id="inpSaleDate" type="text" name="inpSaleDate"  value="<?php echo $_POST['sale_date']; ?>" maxlength="10" readonly placeholder="<?php echo $_POST['sale_date']; ?>" tabindex="6" >
			<span class="errorFeedback errorSpan" id="inpSaleDateError"></span>
                    </td> -->
        </tr>
        <tr><th>Email Address:</th>
            <td><input id="inpYourEmail" style="transform: lowercase;" type="" name="inpYourEmail" value="<?php echo $uemail; ?>" maxlength="100" placeholder="<?php echo   $uemail; ?>" tabindex="10">
			<span class="errorFeedback errorClass" id="inpYourEmailError"></span></td></tr>
                    <th>Auction Access#:</th>
                    <td><input id="inpFiveMilNum" type="text" name="inpFiveMilNum" value="<?php echo $dnumber;?>" maxlength="10" placeholder="<?php echo $dnumber;?>" tabindex="2">
                    </td>
                    <th></th>
                    <td><input id="inpYourName" type="hidden" name="inpYourName" value="" maxlength="50" placeholder="<?php echo  $uname; ?>" tabindex="7">
			<span class="errorFeedback errorSpan" id="inpYourNameError"></span>
			</td>
        </tr>
        <tr>
            <th></th>
            <td><input id="inpSDContact" type="hidden" name="inpSDContact" value="" maxlength="50" placeholder="" tabindex="3">
			<span class="errorFeedback errorSpan" id="inpSDContactError"></span></td>
            <th></th>
            <td><input id="inpYourPhone" pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="hidden" title="xxx-xxx-xxxx" name="inpYourPhone" value="000-000-0000" maxlength="20" placeholder="" required tabindex="8">
			<span class="errorFeedback errorSpan" id="inpYourPhoneError"></span>
			</td>
		</tr>
        <tr>
            <th></th>
            <td><input id="inpDPhone" type="hidden" name="inpDPhone" value="000-000-0000" maxlength="20" placeholder="" tabindex="4">
			<span class="errorFeedback errorSpan" id="inpDPhoneError"></span></td>
 <!--           <th></th>
            <td><input id="inpYourEmail" style="transform: lowercase;" type="" name="inpYourEmail" value="<?php echo $uemail; ?>" maxlength="100" placeholder="<?php echo   $uemail; ?>" tabindex="10">
			<span class="errorFeedback errorClass" id="inpYourEmailError"></span></td>-->
		</tr>
	</table>         <!-- end dealeruser table -->
	 </div>		<!-- end userdealer div-->
	 <div id="emailmessagediv">
    <table id="emailmessage">
        <colgroup>
       <col span="1" style="width: 14%;">
       <col span="1" style="width: 60%;float:left;">
     
    	</colgroup>
    <tr>
            <th>Registration Message:</th>
            <td><textarea rows="6" name="inpemailtextarea" style = "max-width: 666px;" form="registration" id="inpemailtextarea" placeholder="Additional information you provide in this area is included in this email to the auction."></textarea></td>
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
        <div id="vehiclegrid" style = "width:100%!important;margin: 0 auto!important;">
	<table id="vehiclegrid" style = "width:100%!important;margin: 0 auto!important;">
		<colgroup>
       <col span="1" style="width: 14%;">
       <col span="1" style="width: 4%;">
       <col span="1" style="width: 9%;">
       <col span="1" style="width: 7%;">
       <col span="1" style="width: 7%;">
       <col span="1" style="width: 5%;">
       <col span="1" style="width: 10%;">
       <col span="1" style="width: 10%;">
       <col span="1" style="width: 10%;">
       <col span="1" style="width: 11%;">
       <col span="1" style="width: 6%!important;">
       <col span="1" style="width: 6%!important;">
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
            <th>Notes</th>
            <th>Cost</th>
             <th>Floor</th>
            </tr>
        

           <?php
          //  $j=1;
	for ($j =1; $j <= 10; $j++){
	  
echo '</tr><td><input id="txtVIN'.$j.'" type="text" name="txtVIN'.$j.'" class="txtVIN 1" value="" maxlength="17" onchange="txtVin_OnBlurHandler(event)" style="background-color: white;"></td>';
echo '<td><input id="txtYear'.$j.'" class="txtYear 1" type="text" name="txtYear'.$j.'" value="" maxlength="4"></td>';
echo '<td><input id="txtMake'.$j.'" class="txtMake 1" type="text" name="txtMake'.$j.'" value="" maxlength="50"></td>';
echo '<td><input id="txtModel'.$j.'" class="txtModel 1" type="text" name="txtModel'.$j.'" value="" maxlength="50"></td>';
echo '<td><input id="txtColor'.$j.'" class="txtColor 1" type="text" name="txtColor'.$j.'" value="" maxlength="100"></td>';
echo '<td><input id="txtMileage'.$j.'" class="txtMileage 1" type="text" name="txtMileage'.$j.'" title="Mileage will be recorded at arrival, this value is for lane and run placement only" value="" maxlength="100"></td>';
            
echo '<td><input id="txtAnon'.$j.'" class="txtAnon 1" type="text" name="txtAnon'.$j.'" value=""></td>';
echo '<td><input id="inpvehStock'.$j.'" class="inpvehStock 1" type="text" name="inpvehStock1" value="" maxlength="100"></td>';
echo '<td><select id="popDetail'.$j.'" class="popDetail 1" name="popDetail'.$j.'" title="">
<option  value="Wash&Vac-25">Wash&Vac ($25)</option>
<option  value="Detail-75">Detail ($75)</span></option>
</select></td>';
echo '<td><input id="txtTrans'.$j.'" class="txtTrans 1" type="text" name="txtTrans'.$j.'" value=""></td>';
echo '<td><input id="mcost'.$j.'" class="mcost 1" type="text" name="mcost'.$j.'" value=""></td>';
echo '<td><input id="txtPrice'.$j.'" class="txtPrice" type="text" name="txtPrice'.$j.'" value="" maxlength="7"> <span class="errorFeedback errorSpan" id="txtPrice'.$j.'Error"></span></td></tr>';
	
	//	$j++;
	}
?>
                       
    </table> <!--end vehiclegrid table -->
           <input type="hidden" id="did" name="did" value="<?php echo $did;?>" class="inputbox"/>
            <input type="hidden" id="uid" name="uid" value="<?php echo $cas_uid;?>" class="inputbox"/>
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
        <div id="bottomMsgBox"> </div>
        <div><table id="bottombuttons" style ="width:1400px;margin-left: 50px;">
			<colgroup s>
  
       <col span="1" style="width: 30%;">
        <col span="1" style="width: 30%;">
       <col span="1" style="width: 30%;">
       </colgroup>
             
    <tr>
		<td></td>
                <td><input type="button" class="my-button" style ="margin-left: -100px;width:200px" value="Log Out" onClick="rusurelogout();" )</td>
                <td><input type="button" class="my-button" style ="width:200px;margin-left: -100px;" value="Clear Form" onClick="rusureclear();"> </td>
     		<td><input type="submit"  id="btnSubmit" style ="width:200px;margin-left: -100px;" class="my-button success" value="Submit Form" name="submit"></td>
			</tr>
		</table> <!-- end bottombuttons table --></div>
 	<div id="errorbox " style="width:230px;height: auto; "><div id="errorDiv "></div></div>
</form>
</div><!-- end wholeform div -->
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="/priority/adesa/process/formjsbackup.js" charset="utf-8"></script> 
	<script type="text/javascript" src="/areg/common/processes3.js" charset="utf-8"></script> 
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
location.href = '../logout.php';
}
else {}
}

</script>
</body>
</html> 