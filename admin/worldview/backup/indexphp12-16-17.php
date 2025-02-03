<?php session_start();
$title="World Home";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		$aperms=$_SESSION['perms'];
		$mssge=$_GET['msg'];
if($mssge === 'You_do_not_have_permission_to_view_that_page'){$messge = 'Your Login does not provide permission to view that page.';}}?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<title><?php echo $title;?></title>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
<link rel="stylesheet" href="../../Editor16/css/editor.dataTables.min.css">
		
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

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin-top: -35%;
    padding: 20px;
  /*  border: 1px solid #888; */
    width: 90%;
    font-size: .8em;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

</style>
</head>
<body>

	    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container tablewrapper" style="display:block;">

 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{
echo'<div id="wbannerline" ><img class="worldbannerline" style="width:100%" src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" />
<div class="">';
			
include 'adminloginnew.html';
echo"</div></div>";
			
	}
	else{
	$aperms = $_SESSION['perms'];
	echo "Your current permission level is: ".$aperms."<br/>";
         echo $messge;
	 if($aperms == 1){
	
	
	echo'<div id="wbannerline" style="display:block;min-height:10em;">';
	echo'<div class="wbannerline">';
		include 'css/snow-shop-nav.html';
//include 'css/status-key.html';
		//include 'css/substatus-key.html';
		//echo'</div><div class="worldbannerline">';
		//include 'css/status-key.html';
echo'</div></div>';
}else{ if($aperms == 2){
	echo'<div id="wbannerline" style="display:block;min-height:10em;">';
	echo'<div class="wbannerline">';
		include 'css/snow-pr-nav.html';
    
}else if($aperms >= 3){
	echo'<div id="wbannerline" style="display:block;min-height:10em;">';
	echo'<div class="wbannerline">';
		include 'css/snow-admin-nav.html';}
//include 'css/status-key.html';
		//include 'css/substatus-key.html';
		//echo'</div><div class="worldbannerline">';
		//include 'css/status-key.html';
echo'</div>

  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Link trigger modal -->
     <button style = "float:right;font-size: .8em; color:#440000;"class="button dt-button ">
<a href="../logajaxmaster.php" data-toggle="modal" data-target="#myModal3" data-remote="false" class="">
 Change Log
</a></button>

<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:20%;margin-left:80%; z-index:3;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h5>(All me using different admin logins)</h5><br />
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel3">Master Table Changes Log</h4>
      </div>   
       <div class="modal-body">
       <div id="LiveFeed" class="modal-body">
       <p style = "font-size: 1em;" id="masterlog"></p>
      
      </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
</div>';
//echo'<div class="worldbannerline">';
		//include 'css/substatus-key.html';
//echo'</div><div class="worldbannerline">';
		//echo'</div><!--Close class and id-worldbannerline div-->';
	}}?>
	


	
	<div id="section1" style="display:block;">
	<div id="sect1leftcol">
	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p style="display:none;">Log In Here</p>';
	}else{ 
	//include 'views/temphtml.html';
	//echo "</script><!-- close script from temphtml.html  -->";
	//echo "<!-- close section1  -->";
	}?> 
</div></div>
	</div>

 <script> 

 if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var home = document.getElementById("home").getElementsByTagName('a')[0];
home.className = 'btn-current';
}


function loadDoc() {

  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("masterlog").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../logajaxmaster.php", true);
  xhttp.send();
}
     loadDoc();

var refInterval = window.setInterval('loadDoc()', 30000);  

function myFunction() {
    var x = document.getElementById('masterlog');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}



// Fill modal with content from link href
$("#myModal3").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load(link.attr("href"));
});
</script>
</body></html>
