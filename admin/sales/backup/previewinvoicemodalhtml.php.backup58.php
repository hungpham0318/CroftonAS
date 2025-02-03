<?php
$title="PreviewInvoice";
echo"<html>";
include "stylehead.html";
include "../process/connecti.php";
$qiid =$_GET['iid'];
$result2 = mysqli_query($con, "SELECT * from `invoices_temp`");

// mysqli_query returns false if something went wrong with the query
if($result2 === FALSE) { echo 'died at line 382 insert invoices query result2 which means there is no iid defined henceforth';
    die(mysqli_error($con));
    
}
else {//$last_id = mysqli_insert_id($con);
//$iid = $last_id;
}
foreach ($result2 as $row){


$idid = $row['did'];
$idate = $row['idate'];
$iaid = $row['iaid'];
$idname = $row['idname'];
$idnumber = $row['idnumber'];
$idattn = $row['idattn'];
$idaddress = $row['idaddress'];
$idaddress2 = $row['idaddress2'];
$idinvoiceemail = $row['idinvoiceemail'];
}

	
	




$ichargeArr = array();
$ichargeEntry = array();



include "../process/connecti.php";

$result4 = mysqli_query($con, "SELECT * FROM `i_charges_temp` WHERE 1");

// mysqli_query returns false if something went wrong with the query
if($result4 === FALSE) { echo 'No vehicles for this dealership are available for invoicing.  This page only returns vehicles whose Status is set to S(old) or A(ctive) with the Substatus set to recon-green';
    die(mysqli_error($con));}



foreach( $result4 as $row ) {
$ichargeEntry[0] = $row['ic_description'];
$ichargeEntry[1] = $row['ic_solddate'];
$ichargeEntry[2] = $row['ic_mid'];
$ichargeEntry[3] = $row['ic_maid'];
$ichargeEntry[4] = $row['ic_stock'];
$ichargeEntry[5] = $row['ic_qty'];
$ichargeEntry[6] = $row['ic_rate'];
$ichargeEntry[7] = $row['ic_amount'];
$ichargeEntry[8] = $row['ic_price'];
$ichargeEntry[9] = $row['ic_date'];
$ichargeEntry[10] = $row['ic_ratedesc'];
$ichargeArr[] = $ichargeEntry;
}

echo '<button onclick="myFunction()">Refresh Preview after edit</button>';
echo " <table><thead><th></th><th></th><th></th></thead><tbody>";

echo "<td></td><td></td>";

//dealer invoice variables
echo '<td style="text-align:right;float:right;"> Date: '.$idate."</td>";
echo "</tr><tr>";
echo "<td></td>";
echo "<td>Invoice No:".$idid."</td>";
echo "</tr><tr>";
echo "<td>To: </br>";
echo  $idname."</br>";
//echo "<td>idnumber: ".$idnumber."</td>";
echo "ATTN: ".$idattn."</br>";
echo $idaddress."</br>";
echo $idaddress2."</td><td></td><td></td>";
echo "<td>Emailto: ".$idinvoiceemail."</br></td>";
echo "</tr></tbody></table>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo"<table><thead><th>Item</th><th>Description</th><th>qty</th><th>Rate</th><th>Rate Desc</th><th>Amount</th></thead><tbody>";

$x=0;

foreach ($ichargeArr as $ichargeEntry){
$x = $x+1;
echo "<tr><td>".$x."</td><td>".$ichargeEntry[0]."</td><td>".$ichargeEntry[5]."</td><td>".$ichargeEntry[6]."</td><td>".$ichargeEntry[10]."</td><td>".$ichargeEntry[7]."</td></tr>";
}
echo "<tr><td>--</td><td>--</td><td>--</td><td>-</td><td>".$itotal."</td></tr>";
echo"</tbody></table></div>";


echo '<script>
function myFunction() {
    location.reload();
}
</script>';
	include "jsscripts.html";
	echo "</body></html>";
?>