<?php
$qmdid = $_GET['did'];
$qdid = $_POST['idid'];

if(isset($_POST)){

//  post all the invoice fields to invoice variables
include "../../process/connecti.php";

$idate = mysqli_real_escape_string($con, $_POST['idate']);
$itotal = mysqli_real_escape_string($con, $_POST['itotal']);
$ipdfurl = mysqli_real_escape_string($con, $_POST['ipdfurl']);
$iaid = mysqli_real_escape_string($con, $_POST['iaid']);
$idid = mysqli_real_escape_string($con, $_POST['idid']);
$idname = mysqli_real_escape_string($con, $_POST['idname']);
$idattn = mysqli_real_escape_string($con, $_POST['idattn']);
$idaddress = mysqli_real_escape_string($con, $_POST['idaddress']);
$idcitystatezip = mysqli_real_escape_string($con, $_POST['idcitystatezip']);
$idinvoiceemail = mysqli_real_escape_string($con, $_POST['idinvoiceemail']);
$iclosed = mysqli_real_escape_string($con, $_POST['iclosed']);
$iid=mysqli_real_escape_string($con, $_POST['iid']);


include "../../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'test_invoices'
SQL;
if(!$result = $con->query($sql)){
    die(' Could not obtain the next invoice id.  There was an error running the query line 74 [' . $con->error . ']');
}
$row = $result->fetch_assoc();
//echo "AUTO INCREMENT ";
//echo $row['Auto_increment'];
$iid = $row['Auto_increment'];
//echo "at line XXXX  (postfromsteptwo) the iid= ".$iid;

//echo '<br>line82<br>'.$iid;
$ic_iid = $iid;
//$number =$iid;
//$minvid = $iid;
//echo $ic_iid.'<br />';
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
$ichargeEntry[7] = mysqli_real_escape_string($con, $_POST['ic_amount'.$j]);

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
  $itotalsum = $itotalsum + $_POST['ic_amount'.$j];
  $j++;
} while (!empty( $_POST['ic_id'.$j]));

//echo '<br /> sum = '.$itotalsum."<br />";
$itotal = $itotalsum;
/* ------ */

$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/bunker/preview/$idid.$iid.pdf";

include "../../process/connecti.php";
 



//Update worked if the didnt update message from line 91 didnt show
//echo "<script>window.location = 'frankenview.php';</script>";

/**/
$c=1;
foreach ($ichargeArr as $ichargeEntry){

$ic_id = $ic_iid."-".$ic_did.'-'.date('d').'-'.$c;

$result31 = mysqli_query($con, "INSERT INTO `test_i_charges_temp`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`, `ic_xtraint`, `ic_price`, `ic_did`) VALUES ($ichargeEntry[16] , $ic_iid, $ichargeEntry[2], '$ichargeEntry[8]','$ichargeEntry[7]', '$ichargeEntry[0]','$ichargeEntry[1]',$ichargeEntry[5], '$ichargeEntry[6]','$ichargeEntry[12]'
,$ichargeEntry[3], '$ichargeEntry[4]', 0, '$ichargeEntry[10]', 0, '0' ,$ichargeEntry[14])");

// mysqli_query returns false if something went wrong with the query
if($result31 === FALSE) { //echo "did not create 112".mysqli_error($con);
$result41 = mysqli_query($con, "UPDATE `test_i_charges_temp` SET 
 `ic_id`= $ichargeEntry[16],
 `ic_iid`= $ic_iid,
 `ic_mid`= $ichargeEntry[2],
 `ic_date`= '$ichargeEntry[8]',
 `ic_amount`='$ichargeEntry[7]',
 `ic_description`= '$ichargeEntry[0]',
 `ic_solddate`='$ichargeEntry[1]',
 `ic_qty`=$ichargeEntry[5],
 `ic_rate`= '$ichargeEntry[6]',
 `ic_ratedesc`='$ichargeEntry[12]',
 `ic_maid`='$ichargeEntry[3]',
 `ic_stock`= '$ichargeEntry[4]',
 `ic_paid`=0,
 `ic_note`= '$ichargeEntry[10]',
 `ic_xtraint`= 0,
 `ic_price`='0.00',
 `ic_did`=$ichargeEntry[14] WHERE `ic_did` = $ichargeEntry[14] AND `ic_mid` = $ichargeEntry[2]; ");
 
 }
if($result41 === FALSE) {//echo '- did not update 25 <br />'.mysqli_error($con);
    
    }
   
    
  //$itotalsum = $itotalsum+$ichargeEntry[7];
  $j++;
}  
  $itotal= $itotal/2;
$result23 = mysqli_query($con, "INSERT INTO `test_invoices_temp` (`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`, `idinvoiceemail`, `iclosed`) VALUES ($iid, '$idate','$itotalsum', '$ipdfurl', '$iaid', '$qdid', '$idname', '$idattn', '$idaddress', '$idaddress2', '$idinvoiceemail', 0)");
// mysqli_query returns false if something went wrong with the query
if($result23 != TRUE) { //echo "<br />line 136 result23-   -- Now trying to update instead of insert for test_invoices_temp...the error is ".mysqli_error($con);

$result22 = mysqli_query($con, "UPDATE `test_invoices_temp` SET `iid`= $iid,`idate`='$idate',`itotal`= '$itotalsum',`ipdfurl`='$ipdfurl',`iaid`='$iaid',`idname`='$idname',`idattn`='$idattn', `idaddress`='$idaddress', `idcitystatezip`='$idcitystatezip',`idinvoiceemail`='$dinvoiceemail',`iclosed`= 0 WHERE `idid` = $qdid ");
if($result22 != True) { 
//echo '<br /> 23 '.mysqli_error( $con).'ln 140 r23 didnt update after not inserting<br />';
}

/**/

}
}
//echo '<a href = "frankenview.php" ><form action="frankenview.php"><input name = "did" type = "hidden" value = "'.$idid.'"></form>ended the post part</a>';
header("Location: /admin/accnts/invoice/frankenview.php?did=$qmdid");
//header('Location: /page.html');
?>