<?php session_start();
$title="DealersDealers";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>

<?php include "stylehead-begin.html";?>
#DTE_Field_dealers-dinvoiceemail{min-width:50em!important;text-transform:lowercase!important;}
#DTE_Field_dealers-dnotes{min-width:50em!important;}
td{border: 1px solid;}
.green {border: 1px solid green;}
.red {border: 1px solid red;}
<?php include "stylehead-end3.html";?>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p><div id ="whatever"></div>



 <div style="width:97%;margin: 0 auto;">
	//No registrations within last 90 days.
<?php 

$today = date("Y-m-d H:i:s");

include '../../areg/common/msqcon.php';
$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $results=mysqli_query($con, " SELECT * FROM (SELECT mdid, mrtime FROM master ORDER BY mdid, mrtime DESC) a LEFT JOIN dealers on mdid = dealers.did
GROUP BY mdid ORDER BY `a`.`mdid` ASC");
// $result = mysql_query("SELECT * FROM dealers");
echo '<table style="">';
echo '<thead><th>ID</th><th>Dealership</th><th>Location</th><th>SD Contact #</th><th>SD Contact Name</th><th>AA#</th><th>Date of Last Reg</th></thead>';

//echo '<table class="display_table">';
foreach($results as $row){
    $today = date("Y-m-d H:i:s");
  // echo $today ."<br>";
 $testdate = $row['mrtime'];
// echo $testdate ."<br>";
 $testdate = date('Y-m-d', strtotime("+3 months", strtotime($testdate)));

if ($testdate  <= $today) {
    echo'<tr style="white-space: nowrap;border:2px solid red;"><td style="border:2px solid red;">'.$row['did'].'</td>'.'<td style="border:2px solid red;">'.$row['dname'].'</td>'.'<td style="border:2px solid red;">'.$row['dcity'].'</td>'.'<td style="border:2px solid red;">'.$row['dsdphone'].'</td>'.'<td style="border:2px solid red;">'.$row['dcontact'].'</td>'.'<td style="border:2px solid red;">'.$row['dnumber'].'</td>'.'<td style="border:2px solid red;">'.date("m-d-y", strtotime($row['mrtime'])).'</td>'.'</tr>';
    }else{ /*echo'<tr style="border:2px solid green;"><td style="border:2px solid green;">'.$row['did'].'</td>'.'<td style="border:2px solid green;">'.$row['dname'].'</td>'.'<td style="border:2px solid green;">'.$row['dcity'].'</td>'.'<td style="border:2px solid green;">'.$row['dsdphone'].'</td>'.'<td style="border:2px solid green;">'.$row['dcontact'].'</td>'.'<td style="border:2px solid green;">'.$row['dnumber'].'</td>'.'<td style="border:2px solid green;">'.$row['mdid'].'</td>'.'<td style="border:2px solid green;">'
  .date("m-d-y", strtotime($row['mrtime'])).'</td>'.'</tr>';*/}}
    
    //.date("Y-M-D,$row['mrtime']).'</td>'.'</tr>';}}
    echo "</table>";
    echo '</span>';
     //  mysqli_close();
       
//session_destroy(); 
?>      <!-- end insert -->
       



</div></div>


</body>
</html>