<?php session_start();
//admin/index.php
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
		
		
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<title>begin</title>

<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.1.1/js/dataTables.keyTable.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.1.1/js/dataTables.autoFill.min.js"></script>
<script src="../../Editor-1.5.5/js/dataTables.editor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>

<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" href="../Editor/css/editor.dataTables.min.css">

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

	<div class="containerAdminIncludeClip">
	
		<!--<div id="banner"> 
<img src="../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div> -->
	



		<div id="section1">
<div id="leftcolumnAdminIncludeClip"><img src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" />
		<div id="navigation">
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include '../incmenu.htm';
	}?>
	<br/>
	</div>	<!--<div id="headline" > Administration</div>-->
	
<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see contents</p></div>';}else{echo '</div>';} ?>
</div>

<div id="rightcolumnAdminIncludeClip">
	<?php 
	if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{
			include '../forms/loginform.php';
	}
	else{
		$bar = $ausername;
		include '../forms/loggedinform.php';
	 }?> 
	 </div>
	 <?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'beginhtml.htm';}?>


	
	