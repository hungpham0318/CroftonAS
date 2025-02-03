<html>
    <head>
        
    </head>
<body>
<table width="600" border="0" cellspacing="0" cellpadding="5" align="center">
<tr>
   <th width="19%">Month</th>  
                     <th width="19%">Invoiced</th>  
					 <th width="19%">Registered</th>  
                     <th width="19%">Sold</th>  
					 <th width="19%">Receipts</th> 
                    
</tr>
<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT iid,itotal,idate, DAY(idate) AS day, MONTH(idate) AS month, YEAR(idate) AS year FROM invoices ORDER BY idate asc";  
 $result = mysqli_query($connect, $query);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$count = 0;
$prevMonth =''; //Added by me
$totalAmt = 0;//Added by me
//$res = $mysqli->use_result();
//while ($row = $res->fetch_assoc()) 

while($row = mysqli_fetch_array($result)) {
$count++;
//echo $count;
//$mysqli->mysqli_query("SELECT iid,itotal, DAY(idate) AS day, MONTH(idate) AS month, YEAR(idate) AS year FROM invoices ORDER BY idate");

//$mysqli = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//$connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
//$mysqli = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//$mysqli->real_query("SELECT id,cid,amount, DAY(payment_date) AS day, MONTH(payment_date) AS month, YEAR(payment_date) AS year FROM table1 ORDER BY payment_date");


$iid = $row['iid'];

$itotal = $row['itotal'];
$day = $row['day'];
$month = $row['month'];
$year = $row['year'];
$idate = "$year-$month-$day";

//Added by me
if($count != 1  && $month != $prevMonth)   {
?>
<tr>
    <td colspan ='2' align='left'><?php echo date('F', strtotime("2012-$prevMonth-01"));?>
    <?php echo $year;?></td>
    <td align='right'><?php echo $totalAmt; ?></td>
    <td></td>
</tr>
<?php
 $totalAmt = 0; //Setting total to 0 once it is displayed
} //end of if

$totalAmt = $totalAmt + $itotal ;
$prevMonth = $month ;

//End of code Added by me
	  }?>

<!--<tr>
    <td><?php //echo $iid; ?></td>
    
    <td><?php //echo $itotal; ?></td>
    <td><?php //echo $idate; ?></td>
</tr>-->
  
<?php 
 

if($totalAmt != 0){
	  } ?>
<tr>
    <td colspan ='2' align='left'><?php echo date('F', strtotime("2012-$month-01"));?><?php echo $year;?></td>
    <td align='right'><?php echo $totalAmt; ?></td>
    <td></td>
</tr>
<?php
	   ?>
</table>
    
</body>
</html>
