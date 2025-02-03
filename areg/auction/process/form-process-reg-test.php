<?php session_start();
                //prevent access if they haven't submitted the form.
                 if (!isset($_POST['submit'])) {
                     die(header("Location: registration.php"));
                 }
                 session_start();
                 $_SESSION['formAttempt'] = true;
                 if (isset($_SESSION['error'])) {
                     unset($_SESSION['error']);
}              $required=array("dname","inpSDName","inpSaleDate","inpYourName","inpYourEmail","inpYourPhone","inpDPhone","txtPrice1","txtPrice2","txtPrice3","txtPrice4","txtPrice5","txtPrice6","txtPrice7","txtPrice8","txtPrice9","txtPrice10");
                 $_SESSION['error'] = array();
                 //Check required fields
                 foreach ($required as $requiredField) {
                     if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {$_SESSION['error'][] = $requiredField. " is required.";
		} }
      //final disposition
      if (!isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
          die(header("Location:registration.php"));
      } else {
      $inpVIN1 = $_POST['txtVIN1'];
$inpVIN2 = $_POST['txtVIN2'];
$inpVIN3 = $_POST['txtVIN3'];
$inpVIN4 = $_POST['txtVIN4'];
$inpVIN5 = $_POST['txtVIN5'];
$inpVIN6 = $_POST['txtVIN6'];
$inpVIN7 = $_POST['txtVIN7'];
$inpVIN8 = $_POST['txtVIN8'];
$inpVIN9 = $_POST['txtVIN9'];
$inpVIN10 = $_POST['txtVIN10'];
//$auction= $_GET['auction'];

$rdate = new DateTime(date('Y-m-d h:i:s'));
$rtime = date_format($rdate, 'Y-m-d H:i:s');
$mauction = 'MANHEIM PA';
$maid = 1;
include '../../common/msqcon.php';
$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //echo $rtime;

$msdname = mysqli_real_escape_string($con,strtoupper($_POST['dname']));
$msuid = mysqli_real_escape_string($con,$_POST['uid']);
$msdid = mysqli_real_escape_string($con,$_POST['did']);
$msauction = mysqli_real_escape_string($con,'MANHEIM PA');
$maid = mysqli_real_escape_string($con,1);
	
	$inpFiveMilNum= mysqli_real_escape_string($con,$_POST['inpFiveMilNum']);
	$inpYourEmail= mysqli_real_escape_string($con,$_POST['inpYourEmail']);
	$inpSaleDate= mysqli_real_escape_string($con,$_POST['inpSaleDate']);
	$inpYourName=mysqli_real_escape_string($con,strtoupper($_POST['inpYourName']));
	$inpSDContact= mysqli_real_escape_string($con,strtoupper($_POST['inpSDContact']));
	$inpDPhone= mysqli_real_escape_string($con,$_POST['inpDPhone']);
	$inpYourPhone=mysqli_real_escape_string($con,$_POST['inpYourPhone']);
	$inpemailtextarea=mysqli_real_escape_string($con,$_POST['inpemailtextarea']);
	$SDate = mysqli_real_escape_string($con,$_POST['inpSaleDate']);
	$SDY = substr($SDate, 6,4);
	$SDM = substr($SDate, 0,2);
	$SDD = substr($SDate, 3,2);
	//echo $SDY;
	//echo "<br>";
	//echo $SDM;
	//echo "<br>";
	//echo $SDD;
	//echo "<br>";
	$SaleDate = $SDY."-".$SDM."-".$SDD;
	//echo $SaleDate;
//echo "line66";  
$rid='null';
 $stmt = $con->prepare("INSERT INTO `r_record` (`r_id`,`r_uid`, `r_did`, `dname`, `inpFiveMilNum`, `inpYourEmail`, `inpSaleDate`, `SaleDate`,`inpYourName`, `inpSDContact`, `inpDPhone`, `inpYourPhone`, `auction`, `rtime`,`inpemailtextarea`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('iiissssssssssss', $rid, $msuid, $msdid, $msdname, $inpFiveMilNum, $inpYourEmail, $inpSaleDate, $SaleDate, $inpYourName, $inpSDContact, $inpDPhone, $inpYourPhone, $msauction, $rtime, $inpemailtextarea);
$stmt->execute();
//echo "Successfully Recorded r_record....line 74  <br>";
	$stmt = $con->prepare("SELECT r_id FROM r_record WHERE rtime = '$rtime'");
	$result = $stmt->execute();
	$stmt -> bind_result($result);
	$stmt -> fetch();
	$rid = $result;
//echo "</br>result is ".$rid;
//echo "</br>result is ".$rid;
echo "</br>Success!<br>";
//Echo "</br>Record time: ".$rtime;
//Echo "</br>line 83<br>";

//mysqli_close($con);

include '../../common/msqcon.php';	
$conn=mysqli_connect ($dbhost, $dbuser, $dbpass)or die("Could not connect to MySQL: ".mysql_error());
mysqli_select_db($conn, crofton_cas) or die("Could not connect to Database:".mysqli_error());
	$vehEntry = array();
	$vehTbl=array(); 
	//grab the content
	$j=1;
	//$k=1;
	for ($x = 0; $x <= 9; $x++){
	 if(!empty( $_POST['txtVIN'.$j])){
		 $vehEntry = array();
		 $arrVIN =  mysqli_real_escape_string($conn,strtoupper( $_POST['txtVIN'.$j]));
		 $arrYear =  mysqli_real_escape_string($conn, $_POST['txtYear'.$j]);
		 $arrMake =  mysqli_real_escape_string($conn,strtoupper( $_POST['txtMake'.$j]));
		 $arrModel =  mysqli_real_escape_string($conn,strtoupper($_POST['txtModel'.$j]));
		 $arrColor =  mysqli_real_escape_string($conn,strtoupper($_POST['txtColor'.$j]));
		 $arrMileage =  mysqli_real_escape_string($conn,$_POST['txtMileage'.$j]);
		 $arrAnon =  mysqli_real_escape_string($conn,strtoupper($_POST['txtAnon'.$j]));
		 $arrStock =  mysqli_real_escape_string($conn,strtoupper($_POST['inpvehStock'.$j]));
		 $arrDetail =  mysqli_real_escape_string($conn,strtoupper($_POST['popDetail'.$j]));
		 $arrTrans =  mysqli_real_escape_string($conn,strtoupper($_POST['txtTrans'.$j]));
		 $arrPrice =  mysqli_real_escape_string($conn,$_POST['txtPrice'.$j]);
		// $arrvmid= $rid.".".$k;
		 $arrvmid= $rid;
		 $vehEntry[0]= $arrVIN;
		   
			$vehEntry[1]= $arrYear;
			$vehEntry[2]= $arrMake;
			$vehEntry[3]= $arrModel;
			$vehEntry[4]= $arrColor;
			$vehEntry[5]= $arrMileage;
			$vehEntry[6]= $arrAnon;
			$vehEntry[7] = $arrStock;
			$vehEntry[8]= $arrDetail;
			$vehEntry[9] = $arrTrans;
			$vehEntry[10]= $arrPrice;
			$vehEntry[11]= $arrvmid;
			
			
		//add to array
		$vehTbl[] = $vehEntry;
		
		
		//$k++;
}
$j++;

	}

	//echo '<pre>'; print_r($vehTbl); echo '</pre>';
//if(!empty($vehTbl)){echo '<pre>'; print_r($vehTbl); echo '</pre>';}
//foreach($vehTbl as $vehEntry){echo '<pre>'; print_r($vehEntry); echo '</pre>';}
foreach($vehTbl as $vehEntry){  
$insert=mysqli_query($conn, "INSERT INTO `v_record`(`v_id`, `v_did`, `v_uid`, `v_rid`, `txtVIN`, `txtYear`, `txtMake`, `txtModel`, `txtColor`,`txtMileage`, `txtAnon`, `inpvehStock`, `popDetail`, `txtTrans`, `txtPrice`, `r_time`, `v_status`,`v_substatus`,`vmid`) VALUES ('', '$msdid', '$msuid', '$rid', '{$vehEntry[0]}', '{$vehEntry[1]}', '{$vehEntry[2]}',  '{$vehEntry[3]}',  '{$vehEntry[4]}',  '{$vehEntry[5]}',  '{$vehEntry[6]}',  '{$vehEntry[7]}',  '{$vehEntry[8]}',  '{$vehEntry[9]}','{$vehEntry[10]}', '$rtime','I','recon-red','{$vehEntry[11]}')") or die("Not Connected failed before line 129 ".mysql_error());
}
//mysqli_close($conn);
//echo '<pre></br>'; print_r($vehTbl); echo '</br></pre>';

$zdid = $_POST['did'];
include '../../common/msqcon.php';	
$conz=mysqli_connect ($dbhost, $dbuser, $dbpass)or die("Could not connect to MySQL: ".mysqli_error());


mysqli_select_db($conz, crofton_cas) or die("Could not connect to Database: line 245: ".mysqli_error());
//echo $zdid;
$resultsz=mysqli_query($conz, "SELECT drepfee, drepfeedesc FROM `dealers` WHERE did = $zdid");
foreach($resultsz as $row){
$mrepfee = $row['drepfee'];
$mrepfeedesc = $row['drepfeedesc'];
}

mysqli_close($conz);




include '../../common/msqcon.php';	
$con2=mysqli_connect ($dbhost, $dbuser, $dbpass)or die("Could not connect to MySQL: ".mysqli_error());
mysqli_select_db($con2, crofton_cas) or die("Could not connect to Database: line 168: ".mysqli_error());
	$masterEntry = array();
	$masterTbl=array(); 
	//grab the content
	$j=1;
	$k=1;
	$arrmvid=$rid;
	for ($x = 0; $x <= 9; $x++){
	
	 if(!empty( $_POST['txtVIN'.$j])){
		 $masterEntry = array();
		 $arrmvid=$rid.".".$k;
		 $arrmaid =  $maid;
		$arrmrid =  $rid;
		$arrmuid =  $msuid;
		$arrmdid =  $msdid;
		$arrmvin =  mysqli_real_escape_string($con2,strtoupper( $_POST['txtVIN'.$j]));
		$arrmyear =  mysqli_real_escape_string($con2, $_POST['txtYear'.$j]);
		$arrmmake =  mysqli_real_escape_string($con2,strtoupper( $_POST['txtMake'.$j]));
		$arrmmodel =  mysqli_real_escape_string($con2,strtoupper($_POST['txtModel'.$j]));
		$arrmcolor =  mysqli_real_escape_string($con2,strtoupper($_POST['txtColor'.$j]));
		$arrmmileage =  mysqli_real_escape_string($con2,$_POST['txtMileage'.$j]);
		$arrmannounce =  mysqli_real_escape_string($con2,strtoupper($_POST['txtAnon'.$j]));
		$arrmstock =  mysqli_real_escape_string($con2,strtoupper($_POST['inpvehStock'.$j]));
		$arrmdetail =  mysqli_real_escape_string($con2,strtoupper($_POST['popDetail'.$j]));
		$arrmtransport =  mysqli_real_escape_string($con2,strtoupper($_POST['txtTrans'.$j]));
		$arrmfloor =  mysqli_real_escape_string($con2,$_POST['txtPrice'.$j]);
		$arrmrtime = $rtime;
		$arrmreqsaledate =$inpSaleDate;
		$arrmreqsaledate2 =$SaleDate;
		$arrmstatus = 'I';
		$arrmsubstatus = 'recon-red';
		$arrmsolddate = null;
		$arrmnotes = null;
		$arrmsoldprice = null;
		$arrmcarfax = null;
		$arrmdamage = null;
		$arrmmiscinfo = null;
		$arrmlane = null;
		$arrmrun = null;
		$arrmrundate = null;
		$arrmrunoutcome = null;
		$arrminvid = null;
		$arrmarchive = null;
		$arrmreconview = 1;
		$masterEntry[0]= $arrmvin;
		$masterEntry[1]= $arrmyear;
		$masterEntry[2]= $arrmmake;
		$masterEntry[3]= $arrmmodel;
		$masterEntry[4]= $arrmcolor;
		$masterEntry[5]= $arrmmileage;
		$masterEntry[6]= $arrmannounce;
		$masterEntry[7]= $arrmstock;
		$masterEntry[8]= $arrmdetail;
		$masterEntry[9]= $arrmtransport;
		$masterEntry[10]= $arrmfloor;
		$masterEntry[11]=$arrmvid;
		
		//add to array
		$masterTbl[] = $masterEntry;
		$k++;
		}
		$j++;
	}



	

foreach($masterTbl as $masterEntry){ $insertm=mysqli_query($con2, "INSERT INTO `master`(`mid`, `mvid`, `maid`, `mrid`, `muid`, `mdid`, `mvin`, `myear`, `mmake`, `mmodel`, `mcolor`, `mmileage`, `mannounce`, `mstock`, `mdetail`, `mtransport`, `mfloor`, `mrtime`, `mreqsaledate2`, `mreqsaledate`, `mstatus`, `msubstatus`, `msolddate`, `mnotes`, `msoldprice`, `mcarfax`, `mdamage`, `mmiscinfo`, `mlane`, `mrun`, `mrundate`, `mrunoutcome`, `minvid`, `marchive`, `mreconview`,`mrepfee`,`mrepfeedesc`) VALUES ('','{$masterEntry[11]}', '$arrmaid', '$arrmrid',  '$msuid',  '$msdid','{$masterEntry[0]}', '{$masterEntry[1]}', '{$masterEntry[2]}', '{$masterEntry[3]}', '{$masterEntry[4]}', '{$masterEntry[5]}', '{$masterEntry[6]}', '{$masterEntry[7]}', '{$masterEntry[8]}', '{$masterEntry[9]}', '{$masterEntry[10]}', '$arrmrtime',  '$arrmreqsaledate2',  '$arrmreqsaledate',  '$arrmstatus',  '$arrmsubstatus', '$arrmsolddate' ,'$arrmnotes' ,'$arrmsoldprice' ,'$arrmcarfax' ,'$arrmdamage' ,'$arrmmiscinfo' ,'$arrmlane' ,'$arrmrun' ,'$arrmrundate' ,'$arrmrunoutcome', '$arrminvid','$arrmarchive','$arrmreconview',$mrepfee,'$mrepfeedesc')") or die(" line 237 Could not connect to Database:".mysqli_error());}

//mysqli_close($con2);
//echo '<pre></br>master table record'; print_r($masterTbl); echo '</br></pre>';
if ($insert){
//echo "successful inserts in master line 213";
}else{
echo "master insert query failed";
} 
$to = "miked@croftonas.com";
//$to = "suzanne@croftonas.com";
$subject = "Registration: ".strip_tags($_POST['dname'])." MANHEIM PA";
$headers = "From: crofton@croftonas.com \r\n";
$headers .= "Reply-To: miked@croftonas.com ". "\r\n";
$headers .= 'Cc: details@croftonas.com,manheim@croftonas.com,'. strip_tags($_POST['inpYourEmail']) .  "\r\n";
//$headers .= 'Bcc: details@croftonas.com,manheim@croftonas.com' . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$message = '<html><head><style>';
$message .= '.non{color:black;padding-right:35px;width:350px;text-transform:uppercase;font-family:"Verdana", geneva, san-serif;font-size:13px;border-left:0px solid black;border-top:0px solid black;}';

$message .= 'td{color:black;text-transform:uppercase;font-family:"Verdana", geneva, san-serif;font-size:13px;border:1px solid black;border-top:1px solid black;}';
$message .= 'body{color:black;font-family:"Verdana", geneva, san-serif;font-size:13px;}';
$message .= 'h3{color:black;font-family:"Verdana", geneva, san-serif;font-size:13px;font-weight:bold;}';
$message .= 'h2{color:black;font-family:"Verdana", geneva, san-serif;font-size:16px;font-weight:bold;}';
$message .= '</style></head><body>';
$message .= '<table style="text-transform:uppercase;font-family:"Verdana", geneva, san-serif;border:0px!important;"><col width="100px"><col width="390px"><tr><td style="width:30px;border:0px !important;@page {size: landscape;}"><strong>Message:</strong></td><td style="border:0px;">' . strip_tags($_POST['inpemailtextarea']) . "</td></tr></table><br><br><br><br>";
$message .= '<table style="width:522px;border:1px solid black;"><col width="180px"><col width="330px">';
//$message .= '<table style="width:522px;"><col width="180px"><col width="330px">';
$message .= '<tr><td><strong>Sale Date</strong></td><td>' . strip_tags($_POST['inpSaleDate']) . "</td></tr>";
$message .= '<tr><td><strong>Dealership:</strong></td><td  >' . strip_tags($_POST['dname']) . "</td></tr>";
$message .= '<tr><td><strong>Dealership Number:</strong></td><td>' . strip_tags($_POST['inpFiveMilNum']) . "</td></tr>";
$message .= '<tr><td><strong>Submitted by:</strong></td><td>' . strip_tags($_POST['inpYourName']) . "</td></tr>";
$message .= '<tr><td><strong>My Phone:</strong></td><td>' . strip_tags($_POST['inpYourPhone']) . "</td></tr>";
$message .= '<tr><td><strong>Sale Day Contact:</strong></td><td>' . strip_tags($_POST['inpSDContact']) . "</td></tr>";
$message .= '<tr><td><strong>Sale Day Number</strong></td><td>' . strip_tags($_POST['inpDPhone']) . "</td></tr></br></br>";
$message .= '</tr></table>';
$message .= '<table style="table-layout:fixed;border:1px solid black;"><col width="200px"><col width="40px"><col width="70px"><col width="50px"><col width="50px">';
$message .='<col width="40px"><col width="151px"><col width="70px"><col width="50px"><col width="110px"><col width="60px">';
$message .= '<tr style="background:#eeeeee;"><td style="width:195px;border:1px solid black;text-transform:uppercase;text-align:center;">VIN</td>';
$message .= '<td style="width:34px;">YEAR</td>';
$message .= '<td style="width:64px;">MAKE</td>';
$message .= '<td style="width:44px;">MODEL</td>';
$message .= '<td style="width:44px;">COLOR</td>';
$message .= '<td style="width:40px;">MILEAGE</td>';
$message .= '<td style="width:140px;">ANNOUNCEMENT</td>';
$message .= '<td style="width:64px;">STOCK#</td>';
$message .= '<td style="width:44px;">DETAIL</td>';
$message .= '<td style="width:104px;">TRANSPORTATION</td>';
$message .= '<td style="width:54px;">FLOOR</td></tr>';
$j=1;
	for ($x = 0; $x <= 9; $x++){
	 if(!empty( $_POST['txtVIN'.$j])){
$message .= '<tr><td style="width:195px;">' . strip_tags($_POST['txtVIN'.$j]) . '</td>';
$message .= '<td style="width:34px;">' . strip_tags($_POST['txtYear'.$j]) . "</td>";
$message .= '<td style="width:64px;">' . strip_tags($_POST['txtMake'.$j]) . "</td>";
$message .= '<td style="width:44px;">' . strip_tags($_POST['txtModel'.$j]) . "</td>";
$message .= '<td style="width:44px;">' . strip_tags($_POST['txtColor'.$j]) . "</td>";
$message .= '<td style="width:44px;">' . strip_tags($_POST['txtMileage'.$j]) . "</td>";
$message .= '<td style="width:140px;">' . strip_tags($_POST['txtAnon'.$j]) . "</td>";
$message .= '<td style="width:64px;">' . strip_tags($_POST['inpvehStock'.$j]) . "</td>";
$message .= '<td style="width:44px;">' . strip_tags($_POST['popDetail'.$j]) . "</td>";
$message .= '<td style="width:104px;">' . strip_tags($_POST['txtTrans'.$j]) . "</td>";
$message .= '<td style="width:54px;">' . strip_tags($_POST['txtPrice'.$j]) . "</td></tr>";
		}
		$j++;
	}

$message .= "</table>";
$message .= "</body></html>";
mail($to, $subject, $message, $headers);
//echo '<br>success mail sent to text- Line 321 registration table line 321';



$to = "reg@croftonas.com";

//$to = "3017067951@mms.att.net,7146548675@tmomail.net";
$subject = "Reg-".strip_tags($_POST['dname'])." MANHEIM PA";
$hdrs = "From: crofton@croftonas.com \r\n";
$hdrs .= "Content-Transfer-Encoding: 7bit" . "\r\n";
//$mssge = "SaleDate: " . strip_tags($_POST['inpSaleDate']). "\r\n";
//$mssge .= "Dealer: " . strip_tags($_POST['dname']). "\r\n";
$mssge = "By: " . strip_tags($_POST['inpYourName']). "\r\n";
//$mssge .= "Phone: " . strip_tags($_POST['inpYourPhone']). "\r\n";

            function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}
             if (mail($to, $subject, $mssge, $hdrs)) 
            {
 
echo '<html><head><style>';
echo '.non{color:black;padding-right:35px;width:350px;text-transform:uppercase;font-family:"Verdana", geneva, san-serif;font-size:13px;border:none!important;}';

echo 'td{color:black;text-transform:uppercase;font-family:"Verdana", geneva, san-serif;font-size:13px;border:1px solid black;border-top:1px solid black;}';
echo 'body{color:black;font-family:"Verdana", geneva, san-serif;font-size:13px;}';
echo 'h3{color:black;font-family:"Verdana", geneva, san-serif;font-size:13px;font-weight:bold;}';
echo 'h2{color:black;font-family:"Verdana", geneva, san-serif;font-size:16px;font-weight:bold;}';

echo '</style></head><body><table style="width:800px;table-layout:fixed;"><col width="390px"><col width="390px"><tr class="non"><td class="non">';
echo '<h3>Registration Submitted '.$rtime.' </h3></td>';
echo '<td class="non"><h3>Auction Location:'  .strip_tags($_POST['auction']).'</h3></td></tr></table>';
//echo '<td class="non"></td></tr></table>';
echo 'A registration email was sent to the following:' .  "</br>";
echo "miked@croftonas.com, ";
//echo 'jim.mauger@manheim.com, ';
//echo 'jolynn.dejesus@manheim.com, ';
echo strip_tags($_POST['inpYourEmail']);
echo '<table style="text-transform:uppercase;font-family:"Verdana", geneva, san-serif;border:0px!important;"><col width="100px"><col width="790px"><tr><td style="width:30px;border:0px !important;@page {size: landscape;}"><strong>Message:</strong></td><td style="border:0px;">' . strip_tags($_POST['inpemailtextarea']) . "</td></tr></table><br>";

echo '<table style="width:522px;table-layout:fixed;border:1px solid black;"><col width="180px"><col width="330px">';
echo '<tr><td><strong>Sale Date</strong></td><td>'.strip_tags($_POST['inpSaleDate'])."</td></tr>";
echo '<tr><td><strong>Dealership:</strong></td><td  >' . strip_tags($_POST['dname'])."</td></tr>";
echo'<tr><td><strong>Dealership Number:</strong></td><td>'.strip_tags($_POST['inpFiveMilNum'])."</td></tr>";
echo '<tr><td><strong>Submitted by:</strong></td><td>' . strip_tags($_POST['inpYourName'])."</td></tr>";
echo '<tr><td><strong>My Phone:</strong></td><td>' . strip_tags($_POST['inpYourPhone'])."</td></tr>";
echo '<tr><td><strong>Sale Day Contact:</strong></td><td>'.strip_tags($_POST['inpSDContact'])."</td></tr>";
echo '<tr><td><strong>Sale Day Number</strong></td><td>'.strip_tags($_POST['inpDPhone'])."</td></tr></br></br>";
echo "</tr></table>";

echo '<table style="table-layout:fixed;border:1px solid black;"><col width="200px"><col width="40px"><col width="70px"><col width="50px"><col width="50px"><col width="40px"><col width="151px"><col width="70px"><col width="50px"><col width="110px"><col width="60px">';
echo '<tr style="background:#eeeeee;"><td style="width:195px;text-align:center;">VIN</td>';
echo '<td style="width:34px;">YEAR</td>';
echo '<td style="width:64px;">MAKE</td>';
echo '<td style="width:44px;">MODEL</td>';
echo '<td style="width:44px;">COLOR</td>';
echo '<td style="width:40px;">MILEAGE</td>';
echo '<td style="width:140px;">ANNOUNCEMENT</td>';
echo '<td style="width:64px;">STOCK#</td>';
echo '<td style="width:44px;">DETAIL</td>';
echo '<td style="width:104px;">TRANSPORTATION</td>';
echo '<td style="width:54px;">FLOOR</td></tr>';

$j=1;
	for ($x = 0; $x <= 9; $x++){
	 if(!empty( $_POST['txtVIN'.$j])){
echo '<tr><td style="width:195px;">' . strip_tags($_POST['txtVIN'.$j]) . '</td>';
echo '<td style="width:34px;">' . strip_tags($_POST['txtYear'.$j]) . "</td>";
echo '<td style="width:64px;">' . strip_tags($_POST['txtMake'.$j]) . "</td>";
echo '<td style="width:44px;">' . strip_tags($_POST['txtModel'.$j]) . "</td>";
echo '<td style="width:44px;">' . strip_tags($_POST['txtColor'.$j]) . "</td>";
echo '<td style="width:44px;">' . strip_tags($_POST['txtMileage'.$j]) . "</td>";
echo '<td style="width:140px;">' . strip_tags($_POST['txtAnon'.$j]) . "</td>";
echo '<td style="width:64px;">' . strip_tags($_POST['inpvehStock'.$j]) . "</td>";
echo '<td style="width:44px;">' . strip_tags($_POST['popDetail'.$j]) . "</td>";
echo '<td style="width:104px;">' . strip_tags($_POST['txtTrans'.$j]) . "</td>";
echo '<td style="width:54px;">' . strip_tags($_POST['txtPrice'.$j]) . "</td></tr>";
		}
		$j++;
	}
	echo "</table></br></br>";
	//echo " test info: </br> record id: ".$rid; 
echo '<table><tr class="non"><td class="non">';
echo '<h3><a href="https://www.croftonas.com/contactcas.php?msg=1"><span style="color:black;background-color:white;">Finished</span></h3></a></td>';
echo '<td class="non"></td>';
echo '<td class="non"><h3><a href="javascript:window.print()"><span style="color:black;background-color:white;">Print This Page</span></a></h3></td></tr></table>';
echo "</body></html>";       
           //Redirect('http://croftonas.com/regsuccess.php', false);
            } else {echo 'there was a problem sending your message. Please try again or use your regular email to follow-up.';
             }
}?>