<?php
$q = intval($_SESSION['uid']);
include '../../areg/common/test.php';

$conn=mysqli_connect("localhost","$username","$password","$db_name");

// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $result = mysqli_query($conn,"SELECT DISTINCT dname, dnumber, did FROM priority_ud_relate, users, priority_dealers WHERE priority_ud_relate.u_id = $q AND priority_ud_relate.d_id = priority_dealers.did");

 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['dname']."'>".$row['dname']."</option>";
    $dnumber = $row['dnumber'];
        $did = $row['did'];
        $_SESSION['dnumber'] = $row['dnumber'];
    }
    echo '</select>';
  //  echo $dnumber;
//    echo '<p></p>';
 //   echo $did;
   // mysqli_close($conn);
  ?>