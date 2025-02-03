<?php
	include "../process/connecti.php";
	$did=mysqli_real_escape_string( $con, $_POST['did']);
	$dname= strtoupper(mysqli_real_escape_string($con, $_POST['dname']));
	$dnumber = mysqli_real_escape_string($con, $_POST['dnumber']);
	$dcity = strtoupper(mysqli_real_escape_string($con, $_POST['dcity']));
	$dcontact = strtoupper(mysqli_real_escape_string($con, $_POST['dcontact']));
	$dphone= mysqli_real_escape_string($con, $_POST['dphone']);
	$dsdphone= mysqli_real_escape_string($con, $_POST['dsdphone']);
	$dmailAcctNum = strtoupper(mysqli_real_escape_string($con, $_POST['dmailAcctNum']));
	$dnotes = strtoupper(mysqli_real_escape_string($con, $_POST['dnotes']));
	$daddress = strtoupper(mysqli_real_escape_string($con, $_POST['daddress']));
	$dstate = strtoupper(mysqli_real_escape_string($con, $_POST['dstate']));
	$dzip = strtoupper(mysqli_real_escape_string($con, $_POST['dzip']));
	$dinvoiceemail = $_POST['dinvoiceemail'];
$dattn = strtoupper(mysqli_real_escape_string($con, $_POST['dattn']));


	$update=mysqli_query($con, "UPDATE `dealers` SET `did`= $did, `dname`='$dname', `dnumber`='$dnumber',`dcity`='$dcity',`dcontact`='$dcontact',`dphone`='$dphone',`dsdphone`='$dsdphone', `dmailAcctNum` ='$dmailAcctNum', `dnotes` ='$dnotes', `daddress` ='$daddress', `dstate` = '$dstate', `dzip` ='$dzip', `dinvoiceemail` = '$dinvoiceemail', `dattn` = '$dattn' WHERE did = $did") ;
	if($update === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 19 of editdealerfrominvoicingupdate.php - Oops, something went wrong</b>");
    //or die(mysql_error($con));
	//echo "Dealer Was Successfully Updated....";

	}else{
	mysqli_close($con);
 header('Location: ../sales/steponehtmljs.php');}

	//echo $did;
//	echo "Record Updated! <br/><br/>";
	//echo '<button style="background-color: #660000;color:#ffffff;font-size: 1em; height:2.4em;padding:10px!important;" onclick="goBack()">Back to Invoicing</button>';
	echo '<script>

function goBack() {
   // window.history.back();
    location.href = "/admin/sales/steponehtmljs.php";
}
    

</script>'; 
?>


