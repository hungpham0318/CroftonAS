<?php
//$did =$_POST['did'];
$did = $_GET['did'];

include "../process/connecti.php";
$sql='SELECT count(mid) as invkount FROM master WHERE mstatus = "S" AND msubstatus LIKE "%Inv-No%" AND mdid = 1018';
//$sql = 'SELECT count(mid) as invkount FROM master WHERE mstatus = \"S\" AND msubstatus LIKE \"%Inv-No%\" AND mdid =1018';
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result))
{ 
  echo $row['count(mid)'];
}

?>
