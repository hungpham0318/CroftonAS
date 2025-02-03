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


<div style="width:100%;margin:0 auto;">
	

	    
			
				<h2 style="width:60%;margin-top:20%;margin-left:40%;margin-bottom:20%;" > Welcome <?php echo $_SESSION['uname']; ?></h2>
				
				
				
				
				
			<!--	<h2>Member only page - Welcome</br>-->
				<?php
				
				$quid=$_SESSION['uid'];
				
				?>
				</h2>
				
				
				
				
				

		
	</div>






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