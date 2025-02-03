<?php session_start();
$title="Master";
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


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<!--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">-->
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<!--<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">-->
<link rel="stylesheet" href="../Editor/css/editor.dataTables.min.css">
		
		<link rel="stylesheet" href="css/world-admin.css" type="text/css">
		<link rel="stylesheet" href="css/world-login.css" type="text/css">
<link rel="stylesheet" href="css/snow-nav-admin.css">
<link rel="stylesheet" href="css/wraptable-page.css">
<link rel="stylesheet" href="css/status-key.css">
<link rel="stylesheet" href="css/substatus-key.css">

<style>
.button{background-color: #000000;
    border: 1.5px black solid;
    color: white;
    padding: 3px 3px 3px 3px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 80%;
    margin: 0;
    cursor: pointer;
line-height:50%;}

.newclass{
	margin-left:0px;
	margin-right:20px
	text-align:left;
	display:block;}
}
</style><!---->
</head>
<body>
<div class="container tablewrapper" style="display:block;">
<div><!-- un-id-d navigation div -->
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'css/snow-admin-nav.html';
	}?>
	<br/>
	</div>	<!--Close id-ed navigation div-->
	<div id="worldbannerline" >
<!--<div id="leftcolumnAdminIncludeClip">-->
<div class="worldbannerline"><!--<img class="worldbannerline" src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" />--> <?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="") 
	{ }else{echo'<div class="wbannerline">';
	include 'css/substatus-key.html';
	echo'</div>';
	 }?></div>

	

<!-- <div id="rightcolumnAdminIncludeClip"> -->
<div class="wbannerline">
	<?php 
	if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo'<div class="wbannerline"></div><div class="wbannerline" style="float:right;" width:18%">';
			//include 'forms/li-form.html';
			echo"</div></div></div><!--NOT logged in and close div after login form displayed-->";
	}
	else{
		$bar = $ausername;
		include 'css/status-key.html';
		include 'css/page-key-masterview.html';
	echo "</div></div><!--IS logged in and 2 close divs after logged in form displayed-->";
	 }?> 
	
	
	
	<div id="section1" style="display:block;">
	<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see contents</p><a href="/admin/worldview/index.php">Click here to log in</a></div><!--sect1leftcolcomingfromifNOTloggedin=cannot go past-->';}else{echo '</div><!--sect1leftcolcomingfromifISloggedin=close-div-andcontinue-->';} ?>

	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'views/masterhtml.html';
	echo "</script></body></html>";
	}?> 

