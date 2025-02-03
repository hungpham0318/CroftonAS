<?php
$q = $quid;
//include 'test.php';
include "../admin/process/connecti.php";
$conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//$result = mysqli_query($conn,"SELECT DISTINCT dealers.did, dealers.dname FROM ud_relate, dealers WHERE ud_relate.u_id = $q AND ud_relate.d_id = dealers.did AND marchive=0");
$result = mysqli_query($conn,"SELECT DISTINCT dealers.did, dealers.dname FROM master, dealers WHERE master.muid = $q AND master.mdid = dealers.did AND marchive=0");
//$result = mysqli_query($conn,"SELECT DISTINCT dealers.did, dealers.dname FROM ud_relate, dealers WHERE ud_relate.u_id = $q AND ud_relate.d_id = dealers.did AND marchive=0");
//$result = mysqli_query($conn,"SELECT DISTINCT dealers.did, dealers.dname FROM dealers Left Join ud_relate on dealers.did = ud_relate.d_id WHERE ud_relate.u_id = $q");
echo '<option value="%%">ALL DEALERSHIPS</option>';
 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['did']."'>".$row['dname']."</option>";
    }
    echo '</select>';
   // mysqli_close($conn);


