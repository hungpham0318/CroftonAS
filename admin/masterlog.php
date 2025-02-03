<?php session_start();
$title="TITLE";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>


<style>
</style>
  </head>
  <body>
<h2>Simple Master Log Start</h2>
<?php
include "process/connecti.php";
 //`id`, `user`, `ausername`, `action`, `values`, `row`, `when`
 //$result = mysql_query("SELECT * FROM dealers ORDER BY dealers.dname ASC");
  $result = mysqli_query($con,"SELECT * FROM mchanges_log ORDER BY `when` DESC");
//echo '<table style="border: 1px;">'.'<tr>';
//echo '<table class="display_table">';
//echo '<table id="testTable" class="tablesorter"><thead class="display_table"><th>Page</th><th>Who</th><th>Location</th><th>Dealer Phone</th><th>SaleDay Contact</th><th>SDContact Phone</th><th>5 Million</th></thead><tbody class="display_table"></tr><tr>';

foreach($result as $row) {
    $date = new DateTime($row['when']);
   // $date=strtotime($row['when']);
    
	echo 'On '.date_format($date,"m/d").', from the '.$row['user'].' page, '.'<td>'.$row['ausername'].' '.$row['action'].'ed Id#'.$row['row'].' at '.date_format($date,"H:i:s").'<br />';
	//echo date_format($date,"Y/m/d H:i:s");
	//echo'<td>'.$row['did'].'</td>'.'<td>'.$row['dname'].'</td>'.'<td>'.$row['dcity'].'</td>'.'<td>'.$row['dphone'].'</td>'.'<td>'.$row['dcontact'].'</td>'.'<td>'.$row['dsdphone'].'</td>'.'<td>'.$row['dnumber'].'</td>'.'</tr>';
    
    }
  //  echo "</table>";
  //  echo '</span>';
       mysqli_close();
?>


<div id="lol"></div>
 <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script>
 
 
</body>
</html>



 