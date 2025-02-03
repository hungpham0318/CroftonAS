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
//$auction= $_GET['auction'];

$rdate = new DateTime(date('Y-m-d h:i:s'));
$rtime = date_format($rdate, 'Y-m-d H:i:s');

$to = "miked@croftonas.com";
$subject = "Demonstration ".strip_tags($_POST['auction']);
$headers = "From: croftona@croftonas.com \r\n";
$headers .= "Reply-To: miked@croftonas.com \r\n";
$headers .= "Cc: ". strip_tags($_POST['inpYourEmail']) .  "\r\n";
$headers .= "Bcc: crofton@suzianne.com" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$message = '<html><body>';
$message .= '<table style="text-transform:uppercase;font-family:"Verdana", geneva, san-serif;border:0px!important;"><col width="100px"><col width="390px"><tr><td style="width:30px;border:0px !important;@page {size: landscape;}"><strong>Message:</strong></td><td style="border:0px;">' . strip_tags($_POST['inpemailtextarea']) . " This message is for demonstration purposes only and does not indicate, nor imply, actual vehicle registration for any auction.</td></tr></table><br><br><br><br>";
$message .= '<table style="width:522px;font-size:13px;border:1px solid #000000;"><col width="180px"><col width="330px">';
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;"><strong>Sale Date</strong></td><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpSaleDate']) . "</td></tr>";
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;"><strong>Dealership:</strong></td><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['dname']) . "</td></tr>";
$message .='<tr><td style="border:1px solid black;text-transform:uppercase;"><strong>Dealership Number:</strong></td><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpFiveMilNum']) . "</td></tr>";
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;"><strong>Submitted by:</strong></td><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpYourName']) . "</td></tr>";
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;"><strong>My Phone:</strong></td><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpYourPhone']) . "</td></tr>";
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;"><strong>Sale Day Contact:</strong></td><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpSDContact']) . "</td></tr>";
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;"><strong>Sale Day Number</strong></td><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpDPhone']) . "</td></tr></table>";
$message .= '<table style="table-layout:fixed;border:1px solid black;"><col width="200px"><col width="40px"><col width="70px"><col width="50px"><col width="50px"><col width="40px"><col width="151px"><col width="70px"><col width="50px"><col width="110px"><col width="60px">';
$message .= '<tr style="background:#eeeeee;"><td style="width:195px;border:1px solid black;text-transform:uppercase;text-align:center;">VIN</td>';
$message .= '<td style="width:34px;border:1px solid black;text-transform:uppercase;text-align:center;">YEAR</td>';
$message .= '<td style="width:64px;border:1px solid black;text-transform:uppercase;text-align:center;">MAKE</td>';
$message .= '<td style="width:44px;border:1px solid black;text-transform:uppercase;text-align:center;">MODEL</td>';
$message .= '<td style="width:44px;border:1px solid black;text-transform:uppercase;text-align:center;">COLOR</td>';
$message .= '<td style="width:40px;border:1px solid black;text-transform:uppercase;text-align:center;">MILEAGE</td>';
$message .= '<td style="width:140px;border:1px solid black;text-transform:uppercase;text-align:center;">ANNOUNCEMENT</td>';
$message .= '<td style="width:64px;border:1px solid black;text-transform:uppercase;text-align:center;">STOCK#</td>';
$message .= '<td style="width:44px;border:1px solid black;text-transform:uppercase;text-align:center;">DETAIL</td>';
$message .= '<td style="width:104px;border:1px solid black;text-transform:uppercase;text-align:center;">TRANSPORTATION</td>';
$message .= '<td style="width:54px;border:1px solid black;text-transform:uppercase;text-align:center;">FLOOR</td></tr>';
$message .= '<tr><td style="width:195px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN1']) . '</td>';
$message .= '<td style="width:34px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear1']) . "</td>";
$message .= '<td style="width:64px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake1']) . "</td>";
$message .= '<td style="width:44px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel1']) . "</td>";
$message .= '<td style="width:44px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor1']) . "</td>";
$message .= '<td style="width:44px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage1']) . "</td>";
$message .= '<td style="width:140px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon1']) . "</td>";
$message .= '<td style="width:64px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock1']) . "</td>";
$message .= '<td style="width:44px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail1']) . "</td>";
$message .= '<td style="width:104px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans1']) . "</td>";
$message .= '<td style="width:54px;border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice1']) . "</td></tr>";
if(!empty($inpVIN2)){
$message .= '<tr style="background: #eee;"><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN2']) . '</td>';
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans2']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice2']) . "</td></tr>";
}if(!empty($inpVIN3)){
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans3']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice3']) . "</td></tr>";
}if(!empty($inpVIN4)){
$message .= '<tr style="background: #eee;"><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans4']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice4']) . "</td></tr>";
}
if(!empty($inpVIN5)){
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans5']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice5']) . "</td></tr>";
}if(!empty($inpVIN6)){
$message .= '<tr style="background: #eee;"><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans6']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice6']) . "</td></tr>";
}if(!empty($inpVIN7)){
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans7']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice7']) . "</td></tr>";
}if(!empty($inpVIN8)){
$message .= '<tr style="background: #eee;"><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans8']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice8']) . "</td></tr>";
}if(!empty($inpVIN9)){
$message .= '<tr><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans9']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice9']) . "</td></tr>";
}if(!empty($inpVIN10)){
$message .= '<tr style="background: #eee;"><td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtVIN10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtYear10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMake10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtModel10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtColor10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtMileage10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtAnon10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['inpvehStock10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['popDetail10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtTrans10']) . "</td>";
$message .= '<td style="border:1px solid black;text-transform:uppercase;">' . strip_tags($_POST['txtPrice10']) . "</td></tr>";
}$message .= "</table>";
$message .= "</body></html>";
mail($to, $subject, $message, $headers);
//echo '<br>success mail sent to text- Line 321 registration table line 321';



$to = "3017067951@txt.att.net,7146548675@tmomail.net";
//$to = "7146548675@messaging.sprintpcs.com";
$subject = "Demo Alert!";
$headers = "From: croftona@croftonas.com \r\n";
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
            {Redirect('http://croftonas.com/regsuccess.php', false);
            } else {echo 'there was a problem sending your message. Please try again or use your regular email to follow-up.';
             }
}
?>