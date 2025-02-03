<?php session_start();
$title="Invoicing View";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}
		
		


$qiid=$_GET['tempiid'];

$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";












// ----------------------------------------------------------
// 'invoice temp' query  $resultit 
// ----------------------------------------------------------


// $resultit=mysqli_query($con, "SELECT * FROM invoices_temp WHERE iid = $qiid");

include "../../process/connecti.php";



$resultit=mysqli_query($con, "SELECT * FROM invoices_temp WHERE iid = $qiid");

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
echo 'iid = '.$iid;

$ic_iid = $iid;
$di_iid = $iid;
$mi_iid = $iid;

$minvid = $iid;
$iidname= $iid;
$ipdfurl = "http://www.manheimas.com/admin/accnts/invoicepdf/".$iid.".pdf";






// ----------------------------------------------------------//
// 'query icharges_temp' query  $resultic 
// ----------------------------------------------------------//

$ichargeArr = array();
$ichargeEntry = array();

$itotalsum =0;

$resultic=mysqli_query($con, "SELECT * FROM i_charges_temp WHERE ic_iid = $qiid");

// mysqli_query returns false if something went wrong with the query
if($resultic === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 15 - This error invoice temp query  resultit </b>");
    //or die(mysql_error($con));
	
}
else {echo 'line 24<br>';
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
$ic_amount = $row['ic_amount'];
$ic_price = $row['ic_amount'];
$ic_paid = 0;
$ic_note = $row['ic_note'];
$ic_iid = $iid;


$itotalsum = $itotalsum+$ic_amount;


$ichargeEntry[0] = $ic_description;
$ichargeEntry[1] = $ic_solddate;
$ichargeEntry[2] = $ic_mid;
$ichargeEntry[3] = $ic_maid;
$ichargeEntry[4] = $ic_stock;
$ichargeEntry[5] = $ic_qty;
$ichargeEntry[6] = $ic_rate;
$ichargeEntry[7] = $ic_amount;
$ichargeEntry[8] = $ic_price;
$ichargeEntry[9] = $ic_date;
$ichargeEntry[10] = $ic_paid;
$ichargeEntry[11] = $ic_note;
$ichargeEntry[12] = $ic_iid;
$ichargeArr[] = $ichargeEntry;
}
$itotal= $itotalsum;




/*


//--------------------for pdf-- and table updates---------------//

$number = $iid;


$pay = 'Make Checks Payable to Crofton Auction Services.';
$pay1 = 'Please Include the Invoice Number on your check.';

$price = str_replace(",",".",$price);

$p = explode(" ",$price);

$re = $p[0];
function r($r)
{
$r = str_replace("$","",$r);
$r = str_replace(" ","",$r);
$r = " $".$r;
return $r;
}
$price = r($price);
echo $price;
}




*/
















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



require('u/fpdf.php');

class PDF extends FPDF
{
function Header()
{
if(empty($_FILES["file"]))
  {
$uploaddir = "logo/";
$nm = "caslogo.png";
//$random = rand(1,99);
//move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$random.$nm);
$this->Image($uploaddir.$nm,10,10,30);
//unlink($uploaddir.$random.$nm);
}
$this->SetFont('Arial','B',12);
$this->Ln(1);
}
function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(32);
$pdf->Cell(0,4,'',0,1,'L');
$pdf->Cell(30,8,'',0,0,'L');
$pdf->Cell(0,8,$company,B,1,'L');
$pdf->Cell(30,8,'',0,0,'L');
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(32);
$pdf->Cell(60,8,$address,0,0,'L');
$pdf->Cell(0,8,"Phone: ".$telephone,0,1,'R');
$pdf->Cell(30,5,'',0,0,'L');
$pdf->Cell(60,5,$address2,0,0,'L');
$pdf->Cell(0,5,"Email: ".$email,0,1,'R');
$pdf->Cell(0,5,'',0,1,'R');
$pdf->SetFont('Arial','',14);
$pdf->SetTextColor(32);
$pdf->Cell(90,8,'INVOICE:',0,0,'R');
$pdf->Cell(20,8,' #'.$iid,0,1,'L');


$pdf->SetFont('Arial','',13);
$pdf->Cell(80,6,'To:',0,0,'L');
$pdf->Cell(0,6,'Date: '.date('m-d-Y'),0,1,'R');
$pdf->Cell(60,6,$dname,0,1,'L');
$pdf->Cell(60,6,"ATTN: ".strtoUpper($idattn),0,1,'L');
$pdf->Cell(60,6,strtoUpper($daddress),0,1,'L');
$pdf->Cell(60,6,$dcity.' '.$dstate.' '.$dzip,0,1,'L');



$pdf->Cell(10,15,'',0,1,'L');
$pdf->SetFillColor(200,220,255);
//$pdf->ChapterTitle('Invoice #: ',$number);
//$pdf->ChapterTitle('Due Date: ',date('m-d-Y'));
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(130,7,'Description',1,0,'L');
$pdf->Cell(20,7,'Rate',1,0,'C');
$pdf->Cell(20,7,'Qty',1,0,'C');
$pdf->Cell(20,7,'Price',1,1,'C');

foreach ($ichargeArr as $ichargeEntry){
$pdf->Cell(130,7,$ichargesEntry[0],1,0,'L',0);
$pdf->Cell(20,7,"$".$ichargesEntry[6],1,0,'C',0);
$pdf->Cell(20,7,$ichargesEntry[5],1,0,'C',0);

$pdf->Cell(20,7,$ichargesEntry[7],1,1,'C',0);


$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'',1,0,'R',0);
$pdf->Cell(20,7,'',1,1,'C',0);
$pdf->Cell(170,7,'$itotal',1,0,'R',0);
$pdf->Cell(20,7,"$ ".$re,1,0,'C',0);
$pdf->Cell(0,8,'',0,1,'R');
$pdf->SetFont('Arial','BI',12);
$pdf->Cell(0,5,$ic_notes,0,1,'C');
$pdf->Cell(0,8,'',0,1,'R');
$pdf->SetFont('Arial','I',12);
$pdf->Cell(0,8,$pay,0,1,'C');
$pdf->Cell(0,8,$pay1,0,1,'C');
$pdf->Cell(75,5,'',0,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(75,5,'Mail Check to:',0,2,'L');
//$pdf->Cell(75,1,'',0,0,'L');
$pdf->Cell(75,5,$company,0,2,'L');
$pdf->Cell(75,5,$address,0,2,'L');
$pdf->Cell(75,5,$address2,0,1,'L');

$filename= $iid.'.pdf';
$pdf->Output($filename,'F');
$filename2="invoice.pdf";
$pdf->Output($filename2,'F');
}}
}}?>