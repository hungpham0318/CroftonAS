<?php 
// admin/accnts/invoicepdf/index.php


//$qmid=3762;
//SELECT * FROM master 

include "../../process/connecti.php";
 $qmid = mysqli_real_escape_string($con, $_GET['mid']);
 $qdid = mysqli_real_escape_string($con, $_GET['did']);
$result = mysqli_query($con, "SELECT `mid`, `mvid`, `maid`, `mdid`, `mvin`, `myear`, `mmake`, `mstock`, `mstatus`, `msubstatus`, `msolddate`, `minvid`, `did`,`dnumber`,`dname`,`daddress`,`dcity`,`dstate`,`dzip` 
FROM master, dealers WHERE `mid` = $qmid AND `mdid` = $qdid");

// mysqli_query returns false if something went wrong with the query
if($result === FALSE) { 
     die(mysqli_error($con));
    //or die(mysql_error($con));
}
else {
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
    foreach( $result as $row ) {
	


$idid = $row['mdid'];
$idate = $row['idate'];
$idid = $row['mdid'];

$itotal = $amount;
$marchive = $row['marchive'];
$iaid = $row['maid'];
$dname = $row['dname'];
$dattn = $row['dattn'];
$daddress = $row['daddress'];
$dcity = $row['dcity'];
$dcity = $row['dstate'];
$dcity = $row['dzip'];
//istatus
//--------------------
//assign other variables I will need from master/dealer query, later
//--------------------

$myear = $row['myear'];
$mmake = $row['mmake'];
$mvin = $row['mvin'];
$msolddate = $row['msolddate'];
$mstatus = $row['mstatus'];
$msubstatus = $row['msubstatus'];
$ic_description = $myear." ".$mmake." ".$mvin." ".$msolddate;
$ic_solddate = $row['msoldate'];
//$ic_qty = $row['iid'];
//$ic_rate = 
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];
}}

//--------------------
//create invoice 


//add an invoice status and initially insert like a random number or little token to immediately call it back and the get invoice record.

//make sure to change the status on update to something else that makes sense and can be helpful, like complete, sent, paid, disputed, written off...etc.


//--------------------
//call back the invoice record


//--------------------
//update master with invoice info

//$minvid = $row['iid'];
//$mstatus = $row['iid'];
//$msubstatus = $row['iid'];

//update di_relate
//$di_iid = $minvid;
//$di_did = $mdid;

//update mi_relate
//$mi_iid = $minvid;
//$mi_mid = $mid;

//------------------------
//create invoice charge

//$ic_iid = $row['iid'];
$ic_mid = $qmid;
//$ic_date = date('m-d-Y'));
$ic_amount = 0;
$ic_description = $myear." ".$mmake." ".$mvin." ".$msolddate;
$ic_solddate = $row['msoldate'];
//$ic_qty = $row['iid'];
//$ic_rate = 
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];
$ic_paid = $row['iid'];
$ic_note = $row['iid'];
//$ic_iid = 
$ic_iid = $row['iid'];

//--------------------
//insert invoice/invoice charge link table row
//date('m-d-Y')

//--------------------
//update master




$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";
$number = $_GET["iid"];


if(isset($_POST["submit"]))
{
$item = $_POST["ic_description"];
$price = $_POST["price"];
$vat = $_POST["vat"];
$bank = $_POST["bank"];
$iban = $_POST["iban"];
$paypal = $_POST["paypal"];
$com = $_POST["com"];
$pay = 'Payment information';
$price = str_replace(",",".",$price);
$vat = str_replace(",",".",$vat);
$p = explode(" ",$price);
$v = explode(" ",$vat);
$re = $p[0] + $v[0];
function r($r)
{
$r = str_replace("$","",$r);
$r = str_replace(" ","",$r);
$r = $r." $";
return $r;
}
$price = r($price);
$vat = r($vat);
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
$this->Image($uploaddir.$nm,10,10,20);
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
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(32);
$pdf->Cell(25,8,'',0,0,'L');
$pdf->Cell(80,8,$company,B,1,'L');
$pdf->Cell(25,8,'',0,0,'L');
$pdf->SetFont('Times','',13);
$pdf->SetTextColor(32);
$pdf->Cell(60,8,$address3,T,1,'L');
$pdf->Cell(25,6,'',0,0,'L');
$pdf->Cell(0,6,$email.' '.$telephone,0,1,'L');
$pdf->Cell(10,15,'',0,1,'R');
$pdf->SetFillColor(200,220,255);
$pdf->ChapterTitle('Invoice Number ',$number);
$pdf->ChapterTitle('Invoice Date ',date('m-d-Y'));
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(170,7,'Item',1,0,'L');
$pdf->Cell(20,7,'Price',1,1,'C');
$pdf->Cell(170,7,$item,1,0,'L',0);
$pdf->Cell(20,7,$price,1,1,'C',0);
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'VAT',1,0,'R',0);
$pdf->Cell(20,7,$vat,1,1,'C',0);
$pdf->Cell(170,7,'Total',1,0,'R',0);
$pdf->Cell(20,7,$re." $",1,0,'C',0);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,$pay,0,1,'L');
$pdf->Cell(0,5,$bank,0,1,'L');
$pdf->Cell(0,5,$iban,0,1,'L');
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,'PayPal:',0,1,'L');
$pdf->Cell(0,5,$paypal,0,1,'L');
$pdf->Cell(190,40,$com,0,0,'C');
$filename="invoice.pdf";
$pdf->Output($filename,'F');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create a PDF invoice with PHP</title>
<style>
body{background-image:url(img/bg.jpg);
}
a{
color:#999999;
text-decoration:none;
}
a:hover{
color:#000000;
text-decoration:underline;
}
#content{
width:960px;
height:960px;
background-color:#FEFEFE;
border: 10px solid rgb(255, 255, 255);
border: 10px solid rgba(255, 255, 255, .5);
-webkit-background-clip: padding-box;
background-clip: padding-box;
border-radius: 10px;
opacity:0.90;
filter:alpha(opacity=90);
margin:auto;
}
#footer{
width:960px;
height:30px;
padding-top:15px;
color:#666666;
margin:auto;
}
#title{
width:770px;
margin:15px;
color:#440001;
font-size:18px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body{
width:960px;
height:960px;
margin:15px;
color:#999999;
font-size:16px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body_l{
width:450px;
height:960px;
float:left;
}
#body_r{
width:450px;
height:960px;
float:right;
}
#name{
width:width:385px;
height:40px;
margin-top:15px;
}
input{
margin-top:10px;
width:345px;
height:32px;
-moz-border-radius: 5px;
border-radius: 5px;
border:1px solid #ccc;
background-image:url(img/paper_fibers.png);
color:#999;
margin-left:15px;
padding:5px;
}
#up{
width:960px;
height:40px;
margin:auto;
margin-top:10px;
}
</style>
</head>

<body>
<div id="content">
<div id="title" align="center">Create New Invoice | Crofton Auction Services</div>
<div id="body">
<form action="" method="post" enctype="multipart/form-data">
<div id="body_l">
<div id="name"><input name="dname" placeholder="From: <?php echo"$company";?>"  value="<?php echo"$company";?>" type="text" /></div>
<div id="name"><input name="dattn" placeholder="Address: <?php echo"$dattn";?>" type="text" value="<?php echo"$dattn";?>" /></div>
<div id="name"><input name="daddress" placeholder="Address: <?php echo"$daddress";?>" type="text" value="<?php echo"$daddress";?>"  /></div>
<div id="name"><input name="daddress2" placeholder="City State Zip: <?php echo"$daddress2";?>" type="text" value="<?php echo"$daddress2";?>"  /></div>
<div id="name"><input name="iid" placeholder="Invoice number: <?php echo"$iid";?>" type="text" value="<?php echo"$iid";?>"  /></div>
<div id="name"><input name="ic_description" placeholder="Item: <?php echo"$ic_description";?>" type="text" value="<?php echo"$ic_description";?>"  /></div>
<div id="name"><input name="dname" placeholder="Dealership Name: <?php echo"$dname";?>"  value="<?php echo"$dname";?>" type="text" /></div>
<div id="name"><input name="dattn" placeholder="Attention: <?php echo"$dattn";?>" type="text" value="<?php echo"$dattn";?>" /></div>
<div id="name"><input name="daddress" placeholder="Address: <?php echo"$daddress";?>" type="text" value="<?php echo"$daddress";?>"  /></div>
<div id="name"><input name="daddress2" placeholder="City State Zip: <?php echo"$daddress2";?>" type="text" value="<?php echo"$daddress2";?>"  /></div>
<div id="name"><input name="iid" placeholder="Invoice number: <?php echo"$iid";?>" type="text" value="<?php echo"$iid";?>"  /></div>
<div id="name"><input name="ic_description" placeholder="Item: <?php echo"$ic_description";?>" type="text" value="<?php echo"$ic_description";?>"  /></div>
</div>
<div id="body_r">
<div id="name"><input name="ic_amount" placeholder="Amount: " type="text" value="<?php echo"$daddress";?>"/></div>
<div id="name"><input name="ic_description" placeholder="Item: "<?php echo"$ic_description";?> type="text" value="<?php echo"$ic_description";?>"  /></div>
<div id="name"><input name="ic_date" placeholder="Date Sold:" type="text" value="<?php echo"$daddress";?>"  /></div>
<div id="name"><input name="iban" placeholder="Insert here your IBAN number" type="text" value="<?php echo"$daddress";?>"  /></div>
<div id="name"><input name="paypal" placeholder="Insert here your PayPal address" type="text" value="<?php echo"$daddress";?>"  /></div>
<div id="name"><input name="com" placeholder="Add a comment" type="text" value="<?php echo"$daddress";?>"  /></div>
</div>
<div id="up" align="center"><input name="file" disabled="disabled" type="file" /></div>
<div id="up" align="center"><input name="submit" style="margin-top:60px;" value="Create your Invoice" type="submit" /><br /><br />

<?php 
if(isset($_POST["submit"]))
{
echo'<a href="invoice.pdf">Download your Invoice</a>';
}
?>
</div>
</form>
</div>
</div>
<div id="footer" align="center">..</a></div>
</body>
</html>
