<?php session_start(); 
require('includes/config.php'); 
//require __DIR__ . "/../caslog/includes/config.php";
//require(__DIR__.'/../caslog/classes/config.php');



//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/headerss.php'); 
//require('layout/nav_www-caslog.php'); 
?>

<div class="container">

	<div class="row">

	    <!-- <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> -->
			
				<h2>Member only page - Welcome</br>
				<?php echo ($_SESSION['username'].' id: '.$_SESSION['uid'].'</br></h2>');
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
				
				
				
				
				
				?></h2>
				
				
				<p><a href='logout.php'>Logout</a></p>
				<hr>

		</div>
	</div>




<?php 
//include header template
require('layout/footer.php'); 
?>
