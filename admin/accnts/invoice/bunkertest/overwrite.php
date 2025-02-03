<?php
$idid=$_GET['did'];
$iid=$_GET['iid'];


$imagick = new Imagick();
// Reads image from PDF
$imagick->readImage('9400.3993.pdf');
// Writes an image or image sequence Example- converted-0.jpg, converted-1.jpg
$imagick->writeImages('converted.jpg', false);



$oldfile= $idid.'.'.$iid.'.pdf';
$deloldfile = "deleted/".$oldfile;
//echo $oldfile;
//echo "<br/>";
//echo $deloldfile;


//- See more at: https://arjunphp.com/convert-pdf-jpeg-php/#sthash.NEwFhuw5.dpuf

rename($oldfile,$deloldfile);
//rename("$idid'.'$iid'.pdf","deleted/'$idid'.'$iid'.pdf");
//require('../../invoicepdf/u/fpdf.php');
require('../../invoicepdf/u/rotation.php');

class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',48);
//$pdf->Cell(40,10,'This Invoice was deleted!');
//$pdf->Cell(40,10,'A copy is located '.$deloldfile.'here');
$filename= $idid.'.'.$iid.'.pdf';
$pdf->Image('converted.jpg', 0, 0, $pdf->w, $pdf->h);
$pdf->RotatedText(100,60,'INVOICE DELETED',45);
$pdf->Output($filename,'F');
?>
