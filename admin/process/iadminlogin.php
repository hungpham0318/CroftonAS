<?php session_start();
if(isset($_SESSION['url'])) {
   $url = $_SESSION['url'];
}
  	
$url = preg_replace('/\?.*/', '',  $_SERVER['HTTP_REFERER']); //To remove query string
	

// Get a connection for the database
require_once('iadmin_connect.php');
$ausername=mysqli_real_escape_string($dbc,$_POST['ausername']);
$apassword=mysqli_real_escape_string($dbc,$_POST['apassword']);	
// Create a query for the database
$query = "SELECT * FROM admin_users WHERE ausername='$ausername' and apassword='$apassword'";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

	
	//$sql="SELECT * FROM admin_users WHERE ausername='$ausername' and apassword='$apassword'";
	
	$count=mysqli_num_rows($response);
	if($count==1){
	foreach( $response as $row){
		$_SESSION['ausername']=$row['ausername'];
		$_SESSION['apassword']=$row['apassword'];
$_SESSION['auid']=$row['auid'];
$_SESSION['perms']=$row['aperms'];
$_SESSION['ainitials']=$row['ainitials'];
$_SESSION['afullname']=$row['afullname'];
	     //header('Location: ' . $_SERVER['HTTP_REFERER']);
	     header('Location: ../worldview/index.php');
          }}
	else{

header('Location: ../worldview/index.php');}
		
	
	
	
} else {

echo "Could not issue database query<br>";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>