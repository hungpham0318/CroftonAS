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
	
		<div id="banner">
<img src="../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
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

$Userid=$_POST['uid'];
//echo $Userid;
include "../process/connect.php";

$result = mysql_query("SELECT * FROM users WHERE uid = $Userid");

 while($row = mysql_fetch_array($result))
    {
     	$uid=$row['uid'];
	$uname=$row['uname'];
	$umobile=$row['umobile'];
	$uusername=$row['uusername'];
	$uemail=$row['uemail'];
	$upassword=$row['upassword'];
	$uofficeph=$row['uofficeph'];
	$ufax=$row['ufax'];
	
	echo '<span style="font-weight:bold;">'.$uname.'</br></br>';
	echo 'Dealer ID&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDealer Name</span></br>';
	$relatives = mysql_query("SELECT * FROM `ud_relate`, `dealers` , `users` WHERE u_id = users.uid AND d_id = dealers.did AND u_id = $Userid");
 while($row = mysql_fetch_array($relatives))
    {$did=$row['did'];
	$dname=$row['dname'];
	$u_id=$row['u_id'];
	$d_id=$row['d_id'];
	
	echo $did.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$dname;
	echo '<a href="../process/deleterelative.php?d_id='. $d_id . '&u_id='.$u_id.'">Delete</a></br>';
	
   
    }echo '</br>';
	
    }
         mysql_close();
         
        
         ?>
         
   <!--      
<form action="../process/updateuser.php" method="post">
<div id="headline">Edit User</br></div>
<table>
   
    <tr>
        <td width="400">
            <table border="0" width="800" align="center">
                    <tr>
                    
                    
                    
                    <input style="display:none" type="text" name="fakeusernameremembered"/>
<input style="display:none" type="password" name="fakepasswordremembered"/> 

                       
                        <td class="label">User Id:</td>
                        <td><input type="text" class="info" name="uid" maxlength="100"value="<?php echo $Userid;?>" required></td>
                     </tr>
                     <td class="label">Name:</td>
                        <td><input type="text" class="" name="uname" maxlength="250" value="<?php echo $uname;?>" required></td>
                    </tr>
                    
                    <tr>
                        <td class="label">Email:</td>
                        <td><input type="text" class="info" name="uemail" maxlength="100"value="<?php echo $uemail;?>" required></td>
                     </tr>
                <tr>
                    <td class="label">Username:</td>
                    <td><input type="text" class="" name="uusername" autocomplete="off" value="<?php echo $uusername;?>"required></td>
                 </tr>
                <tr>
                    <td class="label">Password:</td>
                    <td><input type="password" autocomplete="off" class="" name="upassword" value="<?php echo $upassword;?>"required></br></td>
                </tr>
                <tr>
                    <td class="label">Cell Phone:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="umobile" value="<?php echo $umobile;?>"required></td>
                </tr>
                <tr>
                    <td class="label">Office Phone:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="uofficeph" value="<?php echo $uofficeph;?>" required></td>
                </tr>
                <tr>
                    <td class="label">Fax:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="ufax" value="<?php echo $ufax;?>"></td>
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
</form>-->

</html>
<?php

}
//session_destroy();
?>