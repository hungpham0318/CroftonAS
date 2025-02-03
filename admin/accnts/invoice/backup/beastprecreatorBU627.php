<?php session_start();
$title="beastprecreator";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{}
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];



$qdid = $_GET['did'];
$qmdid = $_GET['did'];
//echo '<br/>line 11 "$qdid" = '.$qdid.'<br/>line 11 "$qmdid" = '.$qmdid.'<br/>';

/*/----------------------------------------------------------
get the next id for invoices then set the variables needed
-------------------------------------------------------------/*/
include "../../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'invoices'
SQL;

if(!$result = $con->query($sql)){
    die(' Could not obtain the next invoice id.  There was an error running the query line 74 [' . $con->error . ']');
}
$row = $result->fetch_assoc();
$iid = $row['Auto_increment'];


include "../../process/connecti.php";

$result = mysqli_query($con, "SELECT * FROM dealers WHERE did = $qmdid");

  if($result === false) {echo "dealer query failed line 33".mysqli_error($con);
  }else
    
 
foreach($result as $row ) {
$did = $qmdid;
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
}
echo $idid.$idate.$iaid.$idname.$idnumber.$idattn.$idaddress.$idaddress2.$idcitystatezip.$idinvoiceemail;
echo "line 63</br>";



include "../../process/connecti.php";
$result4 = mysqli_query($con, "SELECT * FROM test_invoices_temp WHERE `idid` = $qmdid");
if($result4 === false) {
echo ' <br/>line 112 no invoice exists yet [' . $con->error . ']';
}else{

//if invoice_temp for that dealership exists, populate invoice record
foreach($result4 as $row ){
$idid = $qmdid;

//$idate = date( $row['idate'],'Y-m-d'); //because actual invoice has NOT been created yet
$idate = date("Y-m-d");
$iaid = $row['iaid'];
$idname = $row['idname'];
$idattn = $row['idattn'];
$idaddress = $row['idaddress'];
$idcitystatezip = $row['idcitystatezip'];
$idinvoiceemail= $row['idinvoiceemail'];
$iclosed= 0;
$ipdfurl = 'http://www.croftonas.com/admin/accnts/invoice/preview/$idid.pdf';
//$itotal = $row['itotal'];
}

echo '<br/> info 216 '.$idid.'  '.$idate.' '.$iaid.' '.$idname.' '.$idattn.' '.$idaddress.' '.$idcitystatezip.' '.$idinvoiceemail.' '.$iclosed.' '.$itotal;
} 
   

/*/----------------------------------------------------------------------------
    else If dealership invoice_temp does not exist, populate all dealership variables from dealers
    for did from stepone = $con, $result , and then populate invoice_temp variables.
-------------------------------------------------------------------------------/*/
	



/*---------------
Create icharge array
create master update array
--------------*/

$ichargeArr = array();
$ichargeEntry = array();
$mastinvArr =array();
$mastinvEntry =array();
$whereand = "";
$whereand = 'SELECT * FROM `test_master` WHERE `mdid` = '.$qdid.' AND `msubstatus` = "Inv-No" AND `mstatus` = "S" ';

/*/-------------------------------------------------------------------------------------
if invoice exists, query  ichargestemp  where mdid = ic_mdid   SELECT *  FROM i_chargestemp WHERE ic_did = $qmdid";
for each $result5 from that query  create the ichargeArr and ichargeEntry and also 
append the mid to the $whereand variable for use in masterarray query 
---------------------------------------------------------------------------------------------/*/

include "../../process/connecti.php";
$result5 = mysqli_query($con, "SELECT * FROM test_i_charges_temp WHERE ic_did = $qmdid");

if($result5 === false) { echo '<br /> line 162 error'.mysqli_error($con).'<br />';
}else {
    $itotalsum = 0;
    $y=1;
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
$ichargeEntry[17] = $y;
$itotalsum = $itotalsum + $ichargeEntry[7];
$whereand .= " AND `mid` != ".$ichargeEntry[2]; 

$ichargeArr[] = $ichargeEntry;
$y++;

}

$itotal=$itotalsum;
//echo $itotal;
echo $whereand.'<br />';
}




  //echo '<br />'.$whereand;
  //echo "   <-whereand<br />";
/*-----------------------------------------------------------------------
then use that list to begin to populate the icharges array, then query the master for did and inv-no, then use that list to 
set new i_chargestemp array rows if they are empty per the ic_mid = mid and inv-no 
so first we use the array we just populated to create a variable ($whereand) that becomes 
the excluding 'WHERE AND statement' list for the query. 
--------------------------------------------------------------------------------------------------*/
//$sqllist= $whereand;
//echo $sqllist;
	
//$sqllist= 'SELECT * FROM `test_master` WHERE `mdid` = '.$qmdid.' AND `msubstatus` = "inv-no" AND `mstatus` = "S"';
// SELECT * FROM `test_master` WHERE `mdid` = 1023 AND `msubstatus` = "Inv-No" AND `mstatus` = "S" AND `mid` != 12 AND `mid` != 13 AND `mid` != 14 AND `mid` != 15


/*/ ------------------------------------------------------------------------------------
then use use $sqllist to add to the master array and i_chargestemp array rows  
so first construct i_charges_temp rows
 
 and add them to icharge array
then use that list to collect vehicle info from master for i_charges_temp table = $con, $result3
 -------------------------------------------------------------------------------------/*/
//echo '<br />239 '.$whereand;
include "../../process/connecti.php";
$result3 = mysqli_query($con, $whereand);
if($result3 === FALSE) { 
echo " oops at line 242 SELECT FROM master failed!".mysqli_error($con);
}else{
    
	
/*------------------------------------
assigns variables from master query;
creates array first, then adds rows
---------------------------------*/
$itotalsum=0;
   
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

/*-----------------------------------------------------------------------
       set icharges in the icharges item array 
       and variables for each outstanding uninvoiced vehicle for $did
 ----------------------------------------------------------------------*/
$ic_id =  rand(0,100000000);
$ic_num = $y;
$ic_solddate = $row['msolddate'];
if($ic_solddate <=0){$ic_solddate = $idate;}
$ic_mid = $row['mid'];
$ic_did = $row['mdid'];
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];
$ic_rate = $row['mrepfee'];
$ic_ratedesc = $row['mrepfeedesc'];
$ic_qty = 1;
$ic_amount = $ic_rate*$ic_qty;
$iclosed=0;
$ic_date = date("Y-m-d");
$itotalsum = $itotalsum + $ic_amount;
if(!empty($ic_stock)){
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
$ichargeEntry[17] = $ic_num;
$ichargeArr[] = $ichargeEntry;

$y++;
}}
$itotal =$itotalsum;
$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/preview/$idid.pdf";
foreach($ichargeArr as $ichargeEntry){
echo '<pre>'; print_r($ichargeEntry); 
echo '</pre>';
}
/*-----IF-RECORD does NOT exist ---- INSERT INVOICE_TEMP -----------------------------
if invoice doesn't exist, insert a new invoice into invoices_temp  query  $result2 
plan b is to NOT truncate the table and call the records instead, 
-else if they exist skip to ___________!
update or replace test_invoice_temp row where idid = $qmdid before inserting  new or updated invoice info. preserving the open invoice concept but keeping the record updated.-*/
include "../../process/connecti.php";
$result2 = mysqli_query($con, "INSERT INTO `test_invoices_temp` (`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`, `idinvoiceemail`, `iclosed`) VALUES ($iid, '$idate', '$itotal', '$ipdfurl', '$iaid', $qdid, '$idname', '$idattn', '$idaddress', '$idcitystatezip', '$idinvoiceemail', 0)");
// mysqli_query returns false if something went wrong with the query
if($result2 === false) { //echo "<br />online 415 result2-  the error is ".mysqli_error($con)."<br />";
$result12 = mysqli_query($con, "UPDATE `test_invoices_temp` SET `iid`= $iid,`idate`='$idate',`itotal`='$itotal',`ipdfurl`='$ipdfurl',`iaid`='$iaid',`idname`='$idname',`idattn`='$idattn', `idaddress`='$idaddress', `idcitystatezip`='$idcitystatezip',`idinvoiceemail`='$idinvoiceemail',`iclosed`= 0 WHERE `idid` = $qdid ");
if($result12 === false) { 
//echo '418 '.mysqli_error($con).' 418 didnt update after not inserting<br />';
//die(mysqli_error($con));
}}
$ic_iid = $iid;
//$minvid = $iid;
$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/preview/$idid.pdf";
//echo '<br />line 424 says: iid = '; 
//echo $iid;
//echo '<br />line 426 says: url = '.$ipdfurl;
//echo '<br />line 426 says: did = '.$idid;
	//I probably have to delete test_icharges where ic_did  before inserting new ichargesarray.
	include "../../process/connecti.php";
foreach ($ichargeArr as $ichargeEntry){
//$result1 = mysqli_query($con, "INSERT INTO `test_i_charges_temp`(`ic_id`, `ic_num`,`ic_iid`, `ic_did`,`ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES ($ichargeEntry[16],$ichargeEntry[17], $iid,'$ichargeEntry[14]', '$ichargeEntry[2]', '$ichargeEntry[8]', '$ichargeEntry[7]', '$ichargeEntry[0]', '$ichargeEntry[1]', '$ichargeEntry[5]', '$ichargeEntry[6]', '$ichargeEntry[6]', '$ichargeEntry[12]', '$ichargeEntry[3]', '$ic_paid', '$ichargeEntry[8]')");


$result1 = mysqli_query($con, "INSERT INTO `test_i_charges_temp`(`ic_id`,`ic_num`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`, `ic_xtraint`, `ic_price`, `ic_did`) VALUES ( $ichargeEntry[16],$ichargeEntry[17], $iid, $ichargeEntry[2], '$ichargeEntry[8]',$ichargeEntry[7], '$ichargeEntry[0]','$ichargeEntry[1]',$ichargeEntry[5], '$ichargeEntry[6]','$ichargeEntry[12]'
,$ichargeEntry[3], '$ichargeEntry[4]', 0, '$ichargeEntry[10]', '0', 0 ,$ichargeEntry[14])");
// mysqli_query returns false if something went wrong with the query
if($result1 == FALSE) {
echo '- 437 records not inserted with  error: '.mysqli_error($con).'this query: '.$whereand.' <br />';
    //die(mysqli_error($con));
 }
}
/*
$URL="/admin/accnts/invoice/beastpreviewstepthree.php?did=$qmdid";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
*/

//header("Location: /admin/accnts/invoice/beastpreviewstepthree.php?did=$qmdid");
//header("Location: /admin/accnts/invoice/beastpreviewstepthree.php?did=$qmdid");
?>




	

