<div id="navigation">
	
        <a class="pure-button button-success" href="index.php">Home</a>
  	
	
	<?php if(!isset($_SESSION['username']) || $_SESSION['username']==""){
echo '<a class="pure-button" href="contactus.php" title="Users may log in for User Contact Form which has name, email, and phone pre-filled">Contact Us</a>';

echo '<a class="pure-button" href="/caslog/index.php" title="Sign me up!">Sign Me Up!</a>';
}else{
echo '<a class="pure-button" href="contactcas.php">Contact CAS</a>';

echo '<a class="pure-button" href="/areg/stepone.php">Register Vehicles</a>';
echo '<a class="pure-button" href="/caslog/memberpage.php">caslog/memberpage</a>';
echo '<a class="pure-button" href="memberpage.php">memberpage</a>';

}?>
</div>
<div id="section1">
<div id="rightcolumns1">
	 <?php if(!isset($_SESSION['username']) || $_SESSION['username']==""){
echo '<a class="pure-button" href="/caslog/login.php" title="Users may log in">Log In</a>';

}else{

echo '<a class="pure-button" href="/caslog/logout.php" title="Log Out">Log Out</a></br>';
}?>
	 </div> 
