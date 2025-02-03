<?php session_start();
$title="i_charges";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}
?>
<html>
    <head>
        
    </head>
<body>
    <table id = "Main" style = "white-space:nowrap;border:none;margin:1px;padding:1px;">

<tr><td>
   
    <div id="labelInvoiceCol" style = "max-width:19%;float:right;">

    <table id ="" style = "width:300px;border:none;margin:1px;cell-padding:1px;"><thead>
<th align="left" colspan = "2" style = "">Month</th>  
                 <th align="right" style = "">Invoiced</th>  </thead>
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
$prevyear = $year - 1;
//echo $year;
//echo "<br>";
//echo $prevyear;
//echo "<br>";
//if ($month = 'December'){$idate = "$prevyear-$month-$day";}else{$idate = "$year-$month-$day";}
//echo $prevyear;
$idate = "$year-$month-$day";

//Added by me
if($count != 1  && $month != $prevMonth)   {
?>
<tr>
<!--    <td colspan ='2' ><?php echo date('F', strtotime("2012-$prevMonth")).' '. $year;?></td>-->
    <?php if ($prevMonth != 12){echo " <td colspan ='2' >".date('F', strtotime("2012-$prevMonth")).' '. $year."</td>";}else{echo "<td colspan ='2' >". date('F', strtotime("$year-$prevMonth")).' '. $prevyear ."</td>";}
    ?>
        
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

      <!-- ///////////////////////////////////////////////////////////////-->
     <div id="#3soldCountCol" style = "max-width:19%;float:right;">
         <table style = "width:200px;border:none;margin:1px;padding:1px;">
<thead><th align="right">Units Sold</th></thead>
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
 <div id="4payments" style = "max-width:19%;float:right;">
 <table style = "width:200px;border:none;margin:1px;cell-padding:1px;">
<thead><th align="right">Receipts</th></thead>
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
$ip_type = $row['ip_type'];
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
 </td><td>
     
     <!--/////////////////////////////////////////////////////-->
     <!--/////////////////////////////////////////////////////-->
 <div id="5gwpayments" style = "max-width:19%;float:right;">
 <table style = "width:200px;border:none;margin:1px;cell-padding:1px;">
<thead><th align="right">Goodwill</th></thead>
<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT ip_id, ip_type, ip_date,ip_amount, DAY(ip_date) AS day, MONTH(ip_date) AS month, YEAR(ip_date) AS year FROM i_payments WHERE ip_type LIKE '%Goodwill%' OR ip_type LIKE '%Write-off%'  ORDER BY ip_date asc";  
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
 </td></tr><tr><td align='right'>Goodwill: <?php echo $gtotal;?></td></tr></table>
</body>
</html>
