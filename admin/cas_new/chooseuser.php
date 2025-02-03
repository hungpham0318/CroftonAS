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
		<link rel="stylesheet" href="../../css/login.css" type="text/css" />
		
		
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
	<div id="headline"></div>
		<div id="section1">
		<span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
echo'
<form action="usertoedit.php" method="post">
<div id="headline">Choose User to Edit</br></div>
<table id="maintable" align="center">
    
    <tr>
        <td width="400">
            <table border="0" width="800" align="center">
                    <tr>
                        <td><select id="uid" name="uid" tabindex="1" width="250px">
 			<option value="">Select User</option>';
       			include "../process/connect.php";
 $result = mysql_query("SELECT users.uname,  users.uid FROM  users");
 while($row = mysql_fetch_array($result))
    {
    echo "<option value='".$row['uid']."'>".$row['uname']."</option>";
    }
    echo "</select>";
       mysql_close(); 
       echo' </td>
                               
                       
       
                    <td class="label">&nbsp;</td>
                        <td>
                            <span style="font-size:12px;"><input class="pure-button button-success" style="font-size:12px;" type="submit" name="submit" value="Edit User Record"></p>
                        </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="headfoot">&nbsp;</td>
    </tr>
</table></form></div></div></br>';

echo '
</html>';
}
//session_destroy();
?>