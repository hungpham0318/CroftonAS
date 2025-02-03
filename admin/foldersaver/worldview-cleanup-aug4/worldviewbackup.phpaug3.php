<?php session_start();
$title="World Home";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<title><?php echo $title;?></title>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
<link rel="stylesheet" href="../Editor/css/editor.dataTables.min.css">
		
<link rel="stylesheet" href="css/world-admin.css" type="text/css">
<link rel="stylesheet" href="css/world-login.css" type="text/css">
<link rel="stylesheet" href="css/snow-nav-admin.css">
<link rel="stylesheet" href="css/wraptable-page.css">
<link rel="stylesheet" href="css/status-key.css">
<link rel="stylesheet" href="css/substatus-key.css">

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);
body{font-family: "Roboto", sans-serif;
 font-size: 14px;}
#example{font-family: "Roboto", sans-serif;
 font-size: 14px;}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  /*background: #4CAF50;*/
   background: #660000;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #880000;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
</style>
</head>
<body>
<div class="container tablewrapper" style="display:block;">

 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{
echo'<div id="wbannerline" ><img class="worldbannerline" style="width:90%" src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" />
<div class="">';
			
include 'adminloginnew.html';
echo"</div></div>";
			
	}else{ echo'<div id="wbannerline" style="display:block;min-height:10em;">';
	echo'<div class="wbannerline">';
		include 'css/snow-admin-nav.html';
		//echo'</div><div class="worldbannerline">';
		//include 'css/status-key.html';
echo'</div></div>';
//echo'<div class="worldbannerline">';
		//include 'css/substatus-key.html';
//echo'</div><div class="worldbannerline">';
		//echo'</div><!--Close class and id-worldbannerline div-->';
	}?>
	


	
	<div id="section1" style="display:block;">
	<div id="sect1leftcol">
	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log In Here</p>';
	}else{ 
	include 'views/temphtml.html';
	//echo "</script><!-- close script from temphtml.html  -->";
	//echo "<!-- close section1  -->";
	}?> 
</div></div>
	</div>close wrapper 

</body></html>
