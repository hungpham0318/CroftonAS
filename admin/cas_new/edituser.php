<?php session_start();
//require('caslog/includes/config.php'); 
//require('../caslog/includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

//if not logged in redirect to login page
//if(!$user->is_logged_in()){ header('Location: login.php'); } 





//<?php session_start();
//<?php require('includes/config.php');

//collect values from the url
$Userid= trim($_GET['x']);
$active = trim($_GET['y']);
$quid = $_GET['quid'];
//if id is number and the active token is not empty carry on
//if(is_numeric($Userid) && !empty($active)){

//admin/cas_new/displayallindexed.php
//if(!isset($_SESSION['username']) || $_SESSION['username']=="admin"){$ausername=$_SESSION['ausername'];
//		$apassword=$_SESSION['apassword'];}else{
//		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<link rel="stylesheet" href="../../../common/css/login.css" type="text/css" />
		
		
		<link href="../../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
 	<?php if(!isset($_SESSION['username']) || $_SESSION['username']=="")
	{}else{ include 'cas_new-incmenu.htm';
	}?>
	
	</div>
	
	
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['username']) || $_SESSION['username']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
	echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';

//$Userid=$_POST['uid'];
//echo $Userid;
include "../process/newconnect.php";

$result = mysql_query("SELECT * FROM users WHERE uid = $quid");

 while($row = mysql_fetch_array($result))
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
         mysql_close();
         
        
         ?>
         
         
<form action="../process/usrupdateusr.php" method="post">
<div id="headline">
Editing User ID:&nbsp;<?php echo $uid;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp; <?php echo $uemail;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:&nbsp;<?php echo $uusername;?> </h1><hr></br> 
</div>
<table>
   
    <tr>
        <td width="400">
        
            <table border="0" width="800" align="center">
                    <tr>
                    
                    
                    
                    <input style="display:none" type="text" name="fakeusernameremembered"/>
<input style="display:none" type="password" name="fakepasswordremembered"/> 

                       
                        
                        <td><input type="hidden" class="info" name="uid" maxlength="100"value="<?php echo $uid;?>" required readonly></td>
                        
                        <td><input type="hidden" class="info" name="uemail" maxlength="100"value="<?php echo $uemail;?>" required readonly></td>
                  <td><input type="hidden" class="info" name="upassword" maxlength="100"value="<?php echo $upassword;?>" required readonly></td>
                    <input type="hidden" name="uactive" value="<?php echo $uactive;?>"></option>
                    <td><input type="hidden" class="info" name="uusername" autocomplete="off" value="<?php echo $uusername;?>"required readonly></td>
                   </tr>
<tr>
	<td class="label">&nbsp;&nbsp;&nbsp;Name:</td>
	<td><input type="text" class="" name="uname" maxlength="250" value="<?php echo $uname;?>" required></td>
                   
	<td class="label">&nbsp;&nbsp;&nbsp;Cell Phone:</td>
	<td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="umobile" value="<?php echo $umobile;?>"required></td>
	                 </tr>
<tr>
         <td class="label">&nbsp;&nbsp;&nbsp;Address:</td>
	<td><input type="text" class="" name="uaddress" maxlength="250" value="<?php echo $uaddress;?>" required></td>
	      
	<td class="label">&nbsp;&nbsp;&nbsp;Office Phone:</td>
	<td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="uofficeph" value="<?php echo $uofficeph;?>" required></td>
	                 </tr>
<tr>
	<td class="label">&nbsp;&nbsp;&nbsp;City:</td>
	<td><input type="text" class="" name="ucity" maxlength="250" value="<?php echo $ucity;?>" required></td>
               
	<td class="label">&nbsp;&nbsp;&nbsp;Fax:</td>
	<td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="ufax" value="<?php echo $ufax;?>"></td>
</tr>
<tr>

	<td class="label">&nbsp;&nbsp;&nbsp;State:</td>
	<td><input type="text" class="" name="ustate" maxlength="250" value="<?php echo $ustate;?>" required></td>

	
	


	
	
	<td class="label">&nbsp;&nbsp;&nbsp;Company:</td>
	<td><input type="text" class="" name="ucompany" maxlength="250" value="<?php echo $ucompany;?>" required></td>
</tr>
<tr>
	<td class="label">&nbsp;&nbsp;&nbsp;Zip:</td>
	<td><input type="text" class="" name="uzip" maxlength="250" value="<?php echo $uzip;?>" required></td>
	
<!--	<td class="label">&nbsp;&nbsp;&nbsp;Active:</td>
	<td><input type="hidden" list="yesnoother" value="<?php echo $uactive;?>"></option>
<datalist id="yesnoother">
  <option value="Yes">Yes</option>
	<option value="No">No</option>
	</datalist></td>-->
	
	
	                 </tr>
<tr>
	<td class="label">&nbsp;&nbsp;&nbsp;Notes:</td>
	<td><input type="text" class="" name="unotes" maxlength="250" value="<?php echo $unotes;?>" required></td>
	
	<td class="label">&nbsp;&nbsp;&nbsp;Permissions:</td>
	<td><input type="text" class="" name="uperms" maxlength="255" value="<?php echo $uperms;?>" required></td>
	
	
	
</tr>
                
                
                
                
                
                <tr>
                    <td class="label">&nbsp;</td>
                        <td>
                            <input type="submit" class="pure-button button-success" style="width: 200px;" name="submit" value="Update User">
                        </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="headfoot">&nbsp;</td>
    </tr>
</table>
</form>

</html>
<?php

}
//session_destroy();
?>