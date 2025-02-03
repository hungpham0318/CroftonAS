<?php session_start();
$title="Invoice Preview";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');
}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		
}
/*
get the did

x query invoices for next number

x assign the ic_iid for the i_charges
x sum the icharges for the new invoice
x query the temp invoices using the did 


x query the temp records from i_charges_temp tables

x insert the i_charges of the temp records into the permanent tables
x update the master with the invoice number and substatus to inv-yes

x insert the new invoice into invoices


rename (to move) the pdf to its permanent name.
rename("/preview/'.$idid.'.pdf","/bunker/'.$idid.'.'.$iid.'.pdf");

remove the temp i_charges records for this dealership

remove the temp invoices records for this dealership

return the user to an invoice view with a send message button*/
//$qdid = 1015;

$qdid = $_GET['did'];

//if(isset($_POST['submit'])) {
//  post all the invoice fields to invoice variables
include "../../process/connecti.php";
$qmdid= mysqli_real_escape_string($con, $qdid);


include "../../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'invoices'
SQL;
if(!$result = $con->query($sql)){
    die(' Could not obtain the next invoice id.  There was an error running the query'.__LINE__. '[' . $con->error . ']');
}
$row = $result->fetch_assoc();

$iid = $row['Auto_increment'];
$ic_iid = $iid;
echo $iid;
echo "<br />";
echo $ic_iid;
echo "<br />";

$_SESSION['emailiid'] = $iid;
include "../../process/connecti.php";


$sql2="SELECT sum(ic_amount) as ictotal FROM i_charges_temp WHERE ic_did = $qdid";

$result2 = mysqli_query($con, $sql2);
if($result2 === false) {echo "<br /> result2 - summing i_charges...the error is ".__LINE__.' '.mysqli_error($con);
}
while ($row = mysqli_fetch_assoc($result2))
{ 
  $ictotal = $row['ictotal'];
}

mysqli_close($con);

include "../../process/connecti.php";


// ----------------------------------------------------------//
// 'query icharges_temp' query  $resultic 
// ----------------------------------------------------------//

$ichargeArr = array();
$ichargeEntry = array();



$resultic=mysqli_query($con, "SELECT * FROM i_charges_temp WHERE ic_did = $qdid");

// mysqli_query returns false if something went wrong with the query
if($resultic === FALSE) { 
     die(mysqli_error($con).__LINE__."<b><br>
     <br>query begins line 105 - This error invoice temp query  resultic </b>");
    //or die(mysql_error($con));
}

else {//echo 'line 107<br>';

// as of php 5.4  foreach
   
foreach( $resultic as $row ) {

//set icharges in the icharges item array and variables for each row in ichargestemp change to read directly into vars
//`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`

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
$ic_paid = 0;
$ic_note = $row['ic_note'];
$ic_iid =$iid;
$ic_ratedesc =$row['ic_ratedesc'];
$ic_did = $qdid;
if($ic_solddate == "0000-00-00"){$ic_solddate=$ic_date;}
$mstatus="S";
$msubstatus="Inv-Sent";



$itotalsum = $itotalsum+$ic_amount;


$ichargeEntry[0] = $ic_description;
$ichargeEntry[1] = $ic_solddate;
$ichargeEntry[2] = $ic_mid;
$ichargeEntry[3] = $ic_maid;
$ichargeEntry[4] = $ic_stock;
$ichargeEntry[5] = $ic_qty;
$ichargeEntry[6] = $ic_rate;
$ichargeEntry[7] = number_format($ic_amount, 2);
$ichargeEntry[8] = $ic_price;
$ichargeEntry[9] = $ic_date;
$ichargeEntry[10] = $ic_paid;
$ichargeEntry[11] = $ic_note;
$ichargeEntry[12] = $ic_iid;
$ichargeEntry[13] = $ic_ratedesc;
$ichargeEntry[14] = $msubstatus;
$ichargeEntry[15] = $mstatus;
$ichargeArr[] = $ichargeEntry;
}}

// ----------------------------------------------------------//
// insert icharges query  $resulticin 
// ----------------------------------------------------------//
	
	
	include "../../process/connecti.php";


foreach($ichargeArr as $ichargeEntry){
$resulticin = mysqli_query($con, "INSERT INTO `i_charges`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`,`ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES (null, '$ichargeEntry[12]', '$ichargeEntry[2]', '$ichargeEntry[9]', '$ichargeEntry[7]', '$ichargeEntry[0]', '$ichargeEntry[1]', '$ichargeEntry[5]', '$ichargeEntry[6]', '$ichargeEntry[13]', '$ichargeEntry[3]', '$ichargeEntry[4]', '$ichargeEntry[10]', '$ichargeEntry[11]')");

}

// mysqli_query returns false if something went wrong with the query
if($resulticin === FALSE) { echo 'insert icharges query went awry!  resulticin'.mysqli_error($con);
   
    
}

include "../../process/connecti.php";
foreach($ichargeArr as $ichargeEntry){

$updatemi = mysqli_query($con,"UPDATE `master` SET `minvid`=$ichargeEntry[12], `mstatus`='S',`msubstatus`='Inv-Sent',`msolddate`= '$ichargeEntry[1]' WHERE mid = $ichargeEntry[2]");
if($updatemi === FALSE) { echo 'insert updatemi query went awry!  ';
    die(mysqli_error($con));
 }   
}






















include "../../process/connecti.php";
$sql3="SELECT * FROM invoices_temp WHERE idid = $qmdid";
$result3 = mysqli_query($con, $sql3);
if($result3 === false) {echo "<br /> result3-   -- summing i_charges...the error is line -".__LINE__.' '.mysqli_error($con);
}
while ($row = mysqli_fetch_assoc($result3))
{
$idate = $row['idate'];	
$itotal = $row['itotal'];
$iaid = $row['iaid'];
$idid = $row['idid'];
$idname = $row['idname'];
$idattn = $row['idattn'];
$idaddress = $row['idaddress'];
$idaddress2 = $row['idaddress2'];
$idinvoiceemail = $row['idinvoiceemail'];
$iclosed = $row['iclosed'];

}
mysqli_close($con);

$pdfurl = "bunker/".$idid.".".$iid.".pdf";
$ipdfurl = "https://www.croftonas.com/admin/accnts/invoice/$pdfurl";
echo $ipdfurl."<br />";
include "../../process/connecti.php";

$sql4 = "INSERT INTO `invoices` (`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`, `idinvoiceemail`, `iclosed`) VALUES (null, '$idate','$ictotal', '$ipdfurl', $iaid, $idid, '$idname', '$idattn', '$idaddress', '$idaddress2', '$idinvoiceemail', $iclosed)";
$result4 = mysqli_query($con,$sql4);
// mysqli_query returns false if something went wrong with the query
if($result4 === false) {
echo "<br />Result4 error insert into invoices -line - ".__LINE__.' - '.mysqli_error($con);
}
mysqli_close($con);


$preview ="preview/".$idid.".pdf";

echo "<br />".$preview."<br />";
rename($preview , $pdfurl);


//remove temp records from temp i_charges
include "../../process/connecti.php";

$sql5 = "DELETE FROM `i_charges_temp` WHERE ic_did = $qmdid";
$result5 = mysqli_query($con,$sql5);
// mysqli_query returns false if something went wrong with the query
if($result5 === false) {
echo "<br />Result5 error insert into invoices -line - ".__LINE__.' - '.mysqli_error($con);
}
mysqli_close($con);

//remove temp records from temp invoices
include "../../process/connecti.php";

$sql6 = "DELETE FROM `invoices_temp` WHERE idid = $qmdid";
$result6 = mysqli_query($con,$sql6);
// mysqli_query returns false if something went wrong with the query
if($result6 === false) {
echo "<br />Result6 error insert into invoices -line - ".__LINE__.' - '.mysqli_error($con);
}
mysqli_close($con);


echo "the end";
//echo '<a href = "frankenview.php" ><form action="frankenview.php"><input name = "did" type = "hidden" value = "'.$idid.'"></form>ended the post part</a>';
//header("Location: /admin/accnts/invoice/finalinvoiceemail.php?iid=$iid");
//header('Location: /page.html');
$URL="/admin/accnts/invoice/finalinvoiceemail.php";
//$URL="/admin/accnts/invoice/beastpreviewstepthree.php?did=$qdid";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

?>