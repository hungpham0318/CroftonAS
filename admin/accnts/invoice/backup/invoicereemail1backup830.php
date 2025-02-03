<?php session_start();
$title="Invoice Preview";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');
}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		

$qiid=$_GET['iid'];
//$qiid=$_SESSION['emailiid'];
//echo $qiid;
$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";

include "../../process/connecti.php";

$resultit=mysqli_query($con, "SELECT * FROM invoices WHERE iid = $qiid");

// mysqli_query returns false if something went wrong with the query
if($resultit === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 38 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}
else {//echo 'line 49 <br>';
// as of php 5.4 foreach
   
foreach( $resultit as $row ) {
//$iid=$row['iid'];
$idate = $row['idate'];
$idate = $row['idate'].date("Y-m-d");
//$itotal= money_format('%i', $row['itotal']);
$itotal= $row['itotal'];
$ipdfurl=$row['ipdfurl'];
$iaid=$row['iaid'];
$idid=$row['idid'];
$idname=$row['idname'];
$idattn=$row['idattn'];
$idaddress=$row['idaddress'];
$idcitystatezip=$row['idcitystatezip'];
$idinvoiceemail=$row['idinvoiceemail'];
$iclosed =$row['iclosed'];
}}

include "../../process/connecti.php";

$resultem=mysqli_query($con, "SELECT dinvoiceemail FROM dealers WHERE did = $idid");

// mysqli_query returns false if something went wrong with the query
if($resultem === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 38 - This error invoice query  resultem </b>");
    //or die(mysql_error($con));
}
else {//echo 'line 49 <br>';
// as of php 5.4 foreach
   
foreach( $resultem as $row ) {
$newinvoiceemail = $row['dinvoiceemail'];
}}

if(empty($idinvoiceemail)){if(empty($newinvoiceemail)){echo "<br />No email address found!  <br />This invoice will only be emailed to CAS recipients!<br />  IF this is not intentional, go enter email address(es) into the Dealership Record <br /> then reopen or refresh this page.";}}
if($idinvoiceemail !== $newinvoiceemail){$idinvoiceemail = $newinvoiceemail;
echo "Email addresses have changed!<br>
The invoice record will be updated when the email is sent";








}

?>



<!DOCTYPE html>
<html>
  <head>
<title><?php echo $title;?></title>
<?php include "../../sales/stylehead-begin.html";
?>
</style>
  </head>
  <body>
  <?php 
include "../../worldview/css/snow-admin-nav.html";?>
  <table style = "width:100%"><tr><td width = "20%"></td></tr><td width = "20%"><button class = "dt-button" onclick="window.location='http://www.croftonas.com/admin/accnts/invoice/invoicereemail2.php?iid=<?php echo $qiid?>';" >Email Invoice</button>
 </td></tr><tr><td>
<iframe id = "iframe" src="<?php echo $ipdfurl;?>" width="60%" height="900px" style="valign:top;"  name="" onError="location.href='invimage.jpg'">
  <p>Your browser does not support iframes.</p>
</iframe></p></td></tr></table>



 <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script><script><script>
</body>
</html>

		
		<?php
		
		
		 } ?>
		
		


