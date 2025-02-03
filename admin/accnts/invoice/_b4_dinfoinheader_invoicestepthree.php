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


// $resultit=mysqli_query($con, "SELECT * FROM invoices_temp WHERE iid = $qiid");

include "../../process/connecti.php";



$resultit=mysqli_query($con, "SELECT * FROM invoices_temp ");

// mysqli_query returns false if something went wrong with the query
if($resultit === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 15 - This error invoice temp query  resultit </b>");
    //or die(mysql_error($con));
}
else {echo 'line 49 <br>';
// as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
   
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
// ----------------------------------------------------------
// 'insert invoice' query  $resultin 
// ----------------------------------------------------------
include "../../process/connecti.php";
//$qmid = mysqli_real_escape_string($con, $_GET['mid']);
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
//$ipdfurl = "http://www.manheimas.com/admin/accnts/invoice/".$iid.".pdf";

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
// as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
   
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
$ic_price = $row['ic_amount'];
$ic_paid = 0;
$ic_note = $row['ic_note'];
$ic_iid =$row['ic_iid'];
if($ic_rate == 125){$repfee = "REP FEE VALUE";}
else{if($ic_rate == 100){$repfee = "REP FEE VOLUME";}
else{$repfee="REP FEE";}}
if($ic_solddate = "0000-00-00"){$ic_solddate=$idate;}
$mstatus="S";
$msubstatus="inv-sent";



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
$ichargeEntry[15] = "$mstatus";
$ichargeArr[] = $ichargeEntry;
}
$itotal= $itotalsum;




/**/


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

/*UPDATE `master` SET `mid`=[value-1],`mvid`=[value-2],`maid`=[value-3],`mrid`=[value-4],`muid`=[value-5],`mdid`=[value-6],`mvin`=[value-7],`myear`=[value-8],`mmake`=[value-9],`mmodel`=[value-10],`mcolor`=[value-11],`mmileage`=[value-12],`mannounce`=[value-13],`mstock`=[value-14],`mdetail`=[value-15],`mtransport`=[value-16],`mfloor`=[value-17],`mrtime`=[value-18],`mreqsaledate2`=[value-19],`mreqsaledate`=[value-20],`mstatus`=[value-21],`msubstatus`=[value-22],`msolddate`=[value-23],`mnotes`=[value-24],`msoldprice`=[value-25],`mcarfax`=[value-26],`mdamage`=[value-27],`mmiscinfo`=[value-28],`mlane`=[value-29],`mrun`=[value-30],`mrundate`=[value-31],`mrunoutcome`=[value-32],`minvid`=[value-33],`marchive`=[value-34],`mreconview`=[value-35] WHERE 1
$updatemi = mysqli_query($con,"UPDATE `master` SET `minvid`=$ichargeEntry[12], `mstatus`=[value-21],`msubstatus`=[value-22],`msolddate`=[value-23],`mnotes`=[value-24],`msoldprice`=[value-25] WHERE mid = $ichargeEntry[2]");
$also update itotal in invoices with $itotal now, but outside the foreach ichargeArr.
*/

$updatemi = mysqli_query($con,"UPDATE `master` SET `minvid`=$ichargeEntry[12] WHERE mid = $ichargeEntry[2]");
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
//unlink($uploaddir.$random.$nm);

//$this->Cell(0, 8, "HEADER TEXT", 0, 0, 'R');
$this->SetFont('Times','B',18);
$this->SetTextColor(32);
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



//$this->SetFont('Arial','',13);
//$this->Cell(80,6,'To:',0,0,'L');
$this->Cell(180,5,'Date: '.date('m-d-Y'),0,1,'R');
$this->Cell(200,8,'Invoice #: '.IID,0,1,'C');


//$this->Cell(10,8,' '.IID,0,1,'L');
//$this->Cell(60,6,$idname,0,1,'L');
//if (!empty($idattn)) {
//$this->Cell(60,6,"ATTN: ".strtoUpper($idattn),0,1,'L');}

//$this->Cell(60,6,strtoUpper($idaddress),0,1,'L');
//$this->Cell(60,6,$idcitystatezip,0,1,'L');



$this->Cell(10,8,'',0,1,'L');
$this->SetFillColor(200,220,255);









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
{
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'R',false);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
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
/*$pdf->Cell(0,4,'',0,1,'L');
$pdf->Cell(30,8,'',0,0,'L');
$pdf->Cell(0,8,"Crofton Auction Services",B,1,'L');
$pdf->Cell(30,8,'',0,0,'L');
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(32);
$pdf->Cell(60,8,"5 Park Place, Suite 519",0,0,'L');
$pdf->Cell(0,8,"Phone: ".$telephone,0,1,'R');
$pdf->Cell(30,5,'',0,0,'L');
$pdf->Cell(60,5,"Annapolis, MD 21401",0,0,'L');
$pdf->Cell(0,5,"Email: crofton@comcast.net",0,1,'R');*/
//$pdf->Cell(0,5,'',0,1,'R');
//$pdf->SetFont('Arial','',14);
//$pdf->SetTextColor(32);
//$pdf->Cell(90,8,'Invoice #:',0,0,'R');
//$pdf->Cell(20,8,' '.$iid,0,1,'L');


$pdf->SetFont('Arial','',13);
$pdf->Cell(80,6,'TO:',0,1,'L');
//$pdf->Cell(0,6,'Date: '.date('m-d-Y'),0,1,'R');
$pdf->Cell(60,6,$idname,0,1,'L');
if (!empty($idattn)) {
$pdf->Cell(60,6,"ATTN: ".strtoUpper($idattn),0,1,'L');}

$pdf->Cell(60,6,strtoUpper($idaddress),0,1,'L');
$pdf->Cell(60,6,$idcitystatezip,0,1,'L');



$pdf->Cell(10,8,'',0,1,'L');
$pdf->SetFillColor(200,220,255);
//$pdf->ChapterTitle('Invoice #: ',$number);
//$pdf->ChapterTitle('Due Date: ',date('m-d-Y'));
$pdf->Cell(0,8,'',0,1,'R');


$pdf->SetFont('Arial','I',11);
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);




$pdf->Cell(8,7,'',BT,0,'L');

$pdf->Cell(144,7,' Description',BT,0,'L');

//$pdf->Cell(35,7,'Description',BT,0,'L');
$pdf->Cell(8,7,'Qty',BT,0,'C');

$pdf->Cell(10,7,'Rate',BT,0,'C');
$pdf->Cell(15,7,'Amount',BT,1,'C');
$c=0;
//$pdf->Cell(185,7,' 1234-1234568911234567892123456789312345678941234567895123456789612345',BT,1,'L');

foreach ($ichargeArr as $ichargeEntry){
$c++;
$pdf->SetFont('Arial','I',11);
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
$pdf->Cell(15,7,"".$ichargeEntry[7],BT,1,'C',0);
}



$pdf->SetFont('Arial','B',12);
//$pdf->Cell(0,0,'',0,1,'R');
//$pdf->Cell(170,7,'',1,0,'R',0);
//$pdf->Cell(20,7,'',1,1,'C',0);
$pdf->Cell(185,10,'Invoice Total:  '.$fitotal,B,0,'R',0);
//$pdf->Cell(20,7,"".$fitotal,1,0,'C',0);
//$pdf->Cell(0,8,'',0,1,'R');
//$pdf->SetFont('Arial','BI',12);
//$pdf->Cell(0,5,$ic_notes,0,1,'C');
//$pdf->Cell(0,8,'',0,1,'R');
//$pdf->SetFont('Arial','I',12);
//$pdf->Cell(0,8,$pay,0,1,'C');
//$pdf->Cell(0,8,$pay1,0,1,'C');
$pdf->Cell(75,5,'',0,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(75,5,'Make check payable to Crofton Auction Services, include the invoice number on your check, and Mail to address shown.:',0,2,'L');
//$pdf->Cell(75,1,'',0,0,'L');
//$pdf->Cell(75,5,$company,0,2,'L');
//$pdf->Cell(75,5,$address,0,2,'L');
//$pdf->Cell(75,5,$address2,0,1,'L');

$filename= 'bunker/'.$idid.'.'.$iid.'.pdf';
$pdf->Output($filename,'F');
$filename2="invoice.pdf";
$pdf->Output($filename2,'F');
}}

echo'<br><br><a href="'.$ipdfurl.'" target="_blank">'.$ipdfurl.'</a><br>';
echo'<br><br><a href="/admin/accnts/invoice/invoice.pdf" target="_blank">invoice</a><br>';
echo'<br><br><a href="http://manheimas.com/admin/invoice/viewinvoices.php">back to invoicing</a><br>';

echo $ipdfurl;
?>