<?php session_start();
require('includes/config.php'); 
//require __DIR__ . "/caslog/includes/config.php";
//require(__DIR__.'/../caslog/includes/config.php');
//require('caslog/includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title =  $_SESSION['uname']."&apos;s Page";
//include header template
//require('caslog/layout/headers.php'); 

//require('./caslog/layout/header.php'); 
$Userid= trim($_GET['x']);
$active = trim($_GET['y']);
$quid=$_SESSION['uid'];
echo $quid;
?>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">


<link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" rel="stylesheet">
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<link rel="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" rel="stylesheet">
	<link rel="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="style/port.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pavanam">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Droid Sans Mono", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}

</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-sand w3-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
  <img src="/images/favicon.ico" style="width:45%;" class="w3-round"><br><br>
    <h4 class="w3-padding-0"><b>PORTFOLIO</b></h4>
    <p class="w3-text-grey">Welcome <?php echo $_SESSION['uname']; ?></p>
  </div>
  <a href="#" class="w3-padding w3-text-teal">HOME</a> 
  <a href="Register New Vehicles" class="w3-padding">Register New Vehicles</a> 
  <a href="Registerd Vehicles" class="w3-padding">Registerd Vehicles</a> 
  <a href="../admin/caslog/edituser2.php?quid=<?php echo $quid;?>" class="w3-padding">EDIT YOUR INFO</a>
  <a href="#" class="w3-padding">CONTACT</a>
   
  <div class="w3-section w3-padding-top w3-large">
    <a href="#" class="w3-hover-white w3-hover-text-indigo w3-show-inline-block"><i class="fa fa-facebook-official"></i></a>
    <a href="#" class="w3-hover-white w3-hover-text-red w3-show-inline-block"><i class="fa fa-pinterest-p"></i></a>
    <a href="#" class="w3-hover-white w3-hover-text-light-blue w3-show-inline-block"><i class="fa fa-twitter"></i></a>
    <a href="#" class="w3-hover-white w3-hover-text-grey w3-show-inline-block"><i class="fa fa-flickr"></i></a>
    <a href="#" class="w3-hover-white w3-hover-text-indigo w3-show-inline-block"><i class="fa fa-linkedin"></i></a>
  </div>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
<!--<div id="banner"><img src="http://manheimas.com/images/croftonasbanner3.png" width="100%" alternate="banner"></div> -->
  <!-- Header -->
  <header class="w3-container">
    <a href="#"><img src="img_avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
   <h2> Welcome <?php echo $_SESSION['uname']; ?></h2>
 <div class="w3-section w3-bottombar w3-padding-16">
       <!--    <span class="w3-margin-right">Filter:</span> 
      <button class="w3-btn">ALL</button>
      <button class="w3-btn w3-white"><i class="fa fa-diamond w3-margin-right"></i>Design</button>
      <button class="w3-btn w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Photos</button>
      <button class="w3-btn w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Art</button>
    </div>-->
  </header>
  
  <!-- start insert-->



<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				
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
				echo ('<a href = "admin/caslog/edituser2.php?quid='.$quid.'" >Edit User Info</a>');
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
echo '<div id="" style="width:100%!important;"><table id="example" class="display responsive nowrap" cellspacing="0" width="100%">';
$quid=$GLOBALS['quid'];
//echo '<tr><td style="border:none;line-height: 2em;color:#ffffff;">.</td></tr>';
    $sdate = $row[SaleDate];
    $query2 = mysqli_query($con,"SELECT `mid`, `mvid`, `maid`, `mrid`, `muid`, `mdid`, `mvin`, `myear`, `mmake`, `mmodel`, `mcolor`, `mmileage`, `mannounce`, `mstock`, `mdetail`, `mtransport`, `mfloor`, `mrtime`, `mreqsaledate2`, `mreqsaledate`, `mstatus`, `msubstatus`, `msolddate`, `mnotes`, `msoldprice`, `mcarfax`, `mdamage`, `mmiscinfo`, `mlane`, `mrun`, `mrundate`, `mrunoutcome`, `minvId`, `marchive` FROM `newmaster` WHERE muid = $quid LIMIT 0, 5000");
	
	echo '<thead><tr>
	
<th>did</th>
<th>Req. SaleDate</th>        
<th>Vin</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Stock</th>
<th>Detail</th>
<th>Announcement</th>
<th>Transport</th>
<th>Floor</th>
<th>Status</th>


<th>Solddate</th>
<th>Sold Price</th>
 <th>InvoiceId</th>
 <th>Auction</th>
 <th>Date Submitted</th>

</tr></thead>';

echo '<tfoot><tr>

<th>did</th>
<th>Req. SaleDate</th>        
<th>Vin</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Stock</th>
<th>Detail</th>
<th>Announcement</th>
<th>Transport</th>
<th>Floor</th>
<th>Status</th>


<th>Solddate</th>
<th>Sold Price</th>
 <th>InvoiceId</th>
 <th>Auction</th>
 <th>Date Submitted</th>
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
<td>'.$row['mdetail'].'</td>
<td>'.$row['mannounce'].'</td>
<td>'.$row['mtransport'].'</td>
<td>'.$row['mfloor'].'</td>
<td>'.$row['mstatus'].'</td>
<td>'.$row['msolddate'].'</td>
<td>'.$row['msoldprice'].'</td>
<td>'.$row['minvId'].'</td>
<td>'.$row['maid'].'</td>
<td>'.$row['mrtime'].'</td>';

echo '</tr>';
	
    }
  
   //end insert
	

 echo "</tbody></table></div></div><hr>";?>















<!-- ***Analytics goes here -->






  <!--end insert -->
  <!-- Pagination
  <div class="w3-center w3-padding-32">
    <ul class="w3-pagination">
      <li><a class="w3-black" href="#">1</a></li>
      <li><a class="w3-hover-black" href="#">2</a></li>
      <li><a class="w3-hover-black" href="#">3</a></li>
      <li><a class="w3-hover-black" href="#">4</a></li>
      <li><a class="w3-hover-black" href="#">&raquo;</a></li>
    </ul>
  </div> -->
 


   Footer
    <!--  <footer class="w3-container w3-padding-32 w3-white">
 <h3>FOOTER</h3>


 <div class="w3-third">
     
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  
   <div class="w3-third">
      <h3>BLOG POSTS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="img_workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="img_gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">London</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">DIY</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Family</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Shopping</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Games</span>
      </p> 
  

  
  </footer>-->

<!-- End page content -->
<footer class="w3-main">
<div class="w3-center w3-padding-32" >
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div></div></div>
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
<script type="https://cdn.datatables.net/buttons/1.2.1/js/buttons.colVis.min.js"></script>
	
	<!-- Core Logic -->
	
	
	
	

 <script>
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'colvis'
        ]
    } );
} );
</script>
<script>
// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>