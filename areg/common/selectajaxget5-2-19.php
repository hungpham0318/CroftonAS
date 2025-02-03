<?php
$q = intval($_POST['cas_uid']);
include 'test.php';

$conn=mysqli_connect("localhost","$username","$password","$db_name");

// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $result = mysqli_query($conn,"SELECT DISTINCT dealers.dname FROM ud_relate, users, dealers WHERE ud_relate.u_id = $q AND ud_relate.d_id = dealers.did AND dealers.dactive != 0 ORDER BY dealers.dname ASC");

 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['dname']."'>".$row['dname']."</option>";
    }
    echo '</select>';
   // mysqli_close($conn);
  ?>