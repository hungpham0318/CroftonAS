<?php session_start();

if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Site Users</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content=""/>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="css/manage.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css" />
	<link rel="stylesheet" href="../common/css/login.css" type="text/css" />
	<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script> 
</head>
<body width="100%">
<div class="container">
	
	<div id="leftbanner">
		<img src="../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
	
	<div id="rightcolumn">
 		<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
		{	
			include 'forms/loginform.php';
		}
		else{
		$bar = $ausername;
		include 'forms/loggedinform.php';
	 	}?> 
	</div></div>	
<div id="section1">
<div id="navigation">
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'incmenu.htm';
	}?>
</div>
		
	
<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<div id="headline" > Site User List </div><p>Log in to view</p>';}else{} ?>
</div>


	
		<div id="section2"> <span style ="font-size:.8em; line-height:.8em;">



<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}
	else{
	
	//begin insert
include "process/connect.php";?>



 
<?php $result = mysql_query("SELECT * FROM users");



//echo '<table id="testTable" class="display_table"><tr><th>uid</th><th>Users Full Name</th><th>Phone</th><th>Username</th><th>Email</th></tr><tr>';
echo '<table id="testTable" class="display"></br></br><thead><th>User ID</th><th>Users Full Name</th><th>Phone</th><th>Username</th><th>Email</th><th>Edit</th><th><span style="color:Red;">X</span></th></tr></thead></br></br><tfoot><th>User ID</th><th>Users Full Name</th><th>Phone</th><th>Username</th><th>Email</th><th>Edit</th><th><span style="color:Red;">X</span></th></tr></tfoot><tbody class="display_table"><tr>';

 while($row = mysql_fetch_array($result))
    {
     	//$key = 'cas2013mdSB';
     	//$key = $_SESSION['apassword'];
	//$string = $row['upassword'];
//$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
//$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");


    echo '<td>'.$row['uid'].'</td>'.'<td>'.$row['uname'].'</td>'.'<td>'.$row['umobile'].'</td>'.'<td>'.$row['uusername'].'</td>'.'<td>'.$row['uemail'].'</td>';
    echo "<td><a href='cas_new/useredit.php?uid=".$row['uid']."'>Edit</a></td>";
//echo '<td><a href="process/deleteuser.php?uid='.$row['uid'].'"class="confirm" onclick="confirm()">X</a></td>'.'</tr>';
echo '<td><a href="process/deleteuser.php?uid='.$row['uid'].'" onclick="return confirm('."'Are you sure you want to delete this user?'".')">X</a></td>'.'</tr>';


    }
    echo "</tbody></table>";
       mysql_close();
       
      
 
//echo '</br></br><div id="interpret"><div id="interpdirs">';
//echo '</br></br>';
//echo 'Click the secret code three times in rapid succession to select.<br> Drag the selection to the field. Type the magic word and Tada!<br><br><br><div id="ajaxrequest"></div></div>';
//echo '<div id="interpfields">';
//echo 'Enter Secret Code: <input type="text" id="txtlocation"><br><br>';


//echo 'Enter your magic word: <input type="password" id="txtinput"style="width: 150px;";><br><br><br>';
//echo '<button id="loaddata" style="margin-left: 100px;" class="pure-button">Tada!</button><button id="cleardata" class="pure-//button">Make it disappear!</button></div></div></br></br></br>';
//echo '<div id="ajaxrequest"></div></br></br></br></br></div>';

//echo '<br><input type="button" class="pure-button button-success" onclick="';
//echo "tableToExcel('testTable', 'User List')";
//echo '"value="Export to Excel">';

}?>
<script type="text/javascript">
$(document).ready(function(){

$('#testTable').DataTable( {
  "stripeClasses": [ 'strip1', 'strip2', 'strip3' ]
} );



 
});
</script></div></body></html>