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
	echo'
<form action="../process/adduser_register.php" method="post">
<div id="headline">Add a New User</br></div>
<table>
   
    <tr>
        <td width="400">
            <table border="0" width="800" align="center">
                    <tr>
                    
                    
                    
                    <input style="display:none;" type="text" name="fakeusernameremembered"/>
<input style="display:none;" type="password" name="password"/> 

                        <td class="label">Name:</td>
                        <td><input type="text" class="" name="uname" maxlength="250" required></td>
                    </tr>
                    <tr>
                        <td class="label">Email:</td>
                        <td><input type="text" class="info" name="uemail" maxlength="100" required></td>
                     </tr>
                <tr>
                    <td class="label">Username:</td>
                    <td><input type="text" class="" name="uuusername" required></td>
                 </tr>
                <tr>
                    <td class="label">Password:</td>
                    <td><input type="password" autocomplete="off" class="" name="uupassword" required></br></td>
                </tr>
                <tr>
                    <td class="label">Cell Phone:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="umobile" required></td>
                </tr>
                <tr>
                    <td class="label">Office Phone:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="uofficeph" required></td>
                </tr>
                <tr>
                    <td class="label">Fax:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="info" name="ufax"></td>
                </tr>
                <tr>
                    <td class="label">&nbsp;</td>
                        <td>
                            <input type="submit" class="pure-button button-success" style="width: 200px;" name="submit" value="Submit New User">
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

</html>';}?>