<?php


include 'test.php';

$conn=mysqli_connect("localhost","$username","$password","$db_name");

// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$seldname = $_POST['theOption'];
  


 //   $query = "SELECT DISTINCT `dsdphone`,`dnumber`,`dcontact`,`did` FROM dealers WHERE `dname` = $seldname ";

 $result = mysqli_query($conn,"SELECT DISTINCT `dsdphone`,`dnumber`,`dcontact`,`did` FROM dealers WHERE `dname` = '$seldname' ");
//Prepare response html markup
   

//while($row = mysqli_fetch_array($result))
	 while($row = mysqli_fetch_array($result)) {
         $r=$row['dnumber'];
            $s=$row['dcontact'];
            $t=$row['dsdphone']; 
            $u=$row['did'];           }
   
        echo $r;
         echo $t;
         echo $u;
          echo $s;
          
      
          
     
     
   