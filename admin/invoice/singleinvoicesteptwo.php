<?php session_start();
$title="Invoicing View";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		$mdid=$_GET['did'];
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
<link rel="stylesheet" type="text/css" href="../worldview/css/world-admin.css" type="text/css">
<link rel="stylesheet" type="text/css" href="../worldview/css/world-login.css" type="text/css">
<link rel="stylesheet" type="text/css" href="../worldview/css/snow-nav-admin.css">
<link rel="stylesheet" type="text/css" href="../worldview/css/wraptable-page.css">
<link rel="stylesheet" type="text/css" href="../worldview/css/status-key.css">
<link rel="stylesheet" type="text/css" href="../worldview/css/substatus-key.css">
</head>
<style>


td {text-transform:Uppercase;
white-space:nowrap;
font-family:monospace;
}
.button {
    background-color: #660000;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
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
	{}else{
	
	
	
	
	include "../process/connecti.php";
$qmdid = mysqli_real_escape_string($con, $_GET['did']);
$result = mysqli_query($con, "SELECT `did`,`dnumber`,`dname`,`daddress`,`dcity`,`dstate`,`dzip` FROM dealers WHERE `did` = $qmdid");

// mysqli_query returns false if something went wrong with the query
if($result === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 85 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));
}
else {//echo '<br>line 93<br>';
// as of php 5.4 I can use foreach
   
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
/*
echo '<a href="/admin/cas_new/editdealer.php?did='.$did.'" >Edit Dealer Info</a>';

  
   echo '         <br>';
   echo '                     <div class="dlabel">Dealership Id:
                        <br><input type="text" class="dinfo" name="did" value="'. $did.'"  maxlength="250" required>
                    </div>';
                    echo '    <div class="dlabel">Dealership Name:
                        <br><input type="text" class="dinfo" name="dname" value="'. $dname.'"  maxlength="250" required>
                    </div>';
                    echo '    <div class="dlabel">Five Million Number:
                        <br><input type="text" class="dinfo" name="dnumber" value="'. $dnumber.'" maxlength="7" required>
                    </div>';
                    echo '<div class="dlabel">Dealer Address:
                    <br><input type="text" class="dinfo" Title="Address" name="daddress" value="'. $daddress.'" >
                </div>';
                    echo '<div class="dlabel">Dealer City:
                    <br><input type="text" class="dinfo" Title="City" name="dcity" value="'. $dcity.'" >
                </div>';
                            
                    echo '<div class="dlabel">Dealer State:
                    <br><input type="text" class="dinfo" Title="State" name="dstate" value="'. $dstate.'" >
                </div>';
               
                echo '<div class="dlabel">Dealer Zip:
                    <br><input type="text" class="dinfo" Title="5 digit zip" name="dzip" value="'. $dzip.'" >
                </div>';
                 echo '<div class="dlabel">Dealership Phone:</span>
                <br><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" class="dinfo" name="dphone"value="'. $dphone.'" >
                </div>';
                echo '<div class="dlabel">Sale Day Contact Name:</span>
                    <br><input type="text" class="dinfo" name="dcontact" required value="'. $dcontact.'" >
                </div>';
                echo '<div class="dlabel">Sale Day Contact Phone:
                    <br><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" class="dinfo" name="dsdphone" value="'. $dsdphone.'" required>
                </div>';
                echo '    <div class="dlabel">Mail Account:
                    <br><input type="text" class="dinfo" Title="MailAccount" name="dmailAcctNum" value="'. $dmailAcctNum.'" >
                </div>';
                
                 echo '   <div class="dlabel">Notes:
                    <br><input type="text" class="dinfo" Title="Notes" name="dnotes" value="'. $dnotes.'" >
                </div>';






echo '<a href="/admin/cas_new/editdealer.php?did='.$did.'" >Edit Dealer Info</a>';

*/




echo '<br><a href="/admin/cas_new/editdealer.php?did='.$did.'" >Edit Dealer Info</a>';
echo '<br>';
echo $did;
echo '<br>';

echo $dnumber;
echo '<br>';
echo $dname;
if(!empty($dattn)){
echo '<br>';

echo $dattn;}
echo '<br>';
echo $daddress;
//echo '<br>';
//echo $dcity;
//echo '<br>';
//echo $dstate;
//echo '<br>';
//echo $dzip;
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
$idaddress2 = $dcity.', '.$dstate.' '.$dzip;
//echo $idate;
//dealer invoice variables

/*echo "<br>invoice idid: ".$idid;
echo "<br>idname: ".$idname;
echo "<br>idnumber: ".$idnumber;
echo "<br>idattn: ".$idattn;
echo "<br>idaddress: ".$idaddress;
echo "<br>idaddress: ".$idaddress2;
//echo 'line 206<br>';
*/
/*

Create icharge array
create master update array
create mi relate array
create di relate array
create invoice final updatequery

SELECT FROM master 





*/

$ichargeArr = array();
$ichargeEntry = array();
$mastinvArr =array();
$mastinvEntry =array();


include "../process/connecti.php";
$qmid = mysqli_real_escape_string($con, $_GET['mid']);
$result3 = mysqli_query($con, "SELECT `mid`, `maid`, `muid`, `mdid`, `mvin`, `myear`, `mmodel`, `mstock`, `mstatus`, `minvid`, `msubstatus`, `msolddate`,`msoldprice`
FROM master WHERE mdid = $did AND mid = $qmid AND minvid <= 0");


//$result3 = mysqli_query($con, "SELECT `mid`, `maid`, `muid`, `mdid`, `mvin`, `myear`, `mmodel`, `mstock`, `mstatus`, `minvid`, `msubstatus`, `msolddate`,`msoldprice`
//FROM master WHERE mdid = $did AND mstatus = 'A' AND msubstatus = 'recon-green' AND minvid <= 0");

// mysqli_query returns false if something went wrong with the query
if($result3 === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 234 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));
}
else {//echo 'line 243<br>';
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
    foreach( $result3 as $row ) {


//--------------------
//assign variables from master query
//from master
//create array first then add rows
/**/

$mid =	$row['mid'];
$mdid =	$row['mdid'];
$myear = $row['myear'];
$mmodel = $row['mmodel'];
$mvin = $row['mvin'];
$msolddate = $row['msolddate'];
$mstatus = $row['mstatus'];
$msubstatus = $row['msubstatus'];
$muid =	$row['muid'];
$maid =	$row['maid'];
$msoldprice = $row['msoldprice'];
$mstock = $row['mstock'];

$mastinvEntry[0] = $mid;
$mastinvEntry[1] = $maid;
$mastinvEntry[2] = $muid;
$mastinvEntry[3] = $mdid;
$mastinvEntry[4] = $mvin;

$mastinvEntry[5] = $myear;
$mastinvEntry[6] = $mmodel;
$mastinvEntry[7] = $mstock;
$mastinvEntry[8] = $mstatus;
$mastinvEntry[9] = $msubstatus;
$mastinvEntry[10] = $minvid;
$mastinvEntry[11] = $msolddate;
$mastinvEntry[12] = $msoldprice;
$mastinvArr[] = $mastinvEntry;



/*
echo "<br>mid: ".$mid;
echo "<br>myear: ".$myear;
echo "<br>mmodel: ".$mmodel;
echo "<br>mvin: ".$mvin;
echo "<br>msolddate: ".$msolddate;
echo "<br>mstatus: ".$mstatus;
echo "<br>msubstatus: ".$msubstatus;
echo "<br>muid: ".$muid;
echo "<br>maid: ".$maid;
echo "<br>msoldprice: ".$msoldprice;
echo "<br>mstock: ".$mstock;
*/
//set icharges in the icharges item array and variables for each outstanding uninvoiced vehicle for that dealership
 
$ic_solddate = $row['msolddate'];
if($ic_solddate <=0){$ic_solddate = $idate;}
$ic_mid = $mid;
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];

$ic_rate = 150;
$ic_qty = 1;
$ic_amount = $ic_rate * $ic_qty;
$ic_price = $ic_amount;
$price = $ic_amount;
$iclosed=1;
$ic_date = $idate;
//$itotal = 0;
$itotal = $itotal+$ic_amount;

if(!empty($ic_stock)){
$ic_description = substr($myear, -2)." ".$mmodel." ".substr($mvin, -8)." - Stk# ".$mstock;}
else{$ic_description = substr($myear, -2)." ".$mmodel." ".substr($mvin, -8)." ".$mstock;}

$ichargeEntry[0] = $ic_description;
$ichargeEntry[1] = $ic_solddate;
$ichargeEntry[2] = $ic_mid;
$ichargeEntry[3] = $ic_maid;
$ichargeEntry[4] = $ic_stock;
$ichargeEntry[5] = $ic_qty;
$ichargeEntry[6] = $ic_rate;
$ichargeEntry[7] = $ic_amount;
$ichargeEntry[8] = $ic_price;
$ichargeEntry[9] = $ic_date;
$ichargeArr[] = $ichargeEntry;
}

}

//echo 'line 334<br>';
/*
foreach ($ichargeArr as $ichargeEntry){
echo '<pre></br>icharge array';
 print_r($ichargeEntry);}
echo '</br></pre>';
foreach ($mastinvArr as $mastinvEntry){echo '<pre></br>master-invoice array'; 
print_r($mastinvEntry); 
echo '</br></pre>';}*/
/*
echo '<pre></br>icharge array'; print_r($ichargeArr);
echo '<pre></br>master-invoice array'; print_r($mastinvArr); echo '</br></pre>';*/
/*attempt to get the next id for invoices then set the variables needed*/
include "../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'invoices'
SQL;

if(!$result = $con->query($sql)){
    die('There was an error running the query line 353 [' . $con->error . ']');
}

$row = $result->fetch_assoc();

//echo $row['Auto_increment'];

$iid = $row['Auto_increment'];
//echo "at line 362 the iid= ".$iid;
//echo "<br>";
$ipdfurl = 'http://www.croftonas.com/admin/accnts/invoice/bunker/'.$idid.'.'.$iid.'.pdf';
/**/


// ----------------------------------------------------------//
// 'insert invoice' query  $result2 
// ----------------------------------------------------------//
	include "../process/connecti.php";
	
	$deleterecords = "TRUNCATE TABLE invoices_temp"; //empty the table of its current records
mysqli_query( $con, $deleterecords );


include "../process/connecti.php";

$result2 = mysqli_query($con, "INSERT INTO `invoices_temp`(`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`,`iclosed`) VALUES ($iid, '$idate', '$itotal', '$ipdfurl', $iaid, $idid, '$idname', '$idattn', '$idaddress', '$idaddress2', 0)");

// mysqli_query returns false if something went wrong with the query
if($result2 === FALSE) { echo 'died at line 382 insert invoices query result2 which means there is no iid defined henceforth';
    die(mysqli_error($con));
    
}
else {//$last_id = mysqli_insert_id($con);
//$iid = $last_id;
}
//echo "<br>";
//echo 'line 390 Invoice Number: ';
//echo $iid;
//echo "<br>";
//echo 'line 393<br>';
$ic_iid = $iid;
$di_iid = $iid;
$mi_iid = $iid;

$minvid = $iid;
//$iidname= $iid;
//$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/bunker'.$idid.'.'.$iid.'.pdf";

$ic_paid = 0;
$ic_note = "none";
//echo "</br>";
//echo 'line 405<br>';

	include "../process/connecti.php";
	
	$deleterecords = "TRUNCATE TABLE i_charges_temp"; //empty the table of its current records
mysqli_query( $con, $deleterecords );
	
	include "../process/connecti.php";
$qmid = mysqli_real_escape_string($con, $_GET['mid']);
//$result4 = mysqli_query($con, "INSERT INTO `i_charges_temp`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES (null, '$ic_iid', '$ic_mid', '$ic_date', $ic_amount, $ic_description, '$ic_solddate', '$ic_qty', '$ic_rate', '$ic_maid', '$ic_stock', '$ic_paid', '$ic_note')");

foreach ($ichargeArr as $ichargeEntry){
$result4 = mysqli_query($con, "INSERT INTO `i_charges_temp`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES (null, '$ic_iid', '$ichargeEntry[2]', '$ichargeEntry[9]', '$ichargeEntry[7]', '$ichargeEntry[0]', '$ichargeEntry[1]', '$ichargeEntry[5]', '$ichargeEntry[6]', '$ichargeEntry[3]', '$ichargeEntry[4]', '$ic_paid', '$ic_note')");



// mysqli_query returns false if something went wrong with the query
if($result4 === FALSE) { echo 'No vehicles for this dealership are available for invoicing.  This page only returns vehicles whose Status is set to S(old) or A(ctive) with the Substatus set to recon-green';
    die(mysqli_error($con));
    
}
}



	echo '<a href="/admin/accnts/invoice/invoicestepthree.php" class="button" >Create Invoice</a>';
	include 'views/steptwohtml.html';
	echo "</script></body></html>";
	}?> 