<?php session_start();
$title="Invoicing View";
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
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/world-admin.css" type="text/css">
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/world-login.css" type="text/css">
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/snow-nav-admin.css">
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/wraptable-page.css">
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/status-key.css">
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/substatus-key.css">
</head>
<body>
<div class="container container-wrapper" style="display:block;">
<div><!-- un-id-d navigation div -->
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<a href="/admin/worldview/index.php">Click here to login</a>';
	}else{ include '../worldview/css/snow-admin-nav.html';
	}?>
	<br/>
	</div>	<!--Close id-ed navigation div-->
	
	
	
	
	<div id="section1" style="display:block;">
	<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see contents</p></div><!--sect1leftcolcomingfromifNOTloggedin=cannot go past-->';}else{echo '</div><!--sect1leftcolcomingfromifISloggedin=close-div-andcontinue-->';} ?>

	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'views/dsteponehtml.html';
	echo "</script></body></html>";
	}?> 

