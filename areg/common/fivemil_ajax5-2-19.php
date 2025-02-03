<?php

//Login to database (usually this is stored in a separate php file and included in each file where required)

include('test.php');
    mysql_connect($host,$username,$password) or die($connect_error); //or die(mysql_error());
    mysql_select_db($db_name) or die($connect_error);

//Get value posted in by ajax
    $seldname = $_POST['theOption'];
    //die('You sent: ' . $seldname);

//Run DB query
    $query = "SELECT DISTINCT `dsdphone`,`dnumber`,`dcontact`,`did` FROM dealers WHERE `dname` = '$seldname' ";
    $result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
    $num_rows_returned = mysql_num_rows($result);
    //die('Query returned ' . $num_rows_returned . ' rows.');

//Prepare response html markup
   

//Parse mysql results and create response string. Response can be an html table, a full page, or just a few characters
   if ($num_rows_returned > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $r=$row['dnumber'];
            $s=$row['dcontact'];
            $t=$row['dsdphone']; 
            $u=$row['did']; }          }
   
        echo $r;
         echo $t;
         echo $u;
          echo $s;
     
   