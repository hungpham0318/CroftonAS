<?php
//Database Information
$dbhost = "localhost";
$dbname = "manheim_admin";
$dbuser = "manheim_connect";
$dbpass = "2013Swinters";
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//$con = @mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");

$con = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)

//$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

?>
