<?php session_start();
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); } 

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
	
		header('Location: /index.php');
		exit;
	

	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}

}//end if submit

//define page title
$title = 'Login';

//include header template
require('layout/headerss.php'); 
//require('layout/nav_www-caslog.php'); 
?>

	
<div class="container"></br>

	
<h2><div class="logindiv"  margin: auto;">
	    
			<form style="width:80%; padding: 2em;" role="form" method="post" id="login" action="" autocomplete="off">
				<h2 style='color:#810323;'>Please Login</h2>
				<p></p>
				<hr></br>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 style='color:#801323;'>Your account is now active you may now log in.</h2></br>";
							break;
						case 'reset':
							echo "<h2 style='color:#801323;'>Please check your inbox for a reset link.</h2></br>";
							break;
						case 'resetAccount':
							echo "<h2 style='color:#801323;'>Password changed, you may now login.</h2></br>";
							break;
					}

				}

				
				?>
    
<div style="width: 50%; margin: auto;">
				<h2>.</h2>
    	<fieldset id="inputs">
    	<input id="username" type="text" placeholder="Username" class ="" name="username" autofocus  value="<?php if(isset($error)){ echo $_POST['username']; } ?>">   
    	<input id="password" type="password" placeholder="Password" name="password" >
    	</fieldset>
    	<fieldset id="actions">
        <input type="submit" id="submit" value="Login" name="submit"  class="pure-button" tabindex="5">
       </fieldset>
       
       
       
       

		<!-- <h2><div style="width: 50%; margin: auto;">
		<input type="text" name="username" id="username" class="" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</br></div></br>
				<div class="">
				<input type="password" name="password" id="password" class="" placeholder="Password" tabindex="3">
				</div></br>
					<div class="">
					<div class="col-xs-9 col-sm-9 col-md-9"><span style="font-size: .7em; margin:auto;">
					 <a href='reset.php'>Forgot your Password?</a></br>
					</span></div></br>
				</div>-->
				<!--<div style="width: 50%; margin: auto;">
					<div class=""><input type="submit" name="submit" value="Login" class="pure-button" tabindex="5"></div>
				</div></h2>-->
			</form>
		</div>
	</div>
</div>


<?php 
//include header template
require('layout/footer.php'); 
?>
