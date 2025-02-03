<?php require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: ../index.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM users WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(empty($row['email'])){
			$error[] = 'We do not recognize that email address. Please use the email you provided for receipt of registration email. Click the Contact Us button and send us a message if you need help.';
		}

	}

	//if no errors have been created carry on
	if(!isset($error)){

		//create the activasion code
		$token = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("UPDATE users SET resetToken = :token, resetComplete='No' WHERE email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $token
							));

			//send email
			//$to = $row['email'];
			$temail = $row['email'];
			$to = "suzanne@suzianne.net";
			$subject = "Password Reset";
			$body = "<p>Someone requested that your password be reset.</p>
			<p> If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a>'$temail'</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: login.php?action=reset');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Reset Account';

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

<title><?php if(isset($title)){ echo $title.$uname; }?></title>
<link rel="stylesheet" type="text/css" href="/admin/worldview/css/normalize.css">	
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="/caslog/css/casbase.css" type="text/css"> 

<link rel="stylesheet" href="/caslog/css/cas.css" type="text/css"> 
<link rel="stylesheet" href="/caslog/css/cas-btn.css" type="text/css">	
<!-- 
<link rel="stylesheet" href="/common/css/caslogin.css" type="text/css">-->
<!-- 
<link rel="stylesheet" href="/common/css/caslogloginbegin.css" type="text/css"> -->
<!-- 
<link rel="stylesheet" href="/common/css/home.css" type="text/css">-->
<!-- 
<link rel="stylesheet" href="/common/css/login.css" type="text/css">-->
<!-- -->	

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




	    
			<form role="form" method="post" action="" autocomplete="off">
				<h4 style="text-align:center;">Reset Password<br><br><br><br>
				Enter the email address associated with your account, and a reset link will be sent to that email.<br><br><br> </h4>

				
				<hr>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p><br><br><br>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h4 class='bg-success'>Your account is now active you may now log in.</h4>";
							break;
						case 'reset':
							echo "<h4 class='bg-success'>Please check your inbox for a reset link.</h4>";
							break;
					}
				}
				?>

				<div class="form-group" style="margin:0 auto;padding:.5em .1em .5em .1em;text-align:center!important;display:block;">
					<input type="email" name="email" style="font-family: 'Open Sans' sans-serif;" id="email" placeholder="Email Address" value="" tabindex="1">
				

				<hr>
				
				
				<input type="submit" name="submit" value="Send Reset Link" class="btn btn-primary" tabindex="2">
				</div>
			</form>
	
</div>
</div>

<div class="whofoot60" >
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#550000;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>
</body>
</html>
