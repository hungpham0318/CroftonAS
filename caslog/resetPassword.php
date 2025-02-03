<?php require('includes/config.php'); 

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); } 

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM users WHERE resetToken = :token');
$stmt->execute(array(':token' => $_GET['key']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//if no token from db then kill the page
if(empty($row['resetToken'])){
	$stop = 'Invalid token provided, please use the link provided in the reset email.';
} elseif($row['resetComplete'] == 'Yes') {
	$stop = 'Your password has already been changed!';
}

//if form has been submitted process it
if(isset($_POST['submit'])){

	//basic validation
	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//if no errors have been created carry on
	if(!isset($error)){
		$ucas = $_POST['password'];
		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		try {

			$stmt = $db->prepare("UPDATE users SET password = :hashedpassword, ucas = :ucas, resetComplete = 'Yes'  WHERE resetToken = :token");
			$stmt->execute(array(
				':hashedpassword' => $hashedpassword,
				':ucas' => $ucas,
				':token' => $row['resetToken']
			));

			//redirect to index page
			header('Location: login.php?action=resetAccount');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Reset Password';

//include header template
//require('layout/headerss.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>Reset Account</title>
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/normalize.css">	
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<link rel="stylesheet" href="/caslog/css/cas.css" type="text/css"> 
<link rel="stylesheet" href="/caslog/css/cas-btn.css" type="text/css">	
	<link rel="stylesheet" href="/caslog/css/casbase.css" type="text/css"> 	
		
		
		<link href="./images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

</head>
<body style="margin:0; background:#550000;">

<div class="whowrap60">
	
		<div id="banner">
<img src="/images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
	<?php require "includes/navcontents.html"; ?>
	</div>
	


		<div class="mymiddleboth6040">



	    	<?php if(isset($stop)){

	    		echo "<p class='bg-danger'>$stop</p>";

	    	} else { ?>

				<form  class="" role="form" method="post" action="" autocomplete="off">
					<h2>Change Password</h2>
					<hr>

					<?php
					//check for any errors
					if(isset($error)){
						foreach($error as $error){
							echo '<p class="bg-danger">'.$error.'</p>';
						}
					}

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
					}
					?>

					
							<div class="form-group">
								<input type="password" name="password" id="password" class="" placeholder="Password" tabindex="1">
						</div>
						
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="" placeholder="Confirm Password" tabindex="1">
							</div>
						
					
					
					<hr>
					<div class="mymiddle30ems">
						<input type="submit" name="submit" value="Change Password" class="mymiddle30ems btn button-primary" tabindex="3"></div>
					</div>
				</form>

			<?php } ?>
		</div>
	</div>

	


<div class="footcontainer" >
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>
</body>
<html>


