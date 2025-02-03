<?php session_start();
//admin/regman/reconhtml.php
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
		
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<link rel="stylesheet" href="../../common/css/login.css" type="text/css" />
		
		
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<title>Recon</title>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
<link rel="stylesheet" href="../Editor/css/editor.dataTables.min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css">
		<link rel="stylesheet" href="../../common/css/login.css" type="text/css">
<link rel="stylesheet" href="/common/css/birdmenu/cssnewtry.css">
<style>
body {font-family:Verdana, Geneva, sans-serif;
font-size:100%;
overflow-y:scroll;
width: auto;
}

div.DTE_Inline input {
        border: none;
        background-color: transparent;
        padding: 0 !important;
        font-size: 90%;
      
        
    }
 
    div.DTE_Inline input:focus {
        outline: none;
        background-color: transparent;
    }
    tfoot input {
        width: 100%;
        padding: 1px;
        box-sizing: border-box;
    }
 
</style>

</head>
<body>
<div class="container tablewrapper" style="display:block;">
	<div class="containerAdminIncludeClip" style="display:block;">

<div id="leftcolumnAdminIncludeClip"><img src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" /></div>

	


<div id="rightcolumnAdminIncludeClip">
	<?php 
	if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{
			include '../forms/loginform.php';
			echo"</div><!--NOT logged in and close div after login form displayed-->";
	}
	else{
		$bar = $ausername;
		include '../forms/loggedinform.php';
	echo "</div></div><!--IS logged in and 2 close divs after logged in form displayed-->";
	 }?> 
	
	<div style="height:300px;"><!-- un-id-d navigation div -->
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include '../birdmenuinc.htm';
	}?>
	<br/>
	</div>	<!--Close id-ed navigation div-->
	
	<div id="section1" style="display:block;">
	<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see contents</p></div><!--sect1leftcolcomingfromifNOTloggedin=cannot go past-->';}else{echo '</div><!--sect1leftcolcomingfromifISloggedin=close-div-andcontinue-->';} ?>

	 <?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'newreconmenutest.html';}?>


	
	