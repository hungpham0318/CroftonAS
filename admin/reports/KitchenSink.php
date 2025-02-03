<html>
    <head>
        
    </head>
<body>
    <table id = "Main" style = "white-space:nowrap;border:none;margin:1px;padding:1px;">
<tr>
                    <td style = "text-align:left;">Month</td>  
                     <td style = "text-align:left;">Invoiced</td>  
					 <td style = "text-align:left;">Registered</td>  
                     <td style = "text-align:left;">Sold</td>  
					 <td style = "text-align:left;">Receipts</td> 
                    
</tr>
<tr><td>
    <!-- ////////////////////////////////////////////////// -->
     <div id="2regCountCol" style = "max-width:19%;float:left;">
         <table style = "white-space:nowrap;width:200px;border:none;margin:1px;padding:1px;">

<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT mid,mrtime, DAY(mrtime) AS day, MONTH(mrtime) AS month, YEAR(mrtime) AS year FROM master WHERE mid > 8191 ORDER BY mrtime asc";  
 $result = mysqli_query($connect, $query);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$count = 0;
$prevMonth =''; //Added by me
$totalAmt = 0;//Added by me
$monthcount = 0;
 

while($row = mysqli_fetch_array($result)) {
$count++;


$monthcount++;

$iid = $row['iid'];

$itotal = $row['itotal'];
$day = $row['day'];
$month = $row['month'];
$year = $row['year'];
$idate = "$year-$month-$day";
$prevyear = $year - 1;
//Added by me
if($count != 1  && $month != $prevMonth)   {

    
    
?>
<tr>

    <!--    <td colspan ='2' ><?php echo date('F', strtotime("2012-$prevMonth")).' '. $year;?></td>-->
    <?php if ($prevMonth != 12){echo " <td colspan ='2' >".date('F', strtotime("2012-$prevMonth")).' '. $year."</td>";}else{echo "<td colspan ='2' >". date('F', strtotime("$year-$prevMonth")).' '. $prevyear ."</td>";}
    ?>
    
    
    
    
    <td align='right'><?php echo  number_format($monthcount); ?></td>
   
</tr>
<?php
$monthcount = 0;
 $totalAmt = 0; //Setting total to 0 once it is displayed
} //end of if

$totalAmt = $totalAmt + $itotal ;
$prevMonth = $month ;

//End of code Added by me
	  }?>


  
<?php 
 

if($totalAmt != 0){
	  } ?>
<tr>
    <td colspan ='2' ><?php echo date('F', strtotime("2012-$prevMonth")).' '. $year;?></td>
    <td align='right'><?php echo  number_format($monthcount); ?></td>
   
</tr>
<tr>
     <td colspan ='' >Total</td>
    <td colspan ='2'align='right'><b><?php echo  number_format($count); ?></b></td>
    
</tr>
<?php
	   ?>
</table>
 </div>
 </td><td>
    <div id="labelInvoiceCol" style = "max-width:19%;float:left;">

    <table id ="" style = "width:300px;border:none;margin:1px;cell-padding:1px;">

<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
   setlocale(LC_MONETARY, 'en_US.UTF-8');
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
$gtotal = 0;//Added by me

while($row = mysqli_fetch_array($result)) {
$count++;


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
    <td colspan ='2' ><?php echo date('F', strtotime("2012-$prevMonth")).' '. $year;?></td>
    <td style = "text-align:right;"><?php echo money_format('%.2n', $totalAmt); ?></td>
    
</tr>
<?php
 $totalAmt = 0; //Setting total to 0 once it is displayed
 
} //end of if
$gtotal = $gtotal + $itotal ;
$totalAmt = $totalAmt + $itotal ;
$prevMonth = $month ;

//End of code Added by me
	  }?>


  
<?php 
 

if($totalAmt != 0){
	  }
	
                  ?>
<tr>
    <td colspan ='2' ><?php echo date('F', strtotime("2012-$month-01"));?><?php echo ' '.$year;?></td>
    <td style = "text-align:right;"><?php echo money_format('%.2n', $totalAmt); ?></td>
    
</tr>
<tr>
    <td colspan ='2' >Total</td>
    <td style = "text-align:right;"><b><?php echo money_format('%.2n', $gtotal); ?></b></td>
    
</tr>
<?php
	   ?>
</table>
</td><td>
 </div>
<!-- ////////////////////////////////////////////////// -->
     <div id="2regCountCol" style = "max-width:19%;float:left;">
         <table style = "width:200px;border:none;margin:1px;padding:1px;">

<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT mid,mrtime, DAY(mrtime) AS day, MONTH(mrtime) AS month, YEAR(mrtime) AS year FROM master WHERE mid > 8191 ORDER BY mrtime asc";  
 $result = mysqli_query($connect, $query);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$count = 0;
$prevMonth =''; //Added by me
$totalAmt = 0;//Added by me
$monthcount = 0;
 

while($row = mysqli_fetch_array($result)) {
$count++;


$monthcount++;

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
   
    <td align='right'><?php echo  number_format($monthcount); ?></td>
   
</tr>
<?php
$monthcount = 0;
 $totalAmt = 0; //Setting total to 0 once it is displayed
} //end of if

$totalAmt = $totalAmt + $itotal ;
$prevMonth = $month ;

//End of code Added by me
	  }?>


  
<?php 
 

if($totalAmt != 0){
	  } ?>
<tr>
   
    <td align='right'><?php echo  number_format($monthcount); ?></td>
   
</tr>
<tr>
    
    <td align='right'><b><?php echo  number_format($count); ?></b></td>
    
</tr>
<?php
	   ?>
</table>
 </div>
 </td><td>
      <!-- ///////////////////////////////////////////////////////////////-->
     <div id="#3soldCountCol" style = "max-width:19%;float:left;">
         <table style = "width:200px;border:none;margin:1px;padding:1px;">

<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT mid,msolddate, DAY(msolddate) AS day, MONTH(msolddate) AS month, YEAR(msolddate) AS year FROM master WHERE msolddate >= '2017-06-01' ORDER BY msolddate asc";  
 $result = mysqli_query($connect, $query);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$count = 0;
$prevMonth =''; //Added by me
$totalAmt = 0;//Added by me
$soldcount = 0;


while($row = mysqli_fetch_array($result)) {
$count++;


$soldcount++;

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
   
    <td align='right'><?php echo  number_format($soldcount); ?></td>
    
</tr>

<?php
$soldcount = 0;
 $totalAmt = 0; //Setting total to 0 once it is displayed
} //end of if

$totalAmt = $totalAmt + $itotal ;
$prevMonth = $month ;

//End of code Added by me
	  }?>


  
<?php 
 

if($totalAmt != 0){
	  } ?>
	  <tr>
   
    <td align='right'><?php echo  number_format($soldcount); ?></td>
    
</tr>
<tr>
    
    <td align='right'><b><?php echo  number_format($count); ?></b></td>
    
</tr>
<?php
	   ?>
</table>
 </div>
 </td><td>
     
     <!--/////////////////////////////////////////////////////-->
     <!--/////////////////////////////////////////////////////-->
 <div id="4payments" style = "max-width:19%;float:left;">
 <table style = "width:200px;border:none;margin:1px;cell-padding:1px;">

<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT ip_id, ip_date,ip_amount, DAY(ip_date) AS day, MONTH(ip_date) AS month, YEAR(ip_date) AS year FROM i_payments ORDER BY ip_date asc";  
 $result = mysqli_query($connect, $query);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$count = 0;
$prevMonth =''; //Added by me
$iptotalAmt = 0;//Added by me
$gtotal = 0;//Added by me


while($row = mysqli_fetch_array($result)) {
$count++;



$ip_id = $row['ip_id'];

$ip_amount = $row['ip_amount'];
$day = $row['day'];
$month = $row['month'];
$year = $row['year'];
$ip_date = "$year-$month-$day";

//Added by me
if($count != 1  && $month != $prevMonth)   {
?>
<tr>
    
    <td align='right'><?php echo money_format('%.2n',$iptotalAmt); ?></td>
 
</tr>
<?php
 $iptotalAmt = 0; //Setting total to 0 once it is displayed
} //end of if
$gtotal = $gtotal + $ip_amount ;
$iptotalAmt = $iptotalAmt + $ip_amount ;
$prevMonth = $month ;

//End of code Added by me
	  }?>


  
<?php 
 

if($iptotalAmt != 0){
	  } ?>
<tr>
    
    <td align='right'><?php echo money_format('%.2n',$iptotalAmt); ?></td>
   
</tr>
<tr>
    
    <td align='right'><b><?php echo money_format('%.2n',$gtotal); ?></b></td>
    
</tr>
<?php
	   ?>
</table>
 </div>
 </td></tr></table>
</body>
</html>
