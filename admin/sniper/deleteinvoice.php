<?php session_start();
$title="Invoice Killer";
$pageperms =4;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
$ainitials=$_SESSION['ainitials'];
$auid=$_SESSION['auid'];
if($aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{	}}?>

<!DOCTYPE html>
<html>
    <?php include "../sales/stylehead-begin.html";?>
<?php include "../sales/stylehead-end.html";?>
<body style = "width:90%">
 <div class="container tablewrapper" style="display:block;">
    <?php include "../worldview/css/snow-admin-nav.html";?>
    

</br>
</br><h2>Delete an Invoice</h2> </br></br>
 <h3>When deleting an invoice, five significant tasks are performed:
 <ul><li>1. The item charges for the invoice are deleted.</li>
<li>2. The invoice record is deleted.</li>
<li>3. The vehicles remain in Sold Status but the substatus is changed to "Inv-No"  which will cause them to be shown in the invoicing view again.</li>
<li>4. The invoice number is removed from the vehicle record.</li>
<li>5. The pdf is removed from the invoice "bunker" and sent to a separate area where inaccurate invoices go to die.  </li></ul></h3>
 
 </h3>
<form id = "findinv" action="deleteinvoice.php" method="POST" onsubmit="findinv()" >
Enter Invoice Number: <input id="findiid" name="findiid" tabindex="1" required></br></br>
Enter Dealer ID: <input id="finddid" name="finddid" tabindex="2" required>
</br></br>
<input type="submit">
</form>
<?php
if(isset($_POST['findiid']) ){

$deletedid = $_POST['finddid'];

$deleteiid = $_POST['findiid'];
include "../process/connecti.php";
$result = mysqli_query($con, "UPDATE master_copy SET minvid = 0, msubstatus = 'Inv-No' WHERE minvid = $deleteiid");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

include "../process/connecti.php";
$result1 = mysqli_query($con, "SELECT * FROM invoices_copy WHERE iid = $deleteiid ");



foreach($result1 as $row){
echo '</br>Invoice #: '.$row['iid'];
echo '</br>Dealer Id: '.$row['idid'];
echo '</br>Invoice Total: '.$row['itotal'];
echo '</br>Dealer Name: '.$row['idname'];
echo '</br>Invoice Date: '.$row['idate'];

echo '</br>Invoice #: '.$row['idinvoiceemail'];


    
}
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }}
?>
<form id = "delinv" action="deleteinvoice.php" method="POST" onsubmit="delinv()" >
Enter Invoice Number: <input id="deleteiid" type = "hidden" value = "<?php echo $deleteiid";?> name="deleteiid" tabindex="1" required></br></br>
Enter Dealer ID: <input id="deletedid" type = "hidden" value = "<?php echo $deletedid":?> name="deletedid" tabindex="2" >
</br></br>
<input type="submit">
</form>
<?php
if(isset($_POST['deleteiid']) ){
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
function delinv() {
   confirm("Are you 100% SURE?");
    document.getElementsByName("delinv")[0].submit();
}

function findinv() {
 
    document.getElementsByName("findinv")[0].submit();
}
</script>

</body>
</html>