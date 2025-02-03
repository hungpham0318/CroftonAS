<?php
//Database Information
$dbhost = "localhost";
$dbname = "croftona_cas";
$dbuser = "croftona_connct";
$dbpass = "wintersS2013";
mysql_connect ($dbhost, $dbuser, $dbpass)or die("Could not connect to MySQL: ".mysql_error());
mysql_select_db($dbname) or die("Could not connect to Database:".mysql_error());
?>