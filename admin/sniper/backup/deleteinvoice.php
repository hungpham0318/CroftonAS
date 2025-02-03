<!DOCTYPE html>
<html>
<body>
    </br></br> </br></br>
<form id = "delinv" action="deleteinvoice.php" method="POST" onsubmit="myFunction()" >
Enter Invoice Number: <input id="deleteiid" name="deleteiid" tabindex="1" required></br></br>
Enter Dealer ID: <input id="deletedid" name="deletedid" tabindex="2" required>
</br></br>
<input type="submit">
</form>
<?php
if(isset($_POST['deleteiid']) ){

$deletedid = $_POST['deletedid'];

$deleteiid = $_POST['deleteiid'];
include "../process/connecti.php";
$result = mysqli_query($con, "UPDATE master_copy SET minvid = 0, msubstatus = 'Inv-No' WHERE minvid = $deleteiid");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





include "../process/connecti.php";
$result = mysqli_query($con, "DELETE FROM invoices_copy WHERE iid = $deleteiid AND idid = $deletedid");



if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  include "../process/connecti.php";
$result = mysqli_query($con, "DELETE FROM `i_charges_copy` WHERE ic_iid = $deleteiid ");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $filename1 = '../accnts/invoice/bunkertest/'.$deletedid.'.'.$deleteiid.'.pdf';
  echo $filename1;
  echo '</br>';
  $filename2 = '../accnts/invoice/testdeleted/'.$deletedid.'.'.$deleteiid.'-deleted.pdf';
  
  echo $filename2;
  rename($filename1, $filename2);
    echo '</br>';
  echo 'SUCCESSFULLY DELETED Invoice number: '.$deleteiid;
}
?>

<script>
function myFunction() {
   confirm("Are you 100% SURE?");
    document.getElementsByName("delinv")[0].submit();
}
</script>

</body>
</html>