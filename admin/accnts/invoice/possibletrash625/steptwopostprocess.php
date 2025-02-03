<?php session_start();
$title="Post invoice";

// invoice process post file for new invoices

//1 $_POST all the invoice fields to invoice variables

//make a loop to post icharges

//$_POST all the i_charges to ic_variables


//include the step three 




if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		

$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";

define('COMPANY', 'Crofton Auction Services');
define('ADDRESS','5 Park Place, Suite 519');
define('ADDRESS2','Annapolis, MD 21401');
$address3 = $address." ".$address2;
define('EMAIL','crofton@comcast.net');
define('TELEPHONE','301-706-7951');




//1 $_POST all the invoice fields to invoice variables

$iid=mysqli_real_escape_string($con, $_POST['iid']);
$idate = mysqli_real_escape_string($con, $_POST['idate']);
//$itotal = mysqli_real_escape_string($con, $_POST['itotal']);
$ipdfurl = mysqli_real_escape_string($con, $_POST['ipdfurl']);
$iaid = mysqli_real_escape_string($con, $_POST['iaid']);
$idid = mysqli_real_escape_string($con, $_POST['idid']);
$idname = mysqli_real_escape_string($con, $_POST['idname']);
$idattn = mysqli_real_escape_string($con, $_POST['idattn']);
$idaddress = mysqli_real_escape_string($con, $_POST['idaddress']);
$idcitystatezip = mysqli_real_escape_string($con, $_POST['idcitystatezip']);
$idinvoiceemail = mysqli_real_escape_string($con, $_POST['idinvoiceemail']);
$iclosed  = mysqli_real_escape_string($con, $_POST['iclosed']);
}


define('IPDFURL', $ipdfurl);

define('idate',$idate);
define('idid',$idid);
define('idname',$idname);
define('idattn',$idattn);
define('idaddress',$idaddress);
define('idcitystatezip',$idcitystatezip);
define('idinvoiceemail',$idinvoiceemail);

include "../../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'INVOICES'
SQL;

if(!$result = $con->query($sql)){
    die('There was an error running the query line 353 [' . $con->error . ']');
}

$row = $result->fetch_assoc();
echo "AUTO INCREMENT ";
echo $row['Auto_increment'];

$iid = $row['Auto_increment'] - 1;
echo "at line 93(postfromsteptwo) the iid= ".$iid;
define('IID',$iid);
echo"<br><br>constant IID is set to: ";
echo IID;
echo 'iid = '.$iid;
echo '<br>line75<br>'.$iid;
$ic_iid = $iid;
$number =$iid;
$minvid = $iid;
//-----------------------------------------------------------



$ichargeArr = array();
$ichargeEntry = array();
/*/-----------------------------------
do while
$i = 0;
do {
    echo $i;
} while ($i > 0);
-----------------------------------------/*/
	//Post the inputs from steptwo
$j=1;
	 //if(!empty( $_POST['ic_id'.$j])){
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
$ichargeEntry[8] = mysqli_real_escape_string($con, $_POST['ic_price'.$j]);
$ichargeEntry[9] = mysqli_real_escape_string($con, $_POST['ic_date'.$j]));
$ichargeEntry[10] = mysqli_real_escape_string($con, $_POST['ic_paid'.$j]);
$ichargeEntry[11] = mysqli_real_escape_string($con, $_POST['ic_note'.$j]));
$ichargeEntry[12] = $iid;
$ichargeEntry[13] = mysqli_real_escape_string($con,strtoupper( $_POST['ic_ratedesc'.$j]));
$ichargeEntry[14] = mysqli_real_escape_string($con, $_POST['msubstatus'.$j]);
$ichargeEntry[15] = mysqli_real_escape_string($con,strtoupper( $_POST['mstatus'.$j]));
  $ichargeArr[] = $ichargeEntry;
  $itotalsum = $itotalsum+$ichargeEntry[7];
  $j++;
} while (!empty( $_POST['ic_id'.$j]);

echo $itotalsum;
$itotal= $itotalsum;

/*------------------------------------------------
	//foreach($vehTbl as $vehEntry){  
//$ichargeArr[] = $ichargeEntry;
	//echo '<pre>'; print_r($vehTbl); echo '</pre>';
//if(!empty($vehTbl)){echo '<pre>'; print_r($vehTbl); echo '</pre>';}
---------------------------------------------*/

echo COMPANY; //$company = "Crofton Auction Services";
echo ADDRESS; //$address = "5 Park Place, Suite 519";
echo ADDRESS2; // = "Annapolis, MD 21401";
echo ADDRESS3;  // = $address." ".$address2;
echo EMAIL // = "crofton@comcast.net";
echo TELEPHONE; // = "301-706-7951";


foreach($ichargeArr as $ichargeEntry){echo '<pre>'; print_r($ichargeEntry); echo '</pre>';}

?>

