<?php session_start();
require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: /index.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){
//require "capture.php";

function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdumSQUAAAAACxUY3dfY8PQP1IF0ybxL9ZapfzS',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo '<p>Please make sure you check the security CAPTCHA box.</p><br>';
die();
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        //echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }




















// end capture.php
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
		$initactpsd = strip_tags($_POST['password']);
		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));
//add uid is null
$nuid="null";

		try {

			//insert into database with a prepared statement
			


			$stmt = $db->prepare('INSERT INTO users(username,password,email,active,uname,ufirst,ulast,umobile,uaddress,ucity,ustate,uzip,ufax,uofficeph,ucompany,unotes,ucas,uperms) VALUES (:username, :password,:email, :active,:uname, :ufirst, :ulast, :umobile, :uaddress, :ucity, :ustate, :uzip, :ufax, :uofficeph, :ucompany, :unotes, :ucas, :uperms)');
			$stmt->execute(array(
				
				':username' => $_POST['username'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':active' => $activasion,
                		':uname' => $_POST['ufirst']." ".$_POST['ulast'],
				':umobile' => $_POST['umobile'],
				':uaddress' => $_POST['uaddress'],
				':ucity' => $_POST['ucity'],
				':ustate' => $_POST['ustate'],
				':uzip' => $_POST['uzip'],
				':ufax' => $_POST['ufax'],
				':uofficeph' =>$_POST['uofficeph'],
				':ucompany' => $_POST['ucompany'].",".$_POST['aanumber'],
				':unotes' => $_POST['unotes'],
				':ucas' => $_POST['password'],
				':ufirst' => $_POST['ufirst'],
				':ulast' => $_POST['ulast'],
				':uperms' => $_POST['uperms']
			));

			$id = $db->lastInsertId('uid');
			$username = $_POST['username'];
			$password = $hashedpassword;
			$email = strip_tags($_POST['email']);
			$aanumber =strip_tags($_POST['aanumber']);
			$dname =strip_tags($_POST['ucompany']);
            		$uname = $_POST['uname'];
			$umobile = $_POST['umobile'];
			$ucompany = $_POST['ucompany'];
			$uactive=$_POST['active'];
			$unotes = $_POST['unotes'];
			$duassoc = $_POST['aanumber'].', Dealership: '.$_POST['ucompany'];
			$uaddress = $_POST['uaddress'];
			$ucity = $_POST['ucity'];
			$ustate = $_POST['ustate'];
			$uzip = $_POST['uzip'];
			$uperms = $_POST['uperms'];
			$ufax = $_POST['ufax'];
			$ucas = $_POST['ucas'];
				$uofficeph = $_POST['uofficeph'];
$stylabel ='<p style="font-size:14px;font-family:Tahoma, Geneva, sans-serif;font-weight:normal;>"';

$styleinfo ='style="font-size:14px;font-family:Tahoma, Geneva, sans-serif;font-weight: 600;"';
			//send email

			$to = "suzanne@croftonas.com";
 			$subject = "Registration Confirmation";
			$body = "<p $styleinfo>Please review and activate this new user</p>
			<p $styleinfo>A new user has requested webiste access. Review the information below and use this link to activate this user please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p><p $styleinfo>User Id:&nbsp;$id</p><p $styleinfo>Full Name:&nbsp;$uname</p><p $styleinfo>Email:&nbsp;$email</p><p $styleinfo>Phone:&nbsp;$umobile</p><p $styleinfo>Company:&nbsp;$ucompany</p><p $styleinfo>Office:&nbsp;$uofficeph</p><p $styleinfo>Fax:&nbsp;$ufax</p><p $styleinfo>Notes:&nbsp;$unotes</p><p> Reference:&nbsp;$initactpsd - $username - $duassoc</p>";

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


//require('layout/rheaders.php'); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
<title><?php if(isset($title)){ echo $title.$uname; }?></title>
<!--<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!--<link rel="stylesheet" href="/common/css/loginuser.css" type="text/css" />-->
<link rel="stylesheet" href="/common/css/caslog-index-signup.css" type="text/css">
 <link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css">	
<!--<link rel="stylesheet" href="/common/css/caslogin.css" type="text/css">
<link rel="stylesheet" href="/common/css/caslogloginbegin.css" type="text/css" /> -->
<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<script src='//www.google.com/recaptcha/api.js'></script>
</head>
<body style="width:1024px;margin:0 auto;display:block;">
<div class="container-noboot">
	<div id="banner">
			<img src="/images/banner4.png" alt="crofton auction services banner for website" />
	</div>
<!--<div id="navigation" style="width:60%;margin-left:20%;">-->

<div id="navigation" style="/*width:60%;margin-left:20%;*/">
	<?php require "includes/navcontents.html"; ?>
	</div>
	
<div class="container-supform" style="margin:0 auto;display:block;box-shadow: -3px 4px 15px 0px rgba(46, 51, 53, 0.79);">	
			<form class="sup-form" method="post"  autocomplete="on"    style="width:100%;margin:auto;display:block;">
			<br><br>
				<h2>Provide your information below. Fields marked with * are required. </h2>
				
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
					echo "<h2 class='bg-success'>Registration successful!  We will contact you to complete your registration.  Watch your Email..</h2>";
				}
				?>




<!-- ** -->



<table id="likelogin" style="">

 <!-- <table id="likelogin" style="width:auto;margin:auto;display:block;"> -->
<tr>
<td><label>*First Name: </label></td><td><input type="text" name="ufirst" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['ufirst']); } ?>" tabindex="1" required></td>
</tr>
<tr>
<td><label>*Last Name: </label></td><td><input type="text" name="ulast" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['ulast']); } ?>" tabindex="1" required></td>
</tr>

<tr>
<td><label>*Cell Phone: </label></td><td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" name="umobile" value="<?php if(isset($error)){ echo strip_tags($_POST['umobile']); } ?>" tabindex="2" required></td>    
</tr>




<tr>
<td><label>*Email: </label></td><td> <input type="email" name="email" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['email']); } ?>" tabindex="3" required></td>
</tr>

<tr>
<td><label>Dealership:</label></td><td><input type="text" title="Please enter a Dealership Name.  Include additional dealerships and access numbers in the message area at the end of this form" name="ucompany" value="<?php if(isset($error)){ echo strip_tags($_POST['ucompany']); } ?>" tabindex="4" >
</td>
</tr>


<tr>
<td><label>Auction Access No.:</label></td><td><input type="text" class="sup-input" title="AA number for the Dealership above." name="aanumber" placeholder="(For Dealership above)" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['aanumber']); } ?>" tabindex="5"></td>
</tr>


<tr>
<td><label>Office:</label></td><td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" name="uofficeph" value="<?php if(isset($error)){ echo strip_tags($_POST['uofficeph']); } ?>" tabindex="10" ></td>
</tr>
<tr>
<td><label>Fax:</label></td><td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" name="ufax" value="<?php if(isset($error)){ echo strip_tags($_POST['ufax']); } ?>" tabindex="11" ></td>
</tr>


<tr>
<td><label>*Choose Username:</label></td><td><input type="text" placeholder="Must contain at least 6 chararcters." title="Must have at least 6 chararcters." name="username" id="username"  value="<?php if(isset($error)){echo strip_tags($_POST['username']); }else{echo "";} ?>" tabindex="12"></td>
</tr>
<tr>

<td><label>*Choose Password: </label></td><td><input type="password" name="password" id="password"  placeholder="Password" tabindex="13" value=""></td>
</tr>

<tr>
<td><label>*Confirm Password &nbsp;</label></td><td><input type="password" name="passwordConfirm" id="passwordConfirm"  placeholder="Confirm Password" tabindex="14"></td>
</tr>
<!--
<input type="hidden" name="uname" maxlength="250" value="<?php //if(isset($error)){ echo strip_tags($_POST['ufirst']."&nbsp;".strip_tags($_POST['ulast']); } ?>" >
-->

<input type="hidden" name="uaddress" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['uaddress']); } ?>" >





<input type="hidden" name="ucity" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['ucity']); } ?>"   >
<input type="hidden" name="ustate"  value="<?php if(isset($error)){ echo strip_tags($_POST['ustate']); } ?>"  >

<input type="hidden" name="uzip" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['uzip']); } ?>"  >



</table>


<!--<input class="sup-input" style="display:none" type="text" name="fakeusernameremembered">-->
<!--<input class="sup-input" style="display:none" type="password" name="fakepasswordremembered">-->
    

<input type="hidden" name="uperms" id="uperms" class="sup-input" value="1">
 
  
<table style="width:650px;display:block;margin:0 auto;"><tr style="width:600px;display:block;margin:0 auto;"><td>
<label style="width:50px;">Message:</label></td><td style=""><textarea cols="64" rows="5" class="sup-input" style ="border:1px solid #660000;" title="Include the dealership names and AA Numbers for any additional dealerships you represent" name="unotes" placeholder="Please include the dealership names and Auction Access Numbers for any additional dealerships you represent" maxlength="250" tabindex="15" ></textarea></td>
</tr></table>
<table>
<tr>
<td style="width:33%;margin:0 auto; display:block;"></td>
<td style="width:33%;margin:0 auto; display:block;"><input type="submit" name="submit"  value="Register" style="margin:0 auto;width:4em;height:1.8em;" class="btn btn-primary" tabindex="16">
</td>
<td style="width:33%;margin:0 auto; display:block;"></td>

</tr>
<tr>
<td style="width:25%;margin:0 auto; display:block;"></td>
<td style="width:49%;margin:0 auto; display:block;"><div class="g-recaptcha" data-sitekey="6LdumSQUAAAAAOK2z0rLvfn5sVPn2fHqS7wBNE-R"></div>
</td>
<td style="width:25%;margin:0 auto; display:block;"></td>

</tr>
</table>

</form>
</div>
<br />
</div>


<div class="footcontainer" >
<p>Crofton Auction Services</p>
<p>5 Park Place Suite 519</p>
<p>Annapolis, MD&nbsp;&nbsp;21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>

 
   <!--  jQuery (necessary for Bootstraps JavaScript plugins) -->
  <script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-1.12.3.js"></script>
 <!--script type="text/javascript" charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script--> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!-- BootStrap -->
    <script type="text/javascript" charset="utf-8" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- DataTables -->
	
	
	
	
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
