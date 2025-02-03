<?php session_start();
//admin/displaybydate.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>
		
		<link rel="stylesheet" href="../../admin/css/jquery.dataTables.min.css" type="text/css" />
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<!--<link rel="stylesheet" href="../css/display.css" type="text/css" />-->
		<!--<link rel="stylesheet" href="../css/dbd.css" type="text/css" />-->
		<link rel="stylesheet" href="../../common/css/purebuttons.css" type="text/css" />
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		
		<link href="../../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 

<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script> 
<style>

.display_table {text-transform:uppercase;
overflow:auto!important;}
.container {width:100%; overflow:auto!important;}</style>
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
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>


<div id="navigation">
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'incmenumanage.htm';
	}?>
	
	</div></br></br></br>
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
		//begin insert
include "../process/connect.php";
$query = mysql_query("SELECT `txtVIN`,`txtYear`,`txtMake`,`txtModel` FROM `v_record` WHERE 1");
echo '<table id="example" class="display" cellspacing="0" width="90%">';
echo '<thead><tr><th>VIN</th><th>Year</th><th>Make</th><th>Model</th></tr></thead>';

echo '<tfoot><tr><th>VIN</th><th>Year</th><th>Make</th><th>Model</th></tr></tfoot><tbody>';
  
while ($row = mysql_fetch_array($query)){
//echo '<tr><td style="border:none;line-height: 2em;color:#ffffff;">.</td></tr>';
echo '<tr><td>'.$row['txtVIN'].'</td><td>'.$row['txtYear'].'</td><td>'.$row['txtMake'].'</td><td>'.$row['txtModel'].'</td></tr>';


    
  
   
	
 }
 echo "</tbody></table></body></html>";  
 mysql_close();
      
}
//session_destroy();
?>  <!-- end insert -->



</div></br>
<br><input type="button" class="pure-button button-success" onclick="tableToExcel('testTable', 'Registrations by Date')" value="Export to Excel">

</div></br>


</body>
</html>