<?php session_start();
$title="frankenstein";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{}
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
/*/ if the form has been posted, do this stuff:

1. $_POST all the invoice fields to invoice variables
2. make a loop to post icharges
3. $_POST all the i_charges to ic_variables

/*/
$qmdid = $_GET['did'];
if(isset($_POST)){

//1 $_POST all the invoice fields to invoice variables
include "../../process/connecti.php";

$iid=mysqli_real_escape_string($con, $_POST['iid']);
$idate = mysqli_real_escape_string($con, $_POST['idate']);
$itotal = mysqli_real_escape_string($con, $_POST['itotal']);
$ipdfurl = mysqli_real_escape_string($con, $_POST['ipdfurl']);
$iaid = mysqli_real_escape_string($con, $_POST['iaid']);
$idid = mysqli_real_escape_string($con, $_GET['did']);
$idname = mysqli_real_escape_string($con, $_POST['idname']);
$idattn = mysqli_real_escape_string($con, $_POST['idattn']);
$idaddress = mysqli_real_escape_string($con, $_POST['idaddress']);
$idcitystatezip = mysqli_real_escape_string($con, $_POST['idcitystatezip']);
$idinvoiceemail = mysqli_real_escape_string($con, $_POST['idinvoiceemail']);
$iclosed = mysqli_real_escape_string($con, $_POST['iclosed']);



include "../../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'test_invoices'
SQL;
if(!$result = $con->query($sql)){
    die(' Could not obtain the next invoice id.  There was an error running the query line 74 [' . $con->error . ']');
}
$row = $result->fetch_assoc();
echo "AUTO INCREMENT ";
echo $row['Auto_increment'];
$iid = $row['Auto_increment'];
echo "at line 77(postfromsteptwo) the iid= ".$iid;
echo 'iid = '.$iid;
echo '<br>line82<br>'.$iid;
$ic_iid = $iid;
$number =$iid;
$minvid = $iid;
//-----------------------------------------------------------
$ichargeArr = array();
$ichargeEntry = array();

	//Post the inputs from steptwo
 $j=1;
	 
		 $itotalsum = 0;
		 //$itotalsum = $itotalsum+$ic_amount;
do {

$ichargeEntry[0] = mysqli_real_escape_string($con,strtoupper($_POST['ic_description'.$j]));
$ichargeEntry[1] = mysqli_real_escape_string($con, $_POST['ic_solddate'.$j]);
$ichargeEntry[2] = mysqli_real_escape_string($con, $_POST['ic_mid'.$j]);
$ichargeEntry[3] = mysqli_real_escape_string($con, $_POST['ic_maid'.$j]);
$ichargeEntry[4] = mysqli_real_escape_string($con,strtoupper( $_POST['ic_stock'.$j]));
$ichargeEntry[5] = mysqli_real_escape_string($con, $_POST['ic_qty'.$j]);
$ichargeEntry[6] = mysqli_real_escape_string($con, $_POST['ic_rate'.$j]);
$ichargeEntry[7] = mysqli_real_escape_string($con, number_format($_POST['ic_qty'.$j] * $_POST['ic_rate'.$j]));

//$ichargeEntry[7] = mysqli_real_escape_string($con, number_format($_POST['$ic_amount'.$j], 2));
//$ichargeEntry[8] = mysqli_real_escape_string($con, $_POST['ic_price'.$j]);
$ichargeEntry[8] = mysqli_real_escape_string($con, $_POST['ic_date'.$j]);
$ichargeEntry[9] = mysqli_real_escape_string($con, $_POST['ic_paid'.$j]);
$ichargeEntry[10] = mysqli_real_escape_string($con, $_POST['ic_note'.$j]);
$ichargeEntry[11] = $iid;
$ichargeEntry[12] = mysqli_real_escape_string($con,strtoupper( $_POST['ic_ratedesc'.$j]));
$ichargeEntry[13] = mysqli_real_escape_string($con, $_POST['msubstatus'.$j]);
$ichargeEntry[14] = mysqli_real_escape_string($con, $_POST['ic_did'.$j]);
$ichargeEntry[15] = mysqli_real_escape_string($con,strtoupper( $_POST['mstatus'.$j]));
$ichargeEntry[16] = mysqli_real_escape_string($con,strtoupper( $_POST['ic_id'.$j]));
  $ichargeArr[] = $ichargeEntry;
  $itotalsum = $itotalsum+$ichargeEntry[7];
  $j++;
} while (!empty( $_POST['ic_id'.$j]));

echo $itotalsum;
$itotal= $itotalsum;
/* ------ */

$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/bunker/preview/$idid.$iid.pdf";

include "../../process/connecti.php";
$result23 = mysqli_query($con, "INSERT INTO `test_invoices_temp` (`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`, `idinvoiceemail`, `iclosed`) VALUES ($iid, '$idate','$itotal', '$ipdfurl', '$iaid', '$qdid', '$idname', '$idattn', '$idaddress', '$idaddress2', '$idinvoiceemail', 0)");
// mysqli_query returns false if something went wrong with the query
if($result23 != TRUE) { echo "<br />online 97 result2-  the error is ".mysqli_error($con)."<br />";
$result22 = mysqli_query($con, "UPDATE `test_invoices_temp` SET `iid`= $iid,`idate`='$idate',`itotal`=$itotal,`ipdfurl`='$ipdfurl',`iaid`='$iaid',`idname`='$idname',`idattn`='$idattn', `idaddress`='$idaddress', `idcitystatezip`='$idcitystatezip',`idinvoiceemail`='$dinvoiceemail',`iclosed`= 0 WHERE `idid` = $qdid ");
if($result22 != True) { 
echo ' '.mysqli_error($con).'ln 100 didnt update after not inserting<br />';

}}}

echo "ended the post part";
?>