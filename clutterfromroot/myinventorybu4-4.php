<?php session_start();
require('./caslog/includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: caslog/login.php'); } 
$quid = $_SESSION['uid'];
echo "quid: ".$quid;
//define page title
$title =  $_SESSION['uname']."&apos;s Page";
echo $title;
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
</head>
<body>
	<div class="containerheaderlayout">
	<div id="banner">
<img src="/images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>

line 19</br>quid:

<div class="container" style="">
<!--<a class="pure-button" href="/areg/stepone.php">Register Vehicles</a>-->



<div id="navigation">
	
	<div class="btn-toolbar" role="toolbar" aria-label="...">
	<div class="btn-group"><a href="/userlanding.php" title="" class="btn btn-primary">User Home</a></div>
	<div class="btn-group"><a href="contactus.php" title="Contact Form which has user info pre-filled" class="btn btn-primary">Contact Us</a></div>
  	
 
 <div class="btn-group"><a href="/areg/stepone.php" class="btn btn-primary">Register Vehicles</a></div>
	<div class="btn-group"><a href="/caslog/memberpage.php" class="btn btn-primary ">TBD User</a></div>
	<div class="btn-group"><a href="/memberpage.php" class="btn btn-primary">View/Edit Your Info</a></div>
	<div class="btn-group"><a href="/caslog/logout.php" class="btn btn-primary">Log Out</a></div>
        
 
 <div class="btn-group"><a href="/caslog/index.php" title="Sign me up!" class="btn btn-primary">Sign Me Up!</a></div>

  </div>

	
	
	
	

	 </div> 


<div>











	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2> Welcome <?php echo $_SESSION['uname']; ?></h2>
				</p>
				
				
				
				
			<!--	<h2>Member only page - Welcome</br>-->
				<?php echo ($_SESSION['uname'].' id: '.$_SESSION['uid'].'</br></h2>');
				echo ($_SESSION['email'].'</br>');
				echo ('FullName: '.$_SESSION['uname'].'</br>');
				echo ('Address: '.$_SESSION['uaddress'].'</br>');
				echo ($_SESSION['ucity'].', '.$_SESSION['ustate'].' '.$_SESSION['uzip'].'</br>');
				echo ('Mobile: '.$_SESSION['umobile'].'</br>');
				echo ('Fax: '.$_SESSION['ufax'].'</br>');
				echo ('OfficePhone: '.$_SESSION['uofficePh'].'</br>');
				echo ('Company: '.$_SESSION['ucompany'].'</br>');
				echo ('Active: '.$_SESSION['active'].'</br>');
				echo ('Notes: '.$_SESSION['unotes'].'</br>');
				echo ('Permissions: '.$_SESSION['uperms'].'</br>');
				
				
				$quid=$_SESSION['uid'];
				echo "</br>line 52</br>quid: " .$quid;
				echo ('<a href = "admin/caslog/edituser2.php?quid='.$quid.'" class="btn btn-primary" >Edit User Info</a>');
				?>
				</h2>
				
				
				
				
				

		</div>
	</div>
<?php 
	
//begin insert
include "admin/process/connecti.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//<!--table id="example" class="display responsive nowrap" cellspacing="0"   style="width:100%!important;font-size: .8em;"-->

$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
echo '<div id="table-scroll" style="width:100%!important;"><table id="example" class="display responsive nowrap" cellspacing="0" width="100%">';
$quid=$GLOBALS['quid'];
//echo '<tr><td style="border:none;line-height: 2em;color:#ffffff;">.</td></tr>';
    $sdate = $row[SaleDate];
    $query2 = mysqli_query($con,"SELECT `mid`, `mvid`, `maid`, `mrid`, `muid`, `mdid`, `mvin`, `myear`, `mmake`, `mmodel`, `mcolor`, `mmileage`, `mannounce`, `mstock`, `mdetail`, `mtransport`, `mfloor`, `mrtime`, `mreqsaledate2`, `mreqsaledate`, `mstatus`, `msubstatus`, `msolddate`, `mnotes`, `msoldprice`, `mcarfax`, `mdamage`, `mmiscinfo`, `mlane`, `mrun`, `mrundate`, `mrunoutcome`, `minvId`, `marchive` FROM `newmaster` WHERE muid = $quid LIMIT 0, 5000");
	
echo '<thead><tr>
	
<th>Dealership</th>
<th>Requested Sale Date</th>        
<th>VIN</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Stock</th>
<th>Floor</th>
<th>Status</th>

<th>Solddate</th>
<th>Sold Price</th>
 <th>InvoiceId</th>
 <th>removethis</th>
 <th>Date Submitted</th>
<th>Announcement</th>
<th>Transport</th>
 <th>Detail</th>
 

</tr></thead>';

echo '<tfoot><tr>
<th>Dealership</th>
<th>Requested Sale Date</th>        
<th>VIN</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Stock</th>
<th>Floor</th>
<th>Status</th>

<th>Solddate</th>
<th>Sold Price</th>
 <th>InvoiceId</th>
 <th>removethis</th>
 <th>Date Submitted</th>
<th>Announcement</th>
<th>Transport</th>
 <th>Detail</th>
 </tr></tfoot><tbody class="display_table">';
	
    while($row = mysqli_fetch_array($query2)) {
    $vehid = $row['mid'];
	echo '<tr>
		
	<td>'.$row['mdid'].'</td>
	<td>'.$row['mreqsaledate'].'</td>
	<td>'.$row['mvin'].'</td>
	<td>'.$row['myear'].'</td>
<td>'.$row['mmake'].'</td>
<td>'.$row['mmodel'].'</td>
<td>'.$row['mstock'].'</td>
<td>'.$row['mfloor'].'</td>
<td>'.$row['mstatus'].'</td>
<td>'.$row['msolddate'].'</td>
<td>'.$row['msoldprice'].'</td>
<td>'.$row['minvId'].'</td>
<td>'.date_format($row['mrtime'],'m d Y').'</td>
<td>'.$row['mannounce'].'</td>
<td>'.$row['mtransport'].'</td>
<td>'.$row['mdetail'].'</td>';
echo '</tr>';
	
    }
  
   //end insert
	

 echo "</tbody></table></div></div><hr>";?>




<!--<?php include'admin/caslog/layout/footer.php';?>-->

<div class="footcontainer" style="width:100%;" >
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>
</div>

 </div>
 	</table>
  <!--  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> -->
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
        buttons: [
            'colvis'
        ]
    } );
 
} );
</script>






<!-- ***Analytics goes here -->
</body>
</html>