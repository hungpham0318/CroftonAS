<?php 
session_start();
 //prevent access if they haven't submitted the form.
//if (!isset($_POST['submit'])) {
                //  die(header("Location: index.php"));
             //   }
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
   

//include("../cart/inc/config.inc.php"); 

$contactName = $_POST['contactName'];
$contactEmail = $_POST['contactEmail'];
$contactPhone = $_POST['contactPhone'];
$contactDealer = $_POST['contactDealer'];
$contactDLocation = $_POST['contactDLocation'];
$contactMessage = $_POST['contactMessage'];
//$contactPhone = $_POST['contactPhone'];

//$contactReason = $_POST['contactReason'];



$cascontactName = filter_var($contactName, FILTER_SANITIZE_STRING);
$cascontactEmail  = filter_var($contactEmail, FILTER_SANITIZE_STRING);
$cascontactPhone  = filter_var($contactPhone, FILTER_SANITIZE_STRING);
$cascontactDealer  = filter_var($contactDealer, FILTER_SANITIZE_STRING);
$cascontactDLocation  = filter_var($contactDLocation, FILTER_SANITIZE_STRING);
$cascontactMessage  = filter_var($contactMessage, FILTER_SANITIZE_STRING);





$messageemailadd = $_SESSION['messageemail'];




//echo $_SESSION['notification'];


$to      = 'suzannenbird@gmail.com';

$subject = 'Lead from New Visitor at Crofton Auction Services';
$message = '<body style = "font-size:24px;font-family:"Calibri", Arial, sans-serif;letter-spacing:2px; color:black;">';
$message .='You have a message from a visitor at Crofton Auction Services!';

$message .='<h2>From:</h2>';
$message .='<h3 style="text-align: left;">'.$cascontactName.'</h3>';
$message .='<h3 style="font-weight: bold;">'.$cascontactPhone.'<br/>'.$cascontactEmail.'<br/>'.$cascontactDealer.'<br/>'.$cascontactDLocation.'</h3>';
$message .='<h2>Message:</h2>';
$message .='<h3 style="font-weight: bold;">'.$cascontactMessage.'</h3>';
$message .='<i>Sent from croftonas.com</i>';


// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: crofton@croftonas.com' . "\r\n" .
    'Reply-To:  crofton@croftonas.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
// Additional headers
//$headers .= $to;
//$headers .= $subject;
		
mail($to, $subject, $message, $headers);
$_SESSION['notification'] = 'yes';

//reset variables? I don't know!
$to = '';
$subject = '';
$message = '';
$headers = '';
 
 
$to      = $cascontactEmail;
$subject = 'Thank You for Contacting Crofton Auction Services';
$message = '<body style = "font-size:24px;font-family:"Calibri", Arial, sans-serif;letter-spacing:2px; color:black;">';
$message .= '<h2 style="text-align: left;">Thank you for contacting Crofton Auction Services.</h2>';
$message .= '<p>We have received your message and will usually respond within 24-48 hours.</p>';
$message .= '<p><i>We received your sent message as follows:</i></p><br/><br />';


$message .='<h3>From:</h3>';
$message .='<p style="font-size:24px;font-family:"Calibri", Arial, sans-serif;letter-spacing:2px; color:black;">'.$cascontactName.'<br/>'.$cascontactPhone.'<br/>'.$cascontactEmail.'<br/>'.$cascontactDealer.'<br/>'.$cascontactDLocation.'</p>';
$message .='<h3>Message:</h3>';
$message .='<p style="font-weight: bold;">'.$cascontactMessage.'</p><br/><br/>';
$message .='<p>Please add the following email address to your contact book to ensure you receive emails from us: '.$messageemailadd.'</p>';
$message .='<i>Sent from croftonas.com </i><br>';
$message .='<i>Crofton Auction Services<br>5 Park Place  Suite 519<br>Annapolis, MD 21401<br> 301-706-7951</i>';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:crofton@croftonas.com' . "\r\n" .
    'Reply-To:  crofton@croftonas.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
// Additional headers
//$headers .= $to;
//$headers .= $subject;
		
mail($to, $subject, $message, $headers);

// header("Location: " . $_SERVER["HTTP_REFERER"]);

}
die();
?>