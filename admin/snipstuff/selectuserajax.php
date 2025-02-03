<?php
$q = $quid;
//include 'test.php';
include "../process/connecti.php";
$conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $result = mysqli_query($conn,"SELECT DISTINCT users.uid, users.uname FROM users");
echo '<option value="%%">ALL USERS</option>';
 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['uid']."'>".$row['uname']."</option>";
    }
    echo '</select>';
   // mysqli_close($conn);


