<?php
$post_name=$_REQUEST["name"];
 
$post_location=$_REQUEST["location"];
 
if( $post_name )
 
{
$post_name = $_GET['name'];
$post_location = $_GET['location'];

$location = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($post_name), base64_decode($post_location), MCRYPT_MODE_CBC, md5(md5($post_name))), "\0");
 
  
 
   echo "The word is: " .$location;
   
}
?>