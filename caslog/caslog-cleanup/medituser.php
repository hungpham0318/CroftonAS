<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="/common/css/caslogin.css" type="text/css">
		<!--		<link rel="stylesheet" href="/common/css/home.css" type="text/css">
	
	 <link rel="stylesheet" href="/admin/css/manage.css" type="text/css" />-->
	<!--		<link rel="stylesheet" href="/common/css/login.css" type="text/css" />-->
		<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"">	
		<link rel="stylesheet" href="/common/css/caslogloginbegin.css" type="text/css" /> 
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>
<body>
<div class="container-noboot" >
	
<div id="banner">
<img src="/images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
<?php require "includes/navcontents.html"; ?>
	</div>
<div class="container-noboot">

	
	
		
	
	
		<!--<div id="section1"> <span style ="font-size: 1em; line-height: 1em;">-->




<?php if(!isset($_SESSION['username']) || $_SESSION['username']=="")
	{echo "Please log in to see this page";}else{
	if(!isset($_SESSION['uid'])){$quid = $_GET['quid'];}else{$quid=$_SESSION['uid'];}
	
	//begin insert
	//echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';

//$Userid=$_POST['uid'];
//echo $Userid;
include "../admin/process/newconnect.php";

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
         
         
<form action="/admin/process/usrupdateusr.php" method="post">
<div class="">
Editing User ID:&nbsp;<?php echo $uid;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp; <?php echo $uemail;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:&nbsp;<?php echo $uusername;?> </h1><hr></br> 
</div>

   
  
        
<table border="0" width="95%" style="{margin:auto;}">
<tbody id="oops">
<tr><td>                
<input style="display:none" type="text" name="fakeusernameremembered"/>
</td></tr><tr><td><input style="display:none" type="password" name="fakepasswordremembered"/> 
</td></tr>


<tr>
	<td class="label">Name:</td>
                  <td><input type="text" class="" name="uname" maxlength="250" value="<?php echo $uname;?>" required></td>
                   	                 </tr>
<tr>
	<td class="label">Cell Phone:</td>
                  <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info fltrt" name="umobile" value="<?php echo $umobile;?>"required></td>
	                 </tr>
<tr>
         <td class="label">Address:</td>
                  <td><input type="text" class="" name="uaddress" maxlength="250" value="<?php echo $uaddress;?>" required></td>
	      	                 </tr>
<tr>
	<td class="label">Office:</td>
                  <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="uofficeph" value="<?php echo $uofficeph;?>" required></td>
	                 </tr>
<tr>
	<td class="label">City:</td>
                  <td><input type="text" class="" name="ucity" maxlength="250" value="<?php echo $ucity;?>" required></td>
               	                 </tr>
<tr>
	<td class="label">Fax:</td>
                  <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="ufax" value="<?php echo $ufax;?>"></td>
</tr>
<tr>

	<td class="label">State:</td>
                  <td><input type="text" class="" name="ustate" maxlength="250" value="<?php echo $ustate;?>" required></td>

	
		                 </tr>
<tr>


	
	
	<td class="label">Company:</td>
                  <td><input type="text" class="" name="ucompany" maxlength="250" value="<?php echo $ucompany;?>" required></td>
</tr>
<tr>
	<td class="label">Zip:</td>
                  <td><input type="text" class="" name="uzip" maxlength="250" value="<?php echo $uzip;?>" required></td></tr>
<tr>
	<td class="label">Notes:</td>
                  <td><input type="text" class="" name="unotes" maxlength="250" value="<?php echo $unotes;?>" required></td>
	
	                 </tr>
               <tr>
                  <td class="label"></td></tr>
               <tr>
                  <td class=""></td></tr>
               <tr>
                    <td class="label"></td></tr>
               <tr>
                    <!--<td class="label">&nbsp;
                            </td>-->
                  <td><input type="submit" class="btn btn-primary" style="width:100%;" name="submit" value="Update User"></td></tr>
              
<tr><td> <input type="hidden" class="info" name="uid" maxlength="100"value="<?php echo $uid;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" class="info" name="uemail" maxlength="100"value="<?php echo $uemail;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" class="info" name="upassword" maxlength="100"value="<?php echo $upassword;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" name="uactive" value="<?php echo $uactive;?>"></option>
</td></tr><tr><td> <input type="hidden" class="info" name="uusername" autocomplete="off" value="<?php echo $uusername;?>"required readonly></td>
</td></tr><tr><td> <input type="hidden" name="uperms" value="<?php echo $uperms;?>"></td>
</tr>

                </tbody>
            </table><!--<table>
       
    
    <tr>
        <td class="headfoot"></td>
    </tr>
    
</table>-->
</form>
</div>

<?php 
//include footer template
require('layout/footer.php'); 
}?>
