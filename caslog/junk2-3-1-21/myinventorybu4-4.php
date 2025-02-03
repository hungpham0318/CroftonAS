<?php session_start();
require('includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 
$quid = $_SESSION['uid'];

//define page title
$title =  $_SESSION['uname']."&apos;s Page";

//include header template
//require('caslog/layout/headers.php'); 

//require('./caslog/layout/header.php'); 
$Userid= trim($_GET['x']);
$active = trim($_GET['y']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">


<link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" rel="stylesheet">
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<link rel="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" rel="stylesheet">
	<link rel="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" rel="stylesheet">
	<!--<link rel="stylesheet" href="/common/css/home.css" rel="stylesheet">-->
 <!--	<link rel="stylesheet" href="/caslog/style/main.css" rel="stylesheet">-->
	<link rel="stylesheet" href="/common/css/sb-btn.css" rel="stylesheet">	
	<link rel="stylesheet" href="/common/css/userlanding.css" rel="stylesheet">
	<!--<link rel="stylesheet" href="admin/css/admin.css" rel="stylesheet">-->
	
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
</head>
<body><div class="container">
	<div class="containerheaderlayout">
	<div id="banner">
<img src="/images/banner4.png" alt="crofton auction services banner for website" />
</div>



<!--<a class="pure-button" href="/areg/stepone.php">Register Vehicles</a>-->



<div id="navigation">
	<?php include"includes/navcontents.html";?>
	 </div> 


<div>
	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2> Welcome <?php echo $_SESSION['uname']; ?></h2>
				</p>
				
				
				
				
			<!--	<h2>Member only page - Welcome</br>-->
				<?php
				
				$quid=$_SESSION['uid'];
				
				?>
				</h2>
				
				
				
				
				

		</div>
	</div>
<?php 
	
//begin insert
include "../admin/process/connecti.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//<!--table id="example" class="display responsive nowrap" cellspacing="0"   style="width:100%!important;font-size: .8em;"-->

$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
echo '<div id="table-scroll" style="width:90%!important;font-family:Roboto Mono, monospace!important;font-size: .86em;"><table id="example" class="display responsive nowrap" cellspacing="0" >';
$quid=$GLOBALS['quid'];
//echo '<tr><td style="border:none;line-height: 2em;color:#ffffff;">.</td></tr>';
    $sdate = $row[SaleDate];
   // $query2 = mysqli_query($con,"SELECT `mid`, `mvid`, `maid`, `mrid`, `muid`, `mdid`, `mvin`, `myear`, `mmake`, `mmodel`, `mcolor`, `mmileage`, `mannounce`, `mstock`, `mdetail`, `mtransport`, `mfloor`, `mrtime`, `mreqsaledate2`, `mreqsaledate`, `mstatus`, `msubstatus`, `msolddate`, `mnotes`, `msoldprice`, `mcarfax`, `mdamage`, `mmiscinfo`, `mlane`, `mrun`, `mrundate`, `mrunoutcome`, `minvId`, `marchive` FROM `master` WHERE muid = $quid LIMIT 0, 5000");
	//$query2 = mysqli_query($con,"SELECT * FROM `master`, `invoices` WHERE master.muid = $quid AND master.minvid = invoices.iid LIMIT 0, 5000");
	 // $query2 = mysqli_query($con,"SELECT * FROM `master`, `invoices`, `i_charges` WHERE master.muid = $quid AND master.minvid = invoices.iid AND i_charges.ic_mid = master.mid LIMIT 0, 5000");
	 //$query2 = mysqli_query($con,"SELECT * FROM `master`LEFT JOIN `invoices` ON master.minvid=invoices.iid JOIN i_charges ON invoices.iid = i_charges.ic.iid WHERE master.muid = $quid LIMIT 0, 5000");
	 //$query2 = mysqli_query($con,"SELECT * FROM `master` LEFT JOIN `i_charges` ON  `master.mid`=`i_charges.ic_mid` JOIN `invoices` ON `master.minvid`=`invoices.iid` WHERE `master.muid` = $quid LIMIT 0, 5000");
		 $query2 = mysqli_query($con,"SELECT * FROM master LEFT JOIN i_charges ON  (master.mid=i_charges.ic_mid) LEFT JOIN invoices ON (master.minvid = invoices.iid)  LEFT JOIN dealers ON (master.mdid = dealers.did) WHERE master.muid = $quid AND master.marchive = 0 LIMIT 0, 10000");
	
	
	echo '<thead><tr>
<th>Vin</th>
<th>Status</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Stock</th>
<th>Date Submitted</th>
<th>Floor</th>
<th>Sold Price</th>
<th>Solddate</th>
<th>Invoice</th>
<th>Invoice Item</th>
<th>Dealer</th>
<th>Detail</th>
<th>Announcement</th>
<th>Transport</th
      
</tr></thead>';

echo '<tfoot><tr>
<th>Vin</th>
<th>Status</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Stock</th>
<th>Date Submitted</th>
<th>Floor</th>
<th>Sold Price</th>
<th>Solddate</th>
<th>Invoice</th>
<th>Invoice Item</th>
<th>Dealer</th>
<th>Detail</th>
<th>Announcement</th>
<th>Transport</th>
</tr></tfoot><tbody class="display_table">';
	
    while($row = mysqli_fetch_array($query2)) {
    $vehid = $row['mid'];
   
	echo '<tr>
	<td>'.$row['mvin'].'</td>
	<td>'.$row['mstatus'].'</td>
	<td>'.$row['myear'].'</td>
<td>'.$row['mmake'].'</td>
<td>'.$row['mmodel'].'</td>
<td>'.$row['mstock'].'</td>
<td>'.date("m/d/Y", strtotime($row['mrtime'])).'</td>



<td>'.$row['mfloor'].'</td>
<td>'.$row['msoldprice'].'</td>
<td>'.$row['msolddate'].'</td>

<td><a href="'.$row['ipdfurl'].'" target="_blank">'.$row['minvid'].'</a></td>
<td>'.$row['ic_description'].'</td>
<td>'.$row['dname'].'</td>

<td>'.$row['mdetail'].'</td>
<td>'.$row['mannounce'].'</td>
<td>'.$row['mtransport'].'</td>';


echo '</tr>';
	//<td>'.substr($row['mrtime'],5,6).'-'.substr($row['mrtime'],0,4).'</td>
    }
  
   //end insert
	

 echo "</tbody></table></div></div><hr>";?>





</table> </div></div>
<div class="footcontainer"><br>
<p>Crofton Auction Services</p>
<p>5 Park Place, Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p><br>
</div>

 	
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script>
 <!--script type="text/javascript" charset="utf8" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script--> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!-- BootStrap -->
    <script type="text/javascript" charset="utf8" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- DataTables -->
	
	
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.colVis.min.js"></script>
	
	<!-- Core Logic -->
	
	
	
	

 <script> 

 if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var home = document.getElementById("home").getElementsByTagName('a')[0];
home.className = 'btn-current';
}
 $(document).ready(function() {
    $('#example').DataTable( {
    
      dom: 'Bfrtip',
    lengthMenu: [
        [ 10, -1, 25, 50, ],
        [ 'Show 10', 'Show All', 'Show 25', 'Show 50' ]
    ],
    buttons: [
        
        
        'pageLength'
    ]
    
    
    
    
        
    } );
 
} );
</script>






<!-- ***Analytics goes here -->
</body>
</html>