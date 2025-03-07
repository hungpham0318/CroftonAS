<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('America/Los_Angeles');

//database credentials
define('DBHOST','localhost');
define('DBUSER','croftona_connct');
define('DBPASS','wintersS2013');
define('DBNAME','croftona_cas');

//application address
define('DIR','http://www.croftonas.com/caslog/');
define('SITEEMAIL','croftona@croftonas.com');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection

include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>