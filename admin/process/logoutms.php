<?php session_start();
session_destroy();
echo "Successfully Logged Out";
echo "<meta http-equiv='refresh' content='1;url=../../index.php'>";

?>