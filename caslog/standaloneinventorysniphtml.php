<html>

<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
div.container { max-width: 1200px!important; }
#included {font-family:monospace!important;
</style>

<table id="included" class="display responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Submitted</th>
<th>Vin</th>
<th>Status</th>
<th>Solddate</th>
<th>Year</th>
<th>Make</th>

<th>Model</th>
<th>Stock</th>


<th>Sold Price</th>
<th>Sale&apos;s Net</th>
<th>Invoice</th>
<th>Dealership</th>
<!--
<th>Invoice Item</th>

<th>Detail</th>
<th>Announcement</th>
<th>Transport</th>-->

            </tr>
        </thead>
        <tbody>
            
	<?php		
include "../admin/process/connecti.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");


$quid=$GLOBALS['quid'];
//$dealer = $_POST['dealer'];
//$dname = $_POST['dname'];
echo $dealer;
$qdid= '"%'.$_POST['did'].'%"';
if ($_POST['did'] = ""){$qdid ='"%"';}
    $sdate = $row[SaleDate];
  //	 $query2 = mysqli_query($con,"SELECT * FROM master LEFT JOIN i_charges ON  (master.mid=i_charges.ic_mid) LEFT JOIN invoices ON (master.minvid = invoices.iid)  LEFT JOIN dealers ON (master.mdid = dealers.did) WHERE master.mdid LIKE $qdid AND master.marchive = 0 AND master.mrtime >= (NOW() - INTERVAL 90 DAY) LIMIT 0, 10000");
   
		 $query2 = mysqli_query($con,"SELECT * FROM master LEFT JOIN i_charges ON  (master.mid=i_charges.ic_mid) LEFT JOIN invoices ON (master.minvid = invoices.iid)  LEFT JOIN dealers ON (master.mdid = dealers.did) WHERE master.muid = $quid AND master.mdid LIKE $qdid AND master.marchive = 0 AND master.mrtime >= (NOW() - INTERVAL 90 DAY) ORDER BY master.mrtime DESC LIMIT 0, 10000");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  echo $qdid;
  echo $quid;
  }
   while($row = mysqli_fetch_array($query2)) {
    $vehid = $row['mid'];
   
	echo '<tr>
	
	<td class="">'.date("m/d/Y", strtotime($row['mrtime'])).'</td>
	
	
	
	<td>'.strtoupper($row['mvin']).'</td>
	<td>'.strtoupper($row['mstatus']).'</td>
	<td>'.$row['msolddate'].'</td>
	<td>'.$row['myear'].'</td>
<td>'.strtoupper($row['mmake']).'</td>

<td>'.strtoupper($row['mmodel']).'</td>
<td>'.strtoupper($row['mstock']).'</td>





<td>'.$row['msoldprice'].'</td>
<td>'.$row['msalesnet'].'</td>

<td><a href="'.$row['ipdfurl'].'" target="_blank">'.$row['minvid'].'</a></td><td>'.strtoupper($row['dname']).'</td></tr>';}




  
  	?>
			
			       
        </tbody>
    </table>
	
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>

	

<script type="text/javascript">
   $("#did").val("<?php echo $_POST['dname'];?>");

	
	$(document).ready(function() {
    var table = $('#included').DataTable( {
        scrollY: 500,
        paging: false
    } );
} );

</script>

