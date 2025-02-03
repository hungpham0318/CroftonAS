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
include "process/connect.php";
 
 $result = mysql_query("SELECT * FROM dealers ORDER BY dealers.dname ASC");
//echo '<table style="border: 1px;">'.'<tr>';
//echo '<table class="display_table">';
echo '<table id="testTable" class="tablesorter"><thead class="display_table"><th>D id</th><th>Dealer Name</th><th>Location</th><th>Dealer Phone</th><th>SaleDay Contact</th><th>SDContact Phone</th><th>5 Million</th></thead><tbody class="display_table"></tr><tr>';

 while($row = mysql_fetch_array($result))
    {
	echo'<td>'.$row['did'].'</td>'.'<td>'.$row['dname'].'</td>'.'<td>'.$row['dcity'].'</td>'.'<td>'.$row['dphone'].'</td>'.'<td>'.$row['dcontact'].'</td>'.'<td>'.$row['dsdphone'].'</td>'.'<td>'.$row['dnumber'].'</td>'.'</tr>';
    }
    echo "</table>";
    echo '</span>';
       mysql_close();
       }?>
<script type="text/javascript">
$(document).ready(function(){
$('#testTable').DataTable( {
  "stripeClasses": [ 'strip1', 'strip2', 'strip3' ]
} );
});
</script></div></body></html>