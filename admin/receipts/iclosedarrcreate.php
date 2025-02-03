<?php
include "../process/connecti.php";
$iclosedarr = array();
$x=0;
//$xyz = 'UPDATE invoices SET iclosed = 1 WHERE iid =';
$resultfull = mysqli_query($con, "SELECT invoices.iid, invoices.itotal, invoices.iclosed, sum(i_payments.ip_amount) as pmtsum FROM invoices 
LEFT JOIN i_payments on invoices.iid = i_payments.ip_iid 
GROUP BY invoices.iid");

foreach($resultfull as $row){
$ibalance = 0;
$inviclosed = $row['iclosed'];
$invbalrow = $row['iid'];
$itotal = $row['itotal'];
$ipmtsum = $row['pmtsum'];
//$ibalance = ($itotal - $ipmtsum);
$ibalance = ($row['itotal'] - $row['pmtsum']);
if($ibalance == "0" && $inviclosed === "0"){
//echo "<br />balance for invoice ".$invbalrow.' '.$itotal.' '.$ipmtsum.' '.$ibalance;
//UPDATE invoices SET iclosed=1 WHERE invoices.iid = $invbalrow; 
$iclosedarr[]= $row['iid'];
}
}
mysqli_close($con);

//echo $xyz;
//echo "$resultfull = mysqli_query($con, "UPDATE invoices SET iclosed = 1 WHERE iid = ";
foreach ($iclosedarr as $x){
//echo $x;
$the1 = $x;}
include "../process/connecti.php";
$resultupd = mysqli_query($con, "UPDATE `invoices` SET `iclosed` = 1 WHERE iid = $the1");
mysqli_close($con);
//echo "UPDATE `invoices` SET `iclosed` = 1 WHERE iid = $the1";
//$y .= $x;
//$x++;

//echo "<br /> NOW COMES THE SINGLE VARIABLE CONTENTS <br />";
//echo $y;


?>