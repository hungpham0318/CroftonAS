<?php session_start();
//   /admin/cas_new/addnewdealer.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<link rel="stylesheet" href="https://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<link rel="stylesheet" href="../../login.css" type="text/css" />
		
		<link rel="stylesheet" href="/admin/css/purebuttons.css" type="text/css" />
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


<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
echo'<html>
<head><link rel="stylesheet" type="text/css" href="../db.css">
<link rel="stylesheet" type="text/css" href="../admin/admin.css">
</head>

<body>
<form action="../process/dealernew_proc.php" method="post">
<table id="maintable" align="center">
    <tr><td>
       
<div class="headline">Add a New Dealership</div>
            <p align="center"><font color="white"><span style="font-size:24pt;"><b>Add a New Dealership</b></span></font></p>
            <p>
        </td>
    </tr>
    <tr>
        <td width="400">
            <table border="0" width="800" align="center">
                    <tr>
                        <td class="dlabel">Dealership Name:</td>
                        <td><input type="text" class="dinfo" name="dname" maxlength="250" required></td>
                    </tr>
                    <tr>
                        <td class="dlabel">Five Million Number:</td>
                        <td><input type="text" class="dinfo" name="dnumber" maxlength="7" required></td>
                    </tr>
                <tr>
            
                    <td class="dlabel">Dealer City State:</td>
                    <td><input type="text" class="dinfo" Title="Ex. ANNAPOLIS MD" name="dcity"></td>
                </tr>
                <tr>
                    <td class="dlabel">Dealership Phone:</span></td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" class="dinfo" name="dphone"></td>
                </tr>
                <tr>
                    <td class="dlabel">Sale Day Contact Name:</span></td>
                    <td><input type="text" class="dinfo" name="dcontact" required></td>
                </tr>
                <tr>
                    <td class="dlabel">Sale Day Contact Phone:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" class="dinfo" name="dsdphone" required></td>
                </tr>
                <tr>
                    <td class="dlabel">&nbsp;</td>
                        <td>
                            
                            <input type="submit" class="pure-button button-success" style="width: 200px;" name="submit" value="Submit New Dealer">
                        </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="headfoot">&nbsp;</td>
    </tr>
</table>
</form></div></div></br>';

echo '
</html>';
}
//session_destroy();
?>