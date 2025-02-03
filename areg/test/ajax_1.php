<?php
$qdid = $_GET['did'];
include "../../admin/process/connecti.php";
$result = mysqli_query($con, "SELECT drepfee, drepfeedesc FROM dealers WHERE did = $qdid");
if($result === false){echo "oops".mysqli_error($con);
}
Foreach($result as $row){
$drepfee =  $row['drepfee'];
$drepfeedesc = $row['drepfeedesc'];
}
echo '<input name = "drepfee" type = "text" value ="'.$drepfee.'" >';
echo '<input name = "drepfeedesc" type = "hidden" value ="'.$drepfeedesc.'" >';

echo '<iframe id = "iframe" src="../../admin/accnts/invoice/preview/1037.pdf" width="100%" height="1024px" style="valign:top;" >';


?>