		  <?php
//$q = intval($_GET['cas_uid']);
$q = $cas_uid;
include 'msqcon.php';

$conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");

// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //$result = mysqli_query($conn,"SELECT DISTINCT a_uid, a_name, a_url FROM auctions, a_relate WHERE a_id = a_aid AND a_relate.a_uid = $q");

 $result = mysqli_query($conn,"SELECT DISTINCT a_name, a_url FROM auctions WHERE a_id = 1 OR a_id = 3 ");

 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['a_url']."'>".$row['a_name']."</option>";
    }
    echo '</select>';
   // mysqli_close($conn);
  ?>
  