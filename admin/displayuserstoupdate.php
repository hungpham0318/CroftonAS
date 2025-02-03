<?php session_start();
//admin/displayallindexed.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Display Users</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<link rel="stylesheet" href="css/admin.css" type="text/css" />
		
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js">
</script>
<script>
$(document).ready(function(){
$("#loaddata").click(function(){ 
txtname=$("#txtinput").val();
txtlocation=$("#txtlocation").val();
$.ajax({url:"post_test.php",data:{name:txtname, location: txtlocation },success: function(ajaxresult){
$("#ajaxrequest").html(ajaxresult);
}});
});
$("#cleardata").click(function(){
$("#ajaxrequest").empty();
$('#interpret input[type="text"]').val('');
$('#interpret input[type="password"]').val('');
});

});

</script>
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,', template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>


<div id="navigation">
 	<a class="pure-button" href="index.php">Admin Home</a>
	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{echo '<a class="pure-button" href="process/logout.php">Log Out</a>';
	//echo '<a class="pure-button button-success" href="displayusers.php">Users</a>';
	//echo '<a class="pure-button" href="displaydealers.php">Dealers</a>';
	//echo '<a class="pure-button " href="displayallshort.php">Relatives</a>';
	//echo '<a class="pure-button " href="displayallcrofton.php">Crofton Relatives</a>';
	
	}?>
</div>
	
	
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
include "process/connect.php";?>



 
<?php $result = mysql_query("SELECT * FROM users");




echo '<table id="testTable" class="display_table"><tr><th>uid</th><th>Users Full Name</th><th>Phone</th><th>Username</th><th>Email</th><th>.........................</th></tr><tr>';


 while($row = mysql_fetch_array($result))
    {
     	//$key = 'cas2013mdSB';
     	//$key = $_SESSION['apassword'];
	//$string = $row['upassword'];
//$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
//$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");


    echo '<td>'.$row['uid'].'</td>'.'<td>'.$row['uname'].'</td>'.'<td>'.$row['umobile'].'</td>'.'<td>'.$row['uusername'].'</td>'.'<td>'.$row['uemail'].'</td>'.'<td><span style="font-size:1em;color:#ffffff;">'.$row['upassword'].'</span></td>'.'</tr>';
    }
    echo "</table>";
       mysql_close();
       
      
 
//echo '</br></br><div id="interpret"><div id="interpdirs">';
//echo '</br></br>';
//echo 'Click the secret code three times in rapid succession to select.<br> Drag the selection to the field. Type the magic word and Tada!<br><br><br><div id="ajaxrequest"></div></div>';
//echo '<div id="interpfields">';
//echo 'Enter Secret Code: <input type="text" id="txtlocation"><br><br>';


//echo 'Enter your magic word: <input type="password" id="txtinput"style="width: 150px;";><br><br><br>';
//echo '<button id="loaddata" style="margin-left: 100px;" class="pure-button">Tada!</button><button id="cleardata" class="pure-//button">Make it disappear!</button></div></div></br></br></br>';
//echo '<div id="ajaxrequest"></div></br></br></br></br></div>';
echo '<br><input type="button" class="pure-button button-success" onclick="';
echo "tableToExcel('testTable', 'User List')";
echo '"value="Export to Excel">';
echo '</div>';}?>
</body></html>