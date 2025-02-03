<?php 
session_start();
$_SESSION['messageemail'] = 'crofton@croftonas.com';
$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
//echo $ip;
?>
       <script src="https://www.google.com/recaptcha/api.js" async defer></script>

       
        
        <div style="clear:both;"></div>
	
		<div style="clear:both;"></div>
        


        
         
            <div class="form-popup contact-area" id="contact-us" style="display: none;border:1px solid #660000;box-shadow:5px 5px 5px 5px rgba(68, 68, 68, 0.6);">
            <?php 
            if (isset($_SESSION['notification'])) {
                echo '
                <h3 style="text-align: center;">Thank you!</h3>
                <p style="text-align: justify; text-transform: none;">Your message has been sent. Messages are usually replied to in 24-48 hours.<br/> </p>
                <p></p>
                <button type="sumbit" id="close-message" class="submit-button btn-group btn btn-primary" onclick="closeMsg()">Ok</button>';
                
            } else {
            echo '
             		<form method="post" id="newMessage"  action="/template/newcontact_message.php" >
             		<h3 style="float:right;color:#660000;" onclick="closeMsg()">X</h3>
			        <h3 style="text-align:left;text-transform:uppercase;">Contact Us</h3>
                    <input type="text" name="contactName" id="contactName" placeholder="Your Name"  title="Please enter your name." required />
        			<input type="email" name="contactEmail" id="contactEmail" placeholder="Your Email"  title="Please enter a valid email address" required/>
                    <input type="tel" name="contactPhone" id="contactPhone" placeholder=" Your Phone" title="Please use this format: 123-456-7890"    required/>
                     <input type="text" name="contactDealer" id="contactDealer" placeholder="Dealership Name"/>
                      <input type="text" name="contactDLocation" id="contactDLocation" placeholder="Dealership City and State"/>
               <input type=hidden name="yourip" value="'.$ip.'">

                    <textarea name="contactMessage" rows="10" id="contactMessage" placeholder="Message"></textarea>
                        <div class="g-recaptcha"
                           data-sitekey="6LezKqgUAAAAAB0CNGD5iNvZkRvJL0wdNueQobaZ"
                           data-callback="onSubmit"
                           data-size="invisible">
                        </div>
                    <button type="submit" class="btn btn-primary" style="float:right;">
                        Send 
                    </button>
                    <small><p>This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                    </p></small>
                    
	            </form>';
            }?>
            </div>
            <div id="ohboy" class="form-popup contact-area" style="display: none;">
                <h3>Thank you!</h3>
                <p>Your message has been sent. </p>
               <p></p>
                <button type="sumbit" id="close-message" class="btn btn-primary" onclick="closeMsg()">Ok</button>
            </div>
            <div id="sending" class="form-popup contact-area" style="display: none;">
                <b>SENDING<br/>YOUR<br/>MESSAGE....</b>
            </div>
            <div id="thankyou"></div>
            
            
<script>


function contactTab() {
    var x = document.getElementById("contact-us");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

}
function closeMsg() {
    document.getElementById("contact-us").style.display = "none";
}


</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>

<script>
$(document).ready(function(){
    //function onSubmit(token) {
         
        
        
	// send the message
	$("#newMessage").submit(function(e){
	    grecaptcha.execute();
		var form_data = $(this).serialize();
		var that = $(this);
		var button_content = $(this).find('button[type=submit]');
		button_content.html('Sending message...');
		//$("#contact-us").style.display = "none";
		//$("#sending").style.display = "block";
		var referringpage = window.location.href;
            referringpage = referringpage.substring(referringpage.lastIndexOf('/')+1);
		$.ajax({
			url: "/template/newcontact_message.php",
			type: "POST",
			data: form_data
		}).done(function(data){		    
			//$("#thankyou").html(data);
			//$("#thankyou").html(data.notification);
			//button_content.html('Message Sent!');
			//$("#sending").style.display = "none";
			//$("#contact-us").load(sendingpage + " #contact-us");
			//$("#contact-us").style.display = "block";
			$("#contact-us").load(referringpage + " #contact-us > *").style.display = "block";
		})
		e.preventDefault();
	//	window.location.reload();
					
	});	
    //};
});    
</script>





