<?php
$to = "textmsg@croftonas.com";
//$to = "3017067951@txt.att.net,7146548675@tmomail.net";
//$to = "7146548675@tmomail.net";
$subject = "Reg-"."dealership name"." MANHEIM PA";
$headers = "From: crofton@croftonas.com \r\n";
$headers .= "Content-Transfer-Encoding: 7bit" . "\r\n";
$mssge = "SaleDate: " . 'RequestedDate'. "\r\n";
$mssge .= "Dealer: " ."Dealer". "\r\n";
$mssge .= "By: " ."registering user"."\r\n";
$mssge .= "Phone: " . "user phone". "\r\n";

            function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}
             if (mail($to, $subject, $mssge, $headers)) 
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
echo 'jim.mauger@manheim.com, ';
echo 'jolynn.dejesus@manheim.com, ';
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