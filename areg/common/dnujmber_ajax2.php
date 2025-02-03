<?php

//Login to database (usually this is stored in a separate php file and included in each file where required)

include('test.php');
   
    mysql_connect($server,$login,$pword) or die($connect_error); //or die(mysql_error());
    mysql_select_db($dbname) or die($connect_error);

//Get value posted in by ajax
    $seldname = htmlspecialchars($_POST['theOption']);
    //die('You sent: ' . $seldname);

//Run DB query
    $query = "SELECT DISTINCT `dphone`,`dnumber`,`dcontact`,`did` FROM dealers WHERE `dname` = '$seldname' ";
    $result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
    $num_rows_returned = mysql_num_rows($result);
    //die('Query returned ' . $num_rows_returned . ' rows.');
//Prepare response html markup
    $r = '  
            <h1>Found in Database:</h1>
            <ul style="list-style-type:disc;">
    ';

//Parse mysql results and create response string. Response can be an html table, a full page, or just a few characters
    if ($num_rows_returned > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $r = $row['dnumber']; 
                                 
        }
    } else {
        $r = '<p>No record found</p>';
    }

//Add this extra button for fun
   

//The response echoed below will be inserted into the 
   
        echo $r;
     
     
   