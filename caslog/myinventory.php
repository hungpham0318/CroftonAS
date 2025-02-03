<?php session_start();
require('includes/config.php'); 
//require __DIR__ . "../caslog/includes/config.php";
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
	
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">


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
	 <!--<link rel="stylesheet" href="../admin/worldview/css/status-key.css" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
	
	<style>body{font-family: 'Inconsolata', monospace;}
.sortablehidden	select{max-width:200px!important;display:none;}
#example{width:100%!important;text-transform:uppercase;}
table.dataTable, table.dataTable th, table.dataTable select {max-width:16em!important;}
table.dataTable, table.dataTable th, table.dataTable td {max-width:16em!important;}
.btn {width:192px;}
td{overflow:hidden;}
</style>
</head>
<body><div id="maincontainer" class="container" style="width:1170px!important">
	<div class="containerheaderlayout">
	<div id="banner">
<img src="/images/banner4.png" alt="crofton auction services banner for website" />
</div>
<!--<button onclick="myBigger()">+</button>-->
<div id="navigation">
	<?php include"includes/navcontents.html";?>
	 </div> 
<div>
	<div class="row">

	<!--	<h2> Welcome <?php //echo $_SESSION['uname']; ?></h2>
				</p>-->
				
			<!--	<h2>Member only page - Welcome</br>-->
				<?php
				
				$quid=$_SESSION['uid'];
				
				?>
				</h2>
	</div>
<?php 
	
//begin insert
include "../admin/process/connecti.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//<!--table id="example" class="display responsive nowrap" cellspacing="0"   style="width:100%!important;font-size: 1em;"-->

$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
echo '<div id="table-scroll" style="width:100%!important;font-family:Roboto Mono, monospace!important;font-size: .86em;"><table id="example" class="display responsive nowrap" cellspacing="0" >';
$quid=$GLOBALS['quid'];
    $sdate = $row[SaleDate];
   
		 $query2 = mysqli_query($con,"SELECT * FROM master LEFT JOIN i_charges ON  (master.mid=i_charges.ic_mid) LEFT JOIN invoices ON (master.minvid = invoices.iid)  LEFT JOIN dealers ON (master.mdid = dealers.did) WHERE master.muid = $quid AND master.marchive = 0 LIMIT 0, 10000");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	
            
echo '<thead><tr style="width:99%!important;font-family:Roboto Mono, monospace!important;font-size: 1em;">
<th>Submitted</th>
<th>Vin</th>
<th>Status</th>
<th>Solddate</th>
<th>Year</th>
<th>Make</th>
<th>Dealer</th>
<th>Model</th>
<th>Stock</th>


<th>Sold Price</th>
<th>Sale&apos;s Net</th>
<th>Invoice</th>
<th>Invoice Item</th>

<th>Detail</th>
<th>Announcement</th>
<th>Transport</th>





      
</tr></thead>';

echo '<tfoot><tr style="width:99%!important;font-family:Roboto Mono, monospace!important;font-size: 1em;">




<th class="sortablehidden"></th>
<th class="sortablehidden">VIN</th>
<th class="sortablehidden">Status</th>
<th class="sortablehidden">Sold Date</th>
<th class="sortablehidden">Year</th>
<th class="sortablehidden">Make</th>
<th style=""></th>
<th class="sortablehidden">Model</th>
<th class="sortablehidden">Stock</th>

<th style="display:none;">Sold Price</th>
<th style="display:none;">Sale&apos;s Net</th>
<th style="display:none;">Invoice</th>
<th style="display:none;">Invoice Item</th>

<th style="display:none;">Detail</th>
<th style="display:none;">Announcement</th>
<th style="display:none;">Transport</th>





</tr></tfoot><tbody class="display_table">';
	
    while($row = mysqli_fetch_array($query2)) {
    $vehid = $row['mid'];
   
	echo '<tr>
	<td>'.date("m/d/Y", strtotime($row['mrtime'])).'</td>
	
	
	
	<td>'.$row['mvin'].'</td>
	<td>'.$row['mstatus'].'</td>
	<td>'.$row['msolddate'].'</td>
	<td>'.$row['myear'].'</td>
<td>'.$row['mmake'].'</td>
<td>'.$row['dname'].'</td>
<td>'.$row['mmodel'].'</td>
<td>'.$row['mstock'].'</td>





<td>'.$row['msoldprice'].'</td>
<td>'.$row['msalesnet'].'</td>

<td><a href="'.$row['ipdfurl'].'" target="_blank">'.$row['minvid'].'</a></td>
<td>'.$row['ic_description'].'</td>

<td>'.$row['mdetail'].'</td>
<td>'.$row['mannounce'].'</td>
<td>'.$row['mtransport'].'</td>';


echo '</tr>';
	//<td>'.substr($row['mrtime'],5,6).'-'.substr($row['mrtime'],0,4).'</td>
    }
  
   //end insert
	

 echo "</tbody></table>";

 include "../admin/worldview/css/status-key.html";
 echo"</div></div>";?>


<?php //include "../admin/worldview/css/status-key.html";?>

<!--</table> </div></div>-->

<!--<div class="footcontainer"><br>
<p>Crofton Auction Services</p>
<p>5 Park Place, Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p><br>
</div>-->

 	
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <!--script type="text/javascript" charset="utf8" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script--> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!-- BootStrap -->
    <script type="text/javascript" charset="utf8" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- DataTables -->
	
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
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



$.fn.dataTableExt.oApi.clearSearch = function ( oSettings )
{


$(clearSearch).click( function ()
{
  
});
};

function myBigger() {
document.getElementById("maincontainer").style.width = "1870px";
   document.getElementById("example").style.width = "1624px";
}

function mySmaller() {
    
  
	document.getElementById("maincontainer").style.width = "1170px";
   document.getElementById("example").style.width = "1024px";
}

 $(document).ready(function() {
    $('#example').DataTable( {
    //   "order": [[ 2, "asc" ]],
        "order": [[ 0, 'desc' ], [ 2, 'asc' ], [ 3, 'asc' ]],
      dom: "Bfrtip",
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">ALL YOUR DEALERSHIPS</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
       "iDisplayLength": 10,
 lengthMenu: [
  [ 10, -1, 20, 50, ],
   [ 'Show 10', 'Show All', 'Show 20', 'Show 50' ]
   ],
   buttons: [
        
        
     'pageLength'
   ],
    
    "rowCallback": function ( row, data ) { 
//$('td', row).attr('nowrap','nowrap');
$('td', row).css('text-transform', 'Uppercase','white-space','nowrap');
 $('dtr-data', row).css('text-transform', 'Uppercase','white-space','nowrap');
}
        
    
    
    
        
    } );
 
} );
</script>






<!-- ***Analytics goes here -->
</body>
</html>