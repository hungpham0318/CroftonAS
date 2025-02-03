<?php
$qdid = $_GET['did'];

if(isset($_POST['submit'])) {
//  post all the invoice fields to invoice variables
include "../../process/connecti.php";
$qmdid= mysqli_real_escape_string($con, $qdid);
$idate = mysqli_real_escape_string($con, $_POST['idate']);
$itotal = mysqli_real_escape_string($con, $_POST['itotal']);
$ipdfurl = mysqli_real_escape_string($con, $_POST['ipdfurl']);
$iaid = mysqli_real_escape_string($con, $_POST['iaid']);
$idid = $qmdid;
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





include "../../process/connecti.php";


$sql="SELECT sum(ic_amount) as ictotal FROM i_charges_temp WHERE ic_did = $qmdid";

$result = mysqli_query($con, $sql);
if($result != TRUE) {echo "<br />line 161 result23-   -- Now trying to update instead of insert for invoices_temp...the error is ".mysqli_error($con);
}
while ($row = mysqli_fetch_assoc($result))
{ 
  $ictotal = $row['ictotal'];
}

mysqli_close($con);




include "../../process/connecti.php";


$result23 = mysqli_query($con, "INSERT INTO `invoices_temp` (`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`, `idinvoiceemail`, `iclosed`) VALUES ($iid, '$idate','$ictotal', '$ipdfurl', '$iaid', '$qmdid', '$idname', '$idattn', '$idaddress', '$idaddress2', '$idinvoiceemail', 0)");
// mysqli_query returns false if something went wrong with the query
if($result23 === false) {
echo "<br />line 161 result23-   -- Now trying to update instead of insert for invoices_temp...the error is ".mysqli_error($con);

$result22 = mysqli_query($con, "UPDATE `invoices_temp` SET `iid`= $iid,`idate`='$idate',`itotal`= '$ictotal',`ipdfurl`='$ipdfurl',`iaid`='$iaid',`idname`='$idname',`idattn`='$idattn', `idaddress`='$idaddress', `idcitystatezip`='$idcitystatezip',`idinvoiceemail`='$idinvoiceemail',`iclosed`= 0 WHERE `idid` = $qmdid ");
if($result22 === false) { 
echo '<br /> 23 '.mysqli_error( $con).'ln 165 r23 didnt update after not inserting<br />';
}}
}
/**/

//echo '<a href = "frankenview.php" ><form action="frankenview.php"><input name = "did" type = "hidden" value = "'.$idid.'"></form>ended the post part</a>';
//header("Location: /admin/accnts/invoice/beastpreviewstepthree.php?did=$qmdid");
//header('Location: /page.html');
$URL="/admin/accnts/invoice/finalpreviewstepthree.php?did=$qdid";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
?>
