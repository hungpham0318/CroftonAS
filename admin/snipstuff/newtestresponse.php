<?php
//include db configuration file
include_once("../process/connecti.php");

//MySQLi query
$results = $mysqli->query("SELECT ic_id, ic_mid, ic_did FROM test_i_charges_temp");
//get all records from add_delete_record table
while($row = $results->fetch_assoc())
{
  echo '<li id="item_'.$row["ic_id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["ic_id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  echo $row["ic_mid"].'</li>';
}

//close db connection
$mysqli->close();
?>