<?php session_start();
	if(!isset($_SESSION['uusername']) || $_SESSION['uusername']=="")
	{
		  
	}
	else{
		$uusername=$_SESSION['uusername'];
		$upassword=$_SESSION['upassword'];
		$cas_uid=$_SESSION['cas_uid'];
		$umobile=$_SESSION['umobile'];
		$uemail=$_SESSION['uemail'];
		$uname=$_SESSION['uname'];
		 } 
		    
    function getRealIp() {
       if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
         $ip=$_SERVER['HTTP_CLIENT_IP'];
       } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
         $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
       } else {
         $ip=$_SERVER['REMOTE_ADDR'];
       }
       return $ip;
    }
        $ip = getRealIp(); // Get the IP from superglobal
    	$host = gethostbyaddr($ip);    // Try to locate the host of the attack
    	$date = date("l jS \of F Y h:i:s A");
    	$date2 = date("D M j G:i:s T Y");
    	
            // PREPARE THE BODY OF THE MESSAGE

			$message = '<html><body>';
			$message .= '<table style="width:522px;"><col width="180px"><col width="330px">';
			$message .= '<tr><td><strong>Name:</strong></td><td>' . strip_tags($_POST['uname']) . "</td></tr>";
			$message .= '<tr><td><strong>Email:</strong></td><td>' . strip_tags($_POST['uemail']) . "</td></tr>";
			$message .= '<tr><td><strong>Phone:</strong></td><td>' . strip_tags($_POST['umobile']) . "</td></tr>";
			$message .= '<tr><td><strong>Message:</strong> </td><td>' . strip_tags($_POST['txtmessage']) . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";
			
			
			//  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
			
			$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
            if (preg_match($pattern, trim(strip_tags($_POST['uemail'])))) { 
                $cleanedFrom = trim(strip_tags($_POST['uemail'])); 
            } else { 
                return "The email address you entered was invalid. Please try again!"; 
            } 
			
			
            
            
            //   message
      $to = 'usercontact@croftonas.com';
      	
      //	$to = 'suzanne@croftonas.com';
	$subject = "User Contact Message";
	$headers = "From: crofton@croftonas.com" ."\r\n";
	$headers .= "Reply-To: miked@croftonas.com" . "\r\n";
	$headers .= "Cc: " . $cleanedFrom . "\r\n";
	$headers .= "Bcc: suzanne@croftonas.com" . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
             
			
            function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}
 
            if (mail($to, $subject, $message, $headers)) 
            {Redirect('https://www.croftonas.com/home.php', false);
            } else {echo 'there was a problem sending your message. Please try again or use your regular email to follow-up.';
             }
?>