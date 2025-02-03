<?php
//Database Information
$dbhost = "localhost";
$dbname = "crofton_cas";
$dbuser = "crofton_connct";
$dbpass = "wintersS2013";
//mysqli_connect ($dbhost, $dbuser, $dbpass)or die("Could not connect to MySQL: ".mysqli_connect_error());
//mysqli_select_db($dbname) or die("Could not connect to Database:".mysqli_connect_error());
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$con = mysqli_connect($dbhost,"$dbuser","$dbpass","$dbname");
?>