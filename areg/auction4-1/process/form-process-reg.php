<?php
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
$auction= $_GET['auction'];

$rdate = new DateTime(date('Y-m-d h:i:s'));
$rtime = date_format($rdate, 'Y-m-d H:i:s');


 
//$subject = "Auction Registration: ".strip_tags($_POST['auction']);
//$headers = "From: crofton@croftonauctionservices.com \r\n";
//$headers .= "Reply-To: crofton@croftonauctionservices.com ". "\r\n";
//$headers .= "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
//------------------------------------------------
//$to = "miked@croftonas.com";
$to = "suzannenbird@gmail.com";
$subject = "Registration: ".strip_tags($_POST['dname'])." ".strip_tags($_POST['auction']);
$headers = "From: crofton@croftonas.com \r\n";
$headers .= "Reply-To: miked@croftonas.com". "\r\n";
//$headers .= 'Cc: jim.mauger@manheim.com,jolynn.dejesus@manheim.com,'. strip_tags($_POST['inpYourEmail']) .  "\r\n";
//$headers .= 'Bcc: crofton@comcast.net,suzanne@croftonas.com,kellyz@croftonas.com,missyo@croftonas.com, details@croftonas.com,register@croftonas.com' . "\r\n";
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


//$to = "3017067951@txt.att.net,7146548675@tmomail.net";
$to = "7146548675@tmomail.net";
$subject = "Test!";
$headers = "From: crofton@croftonas.com \r\n";
$headers .= "Content-Transfer-Encoding: 7bit" . "\r\n";
$message = "SaleDate: " . strip_tags($_POST['inpSaleDate']). "\r\n";
$message .= "Dealer: " . strip_tags($_POST['dname']). "\r\n";
$message .= "By: " . strip_tags($_POST['inpYourName']). "\r\n";
$message .= "Phone: " . strip_tags($_POST['inpYourPhone']). "\r\n";

            function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}
if (mail($to, $subject, $message, $headers)) 
   {   
 
echo '<html><head><style>';
echo '.non{color:black;padding-right:35px;width:350px;text-transform:uppercase;font-family:"Verdana", geneva, san-serif;font-size:13px;border:none!important;}';

echo 'td{color:black;text-transform:uppercase;font-family:"Verdana", geneva, san-serif;font-size:13px;border:1px solid black;border-top:1px solid black;}';
echo 'body{color:black;font-family:"Verdana", geneva, san-serif;font-size:13px;}';
echo 'h3{color:black;font-family:"Verdana", geneva, san-serif;font-size:13px;font-weight:bold;}';
echo 'h2{color:black;font-family:"Verdana", geneva, san-serif;font-size:16px;font-weight:bold;}';

echo '</style></head><body><table style="width:800px;table-layout:fixed;"><col width="390px"><col width="390px"><tr class="non"><td class="non">';
echo '<h3>Registration Submitted '.$rtime.' </h3></td>';
echo '<td class="non"><h3>Auction Location:'  .strip_tags($_POST['auction']).'MANHEIM, PA</h3></td></tr></table>';
//echo '<td class="non"></td></tr></table>';
echo 'A registration email was sent to the following:' .  "</br>";
echo "miked@croftonas.com, ";
echo 'jim.mauger@manheim.com, ';
echo 'jolynn.dejesus@manheim.com, ';
echo strip_tags($_POST['inpYourEmail']);
echo '<table style="text-transform:uppercase;font-family:"Verdana", geneva, san-serif;border:0px!important;"><col width="100px"><col width="790px"><tr><td style="width:30px;border:0px !important;@page {size: landscape;}"><strong>Message:</strong></td><td style="border:0px;">' . strip_tags($_POST['inpemailtextarea']) . "</td></tr></table><br>";

echo '<table style="width:522px;table-layout:fixed;border:1px solid black;"><col width="180px"><col width="330px">';
echo '<tr><td><strong>Sale Date</strong></td><td>' . strip_tags($_POST['inpSaleDate']) . "</td></tr>";
echo '<tr><td><strong>Dealership:</strong></td><td  >' . strip_tags($_POST['dname']) . "</td></tr>";
echo'<tr><td><strong>Dealership Number:</strong></td><td>' . strip_tags($_POST['inpFiveMilNum']) . "</td></tr>";
echo '<tr><td><strong>Submitted by:</strong></td><td>' . strip_tags($_POST['inpYourName']) . "</td></tr>";
echo '<tr><td><strong>My Phone:</strong></td><td>' . strip_tags($_POST['inpYourPhone']) . "</td></tr>";
echo '<tr><td><strong>Sale Day Contact:</strong></td><td>' . strip_tags($_POST['inpSDContact']) . "</td></tr>";
echo '<tr><td><strong>Sale Day Number</strong></td><td>' . strip_tags($_POST['inpDPhone']) . "</td></tr></br></br>";
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
echo '<table><tr class="non"><td class="non">';
echo '<h3><a href="http://croftonas.com/regsuccess.php"><span style="color:black;background-color:white;">Finished</span></h3></a></td>';
echo '<td class="non"></td>';
echo '<td class="non"><h3><a href="javascript:window.print()"><span style="color:black;background-color:white;">Print This Page</span></a></h3></td></tr></table>';
echo "</body></html>";       
           //Redirect('http://croftonas.com/regsuccess.php', false);
            } else {echo 'there was a problem sending your message. Please try again or use your regular email to follow-up.';
             }
}?>