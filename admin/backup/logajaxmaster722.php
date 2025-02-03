<?php
include "process/connecti.php";
 //`id`, `user`, `ausername`, `action`, `values`, `row`, `when`
 //$result = mysql_query("SELECT * FROM dealers ORDER BY dealers.dname ASC");
  $result = mysqli_query($con,"SELECT * FROM mchanges_log ORDER BY `when` DESC");
echo '<table style="border: 1px;">'.'<tr>';
//echo '<table class="display_table">';
//echo '<table id="testTable" class="tablesorter"><thead class="display_table"><th>Page</th><th>Who</th><th>Location</th><th>Dealer Phone</th><th>SaleDay Contact</th><th>SDContact Phone</th><th>5 Million</th></thead><tbody class="display_table"></tr><tr>';

foreach($result as $row) {
    $date = new DateTime($row['when']);
   // $date=strtotime($row['when']);
    
	echo '<tr><td>'.$row['ausername'].' '.$row['action'].'ed Id#'.$row['row'].' at '.date_format($date,"h:i:s a").' on '.date_format($date,"m/d").', from '.$row['user'].'.</td></tr>';
	//echo date_format($date,"Y/m/d h:i:s");
	//echo'<td>'.$row['did'].'</td>'.'<td>'.$row['dname'].'</td>'.'<td>'.$row['dcity'].'</td>'.'<td>'.$row['dphone'].'</td>'.'<td>'.$row['dcontact'].'</td>'.'<td>'.$row['dsdphone'].'</td>'.'<td>'.$row['dnumber'].'</td>'.'</tr>';
    
    }
 echo "</table>";
  //  echo '</span>';
       mysqli_close($con);
?>
