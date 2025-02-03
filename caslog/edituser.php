<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 
if( $user->is_logged_in() ){ if ($_SESSION['uspecial'] === "PR"){header('Location: /priority/adesa/registration.php');}else{ } }

//define page title
$title = 'Edit Profile';

//include header template
//require('../../caslog/layout/headerss.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
<title><?php if(isset($title)){ echo $title.$uname; }?></title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
	
<!--	 <link rel="stylesheet" href="/admin/css/manage.css" type="text/css" />-->
			
		<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"">	
		
		<link rel="stylesheet" href="/common/css/editusercas.css" type="text/css" /> 
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>


<body>
<div class="wrapper" >
	
<div id="banner">
<img src="/images/banner4.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
<?php require "includes/navcontents.html"; ?>
	</div>


	
	
		
	
	
<div id="section1"> 
<?php if(!isset($_SESSION['username']) || $_SESSION['username']=="")
	{echo "Please log in to see this page";}else{
	if(!isset($_SESSION['uid'])){$quid = $_GET['quid'];}else{$quid=$_SESSION['uid'];}
	
	//begin insert
	//echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';

include "../admin/process/connecti.php";

$result = mysqli_query($con,"SELECT * FROM users WHERE uid = $quid");

 while($row = mysqli_fetch_array($result))
    {
     $uid=$row['uid'];
	$uname=$row['uname'];
	$umobile=$row['umobile'];
	$uusername=$row['username'];
	$uemail=$row['email'];
	$upassword=$row['password'];
	$uofficeph=$row['uofficeph'];
	$ufax=$row['ufax'];
	$uaddress=$row['uaddress'];
	$ucity=$row['ucity'];
	$ustate=$row['ustate'];
	$uzip=$row['uzip'];
	$ucompany=$row['ucompany'];
	$unotes=$row['unotes'];
	$uperms=$row['uperms'];
	$uactive=$row['active'];
	
	
	
    }
        // mysql_close();
         
        
         ?>
<!-- <div id="leftcolumns1" style="width:45%;display:overflow;float:left;margin:0 auto;">        -->
        <div id="leftcolumns1" style=""> 
<form action="/admin/process/usrupdateusr.php" method="post">


   
  
        
<table border="0" width="100%" style="{margin:0 auto;}">
<tbody id="">
<tr><td> Your Information:    </td></tr>


<tr>
	<td           
<input style="display:none" type="text" name="fakeusernameremembered"/>
<input style="display:none" type="password" name="fakepasswordremembered"/> 
</td></tr>


<tr>
	<td class="label-left">Name:<br>
                  <input type="text" class="left" name="uname" maxlength="250" value="<?php echo $uname;?>" required></td>
                   	                 </tr>
<tr>
	<td class="label-left">Cell Phone:<br>
                  <input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="left" name="umobile" value="<?php echo $umobile;?>"required></td>
	                 </tr>

<!--<tr>
         <td class="label-left">Address:<br>
                  <input type="text" class="left" name="uaddress" maxlength="250" value="<?php echo $uaddress;?>" ></td>
	      	                 </tr>

<tr>
	<td class="label-left">City:<br>
                  <input type="text" class="left" name="ucity" maxlength="250" value="<?php echo $ucity;?>" ></td>
               	                 </tr>
               	                 
               	      <tr>

	<td class="label-left">State:<br>
                  <input type="text" class="left" name="ustate" maxlength="250" value="<?php echo $ustate;?>" ></td>

	
		                 </tr>      
		                 <tr>
	<td class="label-left">Zip:<br>
                  <input type="text" class="left" name="uzip" maxlength="250" value="<?php echo $uzip;?>" ></td></tr>
-->
<tr>     
               	                 
               	                 
<tr>
	<td class="label-left">Office:<br>
                  <input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="left" name="uofficeph" value="<?php echo $uofficeph;?>" ></td>
	                 </tr>
<tr>	<td class="label-left">Fax:<br>
                  <input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="left" name="ufax" value="<?php echo $ufax;?>"></td>
</tr>
<!--
<tr>


	
	
	<td class="label-left">Company:<br>
                  <input type="text" class="left" name="ucompany" maxlength="250" value="<?php echo $ucompany;?>" ></td>
</tr>
-->

	<td class="label-left">Notes:<br>
                  <input type="text" class="left" name="unotes" maxlength="250" value="<?php echo $unotes;?>" ></td>
	
	                 </tr>
               <tr>
                  <td class="label label-left"></td></tr>
               <tr>
                  <td class=""></td></tr>
               <tr>
                    <td class="label label-left"></td></tr>
               <tr>
                    <!--<td class="label label-left">&nbsp;
                            </td>-->
                 <!-- <td><input type="submit" class="btn btn-primary" style="" name="submit" value="Update User"><br></td></tr>-->
              
<tr><td> <input type="hidden" class="info" name="uid" maxlength="100"value="<?php echo $uid;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" class="info" name="uemail" maxlength="100"value="<?php echo $uemail;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" class="info" name="upassword" maxlength="100"value="<?php echo $upassword;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" name="uactive" value="<?php echo $uactive;?>"></option>
</td></tr><tr><td> <input type="hidden" class="info" name="uusername" autocomplete="off" value="<?php echo $uusername;?>"required readonly></td>
</td></tr><tr><td> <input type="hidden" name="uperms" value="<?php echo $uperms;?>"></td>
</td></tr><tr><td> <input type="hidden" class="info" name="uaddress" maxlength="100"value="<?php echo $uaddress;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" class="info" name="city" maxlength="100"value="<?php echo $ucity;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" name="ustate" value="<?php echo $ustate;?>"></option>
</td></tr><tr><td> <input type="hidden" class="info" name="uzip" autocomplete="off" value="<?php echo $uzip;?>"required readonly></td>
</td></tr><tr><td><input type="submit" class="btn btn-primary" style="text-align:left;padding-left: 10px;margin-top:10px;" name="submit" value="Save Changes"><br> </td>

</form>
</tr>

                </tbody>
            </table><!--<table>
       
    
    <tr>
        <td class="headfoot"></td>
    </tr>
    
</table>-->
</div>

<div id="rightcolumns1" style="margin-left: 0;">
<div style="font-weight:normal;" class="label-left">	
To change your Email or Username,</br> please use the Contact/Change </br>button to request the change.</div>
</br>

<input value="<?php echo $uid;?>" class="right" readonly title="This value can not be edited" type="hidden"> 

<div class="label-left" >	
Email:  </div>
<div class="label-left" style="font-weight:normal;">	

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $uemail;?></br></div>
<input value="<?php echo $uemail;?>" readonly title="To change your email address, please use the Contact/Change button to request the change. "type="hidden"> 
<br>
<div class="label-left">	
Username:</div><div class="label-left" style="font-weight:normal;style="padding-left: 30px;"">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $uusername;?></br></br> </div>

<input value="<?php echo $uusername;?>"readonly title="To change your Username please use the Contact/Change button and request the change." type="hidden">

	<?php echo 'Dealership Access:<br><div style="font-size:13px; font-weight: normal; font-family: "Open Sans";">';
	 include "../admin/process/connecti.php";

$result = mysqli_query($con,"SELECT * FROM ud_relate, dealers WHERE u_id = $quid AND d_id = did");

 while($row = mysqli_fetch_array($result))
    {
     echo $row['dname'].'<br>';
	 }?>





<input value="<?php echo $uid;?>" class="right" readonly title="This value can not be edited" type="hidden"> 
  <br>
</h1>
<br></tab


<br>


	 </div>
	 
</div>	 </div>
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
<script type="text/javascript" charset="utf8" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

      <!-- <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>-->
  <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
	
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




<?php 
//include footer template
//require('layout/footer.php'); 
}?>
