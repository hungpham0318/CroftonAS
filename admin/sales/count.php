

<?php
//$q = $_GET['quid'];
$mdid = $_GET['did'];
$qount = 0;

include "../process/connecti.php";
$conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 // $qount="SELECT COUNT(*) FROM master WHERE msubstatus LIKE "%Inv-No%" AND mdid = $row['did']";
 //$result = mysqli_query($conn,"SELECT DISTINCT dealers.did, dealers.dname FROM master, dealers WHERE master.muid = $q AND master.mdid = dealers.did AND master.msubstatus LIKE "%Inv-No%");
$result = mysqli_query($conn,"SELECT DISTINCT dealers.did, dealers.dname FROM master, dealers WHERE master.mdid = dealers.did AND master.msubstatus LIKE "%Inv-No%");
 
while($row = mysqli_fetch_array($result))
    {$qount=0;
$qount="SELECT COUNT(*) FROM master WHERE msubstatus LIKE "%Inv-No%" AND mdid = $mdid";
  //  echo "<option value='".$row['did']."'>".$row['dname']."</option>";
echo "'<a href="/admin/sales/createinvoicehtmljs.php?did=' + data.master.mdid+ '">Invoice ('.$qount.')</a>'"; 
'<a href="/admin/invoice/singleinvoicesteptwo.php?did=" >Invoice</a>';
},
//' + data.master.mdid+ '&mid='+data.master.mid+'
    
  //  echo '</select>';
   // mysqli_close($conn);
  ?>

