<?php session_start();
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ if ($_SESSION['uspecial'] === "PR"){header('Location: /priority/adesa/registration.php');}else{header('Location: /caslog/userlanding.php'); } }

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
	$username = $_SESSION['username'] ;
	$uname = $_SESSION['uname'];
	$email = $_SESSION['email'];
	$umobile = $_SESSION['umobile'] ;
	$uid = $_SESSION['uid'];
	if ($_SESSION['uspecial'] === "PR"){header('Location: /priority/adesa/registration.php');}else{header('Location: /caslog/userlanding.php'); }
	//	header('Location: /caslog/userlanding.php');
		exit;
	

	} else {
		$error[] = 'Wrong username or password  -or-  your account has not yet been activated.';
	}

}//end if submit

//define page title
$title = 'User Log In';

?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
<title><?php if(isset($title)){ echo $title.$uname; }?></title>
  <!--  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">-->
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		 <!--    <link rel="stylesheet" href="/common/css/caslogloginbegin.css" type="text/css" />-->
  <link rel="stylesheet" href="/common/css/loginuser.css" type="text/css" />
		 <!--  <link rel="stylesheet" href="/common/css/caslogin.css" type="text/css" />-->
		<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"">	
		
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>

<body style="width:1024px;margin:0 auto;display:block;min-width:1024px!important;max-width:1024px;">
<div class="container-noboot" >
	
<div id="banner">
<img src="/images/banner4.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
<?php require "./includes/navcontents.html"; ?>
	</div>
</br>


<form class="clasfrm2"style="max-width:450px;display:block;margin:auto; border:1px solid #ccc; " role="form" method="post" id="login" action="" autocomplete="off">
<h2>Welcome</h2>
<hr>
<?php
		//check for any errors
		if(isset($error)){
		foreach($error as $error){
echo '<div class="errorwrap"><div class=""><p class="bg-danger"><span style="display:block;margin:0 auto; width:90%;text-align:center;background-color:transparent;">'.$error.'</span></p></div></div>';
		}
		}
		if(isset($_GET['action'])){
		//check the action
		switch ($_GET['action']) {
			case 'active':
echo '<div class="errorwrap"><div class=""><h2 class="bg-success">Your account is now active; you may now log in.</h2></div></div>';
				break;
				case 'reset':
echo '<div class="errorwrap"><div class=""><h2 class="bg-success">Please check your inbox for a reset link.</h2></div></div>';
				break;
				case 'resetAccount':
echo '<div class="errorwrap"><div class=""><h2 class="bg-success">Password changed, you may now login.</h2></div></div>';
				break;
				}
				}
?>
<fieldset id="inputs">


<input id="username" style="margin:0 auto; width:300px;" type="text" placeholder="Username"  name="username" value="<?php if(isset($error)){ echo $_POST["username"];}?>">   
    	<br><br>

    	<input  id="password"  style="margin:0 auto; width:300px;"type="password" placeholder="Password" name="password" >
    	<br>
<hr>
    	<fieldset id="actions" style="width:15em;">
        <input type="submit"  id="submit" value="Log In" name="submit" class="btn btn-primary" autofocus>
       </fieldset>
<div class="forgpwd" >
		 <a href='reset.php' class="forgpwd" >Forgot your Password?</a>
</div>
   </fieldset><br>   

      
       	</form>
		
       <br><br>
       

		<!-- <h2><div style="width:450px; margin: auto;">
		<input type="text" name="username" id="username" class="" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</br></div></br>
				<div class="">
				<input type="password" name="password" id="password" class="" placeholder="Password" tabindex="3">
				</div></br>
					<div class="">
					<div class=""><span style="font-size: .7em; margin:auto;">
					 <a href='reset.php'>Forgot your Password?</a></br>
					</span></div></br>
				</div>-->
				<!--<div style="width: 50%; margin: auto;">
					<input type="submit" name="submit" value="Login" class="btn btn-primary" tabindex="5"></div>
				</div></h2>-->
		

	

</div> 
</div>
<!--<div class="footcontainer" style="width:1024px!important;;margin:0 auto;display:block;min-width:1024px!important;"> -->

<div class="footcontainer" style="width:1024px!important;;margin:0 auto;display:block;min-width:1024px!important;max-width:1024px!important;">
<p>Crofton Auction Services</p>
<p>5 Park Place</p>
<p>Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color:#801323;text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>

</div>
 </div>

 
   <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.3.js"></script>
 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!-- BootStrap -->
    <script type="text/javascript" charset="utf8" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
