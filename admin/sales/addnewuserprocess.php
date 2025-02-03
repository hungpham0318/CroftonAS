<?php session_start();
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}



if(isset($_POST['submit'])){
   
	 
	//very basic validation
	if(strlen($_POST['username']) < 6){
		$error[] = 'Username must be at least 6 characters.';
	} else {
	     
	 $u =  $_POST['username'];
     include "../process/connecti.php";  
	  $result1= mysqli_query($con,"SELECT `username` FROM `users` WHERE `username`= '$u'");
	 
	    if(mysqli_num_rows($result1) > 0){
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
	 $eml =  $_POST['email'];
     include "../process/connecti.php";  
	  $result2= mysqli_query($con,"SELECT `email` FROM `users` WHERE `email`= '$eml'");
	 
	    if(mysqli_num_rows($result2) > 0){
	    $error[] = 'Email address provided is already in use.';
		}
	}


	//if no errors have been created carry on
	if(!isset($error)){






	$hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
$ucas = $_POST['password'];
//$hashedpassword=$_POST['password'];
//echo $ucas."</br>";
//	echo $hashedpassword;	

			$username = $_POST['username'];
				$password = $hashedpassword;
				$email = $_POST['email'];
				$active = yes;
                $uname = $_POST['ufirst']." ".$_POST['ulast'];
				$umobile = $_POST['umobile'];
				$ucas = $_POST['password'];
				$ufirst = $_POST['ufirst'];
				$ulast = $_POST['ulast'];
				$uperms = 1;
include "../process/connecti.php";
$result = mysqli_query($con,"INSERT INTO `users` (`uid`, `uname`, `email`, `umobile`, `username`, `password`, `active`, `uperms`, `ucas`, `ufirst`, `ulast`) VALUES (NULL,'$uname', '$email','$umobile','$username','$password','$active',1,'$ucas','$ufirst','$ulast')");
			

			
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else {echo "<h1 class='bg-success'>Registration successful!  </h1>";}
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
<title><?php if(isset($title)){ echo $title.$uname; }?></title>

<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css">
<?php include "stylehead-begin.html";?>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, select, input, option, dl, dt, dd, textarea, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
margin : 0;
padding : 0;
border : 0;
font-size : 1em;
font : inherit;
vertical-align : center;
display: block;
}
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
display : block;
}
table {
/*border-collapse : collapse;*/
border-spacing : 0;
margin : 0 auto;
width : 95%;
}
body {
   background-attachment: fixed;
    background-position: center;
  /*  background-image: url(/images/wideaerial-sm3.jpg);*/
    background-repeat: no-repeat;
    background-size: cover;

font-size : 16px;
font-family: 'Open Sans', sans-serif;
font: normal 16px 'Open Sans';
color : #660000;
line-height : 1em;
display : block;
margin : 0 auto;
width : 100%;
}
p {
display : block;
line-height : inherit;
}
.container-noboot, .container {
background-color: rgba(255, 255, 255, 0.95);
border-radius : 4px;
margin : 0 auto;
display : block;
width : 1024px;
max-width:1024px;
min-width:1024px;
background: rgba(255, 255, 255, 0.96);
	animation: fadein 1s;
    -moz-animation: fadein 1s; /* Firefox */
    -webkit-animation: fadein 1s; /* Safari and Chrome */
    -o-animation: fadein 1s; /* Opera */}
}
@keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:.96;
    }
}
@-moz-keyframes fadein { /* Firefox */
    from {
        opacity:0;
    }
    to {
        opacity:.96;
    }
}
@-webkit-keyframes fadein { /* Safari and Chrome */
    from {
        opacity:0;
    }
    to {
        opacity:.96;
    }
}
@-o-keyframes fadein { /* Opera */
    from {
        opacity:0;
    }
    to {
        opacity: .96;
    }









-webkit-box-shadow: -4px 5px 11px 0px rgba(60, 60, 62, 0.27);
-moz-box-shadow:    -4px 5px 11px 0px rgba(60, 60, 62, 0.27);
box-shadow:         -4px 5px 11px 0px rgba(60, 60, 62, 0.27);
}
/*
.container-noboot, .container {
background-color : #ffffff;
border-radius : 4px;
padding : 10px;
margin : 0 auto;
display : block;
width : 1024px;
max-width:1024px;
min-width:1024px;
-webkit-box-shadow: -4px 5px 11px 0px rgba(60, 60, 62, 0.27);
-moz-box-shadow:    -4px 5px 11px 0px rgba(60, 60, 62, 0.27);
box-shadow:         -4px 5px 11px 0px rgba(60, 60, 62, 0.27);
}*/

/*
@media screen and (min-width: 480px)
{.container-noboot{width: 100%;}
.container-supform{width: 100%;}
.footcontainer{width: 100%;}
#likelogin label{width: 100%;}
#likelogin input{width: 100%;}
#likelogin textarea{width: 100%;}}

@media screen and (min-width: 1224px)
{.container-noboot{width: 1024px;}
.container-supform{width: 90%;}
.footcontainer{width: 1024px;}
}

*/
.container-supform {
background-color : #ffffff;
border-radius : 4px;
padding : 0px;
min-width : 680px;
max-width : 680px;
width : 680px;
margin : 0 auto;
/*margin : 0 auto;*/
display : block;
}
tr td {
  padding: 2px 4px;
  border: #ccc solid 0px;

  display: block;
}
label,input { height: 1em;font-size: 16px;display:inline-block;border-color:#660000;}


tr{ /* border: #ccc solid 1px;
border-radius : 5px;
box-shadow : 0 1px 1px #ccc inset, 0 1px 0 #fff;*/
  display: block;
  min-width: 40px;
  margin:0 auto;
  }
input {
  padding: 5px 10px;
height: 20px;
width:180px;
/*margin : 0 auto;*/
border: #ccc solid 1px;
border-radius : 5px;
box-shadow : 0 1px 1px #ccc inset, 0 1px 0 #fff;
/*min-width: 25em;
max-width: 25em;
width:25em;
position:relative;
left:40;*/
*/
}
label {  padding: 5px 10px;
height: 30px;
/*min-width: 8em;
max-width: 8em;*/
width: 150px;
display:block;
/*position:relative;
left:0;*/
text-align:right;
white-space:nowrap;
}
.sup-form {
width : 99%;
margin:0 auto;
display:block;
font-size 1.2em;
font-weight:normal;
}
.sup-form-table {
width : 100%;
min-width:1080px;
display:block;
}
.sup-table {
margin : auto;
min-width : 960px;
}

.sup-form-table td {
display : inline-block;
}
.sup-form-table tr {

width : 98%;

}
#inputs input {
margin : 0 0 10px 0;
display : inline-block;

border : #ccc solid 1px;
border-radius : 5px;
box-shadow : 0 1px 1px #ccc inset, 0 1px 0 #fff;
}
.container-supform {
background-color : #ffffff;
border-radius : 4px;
padding : 2px;
width : 60%;
margin : 0 auto;
display : block;
}




h2 {display:block;
margin: 0 auto;
width: 80%;
font-weight:bold;}

#likelogin input
{
margin: 0 0 10px 0;
/*display:block;*/
display : inline-block;
margin: 1px;
width:350px;
 border: 1px solid #ccc;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
-webkit-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
line-height:1em;
height:3em;
border:1px solid #d2b48c;
}
#likelogin label
{display : inline-block;
margin: 1px;
width:175px;}

#likelogin textarea
{
margin: 0 0 10px 0;
/*display:block;*/
display : inline-block!important;
margin: 0 auto;
padding: 1px;
width:960px;
 border: 1px solid #ccc;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
-webkit-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
line-height:1em;
height:3em;
border:1px solid #d2b48c;
}

#likelogin input:focus
{
    background-color: #fff;
    border: 1px solid #d2b48c!important;
  outline: none;
    -moz-box-shadow: 0 0 0 2px #b0b0b0 inset!important;
    -webkit-box-shadow: 0 0 0 2px #b0b0b0 inset!important;
    box-shadow: 0 0 0 2px #b0b0b0 inset!important;
}
#likelogin {
width : 100%;
min-width:1080px;
display:block;
}


#likelogin td {
display : inline-block;
}
#likelogin tr {

width : 98%;

}
<?php include "stylehead-end.html";?>
</head>
<body>
     <div id="" style="width:100%;">


	 <?php include "../worldview/css/snow-admin-nav.html";?>
	</div>
	</br></br>
	<div style= "margin-top: 200px!important;">
<div class="container-supform" style="margin-left:0 auto;display:block;box-shadow: -3px 4px 15px 0px rgba(46, 51, 53, 0.79);">	



<form class="" method="post"  action="#"  style="width:100%;margin:auto;display:block;" >
			<br><br>
				<h2>Add New User - All fields are required. </h2>
				
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger"style="margin-left:80px;color:red!important;">'.$error.'</p>';
					}
				}
?>
			








<table id="likelogin" style="">

 <table id="likelogin" style="width:auto;margin:auto;display:block;"> 
<tr>
<td><label>First Name: </label></td><td><input type="text" name="ufirst" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['ufirst']); } ?>" tabindex="1" required></td>
</tr>
<tr>
<td><label>Last Name: </label></td><td><input type="text" name="ulast" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['ulast']); } ?>" tabindex="1" required></td>
</tr>

<tr>
<td><label>Cell Phone: </label></td><td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000" name="umobile" value="<?php if(isset($error)){ echo strip_tags($_POST['umobile']); } ?>" tabindex="2" required></td>    
</tr>




<tr>
<td><label>Email: </label></td><td> <input type="email" name="email" maxlength="250" value="<?php if(isset($error)){ echo strip_tags($_POST['email']); } ?>" tabindex="3" required></td>
</tr>


<tr>
<td><label>Choose Username:</label></td><td><input type="text" placeholder="Must contain at least 6 chararcters." title="Must have at least 6 chararcters." name="username" id="username"  value="<?php if(isset($error)){echo strip_tags($_POST['username']); }else{echo "";} ?>" tabindex="12"></td>
</tr>
<tr>

<td><label>Choose Password: </label></td><td><input type="password" name="password" id="password"  placeholder="Password" tabindex="13" value=""></td>
</tr>

<tr>
<td><label>Confirm Password &nbsp;</label></td><td><input type="password" name="passwordConfirm" id="passwordConfirm"  placeholder="Confirm Password" tabindex="14"></td>
</tr>



</table>


<!--<input class="sup-input" style="display:none" type="text" name="fakeusernameremembered">-->
<!--<input class="sup-input" style="display:none" type="password" name="fakepasswordremembered">-->
    

<input type="hidden" name="uperms" id="uperms" class="sup-input" value="1">
 
  
  

<table>
<tr>
<td style="width:33%;margin:0 auto; display:block;"></td>
<td style="width:33%;margin:0 auto; display:block;"><input type="submit" name="submit"  value="Submit" style="margin:0 auto;width:4em;height:1.8em;" class="btn btn-primary" tabindex="16">
</td>
<td style="width:33%;margin:0 auto; display:block;"></td>

</tr>
<tr>
<td style="width:25%;margin:0 auto; display:block;"></td>
<td style="width:49%;margin:0 auto; display:block;"><div ></div>
</td>
<td style="width:25%;margin:0 auto; display:block;"></td>

</tr>
</table>

</form>
</div>
<br />
</div>

</div>

	
	
	
	

</body>
</html>
