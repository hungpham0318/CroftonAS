<?php
$dbhost = "localhost";
$dbname = "manheim_cas";
$dbuser = "manheim_connect";
$dbpass = "wintersS2013";
mysql_connect ($dbhost, $dbuser, $dbpass)or die("Could not connect to MySQL: ".mysql_error());
mysql_select_db($dbname) or die("Could not connect to Database:".mysql_error());
?>