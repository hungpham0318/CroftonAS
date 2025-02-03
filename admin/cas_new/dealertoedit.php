<?php session_start();
//admin/displayallindexed.php
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
		<link rel="stylesheet" href="../../login.css" type="text/css" />
		
		<link rel="stylesheet" href="../../purebuttons.css" type="text/css" />
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
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	
	//begin insert
	echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';

$Dealerid=$_POST['did'];
//echo $Userid;
include "../process/connect.php";

$result = mysql_query("SELECT * FROM dealers WHERE did = $Dealerid");

 while($row = mysql_fetch_array($result))
    {
     	$did=$row['did'];
	$dname=$row['dname'];
	$dnumber=$row['dnumber'];
	$dcity=$row['dcity'];
	$dcontact=$row['dcontact'];
	$dphone=$row['dphone'];
	$dsdphone=$row['dsdphone'];
	
    }
         mysql_close();
         
        
         ?>
        
	
	

<form action="../process/updatedealer.php" method="post">
<table id="maintable" align="center">
    <tr><td>
       
<div class="headline">Edit Dealer Record</div>
            <p align="center"><font color="white"><span style="font-size:24pt;"><b>Edit Dealership</b></span></font></p>
            <p>
        </td>
    </tr>
    <tr>
        <td width="400">
            <table border="0" width="800" align="center">
            <tr>
                        <td class="dlabel">Dealership Id:</td>
                        <td><input type="text" class="dinfo" name="did" value="<?php echo $did;?>"  maxlength="250" required></td>
                    </tr>
                    <tr>
                        <td class="dlabel">Dealership Name:</td>
                        <td><input type="text" class="dinfo" name="dname" value="<?php echo $dname;?>"  maxlength="250" required></td>
                    </tr>
                    <tr>
                        <td class="dlabel">Five Million Number:</td>
                        <td><input type="text" class="dinfo" name="dnumber" value="<?php echo $dnumber;?>" maxlength="7" required></td>
                    </tr>
                <tr>
            
                    <td class="dlabel">Dealer City State:</td>
                    <td><input type="text" class="dinfo" Title="Ex. ANNAPOLIS MD" name="dcity" value="<?php echo $dcity;?>" ></td>
                </tr>
                <tr>
                    <td class="dlabel">Dealership Phone:</span></td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" class="dinfo" name="dphone"value="<?php echo $dphone;?>" ></td>
                </tr>
                <tr>
                    <td class="dlabel">Sale Day Contact Name:</span></td>
                    <td><input type="text" class="dinfo" name="dcontact" required value="<?php echo $dcontact;?>" ></td>
                </tr>
                <tr>
                    <td class="dlabel">Sale Day Contact Phone:</td>
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" class="dinfo" name="dsdphone" value="<?php echo $dsdphone;?>" required></td>
                </tr>
                <tr>
                    <td class="dlabel">&nbsp;</td>
                        <td>
                            
                            <input type="submit" class="pure-button button-success" style="width: 200px;" name="submit" value="Update Dealer Record">
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


</html>
<?php

}
//session_destroy();
?>

