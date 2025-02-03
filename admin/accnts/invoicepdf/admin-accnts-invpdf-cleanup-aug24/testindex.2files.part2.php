
<?php if(isset($_POST["submit"]))
{
echo"<a href='invoice.pdf' onclick='return !window.open(this.href);'>View Invoice</a><br>";

include "../../process/connecti.php";
$result2 = mysqli_query($con, "INSERT INTO `invoices`(`iid`, `idate`, `itotal`, `iarchive`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`, `idcitystatezip`) VALUES ('', $idate, 0, 0, $iaid, $idid, '$idname', '$idattn', '$idaddress', '$idaddress2')");

// mysqli_query returns false if something went wrong with the query
if($result2 === FALSE) { 
     die(mysqli_error($con)."invoice query insert failed");
    //or die(mysql_error($con));
}else {$last_id = mysqli_insert_id($con);
$iid = $last_id;}
echo $iid;

$ic_iid = $iid;
$di_iid = $iid;
$mi_iid = $iid;

$minvid = $iid;




//------------------------
//form submitted


//collect into an array(if more than one)assign the post variables, include all editable fields on the form, including:  
//echo "</br>";
//$partone=$iid;
//$j=0;
//while($j<=20)
//{$j++;
//if ($j<=9){
//$apndx="0".substr($j/10, -1);
//}else{
//$apndx=substr($j, -2);
//}
//$ic_id = $partone.".".$apndx;
//echo $ic_id. "<-- value of ic_id at line 166 (in a loop, so it will repeat and be different";
//echo "</br>"};






//ic_description edit 
//qty edit
//rate edit
//stock edit
//solddate input
//soldprice input
//status creation
//substatus creation
//iic_id creation
//ic_amount multiplication
//ic_price multiplication for pdf ic_sumamounts for db
//ic_sumamounts sum all ic_amounts in array and insert into the now-existing invoice record.
//$msolddate= date("Y-m-d");
//$minvid = $row['iid'];
//$mstatus = "S";
//$msubstatus = "inv-yes";
//$mi_iid = $minvid;
//$mi_mid = $mid;
//$ic_iid = $_POST['iid'];
//$ic_qty = $_POST['ic_qty'];
//$ic_rate = $_POST['ic_rate'];
//$ic_price = $ic_rate*$ic_qty;
//$itotal = i_amount;
//$price=$ic_qty*$ic_rate;

//insert query for creation of single invoice record
//





//update queries for other tables 

//--------------------
//iic_relate
//$iic_iid;
//$iic_id;

//--------------------
//mi relate
//$mi_iid = $row['iid'];
//$mi_mid

//--------------------
//ui_relate
//$ui_uid
//$ui_iid


//--------------------
//di_relate, 
//$di_iid
//$di_did


//--------------------
//update master

//$minvid = $iid






//future (next week) save invoice to directory
//

//future(next week) email  and future(possibly?)fax subroutines












//--------------------for pdf-----------------//

$number = $iid;

$ic_qty = $_POST["ic_qty"];
$ic_rate= $_POST["ic_rate"];
$item = strtoUpper($_POST["ic_description"]);
$price= $_POST['ic_qty']*$_POST['ic_rate'];
$ic_notes = $_POST["ic_notes"];

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



//____________________________________________________


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
}
}

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
$pdf->Cell(60,6,"ATTN: ".strtoUpper($dattn),0,1,'L');
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
$pdf->Cell(20,7,'Price',1,1,'R');
$pdf->Cell(130,7,$item,1,0,'L',0);
$pdf->Cell(20,7,"$".$ic_rate,1,0,'C',0);
$pdf->Cell(20,7,$ic_qty,1,0,'C',0);
$pdf->Cell(20,7,$price,1,1,'C',0);
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'',1,0,'R',0);
$pdf->Cell(20,7,'',1,1,'C',0);
$pdf->Cell(170,7,'Total',1,0,'R',0);
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

$filename="invoice.pdf";
$pdf->Output($filename,'F');



echo"<a href='invoice.pdf' onclick='return !window.open(this.href);'>View Invoice</a><br>";
echo"<a href='/admin/worldview/viewinvoices.php'>Return to Invoicing Vehicles View</a><br>";

//echo"<a href='invoice.pdf'  onclick='window.open(this.href,'_blank'); return false;'> Preview Invoice</a><br>";
//<a href="http://www.sitepoint.com/" onclick="window.open(this.href,'_blank'); return false;">Sitepoint</a>
//<a href='http://osric.net/' onclick='return !window.open(this.href);'>osric.net web hosting</a>
//echo'<a href="invoice.pdf">Preview the Invoice</a>';
echo'<input name="submit" style="margin-top:60px;" value="Save to Dealer Directory and Download" type="submit" onclick/>';
}?>