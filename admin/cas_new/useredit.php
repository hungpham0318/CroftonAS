<?php session_start();
//admin/cas_new/displayallindexed.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
	
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
	
	<!--	<div id="banner">
<img src="../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>-->
<div id="navigation">
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'cas_new-incmenu.htm';
	}?>
	
	</div>
	
	
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
	echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';

$Userid=$_GET['uid'];
//echo $Userid;
include "../process/connect.php";

$result = mysql_query("SELECT * FROM users WHERE uid = $Userid");

 while($row = mysql_fetch_array($result))
    {
     	$uid=$row['uid'];
	$uname=$row['uname'];
	$umobile=$row['umobile'];
	$username=$row['username'];
	$email=$row['email'];
	$password=$row['password'];
	$uofficeph=$row['uofficeph'];
	$ufax=$row['ufax'];
	$uaddress=$row['uaddress'];
	$ucity=$row['ucity'];
	$ustate=$row['ustate'];
	$uzip=$row['uzip'];
	$unotes=$row['unotes'];
	$active=$row['active'];
	$uperms=$row['uperms'];
	$ucompany=$row['ucompany'];
	
	
	
	
	
	
    }
         mysql_close();
         
        
         ?>
         
         
<form action="../process/updateuser.php" method="post">
<div id="headline">Edit User</div> 
<table>
   
    <tr>
        <td width="400px">
            <table border="0" width="800px" align="center">
<tr>
	<td class="label">Name:</td>
		<td><input type="text" class="" name="uname" maxlength="250" value="<?php echo $uname;?>" required ></td>
	<td class="label">Cell Phone:</td>
		<td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="umobile" value="<?php echo $umobile;?>" required ></td>
                       
	<td class="label">User Id:</td>
		<td><input type="text" class="info" name="uid" maxlength="100"value="<?php echo $Userid;?>" readonly ></td>
                                    	
   </tr>                         
 <tr>               
                    
        <td class="label">MailAddress:</td>
                    <td><input type="text" class="" name="uaddress" autocomplete="off" value="<?php echo $uaddress;?>"></td>
        <td class="label">Fax:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="ufax" value="<?php echo $ufax;?>"></td>  
	<td class="label">Email:</td>
        <td><input type="text" class="info" name="email" maxlength="100"value="<?php echo $email;?>" readonly ></td>
</tr>         
<tr>

<td class="label">City:</td>
                    <td><input type="text" class="" name="ucity" autocomplete="off" value="<?php echo $ucity;?>"></td>


	<td class="label">Office Phone:</td>
     <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="uofficeph" value="<?php echo $uofficeph;?>" ></td>
    
    
    
     <td class="label">Password:</td>
     <td><input type="password" autocomplete="off" class="" name="password" value="<?php echo $password;?>" readonly></td>
             
</tr>
<tr>
<td class="label">State:</td>
                    <td><input type="text" class="" name="ustate" autocomplete="off" value="<?php echo $ustate;?>"></td>
<td class="label">Company:</td>
                    <td><input type="text" class="" name="ucity" autocomplete="off" value="<?php echo $ucompany;?>"></td>
<td class="label">Username:</td>
                    <td><input type="text" class="" name="username" autocomplete="off" value="<?php echo $username;?>"readonly></td>
 </tr>

 <tr>

<td class="label">Zip:</td>
                    <td><input type="text" class="" name="uzip" autocomplete="off" value="<?php echo $uzip;?>"></td>
<td class="label">Active:</td>
                    <td><input type="text" class="" name="active" autocomplete="off" value="<?php echo $active;?>"></td>
<td class="label">Permissions:</td>
                    <td><input type="text" class="" name="uperms" autocomplete="off" value="<?php echo $uperms;?>"readonly></td>
 </tr>
              </table>
              <table><tr>
			<td class="label">User Notes:</td>
                    <td><textarea name="unotes" autocomplete="off" style="width: 600px;" value=""><?php echo $unotes;?></textarea></td>
                   
                    
			</tr>
			</table>
<table>
                
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
</container>
</html>
<?php

}
//session_destroy();
?>