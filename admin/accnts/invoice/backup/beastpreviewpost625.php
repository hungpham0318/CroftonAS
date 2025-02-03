<?php
$qmdid = $_GET['did'];


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
SHOW TABLE STATUS LIKE 'invoices'
SQL;
if(!$result = $con->query($sql)){
    die(' Could not obtain the next invoice id.  There was an error running the query line 74 [' . $con->error . ']');
}
$row = $result->fetch_assoc();

$iid = $row['Auto_increment'];


;
$ic_iid = $iid;

//$minvid = $iid;

//-----------------------------------------------------------
$ichargeArr = array();
$ichargeEntry = array();
//$j=0;
$itotalsum = 0;
//Pull the ichargestemp rows and add them to get the info for pdf and also to total the invoice and update the itotal

include "../../process/connecti.php";

$results = mysqli_query($con, "SELECT * FROM test_i_charges_temp WHERE ic_did = $qmdid");
if($results === FALSE) { //echo "did get icharges 52".mysqli_error($con);}


foreach($results as $row) {

//set icharges in the icharges item array and variables for each row in ichargestemp change to read directly into vars
//`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`
$ic_ratedesc = $row['ic_ratedesc'];
$ic_description = $row['ic_description'];
$ic_solddate = $row['ic_solddate'];
$ic_mid = $row['ic_mid'];
$ic_maid = $row['ic_maid'];
$ic_stock = $row['ic_stock'];
$ic_rate = $row['ic_rate'];
$ic_qty = $row['ic_qty'];
$ic_date = $row['ic_date'];
$ic_amount = $row['ic_amount'];
$ic_price = $row['ic_price'];
$ic_paid = $row['ic_paid'];
$ic_note = $row['ic_note'];
//$ic_iid =$row['ic_iid'];
$ic_id =$row['ic_id'];


if($ic_solddate == "0000-00-00"){$ic_solddate=$ic_date;}
$mstatus="S";
$msubstatus="Inv-No";



$itotalsum = $itotalsum+$ic_amount;


$ichargeEntry[0] = $ic_description;
$ichargeEntry[1] = $ic_solddate;
$ichargeEntry[2] = $ic_mid;
$ichargeEntry[3] = $ic_maid;
$ichargeEntry[4] = $ic_stock;
$ichargeEntry[5] = $ic_qty;
$ichargeEntry[6] = $ic_rate;
$ichargeEntry[7] = $ic_rate * $ic_qty;
$ichargeEntry[8] = $ic_price;
$ichargeEntry[9] = $ic_date;
$ichargeEntry[10] = $ic_paid;
$ichargeEntry[11] = $ic_note;
$ichargeEntry[12] = $ic_iid;
$ichargeEntry[13] = $ic_ratedesc;
$ichargeEntry[14] = $ic_did;
$ichargeEntry[15] = $ic_note;
$ichargeEntry[16] = $ic_id;
$ichargeArr[] = $ichargeEntry;
}
$itotal= $itotalsum;


  //$j++;
} 


//$numitems = $j;
//echo $numitems;
//echo '<br /> sum = '.$itotalsum."<br />";
//$itotal = $itotalsum;
/* ------ */

$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/preview/$idid.pdf";
//echo $ipdfurl;

include "../../process/connecti.php";


$sql="SELECT sum(ic_amount) as ictotal FROM test_i_charges_temp WHERE ic_did = $qmdid";

$result = mysqli_query($con, $sql);
if($result != TRUE) {echo "<br />line 161 result23-   -- Now trying to update instead of insert for test_invoices_temp...the error is ".mysqli_error($con);
}
while ($row = mysqli_fetch_assoc($result))
{ 
  $ictotal = $row['ictotal'];
}

mysqli_close($con);




include "../../process/connecti.php";

foreach ($ichargeArr as $ichargeEntry){



$result31 = mysqli_query($con, "INSERT INTO `test_i_charges_temp`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`, `ic_xtraint`, `ic_price`, `ic_did`) VALUES ($ichargeEntry[16],$ic_iid,$ichargeEntry[2],'$ichargeEntry[9]','$ichargeEntry[7]','$ichargeEntry[0]','$ichargeEntry[1]',$ichargeEntry[5],$ichargeEntry[6],'$ichargeEntry[13]',$ichargeEntry[3],'$ichargeEntry[4]',0,'$ichargeEntry[15]',0,'',$ichargeEntry[14])");

// mysqli_query returns false if something went wrong with the query
if($result31 === FALSE) { echo "did not create 129".mysqli_error($con);
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
 `ic_did`=$ichargeEntry[14] 
 WHERE `ic_did` = $ichargeEntry[14] AND `ic_id` = $ichargeEntry[16]; ");

 }
if($result41 === FALSE) {echo '- did not update 151 <br />'.mysqli_error($con);
    
    }
   
    
  //$itotalsum = $itotalsum+$ichargeEntry[7];
  //$j++;
}  
  //$itotal= $itotal/2;
$result23 = mysqli_query($con, "INSERT INTO `test_invoices_temp` (`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`, `idinvoiceemail`, `iclosed`) VALUES ($iid, '$idate','$ictotal', '$ipdfurl', '$iaid', '$qdid', '$idname', '$idattn', '$idaddress', '$idaddress2', '$idinvoiceemail', 0)");
// mysqli_query returns false if something went wrong with the query
if($result23 != TRUE) {//echo "<br />line 161 result23-   -- Now trying to update instead of insert for test_invoices_temp...the error is ".mysqli_error($con);

$result22 = mysqli_query($con, "UPDATE `test_invoices_temp` SET `iid`= $iid,`idate`='$idate',`itotal`= '$ictotal',`ipdfurl`='$ipdfurl',`iaid`='$iaid',`idname`='$idname',`idattn`='$idattn', `idaddress`='$idaddress', `idcitystatezip`='$idcitystatezip',`idinvoiceemail`='$idinvoiceemail',`iclosed`= 0 WHERE `idid` = $qdid ");
if($result22 != True) { 
//echo '<br /> 23 '.mysqli_error( $con).'ln 165 r23 didnt update after not inserting<br />';
}

/**/

}
}
//echo '<a href = "frankenview.php" ><form action="frankenview.php"><input name = "did" type = "hidden" value = "'.$idid.'"></form>ended the post part</a>';
header("Location: /admin/accnts/invoice/beastpreviewstepthree.php?did=$qmdid");
//header('Location: /page.html');
?>