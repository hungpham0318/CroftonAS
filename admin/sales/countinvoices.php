<?php
$q = intval($_GET['q']);
include "../process/connecti.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//$sql="SELECT Lastname,Age FROM Persons ORDER BY Lastname";
$sql="SELECT mdid, msubstatus, mstatus FROM master WHERE mdid = $q AND msubstatus='Inv-No'";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
echo $rowcount;
return $rowcount;
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);
?>