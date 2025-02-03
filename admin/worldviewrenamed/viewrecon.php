<?php session_start();
$title="Shop Recon";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		

		
		
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<title><?php echo $title;?></title>


<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.0.3/css/dataTables.checkboxes.css" rel="stylesheet" />


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
<link rel="stylesheet" href="../Editor/css/editor.dataTables.min.css">
		
<!--<link rel="stylesheet" href="/admin/worldview/css/reconviewonly.css" type="text/css">-->
<link rel="stylesheet" href="css/world-login.css" type="text/css">
<link rel="stylesheet" href="css/adminworld.css" type="text/css">
<link rel="stylesheet" href="css/snow-nav-admin.css">
<link rel="stylesheet" href="css/wraptable-page.css">
<link rel="stylesheet" href="css/status-key.css">
<link rel="stylesheet" href="css/substatus-key.css">




<!-- -->

</head>
<body>

<div class="container tablewrapper" style="display:block; width:96%;">

 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{
echo'<div id="wbannerline" ><img class="worldbannerline" style="width:96%" src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" />
</div>';
			
//include 'adminloginnew.html';
//echo"</div>";






}else{ echo'<div id="wbannerline" >';
include 'css/snow-admin-nav.html';
include 'css/status-key.html';
include 'css/substatus-key.html';
	echo'</div>';}?>
	<br/>
	<!--</div>	close id-banner div
	<div id="worldbannerline" >
<div id="leftcolumnAdminIncludeClip">-->
<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{//echo'<div class="worldbannerline"><img class="worldbannerline" src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" />'; }else{
	 }?>
	 <!-- </div>-->

	


	
	
	
	<div id="section1" style="display:block;">
	<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see contents</p></div><!--sect1leftcolcomingfromifNOTloggedin=cannot go past-->';}else{echo '</div><!--sect1leftcolcomingfromifISloggedin=close-div-andcontinue-->';} ?>

	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{include 'adminloginnew.html';}else{ include 'views/reconhtml.html';
	echo "</script></body></html>";
	}?> 

