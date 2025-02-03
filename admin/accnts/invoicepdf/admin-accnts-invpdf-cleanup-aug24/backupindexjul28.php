<?php 
// admin/accnts/invoicepdf/index.php

$qmid=$_GET['mid'];

$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";

//SELECT FROM master 

include "../../process/connecti.php";
$qmid = mysqli_real_escape_string($con, $_GET['mid']);
$result = mysqli_query($con, "SELECT `mid`, `mvid`, `maid`, `mdid`, `mvin`, `myear`, `mmodel`, `mstock`, `mstatus`, `msubstatus`, `msolddate`, `minvid`, `did`,`dnumber`,`dname`,`daddress`,`dcity`,`dstate`,`dzip` 
FROM master, dealers WHERE `mid` = $qmid AND `did` = mdid");

// mysqli_query returns false if something went wrong with the query
if($result === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 15 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));
}
else {
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
    foreach( $result as $row ) {


//--------------------
//assign variables from master/dealer query
//**have to add a loop for multiple before assignment***
//First run through the query for single record.


//from master
$myear = $row['myear'];
$mmodel = $row['mmodel'];
$mvin = $row['mvin'];
$msolddate = $row['msolddate'];
$mstatus = $row['mstatus'];
$msubstatus = $row['msubstatus'];
$muid =	$row['msubstatus'];
$maid =	$row['msubstatus'];
$msoldprice = $row['msoldprice'];
$minvid = $row['msubstatus'];
$mid=$qmid;

//from dealers

$did = $row['mdid'];
$dname = $row['dname'];
$dattn = $row['dattn'];
$daddress = $row['daddress'];
$dcity = $row['dcity'];
$dstate = $row['dstate'];
$dzip = $row['dzip'];
$daddress2 = $dcity.' '.$dstate.' '.$dzip;

//fields for single record invoices

$ic_description = $myear."&nbsp;&nbsp;".$mmake."&nbsp;&nbsp; ".$mvin."&nbsp;&nbsp;";
$ic_solddate = $row['msoldate'];
$ic_mid = $mid;
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];
$ic_description = substr($myear, -2)."&nbsp;&nbsp; ".$mmodel."&nbsp;&nbsp; ".substr($mvin, -8)."&nbsp;&nbspREP FEE&nbsp;&nbsp; "; 
$ic_price = $ic_rate*$ic_qty;
$i_amount = $ic_pricesum;

$price = $ic_qty*$ic_rate;
$itotal = $i_amount;
//for invoices (fields that will remain the same after form submit)

$iaid = $row['maid'];
$idid = $row['mdid'];
$idate = date('m-d-Y');
$idname = $row['dname'];
$idattn = $row['dattn'];
$idaddress = $row['daddress'];
$idaddress2 = $dcity.' '.$dstate.' '.$dzip;
//variables that won't change after post
$ic_paid = false;

}
//reassign single record fields for array

//after initial query to db for master and dealers fields
//assign i_charges variables (after form submission)

//$ic_iid = $_POST['iid'];
//$ic_qty = $_POST['ic_qty'];
//$ic_rate = $_POST['ic_rate'];
//$ic_price = $ic_rate*$ic_qty;
//$itotal = $i_amount;
//$price=$ic_qty*$ic_rate;
//$year = substr($myear, -2);

//status
//$ipdfurl = "bunker"."\/".$row['did'].\"/".$iid.".".date('Y-m-d').;

//ic_iid mi_iid, ui_iid, ,di_iid

//$ic_iid = $row['iid'];
//$mi_iid = $row['iid'];
//$ui_iid = $row['iid'];







//--------------------
// View Invoice and user either make changes or accepts records as shown and clicks submit 
//--------------------

if(isset($_POST["submit"]))
{
// ----------------------------------------------------------//
// 'insert invoice' query  $result2 
// ----------------------------------------------------------//
include "../../process/connecti.php";
//$qmid = mysqli_real_escape_string($con, $_GET['mid']);
$result2 = mysqli_query($con, "INSERT INTO `invoices`(`iid`, `idate`, `itotal`, `iarchive`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`, `idcitystatezip`) VALUES ('', $idate, 0, 0, $iaid, $idid, '$idname', '$idattn', '$idaddress', '$idaddress2')");

// mysqli_query returns false if something went wrong with the query
if($result2 === FALSE) { 
     die(mysqli_error($con));
    //or die(mysql_error($con));
}
else {$last_id = mysqli_insert_id($con);
$iid = $last_id;}
echo $iid;

$ic_iid = $iid;
$di_iid = $iid;
$mi_iid = $iid;

$minvid = $iid;




// as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
//  foreach( $result2 as $row ){
//--------------------
//------------------------
//form submitted


//collect into an array(if more than one)assign the post variables, include all editable fields on the form, including:  
echo "</br>";
$partone=$iid;
$j=0;
while($j<=20){
$j++;
if ($j<=9){
$apndx="0".substr($j/10, -1);
}else{
$apndx=substr($j, -2);
}
$ic_id = $partone.".".$apndx;
echo $ic_id. "<-- value of ic_id at line 166 (in a loop, so it will repeat and be different";
echo "</br>";





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
}
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
}


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
$pdf->Cell(0,8,'INVOICE',0,1,'C');

$pdf->SetFont('Arial','',13);
$pdf->Cell(80,6,'To:',0,0,'L');
$pdf->Cell(0,6,'Date: '.date('m-d-Y'),0,1,'R');
$pdf->Cell(0,6,'Invoice #: '.$iid,0,1,'R');
$pdf->Cell(60,6,$dname,0,1,'L');
$pdf->Cell(60,6,"Attn: ".strtoUpper($dattn),0,1,'L');
$pdf->Cell(60,6,strtoUpper($daddress),0,1,'L');
$pdf->Cell(60,6,$dcity.' '.$dstate.' '.$dzip,0,1,'L');




$pdf->Cell(10,15,'',0,1,'L');
$pdf->SetFillColor(200,220,255);
//$pdf->ChapterTitle('Invoice #: ',$number);
//$pdf->ChapterTitle('Due Date: ',date('m-d-Y'));
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(100,7,'Description',1,0,'L');
$pdf->Cell(50,7,'Rate',1,0,'C');
$pdf->Cell(20,7,'Qty',1,0,'C');
$pdf->Cell(20,7,'Price',1,1,'R');
$pdf->Cell(100,7,$item,1,0,'L',0);
$pdf->Cell(50,7,"$".$ic_rate,1,0,'C',0);
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
height:450px;
margin:15px;
color:#999999;
font-size:16px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body_l{
width:450px;
height:450px;
float:left;
}
#body_r{
width:450px;
height:450px;
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
<?php echo "Dealership: "."$dname";
echo "<br>";
echo "Attn: "."$dattn";
echo "<br>";

echo "$daddress";
echo "<br>";
echo "Item: ".$ic_description;
echo "<br>";
echo "Sold Date: ".$msolddate;
echo "<br>";
echo "Amount: ".$ic_amount;
echo "<br>";
echo "Invoice Id: ".$iid;
echo "<br>";

echo "chargeid: ".$ic_id;
echo "<br>";
echo "chargedate: ".$ic_date;
echo "<br>";
echo "Sold Date: ".$ic_solddate;
echo "<br>";
echo "Qty: ".$ic_qty;
echo "<br>";
echo "Rate: "."$ic_rate";
echo "<br>";
echo "Stock Number: "."$ic_stock";
echo "<br>";
echo "Notes: "."$ic_notes";
echo "<br>";?>
</div>
<div id="body_r">
<div id="ic_description"><label>Item:</label><br><input name="ic_description" placeholder="Item: <?php echo"$ic_description";?>" type="text" value="<?php echo"$ic_description";?>"/>
</div>

<?php if (empty($ic_qty)) {echo'<div id="ic_qty"><label>Qty:</label><br><input name="ic_qty" placeholder="" type="text" value="1"/></div>';
}else{echo'<div id="ic_qty"><label>Rate:</label><br><input name="ic_qty placeholder="'.$ic_rate.'" type="text" value="'.$ic_qty.'"/></div>';}?>

<?php if (empty($ic_rate)) {echo'<div id="ic_rate"><label>Rate:</label><br><input name="ic_rate" placeholder="" type="text" value="150"/></div>';
}else{echo'<div id="ic_rate"><label>Rate:</label><br><input name="ic_rate" placeholder="'.$ic_rate.'" type="text" value="150"/></div>';}?>
<!--<div id="Price"><label>Fee:</label><br><input name="price" placeholder="Amount: <?php echo"$price";?>" type="text" value="<?php echo"$price";?>"/></div> -->


<div id="iid"><label>Invoice Id:</label><br><input name="iid" placeholder="Invoice number: <?php echo $iid;?>" type="text" value=""></div>

<div id="dattn"><label>Attention:</label><br><input name= "dattn" placeholder="Attention: <?php echo "$dattn";?>" type="text" value="<?php echo "$dattn";?>" /></div>


<!--<div id="ic_date"><label>Sold Date:</label><br><input name="ic_date" placeholder="Date Sold:<?php echo"$msolddate";?>" type="text" value="<?php echo $msolddate;?>"  /></div>-->

<div id="ic_notes"><label>Notes:</label><br><input name="ic_notes" placeholder="Additional note for this invoice." type="text" value="<?php echo"$ic_notes";?>"  /></div>
</div>
<!--<div id="up" align="center"><input name="file" disabled="disabled" type="file" /></div>-->
<br>
<div id="up" align="center"><input name="submit" style="margin-top:60px;" value="Create your Invoice" type="submit" /><br /><br />

<?php 
if(isset($_POST["submit"]))
{
echo"<a href='invoice.pdf'  onclick='window.open('invoice.pdf', 'newwindow', 'width=80%, height=100%'); return false;'> Preview Invoice</a><br>";


//echo'<a href="invoice.pdf">Preview the Invoice</a>';
echo'<input name="submit" style="margin-top:60px;" value="Save to Dealer Directory and Download" type="submit" />';
}
?>
</div>
</form>
</div>
</div>
<div id="footer" align="center">..</a></div>
</body>
</html>
