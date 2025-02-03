<?php session_start();
$title="Invoice Preview";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');
}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		


$qiid=$_SESSION['emailiid'];
echo $qiid;
$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";

include "../../process/connecti.php";

$resultit=mysqli_query($con, "SELECT * FROM test_invoices WHERE iid = $qiid");

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
if(isset($_POST['submit'])) {
$cc = "suzianne@croftonas.com";
//$cc = $idinvoiceemail;
//$bcc= "missyo@croftonas.com, kellyz@croftonas.com, suzanne@croftonas.com";
$bcc= "suzanne@croftonas.com";
$stylabel ='<p style="font-size:16px;font-family:Tahoma, Geneva, sans-serif;font-weight:normal;>"';

$styleinfo ='style="font-size:16px;font-family:Tahoma, Geneva, sans-serif;font-weight: 600;"';
			//send email

			$to = "suzianne@aol.com";
 			$subject = "Invoice# ".$iid." - Crofton Auction Services";
			$message = "
			<p $styleinfo>Link to Invoice</p>
			<p $styleinfo> Use this link to view, print, and save this invoice. <a href=".$ipdfurl.">$ipdfurl</a></p>
			<p $styleinfo>Invoice No:&nbsp;$iid</p>
			<p $styleinfo>Invoice Date:&nbsp;$idate</p>
			<p $styleinfo>Emailed to :&nbsp;$idinvoiceemail</p>
			<p $styleinfo>Amount:&nbsp;$itotal</p>
			
			
			<p $styleinfo>From:</p>
			<p $styleinfo>$company</p>
			<p $styleinfo>$address</p>
			<p $styleinfo>$address2</p>
			<p $styleinfo>$email</p>
			<p $styleinfo>$telephone</p>";
			// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <croftona@croftonas.com>' . "\r\n";
$headers .= 'ReplyTo: receivables@croftonas.com' . "\r\n";
$headers .= "Cc:".$cc."\r\n";
$headers .= "Bcc:".$bcc."\r\n";
mail($to,$subject,$message,$headers);
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>




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
  <table style = "width:100%"><tr><td width = "20%"></td></tr><td width = "20%"><button class = "dt-button" onclick="window.location='http://www.croftonas.com/admin/accnts/invoice/finalemailinvoice.php';" >Email Invoice</button>
 </td></tr><tr><td>
<iframe id = "iframe" src="<?php echo $ipdfurl;?>" width="60%" height="900px" style="valign:top;"  name="" onError="location.href='invimage.jpg'">
  <p>Your browser does not support iframes.</p>
</iframe></p></td></tr></table>



 <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script><script><script>
</body>
</html>

		
		<?php } ?>
		
		


