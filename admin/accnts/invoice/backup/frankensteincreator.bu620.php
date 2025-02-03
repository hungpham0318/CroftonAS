<?php session_start();
$title="frankenstein";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{}
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];



$qdid = $_GET['did'];
$qmdid = $_GET['did'];
echo '<br/>line 11 "$qdid" = '.$qdid.'<br/>line 11 "$qmdid" = '.$qmdid.'<br/>';

/*/----------------------------------------------------------
get the next id for invoices then set the variables needed
-------------------------------------------------------------/*/
include "../../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'test_invoices'
SQL;

if(!$result = $con->query($sql)){
    die(' Could not obtain the next invoice id.  There was an error running the query line 74 [' . $con->error . ']');
}
$row = $result->fetch_assoc();
$iid = $row['Auto_increment'];
echo $iid." <br/>line 27 <br/>";

/*

$ic_iid = $iid;
//$minvid = $iid;
echo '<br />line106 says: iid = '; 
echo $iid;
echo '<br />line 108 says: url = '.$ipdfurl;
echo '<br />line 108 says: did = '.$idid;
echo '<br />';
*/


/*/--------------------------------------------------------------------------
if invoice_temp for that dealership exists, populate invoice variables  $result4
'post or get' did to mysqli_real_escape_string
------------------------------------------------------------------------------/*/

include "../../process/connecti.php";
$result4 = mysqli_query($con, "SELECT * FROM test_invoices_temp WHERE `idid` = $qdid");

//if invoice_temp for that dealership exists, populate invoice record

if($result4) {
$isrecord = 1;

foreach($result4 as $row ){
$idid = $row['idid'];

//$idate = date( $row['idate'],'Y-m-d'); //because actual invoice has NOT been created yet
$idate = date("Y-m-d");
$iaid = $row['iaid'];
$idname = $row['idname'];
$idattn = $row['idattn'];
$idaddress = $row['idaddress'];
$idcitystatezip = $row['idcitystatezip'];
$idinvoiceemail= $row['idinvoiceemail'];
$iclosed= $row['iclosed'];
$ipdfurl = '';
$itotal = $row['itotal'];
}

echo '<br/> info 216 '.$idid.'  '.$idate.' '.$iaid.' '.$idname.' '.$idattn.' '.$idaddress.' '.$idcitystatezip.' '.$idinvoiceemail.' '.$iclosed.' '.$itotal;
} else{echo ' <br/>line 112 no invoice exists [' . $con->error . ']';}
   

/*/----------------------------------------------------------------------------
    else If dealership invoice_temp does not exist, populate all dealership variables from dealers
    for did from stepone = $con, $result , and then populate invoice_temp variables.
-------------------------------------------------------------------------------/*/
	$isrecord = 0;
	echo '<br />is record =0 at line 221<br />';

include "../../process/connecti.php";

$result = mysqli_query($con, "SELECT * FROM dealers WHERE did = $qmdid");

  if($result) {
    
 

foreach($result as $row ) {
$did = $row['did'];
$dname = $row['dname'];
$dattn = $row['dattn'];
$dnumber = $row['dnumber'];
$daddress = $row['daddress'];
$dcity = $row['dcity'];
$dstate = $row['dstate'];
$dzip = $row['dzip'];
$daddress2 = $dcity.' '.$dstate.' '.$dzip;
$drepfee = $row['drepfee'];
$drepfeedesc = $row['drepfeedesc'];
$dinvoiceemail = $row['dinvoiceemail'];

$idate = date("Y-m-d");
$idid = $qmdid;
//$idate = new DateTime('Y-m-d');
$iaid = 1;
$idname = $dname;
$idnumber = $dnumber;
$idattn = $dattn;
$idaddress = $daddress;
$idaddress2 = $dcity.' '.$dstate.' '.$dzip;
$idcitystatezip = $dcity.' '.$dstate.' '.$dzip;
$idinvoiceemail= $dinvoiceemail;
}}
echo $idid.$idate.$iaid.$idname.$idnumber.$idattn.$idaddress.$idaddress2.$idcitystatezip.$idinvoiceemail;
/*---------------
Create icharge array
create master update array
--------------*/

$ichargeArr = array();
$ichargeEntry = array();
$mastinvArr =array();
$mastinvEntry =array();
$whereand = 'SELECT * FROM `test_master` WHERE `mdid` = '.$qdid.' AND `msubstatus` = "Inv-No" AND `mstatus` = "S" ';

/*/-------------------------------------------------------------------------------------
if invoice exists, query  ichargestemp  where mdid = ic_mdid   SELECT *  FROM i_chargestemp WHERE ic_did = $qmdid";
for each $result5 from that query  create the ichargeArr and ichargeEntry and also 
append the mid to the $whereand variable for use in masterarray query 
---------------------------------------------------------------------------------------------/*/

include "../../process/connecti.php";
$result5 = mysqli_query($con, "SELECT * FROM test_i_charges_temp WHERE ic_did = $qmdid");
if($result5 !== FALSE) { 
    $itotalsum = 0;
foreach( $result5 as $row ) {

$ichargeEntry[0] = $row['ic_description'];
$ichargeEntry[1] = $row['ic_solddate'];
$ichargeEntry[2] = $row['ic_mid'];
$ichargeEntry[3] = $row['ic_maid'];
$ichargeEntry[4] = $row['ic_stock'];
$ichargeEntry[5] = $row['ic_qty'];
$ichargeEntry[6] = $row['ic_rate'];
$ichargeEntry[7] = $row['ic_amount'];
$ichargeEntry[8] = $row['ic_date'];
$ichargeEntry[9] = $row['ic_paid'];
$ichargeEntry[10] = $row['ic_note'];
$ichargeEntry[11] = $iid;
$ichargeEntry[12] = $row['ic_ratedesc'];
$ichargeEntry[13] = "Inv-No";
$ichargeEntry[14] = $row['ic_did'];
$ichargeEntry[15] = "S";
$ichargeEntry[16] = $row['ic_id'];

$ichargeArr[] = $ichargeEntry;
$itotalsum = $itotalsum+$ichargeEntry[7];

$whereand .= " AND `mid` != ".$row['ic_mid']; 
}
$itotal=$itotalsum;
echo $itotal;
}else {echo '<br /> line 162 error'.mysqli_error($con).'<br />';
}
//echo "isrecord = 1 at line 307";



  echo '<br />'.$whereand;
  echo "   <-whereand<br />";
/*-----------------------------------------------------------------------
then use that list to begin to populate the icharges array, then query the master for did and inv-no, then use that list to 
set new i_chargestemp array rows if they are empty per the ic_mid = mid and inv-no 
so first we use the array we just populated to create a variable ($whereand) that becomes 
the excluding 'WHERE AND statement' list for the query. 
--------------------------------------------------------------------------------------------------*/
foreach($ichargeArr as $ichargeEntry){echo '<pre>'; print_r($ichargeEntry); echo '</pre>';}

	$sqllist= $whereand;
echo $sqllist;
	
//$sqllist= 'SELECT * FROM `test_master` WHERE `mdid` = '.$qmdid.' AND `msubstatus` = "inv-no" AND `mstatus` = "S"';
// SELECT * FROM `test_master` WHERE `mdid` = 1023 AND `msubstatus` = "Inv-No" AND `mstatus` = "S" AND `mid` != 12 AND `mid` != 13 AND `mid` != 14 AND `mid` != 15


/*/ ------------------------------------------------------------------------------------
then use use $sqllist to add to the master array and i_chargestemp array rows  
so first construct i_charges_temp rows
 
 and add them to icharge array
then use that list to collect vehicle info from master for i_charges_temp table = $con, $result3
 -------------------------------------------------------------------------------------/*/
echo '<br />239 '.$whereand;
include "../../process/connecti.php";
$result3 = mysqli_query($con, $whereand);
if($result3 == FALSE) { echo " oops at line 242 SELECT FROM master failed!".mysqli_error($con);
}
    
	
/*------------------------------------
assigns variables from master query;
creates array first, then adds rows
---------------------------------*/
$itotalsum=0;
$y=1;   
foreach($result3 as $row ) {

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
$mrepfee = $row['mrepfee'];
$mrepfeedesc = $row['mrepfeedesc'];
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
$mastinvEntry[13] = $mrepfee;
$mastinvEntry[14] = $mrepfeedesc;

$mastinvArr[] = $mastinvEntry;
$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/bunker/preview/$idid.pdf";
/*-----------------------------------------------------------------------
       set icharges in the icharges item array 
       and variables for each outstanding uninvoiced vehicle for $did
 ----------------------------------------------------------------------*/
$ic_id = $y;
$ic_solddate = $row['msolddate'];
if($ic_solddate <=0){$ic_solddate = $idate;}
$ic_mid = $mid;
$ic_did = $qmdid;
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];
$ic_rate = $row['mrepfee'];
$ic_ratedesc = $row['mrepfeedesc'];
$ic_qty = 1;
$ic_amount = $ic_rate*$ic_qty;
$iclosed=0;
$ic_date = date("Y-m-d");
$itotalsum = $itotalsum + $ic_amount;
if(!empty($mstock)){
$ic_description = substr($myear, -2)." ".$mmodel." ".substr($mvin, -8)." - Stk# ".$mstock;}
else{$ic_description = substr($myear, -2)." ".$mmodel." ".substr($mvin, -8);}


$ichargeEntry[0] = $ic_description;
$ichargeEntry[1] = $ic_solddate;
$ichargeEntry[2] = $ic_mid;
$ichargeEntry[3] = $ic_maid;
$ichargeEntry[4] = $ic_stock;
$ichargeEntry[5] = $ic_qty;
$ichargeEntry[6] = $ic_rate;
$ichargeEntry[7] = $ic_amount;
$ichargeEntry[8] = $ic_date;
$ichargeEntry[9] = $ic_paid;
$ichargeEntry[10] = $ic_note;
$ichargeEntry[11] = $iid;
$ichargeEntry[12] = $ic_ratedesc;
$ichargeEntry[13] = $msubstatus;
$ichargeEntry[14] = $ic_did;
$ichargeEntry[15] = $mstatus;
$ichargeEntry[16] = $ic_id;

$ichargeArr[] = $ichargeEntry;

$y++;
}
$itotal =$itotalsum;
$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/bunker/preview/$idid.$iid.pdf";

/*-----IF-RECORD does NOT exist ---- INSERT INVOICE_TEMP -----------------------------
if invoice doesn't exist, insert a new invoice into invoices_temp  query  $result2 
plan b is to NOT truncate the table and call the records instead, 
-else if they exist skip to ___________!
update or replace test_invoice_temp row where idid = $qmdid before inserting  new or updated invoice info. preserving the open invoice concept but keeping the record updated.-*/
include "../../process/connecti.php";
$result2 = mysqli_query($con, "INSERT INTO `test_invoices_temp` (`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`, `idinvoiceemail`, `iclosed`) VALUES ($iid, '$idate', '$itotal', '$ipdfurl', '$iaid', $qdid, '$idname', '$idattn', '$idaddress', '$idcitystatezip', '$idinvoiceemail', 0)");
// mysqli_query returns false if something went wrong with the query
if($result2 != TRUE) { echo "<br />online 415 result2-  the error is ".mysqli_error($con)."<br />";
$result12 = mysqli_query($con, "UPDATE `test_invoices_temp` SET `iid`= $iid,`idate`='$idate',`itotal`='$itotalsum',`ipdfurl`='$ipdfurl',`iaid`='$iaid',`idname`='$idname',`idattn`='$idattn', `idaddress`='$idaddress', `idcitystatezip`='$idcitystatezip',`idinvoiceemail`='$idinvoiceemail',`iclosed`= 0 WHERE `idid` = $qdid ");
if($result12 != True) { 
echo '418 '.mysqli_error($con).' 418 didnt update after not inserting<br />';
//die(mysqli_error($con));
}}
$ic_iid = $iid;
//$minvid = $iid;
$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/bunker/preview/$idid.$iid.pdf";
echo '<br />line 424 says: iid = '; 
echo $iid;
echo '<br />line 426 says: url = '.$ipdfurl;
echo '<br />line 426 says: did = '.$idid;
	//I probably have to delete test_icharges where ic_did  before inserting new ichargesarray.
	include "../../process/connecti.php";
foreach ($ichargeArr as $ichargeEntry){
//$result1 = mysqli_query($con, "INSERT INTO `test_i_charges_temp`(`ic_id`, `ic_iid`, `ic_did`,`ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES ($ichargeEntry[16], $iid,'$ichargeEntry[14]', '$ichargeEntry[2]', '$ichargeEntry[8]', '$ichargeEntry[7]', '$ichargeEntry[0]', '$ichargeEntry[1]', '$ichargeEntry[5]', '$ichargeEntry[6]', '$ichargeEntry[6]', '$ichargeEntry[12]', '$ichargeEntry[3]', '$ic_paid', '$ichargeEntry[8]')");


$result1 = mysqli_query($con, "INSERT INTO `test_i_charges_temp`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`, `ic_xtraint`, `ic_price`, `ic_did`) VALUES ( $ichargeEntry[16], $iid, $ichargeEntry[2], '$ichargeEntry[8]',$ichargeEntry[7], '$ichargeEntry[0]','$ichargeEntry[1]',$ichargeEntry[5], '$ichargeEntry[6]','$ichargeEntry[12]'
,$ichargeEntry[3], '$ichargeEntry[4]', 0, '$ichargeEntry[10]', '0', 0 ,$ichargeEntry[14])");
// mysqli_query returns false if something went wrong with the query
if($result1 == FALSE) { echo '- 437 records not inserted with  error: '.mysqli_error($con).'this query: '.$whereand.' <br />';
    //die(mysqli_error($con));
 }
}
?>

<html>
<?php include "../../sales/stylehead-begin.html";?>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
    /* For mobile phones: */
body{font-size: 16px;
font-family: 'Open Sans', sans-serif!important;}
.label-input {
width: 20%;
text-align:left;
height: 1.5em;
vertical-align:middle;
display:inline-block;
line-height:1em;
font-size:1em;
font-family: 'Open Sans', sans-serif!important;
}
tbody{border-color:#ffffff!important;}
input {  
padding: 5px 10px;
height: 1.5em;
width:25em;
/*margin : 0 auto;*/
border: none;
/* border: 1px solid #660000;*/
border-radius : 5px;
/*box-shadow : 0 1px 1px #ccc inset, 0 1px 0 #ccc;*/
display:inline-block;
margin : 0 auto;
  font-size:1em;
  line-height:1em;
   font-family: 'Open Sans', sans-serif!important;
}
fieldset { 
    display: block;
    width:45%;
    margin-left: 1%;
    margin-right: 2px;
    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: .5em;
    padding-right: 0.75em;
 /*   border:none!important;
    position: absolute;
    left: 10px;
    top: 6.3em;*/
    font-size:1em;
    line-height:1em;
}
#myTable input{
font-size:14px;
font-weight:500;
font-family:'Open Sans', sans-serif;
box-shadow: none;
line-height: 1.4em;
height:1.4em;

}
#myTable thead tr{
border-top:1px solid #000000!important;
padding:10px;
border-bottom:1px solid #000000!important;
border-left:none!important;
text-transform:uppercase!important;
}
#myTable {/*
position:absolute;
left:2em;
top:28em;*/
border-collapse:collapse;
border-left:none!important;
}
#myTable tbody{border-left: none!important;border-right:none!important;}
#myTable td{
border-right:1px solid #000000;
border-left:none!important;
text-transform:uppercase!important;
}
#myTable tr{border-top:1px solid #000000;border-left:none!important;border-right:none!important;
}
<?php include "../../sales/stylehead-end.html";?>
<body>
<?php 
include "../../worldview/css/snow-admin-nav.html";?>
<div id = "btncreate"><button style = "position: absolute;left: 12em;top: 39em;" title="When you create a new row, or change values in the row, the totals also need to be updated on this form...for a little while...until the juice is worth the squeeze, anyway" onclick="myCreateFunction()">Create row</button></div>
<?php
include "../../process/connecti.php";

$resultit=mysqli_query($con, "SELECT * FROM test_invoices_temp WHERE idid = $qmdid");

// mysqli_query returns false if something went wrong with the query
if($resultit == FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 38 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}
else {//echo 'line 49 <br>';
// as of php 5.4 foreach
   
foreach( $resultit as $row ) {
//$iid=$row['iid'];
$idate = date("Y-m-d");
//$itotal= money_format('%i', $row['itotal']);
$itotal= number_format($row['itotal'],2);
$ipdfurl=$row['ipdfurl'];
$iaid=$row['iaid'];
$idid=$row['idid'];
$idname=$row['idname'];
$idattn=$row['idattn'];
$idaddress=$row['idaddress'];
$idcitystatezip=$row['idcitystatezip'];
$idinvoiceemail=$row['idinvoiceemail'];
$iclosed =$row['iclosed'];
}}
   ?>

<br /><table id ="maintable" style = "width:90%;margin-left:8%"><thead><tr><br /><th style = "width:48%!important;" ></th><th style = "width:48%!important;" ></th></tr></thead>
<tbody><tr><td style="vertical-align:top;"><form id="invcorrect" method="post" action="frankenpost.php?did=<?php echo $idid;?>" >
<img src = "invimage.png" style = "margin-left: -3em;width:95%;"><br />
<label class="label-input" style = "position: relative;left:33em;top: -2.6em;width:2em;">Date:</label><br /> <input name ="idate" value = "<?php echo $idate;?>" type="date" style = "padding:0px!important; margin:0px!important; position: relative;left:36em;top:-4.6em!important;height:2em; width:9em!important;"><br />
<label class="label-input" style = "position: relative;left: 18em;top: -3.3em;">Invoice #:</label><input name ="iid" value = "<?php echo $iid;?>" type="text" style = "width: 4em!important;position: relative;left: 14em;top: -3.4em;" readonly><br />
<label class="label-input" style = "text-align:left;" >TO:  </label><br />
<input name ="idname" value = "<?php echo $idname;?>" type="text" style = ""><br />
<input name ="idattn" value = "<?php echo $idattn;?>" type="text" style = "/*position: absolute;left:3em;top: 18em;*/"  placeholder="Attn:"><br />
<input name ="idaddress" value = "<?php echo $idaddress;?>" type="text" style = "/*position: absolute;left: 3em;top: 20em;*/"><br />
<input name ="idcitystatezip" value = "<?php echo $idcitystatezip;?>" type="text" style = "/*position: absolute;left: 3em;top: 22em;*/"><br /><br /><br />
<?php
include "../../process/connecti.php";

$resultic=mysqli_query($con, "SELECT * FROM test_i_charges_temp WHERE ic_did = $qmdid ");

// mysqli_query returns false if something went wrong with the query
if($resultic == FALSE) { 
     die(mysqli_error($con)."<b><br><br>query begins line 110 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}else {
// as of php 5.4 foreach
echo '<br /><table id="myTable" style ="width:45%;border: 1px solid #000000;/*position:absolute;*/top:50em;"><thead> <tr><th></th><th>Description</th><th></th><th>Qty</th><th>Rate</th><th>Amount</th><th></th></tr>';

echo '<tbody>';
$GLOBALS['x'] = 1;
foreach( $resultic as $row ) {

$icnum = $x;
 echo'
 <tr id="rows" style = "border:1px solid #000000;"><td><input name="icnum'.$x.'" value="'.$icnum.'" style="width: 3em;"></td>
<td style="text-transform:uppercase!important;"><input name="ic_description'.$x.'" value="'.$row['ic_description'].'" style="text-transform:uppercase!important;width: 24em;"></td>
	<td style="text-transform:uppercase!important;"><input name="ic_ratedesc'.$x.'" value="'.$row['ic_ratedesc'].'" style="width: 13em;style="text-transform:uppercase!important;"></td>
	<td><input name="ic_qty'.$x.'" value="'.$row['ic_qty'].'" style="width: 3em;"></td>
	<td><input name="ic_rate'.$x.'" value="'. number_format($row['ic_rate'],0).'" style="width: 4em;"></td>
	<td><input name="ic_amount'.$x.'" value="'.$row['ic_amount'].'" style="width: 5em;"></td>
	<td><input name="ic_did'.$x.'" value="'.$row['ic_did'].'" type="hidden" >
	<input name="ic_iid'.$x.'" value="'.$row['ic_iid'].'" type="hidden">
	<input name="ic_iid'.$x.'" value="'.$row['ic_iid'].'" type="hidden" >
	<input name="ic_mid'.$x.'"  value="'.$row['ic_mid'].'" type="hidden" >
	<input name="ic_date'.$x.'" value="'.$row['ic_date'].'" type="hidden">
	<input name="ic_solddate'.$x.'"  value="'.$row['ic_solddate'].'" type="hidden" >
	<input name="ic_maid'.$x.'" value="'.$row['ic_maid'].'" type="hidden">
	<input name="ic_stock'.$x.'"  value="'.$row['ic_stock'].'" type="hidden" >
	<input name="ic_paid'.$x.'" value="'.$row['ic_paid'].'" type="hidden">
	<input name="ic_note'.$x.'" value="'.$row['ic_note'].'" type="hidden">
	<input name="ic_xtraint'.$x.'"  value="'.$row['ic_xtraint'].'" type="hidden">
	<input name="ic_price'.$x.'" value="'.$row['ic_price'].'" type="hidden" >
	<input name="ic_id'.$x.'" value="'.$row['ic_id'].'" type="hidden" >
	</td>	
	</tr>	';
$icnum++;
$x++;
}
echo '</tbody></table><br>';
}?>
<label class="label-input" style = "/*position: absolute;left:32em;top:50em;*/">Invoice Total</label> <input name ="itotal"  value = "<?php echo $itotal;?>" type="amount" style = "width: 5em;/*position: absolute;left: 40em;top: 50em;*/"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 48em;*/">Invoice Link</label><input name ="ipdfurl"  value = "<?php echo $ipdfurl;?>" type="url" style="width:36em;text-transform:lowercase!important;"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 51em;*/">Email to:</label> <input name ="idinvoiceemail"  value = "<?php echo $idinvoiceemail;?>" type="text"  style="width:36em;text-transform:lowercase!important;"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top:54em;*/">Invoice Paid</label><input name ="iclosed"  value = "<?php echo $iclosed;?>" type="text" style = "/*position: absolute;left: 5em;top: 70em;*/"><br />
<label class="label-input" style = "/*position: absolute;left:1em;top: 57em;*/">DealerId</label><input name ="idid"  value = "<?php echo $idid;?>" type="text" style = "/*position: absolute;left: 8em;top: 73em;*/"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 60em;*/">Auctionid</label> <input name ="iaid"  value = "<?php echo $iaid;?>" type="text" style = "/*position: absolute;left: 8em;top: 75em;*/"><br />
<button style = "" type = "submit" > Submit</button><button style = "" disabled> Recreate Invoice</button><button style = "" disabled>Change Invoice Record</button><button style = "" disabled>Send Invoice Link</button><br />
</fieldset></form>

</td> <td><p id="iframe" align="center">
<iframe src="invimage.jpg" width="100%" height="1024px" style="valign:top;" allow-forms allow-top-navigation allow-popups allow-same-origin allow-scripts allow-pointer-lock name="" onError="location.href='invimage.jpg'">
  <p>Your browser does not support iframes.</p>
</iframe></p>
<img src="invimage.jpg" width="1" height="1" style="visibility:hidden" onError="document.getElementById('iframe').innerHTML = '<img src='invimage.jpg'>'">
</td></tr></tbody></table>
<?php
$icnum	=$x;
$icnumdata = '<td><input name="icnum'.$x.'" value="'.$icnum.'" style="width: 3em;"></td>';
$icd = '<td style="text-transform:uppercase!important;"><input name="ic_description'.$x.'" value="" style="text-transform:uppercase;width: 24em;"></td>';
$icrd = '<td style="text-transform:uppercase!important;"><input name="ic_ratedesc'.$x.'" value="" style="width: 13em;text-transform:uppercase!important;"></td>';
$icq = '<td><input name="ic_qty'.$x.'" value="" style="width: 3em;"></td>';
$icr = '<td><input name="ic_rate'.$x.'" value="" style="width: 4em;"></td>';
$ica = '<td><input name="ic_amount'.$x.'" value="" style="width: 5em;border:none!important;"></td>';
$myreadonly = '<div><td> <input name="ic_iid'.$x.'" value="'.$iid.'" type="hidden" readonly><input name="ic_mid'.$x.'" value="" type="hidden" readonly><input name="ic_date'.$x.'" value="'.$idate.'" type="hidden" readonly><input name="ic_solddate'.$x.'" value="" type="hidden" readonly><input name="ic_maid'.$x.'" value="'.$iaid.'" type="hidden" readonly><input name="ic_stock'.$x.'" value="" type="hidden" readonly><input name="ic_paid'.$x.'" value="0" type="hidden" readonly><input name="ic_note'.$x.'" value="" type="hidden" readonly><input name="ic_xtraint'.$x.'" value="" type="hidden" readonly><input name="ic_price'.$x.'" value="" type="hidden" readonly></td></div>';

?>

	 <?php include '../../sales/jsscripts.html';?>
<script>
$("#insert-more").click(function () {
     $("#myTable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});
$("#add_new").click(function () { 

    $("#myTable").each(function () {
       
        var tds = '<tr>';
        jQuery.each($('tr:last td', this), function () {
            tds += '<td>' + $(this).html() + '</td>';
        });
        tds += '</tr>';
        if ($('tbody', this).length > 0) {
            $('tbody', this).append(tds);
        } else {
            $(this).append(tds);
        }
    });
});


 var x =document.getElementById("myTable").rows.length; 
   console.log(x);
function myCreateFunction() {
    var x =document.getElementById("myTable").rows.length; 
    console.log(x);
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var icnumdata  = row.insertCell(0);
    var ic_description = row.insertCell(1);
    var ic_ratedesc = row.insertCell(2);
    var ic_qty = row.insertCell(3);
    var ic_rate = row.insertCell(4);
    var ic_amount = row.insertCell(5);
    var invreadonly = row.insertCell(6);

      	icnumdata.innerHTML = '<td><input name="ic_id'+ x + '" value="'+ x +'" style="width: 3em;"></td>';
	ic_description.innerHTML = '<td style="text-transform:uppercase;"><input name="ic_description'+x+'" value="" style="text-transform:uppercase;width: 24em;"></td>';
     	ic_ratedesc.innerHTML = '<td style="text-transform:uppercase;"><input name="ic_ratedesc'+x+'" value="" style="text-transform:uppercase!important;width: 13em;"></td>';
      	ic_qty.innerHTML = '<td><input name="ic_qty'+x+'" value="" style="width: 3em;"></td>';
       	ic_rate.innerHTML = '<td><input name="ic_rate'+x+'" value="" style="width: 4em;"></td>';
        ic_amount.innerHTML ='<td><input name="ic_amount'+x+'" value="" style="width: 5em;"></td>';
        invreadonly.innerHTML ='<div><td> <input name="ic_iid'+x+'" value="<?php echo $iid;?>" type="hidden" readonly><input name="ic_mid'+x+'" value="<?php echo $iid.'.'.$icnum;?>" type="hidden" readonly><input name="ic_date'+x+'" value="<?php echo $idate;?>" type="hidden" readonly><input name="ic_solddate'+x+'" value="" type="hidden" readonly><input name="ic_maid'+x+'" value="<?php echo $iaid;?>" type="hidden" readonly><input name="ic_stock'+x+'" value="" type="hidden" readonly><input name="ic_paid'+x+'" value="0" type="hidden" readonly><input name="ic_note'+x+'" value="" type="hidden" readonly><input name="ic_xtraint'+x+'" value="" type="hidden" readonly><input name="ic_price'+x+'" value="" type="hidden" readonly></td></div>';
}


















/*

 var x =document.getElementById("myTable").rows.length; 
   console.log(x);
   
function myCreateFunction() {
   var x =document.getElementById("myTable").rows.length; 
    console.log(x);
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var icnumdata  = row.insertCell(0);
    var ic_description = row.insertCell(1);
    var ic_ratedesc = row.insertCell(2);
    var ic_qty = row.insertCell(3);
    var ic_rate = row.insertCell(4);
    var ic_amount = row.insertCell(5);
   var invreadonly = row.insertCell(6);
     
     	icnumdata.innerHTML = '<?php echo $icnumdata;?>';
	ic_description.innerHTML = '<?php echo $icd;?>';
     	ic_ratedesc.innerHTML = '<?php echo $icrd;?>';
      	ic_qty.innerHTML = '<?php echo $icq;?>';
       	ic_rate.innerHTML = '<?php echo $icr;?>';
        ic_amount.innerHTML ='<?php echo $ica;?>';
        invreadonly.innerHTML ='<?php echo $myreadonly;?>';
   
}*/

function myDeleteFunction() {
    //document.getElementById("myTable").deleteRow(0);
}


$(document).on("click",'#mybtn',function(){	
    var datatoadd="<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6 </td><td>7</td></tr><?php $icnum++;?>";
    $('#mytable').append(datatoadd);  
}); 

	</script>
</body>
</html>