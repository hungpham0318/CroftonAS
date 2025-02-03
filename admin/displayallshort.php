<?php session_start();
//admin/displayallindexed.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="css/admin.css" type="text/css" />
		<link rel="stylesheet" href="css/display.css" type="text/css" />
		
		<link rel="stylesheet" href="../purebuttons.css" type="text/css" />
		<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

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
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'incmenu.htm';
	}?>
	
	</div>


		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
include "process/connect.php";
 
$result = mysql_query("SELECT * 
FROM dealers, ud_relate, users
WHERE ud_relate.u_id = users.uid
AND ud_relate.d_id = dealers.did
AND ud_relate.u_id >8
ORDER BY dealers.dname ASC, ud_relate.u_id ASC



LIMIT 0 , 500");
echo '<table id="testTable"class="display_table"><tr><th>D id</th><th>Dealer Name</th><th>Dealer Phone</th><th>U_id</th><th>User Full Name</th><th>User Phone</th><th>User Email</th></tr><tr>';
 while($row = mysql_fetch_array($result))
    {
    echo '<td>'.$row['did'].'</td>'.'<td>'.$row['dname'].'</td>'.'<td> '.$row['dphone'].' </td>'.'<td> '.$row['uid'].' </td>'.'<td>'." ".$row['uname'].'</td>'."  ".'<td>'.$row['umobile'].'</td>'.'<td>'.$row['email'].'</td>'.'</tr>';
    }


    echo "</table></body></html>";
       mysql_close();
      
}
//session_destroy();
?>  <!-- end insert -->
       



</div></br>
<br><input type="button" class="pure-button button-success" onclick="tableToExcel('testTable', 'UserRelatives')" value="Export to Excel">

</div></br>


</body>
</html>