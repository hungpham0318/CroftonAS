<?php session_start();
$title="Invoicing View";
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
// ----------------------------------------------------------
// 'invoice temp' query  $resultit 
// ----------------------------------------------------------


include "../../process/connecti.php";

$resultit=mysqli_query($con, "SELECT * FROM invoices_temp ");

// mysqli_query returns false if something went wrong with the query
if($resultit === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 15 - This error invoice temp query  resultit </b>");
    //or die(mysql_error($con));
}
else {echo 'line 49 <br>';
// as of php 5.4 foreach
   
foreach( $resultit as $row ) {

$idate=$row['idate'];
$itotal=$row['itotal'];
$ipdfurl=$row['ipdfurl'];
$iaid=$row['iaid'];
$idid=$row['idid'];
$idname=$row['idname'];
$idattn=$row['idattn'];
$idaddress=$row['idaddress'];
$idcitystatezip=$row['idcitystatezip'];
$iclosed =$row['iclosed'];
}}

define('IPDFURL', $ipdfurl);

define('idate',$idate);
define('idid',$idid);
define('idname',$idname);
define('idattn',$idattn);
define('idaddress',$idaddress);
define('idcitystatezip',$idcitystatezip);




// ----------------------------------------------------------
// 'insert invoice' query  $resultin 
// ----------------------------------------------------------
include "../../process/connecti.php";

$resultin = mysqli_query($con, "INSERT INTO `invoices`(`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`,`iclosed`) VALUES (null, '$idate', '$itotal', '$ipdfurl', $iaid, $idid, '$idname', '$idattn', '$idaddress', '$idaddress2', 0)");

// mysqli_query returns false if something went wrong with the query
if($result2 === FALSE) { echo 'died at line 240 insert invoices query result2 which means there is no iid defined henceforth';
    die(mysqli_error($con));
    
}
else {$last_id = mysqli_insert_id($con);
$iid = $last_id;}
define('IID',$iid);
echo"<br><br>constant IID is set to: ";
echo IID;
echo 'iid = '.$iid;
echo '<br>line75<br>'.$iid;
$ic_iid = $iid;
$di_iid = $iid;
$mi_iid = $iid;
$number =$iid;
$minvid = $iid;
$iidname= $iid;


echo '<br>line88<br>ic_iid = '.$ic_iid;


// ----------------------------------------------------------//
// 'query icharges_temp' query  $resultic 
// ----------------------------------------------------------//

$ichargeArr = array();
$ichargeEntry = array();

$itotalsum =0;

$resultic=mysqli_query($con, "SELECT * FROM i_charges_temp ");

// mysqli_query returns false if something went wrong with the query
if($resultic === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 105 - This error invoice temp query  resultic </b>");
    //or die(mysql_error($con));
}

else {echo 'line 107<br>';
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
$ic_amount = $ic_rate * $ic_qty;
$ic_price = $row['ic_price'];
$ic_paid = 0;
$ic_note = $row['ic_note'];
$ic_iid =$row['ic_iid'];
if($ic_rate == 125){$repfee = "REP FEE VALUE";}
else{if($ic_rate == 100){$repfee = "REP FEE VOLUME";}
else{$repfee="REP FEE";}}
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
$ichargeEntry[13] = $repfee;
$ichargeEntry[14] = $msubstatus;
$ichargeEntry[15] = $mstatus;
$ichargeArr[] = $ichargeEntry;
}
$itotal= $itotalsum;


//--------------------for pdf-- and table updates---------------//

$number = $iid;


$pay = 'Make Checks Payable to Crofton Auction Services.';
$pay1 = 'Please Include the Invoice Number on your check.';


// ----------------------------------------------------------//
// insert icharges query  $resulticin 
// ----------------------------------------------------------//
	
	
	include "../../process/connecti.php";


foreach($ichargeArr as $ichargeEntry){
$resulticin = mysqli_query($con, "INSERT INTO `i_charges`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES (null, '$ichargeEntry[12]', '$ichargeEntry[2]', '$ichargeEntry[9]', '$ichargeEntry[7]', '$ichargeEntry[0]', '$ichargeEntry[1]', '$ichargeEntry[5]', '$ichargeEntry[6]', '$ichargeEntry[3]', '$ichargeEntry[4]', '$ichargeEntry[10]', '$ichargeEntry[11]')");

}

// mysqli_query returns false if something went wrong with the query
if($resulticin === FALSE) { echo 'insert icharges query went awry!  resulticin';
    die(mysqli_error($con));
    
}

include "../../process/connecti.php";
foreach($ichargeArr as $ichargeEntry){

$updatemi = mysqli_query($con,"UPDATE `master` SET `minvid`=$ichargeEntry[12], `mstatus`='S',`msubstatus`='Inv-Sent',`msolddate`= '$ichargeEntry[1]',`msoldprice`= $ichargeEntry[8] WHERE mid = $ichargeEntry[2]");
if($updatemi === FALSE) { echo 'insert updatemi query went awry!  ';
    die(mysqli_error($con));
 }   
}

echo "line 212";
include "../../process/connecti.php";
	
	$deleterecords = "TRUNCATE TABLE i_charges_temp"; //empty the table of its current records
mysqli_query( $con, $deleterecords );

include "../../process/connecti.php";
	
	$deleterecords = "TRUNCATE TABLE invoice_temp"; //empty the table of its current records
mysqli_query( $con, $deleterecords );


$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";

echo "line 223";
$number = $itotal;
setlocale(LC_MONETARY,"en_US");
$fitotal=money_format("%n",$number);



require('u/fpdf.php');
class PDF extends FPDF
{
function Header()
{
if(empty($_FILES["file"]))
  {
$logodir = "logo/";
$nm = "caslogo.png";

$this->Image($logodir.$nm,10,10,20);

$this->SetFont('Times','B',18);
$this->SetTextColor(32);
$this->SetLineWidth(.1);
$this->SetDrawColor(100);
$this->Cell(0,4,'',0,1,'L');
$this->Cell(20,8,'',0,0,'L');
$this->Cell(0,8,"Crofton Auction Services",B,1,'L');
$this->Cell(20,8,'',0,0,'L');
$this->SetFont('Arial','',13);
$this->SetTextColor(32);
$this->Cell(20,8,"5 Park Place, Suite 519",0,0,'L');
$this->Cell(0,8,"Phone: 301-706-7951",0,1,'R');
$this->Cell(20,5,'',0,0,'L');
$this->Cell(20,5,"Annapolis, MD 21401",0,0,'L');
$this->Cell(0,5,"Email: crofton@comcast.net",0,1,'R');
$this->Cell(0,2,'',0,1,'R');
$this->SetFont('Arial','',13);
$this->SetTextColor(32);

$this->Cell(180,5,'Date: '.date('m-d-Y'),0,1,'R');
$this->Cell(180,8,'Invoice #: '.IID,0,1,'C');

$this->Cell(10,8,'',0,1,'L');
$this->SetFillColor(200,220,255);

if($this->PageNo()<=1){

$this->SetFont('Arial','',13);
$this->Cell(80,6,'TO:',0,1,'L');
$this->Cell(60,6,idname,0,1,'L');
if (!empty($dattn)) {
$this->Cell(60,6,"ATTN: ".strtoUpper(idattn),0,1,'L');}

$this->Cell(60,6,strtoUpper(idaddress),0,1,'L');
$this->Cell(60,6,idcitystatezip,0,1,'L');
$this->Cell(10,8,'',0,1,'L');
$this->Cell(10,8,'',0,1,'L');
$this->SetFillColor(200,220,255);
}

$this->SetFont('Arial','I',11);
$this->Cell(8,7,'',T,0,'L');

$this->Cell(144,7,' Description',T,0,'L');
$this->Cell(8,7,'Qty',T,0,'C');

$this->Cell(10,7,'Rate',T,0,'C');
$this->Cell(20,7,'Amount',T,1,'R');

//  End header
$this->SetFont('Arial','I',11);
$this->SetFillColor(224,235,255);
$this->SetDrawColor(192,192,192);

}
$this->SetFont('Arial','B',12);
$this->Ln(1);
}
function Footer()
{
$this->SetY(-18);
$this->SetFont('Arial','I',8);
$this->Cell(0,6,'Make check payable to Crofton Auction Services, include the invoice number on your check, and Mail to address shown.',0,2,'C');


$this->Cell(0,6,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
function ChapterTitle($num, $label)
{$this->SetDrawColor(20);
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'R',false);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{$this->SetDrawColor(20);
$this->SetFont('Arial','',12);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'R',false);
$this->Ln(0);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(32);


$c=0;
//$pdf->Cell(185,7,' 1234-1234568911234567892123456789312345678941234567895123456789612345',BT,1,'L');

foreach ($ichargeArr as $ichargeEntry){
$c++;
$pdf->SetDrawColor(20);
$pdf->SetFont('Arial','I',9.5);
$pdf->Cell(7,7,$c.'.',BTR,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(144,7," ".strtoUpper($ichargeEntry[0])." - ".strtoUpper($ichargeEntry[13]),BTR,0,'L',0);
//$pdf->Cell(103,7," ".strtoUpper($ichargeEntry[0]),BTR,0,'L',0);
$pdf->SetFont('Arial','I',11);
//$pdf->Cell(35,7," ".strtoUpper($ichargeEntry[13]),BT,0,'L',0);

//$pdf->SetFont('Arial','',11);
//$pdf->Cell(15,7,$c,T,0,'C',0);
$pdf->Cell(8,7,$ichargeEntry[5],BTR,0,'C',0);
$pdf->Cell(10,7,number_format($ichargeEntry[6],0),BTR,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(20,7,"".$ichargeEntry[7],BT,1,'R',0);
}


$pdf->SetFont('Arial','B',12);

$pdf->Cell(190,10,'Invoice Total:  '.$fitotal,B,1,'R',0);
$pdf->SetDrawColor(20);
$pdf->Cell(75,5,'',0,0,'L');
$pdf->SetFont('Arial','',12);


$filename= 'bunker/'.$idid.'.'.$iid.'.pdf';
$pdf->Output($filename,'F');
$filename2="invoice.pdf";
$pdf->Output($filename2,'F');
}}

echo'<br><br><a href="'.$ipdfurl.'" target="_blank">'.$ipdfurl.'</a><br>';
echo'<br><br><a href="/admin/accnts/invoice/invoice.pdf" target="_blank">invoice</a><br>';
echo'<br><br><a href="http://croftonas.com/admin/invoice/viewinvoices.php">back to invoicing</a><br>';

echo $ipdfurl;
?>

