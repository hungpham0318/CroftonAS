<?php
$qmdid=$_GET['mdid'];

require('u/fpdf.php');

//Connect to your database
//include("conectmysql.php");
include "../../process/connecti.php";
//Select the Products you want to show in your PDF file
//$result=mysql_query("select Code,Name,Price from Products ORDER BY Code",$link);

$result = mysqli_query($con, "SELECT `mid`, `maid`, `muid`, `mdid`, `mvin`, `myear`, `mmodel`, `mstock`, `mstatus`, `minvid`, `msubstatus`, `msolddate`,`msoldprice`
FROM master WHERE mdid = $qmdid");


if($result === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 103 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));
}
//else {echo 'line 114<br>';
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
  
$number_of_rows = mysqli_num_rows($result);
//$row_cnt = mysqli_num_rows($result);


$column_item = "";
$column_rate = "";
$column_qty = "";
$column_amount = "";
$total = 0;



//For each row, add the field to the corresponding column
//while($row = mysql_fetch_array($result))
  foreach( $result as $row ) {

	

$mvin = $row['mvin'];
$myear = $row['myear'];
$mmodel = $row['mmodel'];
$ic_solddate = $row['msoldate'];
$ic_mid = $row['mdid'];
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];
$ic_rate = 150;
$ic_qty = 1;
$ic_date =  date('Y-m-d');
$ic_amount = $ic_rate * $ic_qty;
$ic_price = $ic_amount;
$price = $ic_amount;
//$itotal = $itotal+$ic_amount;
$ic_description = substr($myear, -2)." - ".$mmodel." - ".substr($mvin, -8)." - ".$mstock." - REP FEE "; 
	
	
$column_item = $column_item.$ic_description."\n";
$column_rate = $column_rate.$ic_rate."\n";
$column_qty = $column_qty.$ic_qty."\n";
$columna_amount = $columna_amount.$ic_amount."\n";
//$total = $ic_amount;
	


	//Sum all the Prices (TOTAL)
	//$total = $total+$real_price;
	$total = $total+$ic_amount;	
	
}
mysqli_close($con);


//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
//$total = number_format($total,',','.','.');

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',8);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(8);
$pdf->Cell(120,6,'Item',1,0,'L',1);
$pdf->SetX(128);
$pdf->Cell(10,6,'Qty',1,0,'L',1);
$pdf->SetX(138);
$pdf->Cell(12,6,'Rate',1,0,'L',1);
$pdf->SetX(150);
$pdf->Cell(15,6,'Amount',1,0,'R',1);
$pdf->Ln();




//Now show the 3 columns
$pdf->SetFont('Arial','',8);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(8);
$pdf->MultiCell(120,6,$column_item,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(128);
$pdf->MultiCell(10,6,$column_qty,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(138);
$pdf->MultiCell(12,6,$column_rate,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(15,6,$columna_amount,1,'R');
$pdf->SetX(150);
$pdf->MultiCell(15,6,'$ '.$total,1,'R');




//Create lines (boxes) for each ROW 
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_rows)
{
	$pdf->SetX(8);
	$pdf->MultiCell(157,6,'',1);
	$i = $i +1;
}

$pdf->Output();

?>
