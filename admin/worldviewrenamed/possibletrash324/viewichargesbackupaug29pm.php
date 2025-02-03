<?php session_start();
$title="Invoicing View";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		$mdid=$_GET['mdid'];
		}?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		

		
		
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<title><?php echo $title;?></title>

<link rel="stylesheet" type="text/css" href="/admin/worldview/css/normalize.css">	
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../Editor/css/editor.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/world-admin.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/world-login.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/snow-nav-admin.css">
<link rel="stylesheet" type="text/css" href="css/wraptable-page.css">
<link rel="stylesheet" type="text/css" href="css/status-key.css">
<link rel="stylesheet" type="text/css" href="css/substatus-key.css">
</head>
<body>
<div class="container container-wrapper" style="display:block;">
<div><!-- un-id-d navigation div -->
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'css/snow-admin-nav.html';
	}?>
	<br/>
	</div>	<!--Close id-ed navigation div-->
	<div id="worldbannerline" >
<!--<div id="leftcolumnAdminIncludeClip">-->
<div class="worldbannerline"><img class="worldbannerline" src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" /><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{ }else{echo'<div class="wbannerline">';
include 'css/status-key.html';
	include 'css/substatus-key.html';
	echo'</div>';
	 }?></div>
<!-- <div id="rightcolumnAdminIncludeClip"> -->
<div class="wbannerline">
	<?php 
	if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo'<div class="wbannerline"></div><div class="wbannerline" style="float:right;" width:18%">';
			include 'forms/li-form.html';
			echo"</div></div></div><!--NOT logged in and close div after login form displayed-->";
	}
	else{
		$bar = $ausername;
		//include 'css/status-key.html';
	echo "</div></div><!--IS logged in and 2 close divs after logged in form displayed-->";
	 }?> 
	
	
	
	<div id="section1" style="display:block;">
	<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see contents</p></div><!--sect1leftcolcomingfromifNOTloggedin=cannot go past-->';}else{echo '</div><!--sect1leftcolcomingfromifISloggedin=close-div-andcontinue-->';} ?>

	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{
	
	
	
	
	include "../process/connecti.php";
$qmdid = mysqli_real_escape_string($con, $_GET['mdid']);
$result = mysqli_query($con, "SELECT `did`,`dnumber`,`dname`,`daddress`,`dcity`,`dstate`,`dzip` 
FROM dealers WHERE `did` = $qmdid");

// mysqli_query returns false if something went wrong with the query
if($result === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 15 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));
}
else {echo 'line 94<br>';
// as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
   
foreach( $result as $row ) {
//from dealers

$did = $row['did'];
$dname = $row['dname'];
$dattn = $row['dattn'];
$dnumber = $row['dnumber'];
$daddress = $row['daddress'];
$dcity = $row['dcity'];
$dstate = $row['dstate'];
$dzip = $row['dzip'];
$daddress2 = $dcity.' '.$dstate.' '.$dzip;
}}
echo $did;
echo '<br>';
echo $dname;
echo '<br>';
echo $dnumber;
echo '<br>';
echo $dattn;
echo '<br>';
echo $daddress;
echo '<br>';
echo $dcity;
echo '<br>';
echo $dstate;
echo '<br>';
echo $dzip;
echo '<br>';
echo $daddress2;
echo '<br>';


$idid = $did;
$idate = date('Y-m-d');
$iaid = 1;
$idname = $dname;
$idnumber = $dnumber;
$idattn = $dattn;
$idaddress = $daddress;
$idaddress2 = $dcity.' '.$dstate.' '.$dzip;
echo $idate;
//dealer invoice variables

echo "<br>invoice idid: ".$idid;
echo "<br>idname: ".$idname;
echo "<br>idnumber: ".$idnumber;
echo "<br>idattn: ".$idattn;
echo "<br>idaddress: ".$idaddress;
echo "<br>idaddress: ".$idaddress2;
echo 'line 147<br>';

/*

Create icharge array
create master update array
create mi relate array
create di relate array
create invoice final updatequery

SELECT FROM master 



$ichargeArr = array();
$ichargeEntry = array();
$mastinvArr =array();
$mastinvEntry =array();

*/

	
	
	include 'views/ichargeshtml.html';
	echo "</script></body></html>";
	}?> 
