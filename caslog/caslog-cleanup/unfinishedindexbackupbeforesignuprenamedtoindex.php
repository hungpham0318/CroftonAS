<?php session_start();
require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: /index.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	//very basic validation
	if(strlen($_POST['username']) < 6){
		$error[] = 'Username must be at least 6 characters.';
	} else {
		$stmt = $db->prepare('SELECT username FROM users WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = 'Username provided is already in use.';
		}

	}

	if(strlen(strip_tags($_POST['password'])) < 6){
		$error[] = 'Password must be at least 6 characters.';
	}

	if(strlen(strip_tags($_POST['passwordConfirm'])) < 6){
		$error[] = 'Confirm password must be at least 6 characters.';
	}

	if(strip_tags($_POST['password']) != strip_tags($_POST['passwordConfirm'])){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var(strip_tags($_POST['email']), FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM users WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}


	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO users (username,password,email,active,uname,umobile,ucompany,uperms) VALUES (:username, :password, :email, :active, :uname, :umobile, :ucompany, :uperms)');
			$stmt->execute(array(
				':username' => strip_tags($_POST['username']),
				':password' => $hashedpassword,
				':email' => strip_tags($_POST['email']),
				':active' => $activasion,
                ':uname' => $_POST['uname'],
				':umobile' => $_POST['umobile'],
				':ucompany' => $_POST['ucompany'],
				':uperms' => $_POST['uperms']
			));

			$suid = $db->lastInsertId('uid');
			$susername = strip_tags($_POST['username']);
			$semail = strip_tags($_POST['email']);
			$susername =strip_tags($_POST['username']);
            $suname = $_POST['uname'];
			$sumobile = $_POST['umobile'];
			$sucompany = $_POST['ucompany'];
			$superms = $_POST['uperms'];
			//send email

			$to = "newreg@manheimas.com";
 			$subject = "Registration Confirmation";
			$body = "<p>Please review and activate this new user</p>
			<p>To review this user's information, and activate this user</p><p> please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p><p>Regards Site Admin</p><br><p><br>Username:$susername<br></p><br>id:$suid<br><br>FullName:$suname<br><br>Mobile:$smobile<br><br>Company:$sucompany<br><br>Active:$active<br><br>Permissions:$uperms<br><br>";


			$mail = new Mail();

			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Sign Up!';

//include header template


require('layout/rheaders.php'); 


?>


<div class="container-noboot">
	<div id="banner">
			<img src="/images/croftonasbanner3.png" alt="crofton auction services banner for website" />
	</div>
<div id="navigation">
	<?php require "includes/navcontents.html"; ?>
	
	
	
</div>
	

			<form role="form" method="post" action="" autocomplete="off">
				<h2>Please Sign Up</h2>
				<h2>Already a member? <a href='login.php'>Login</a></h2>
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				//if action is joined show success
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}
				?>
<div class="container">	

<div class="form-group">

<input style="display:none" type="text" name="fakeusernameremembered"/>
<input style="display:none" type="password" name="fakepasswordremembered"/> 
</div>
<div class="row"> 
<div class="col-md-6 col-md-6">
<div class="form-group">
<input type="text" name="uname" id="uname" class="form-control input-lg" placeholder="Full Name" value="<?php if(isset($error)){ echo strip_tags($_POST['uname']); } ?>" tabindex="1">
</div>

<div class="form-group">
<input type="text" name="umobile" id="umobile" class="form-control input-lg" placeholder="Cell" value="<?php if(isset($error)){echo strip_tags($_POST['umobile']); } ?>" tabindex="2">
</div>
</div>


<div class="col-md-6 col-md-6">
<div class="form-group">
<input type="text" name="ucompany" id="ucompany" class="form-control input-lg" placeholder="Your Company Name" value="<?php if(isset($error)){ echo strip_tags($_POST['ucompany']); } ?>" tabindex="3">
</div>

<div class="form-group">
<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){echo strip_tags($_POST['email']); } ?>" tabindex="5">
</div>
</div>


<div class="row col-md-6 col-md-6">		
<div class="form-group">
<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username(no spaces)" value="<?php if(isset($error)){echo strip_tags($_POST['username']); }else{echo "";} ?>" tabindex="4">
</div>
</div>


<div class="row col-md-6 col-md-6">	
<div class="form-group">
<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="6" value="">
</div>
					
<div class="form-group">
<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="7">
</div>
</div>
<div class="form-group">
<input type="hidden" name="uperms" id="uperms" class="form-control input-lg" placeholder="uperms" value="1">
</div>


<div class="row">
<div class=" col-md-6 col-md-6">
<input type="submit" name="submit" value="Register" class="pure-button " tabindex="8">
</div>
</div>
<!--<div class="row">
<div class=" col-md-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="8">
</div>-->
</div></form>
</div>


<div class="footcontainer" >
<p>Crofton Auction Services</p>
<p>5 Park Place Suite 519</p>
<p>Annapolis, MD&nbsp;&nbsp;21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>

 
   <!-- -- jQuery (necessary for Bootstraps JavaScript plugins) -->
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

</script>
</body>
</html>
