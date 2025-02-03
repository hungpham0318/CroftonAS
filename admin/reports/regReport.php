<?php session_start();
$title="Reg Report";
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
    <!-- ////////////////////////////////////////////////// -->
     <div id="2regCountCol" style = "max-width:19%;float:left;">
         <table style = "white-space:nowrap;width:200px;border:none;margin:1px;padding:1px;">
<thead><th>Registrations</th></thead>
<?php
$dbhost = "localhost";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
$dbname = "crofton_cas";
?>

<?php
 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT mid,mrtime, DAY(mrtime) AS day, MONTH(mrtime) AS month, YEAR(mrtime) AS year FROM master WHERE mid >= 2324 ORDER BY mrtime asc";  
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
    <td colspan ='2' ><?php echo date('F', strtotime("2012-$prevMonth")).' '. $year;?></td>
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
 
 </td></tr></table>
</body>
</html>
