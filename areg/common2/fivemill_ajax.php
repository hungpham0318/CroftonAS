<?php




$conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");

// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 
 
 
 
 

    $seldname = $_POST['theOption'];
  


    $query = "SELECT DISTINCT `dsdphone`,`dnumber`,`dcontact`,`did` FROM dealers WHERE `dname` = '$seldname' ";


//Prepare response html markup
   


	 while($row = mysqli_fetch_array($result)) {
            $r=$row['dnumber'];
            $s=$row['dcontact'];
            $t=$row['dsdphone']; 
            $u=$row['did'];           }
   
        echo $r;
         echo $t;
         echo $u;
          echo $s;
     
     
   