<?php
//$fromdate = $_POST["from_date"];
//$todate= $_POST["to_date"];
//echo $todate;
//echo $fromdate;
$ufromdate = "2017-06-01";
$u2date = "2018-08-31";
//$ufromdate = $_POST["from_date"];
$ufyear = substr($ufromdate, 0,4);
$ufmonth = substr($ufromdate, 5,2);
$ufday = substr($ufromdate, 8,2);

$u2year = substr($u2date, 0,4);
$u2month = substr($u2date, 5,2);
$u2day = substr($u2date, 8,2);


$fromdate = '"'.$ufyear.'-'.$ufmonth.'-'.$ufday.'"';
$todate = '"'.$u2year.'-'.$u2month.'-'.$u2day.'"';
echo $fromdate;
    echo '</br>';

echo $todate;
    echo '</br>';
/*
$year1 = 2017;
$year2 = 2018;
$year3 = 2019;
$year4 = 2020;
$mnth1 = "01";
$mnth2 = "02";
$mnth3 = "03";
$mnth4 = "04";
$mnth5 = "05";
$mnth6 = "06";
$mnth7 = "07";
$mnth8 = "08";
$mnth9 = "09";
$mnth10 = "10";
$mnth11 = "11";
$mnth12 = "12";
*/
$myyear = $ufyear-1;
//echo $myyear;
echo '<br>';
//$year = $ufyear - 1;
//$mnth =$ufmonth - 1;
//for ($year = $ufyear; $year <= $u2year; $year++; )

while($myyear <= $u2year ) {
    $myyear++;
	if($myyear >= $u2year || $mnth <= $u2mnth){
   echo '<br>';
    echo $myyear;
   echo '<br>';
   echo 'now month';
    echo '</br> firsthwileloop<br>';
    echo $mnth;
 echo '<br>';

 while($mnth <= 11){
       $mnth++; 
       
      echo $mnth;
 echo '<br>';}
} else{}
if($mnth = 12 || $myyear <= $u2year)
{
    $mnth = 0;
  
}

    
   
   
    // if($year <= $u2year){
	 //$year++; }
  // $mnth = 1;

}
?>

