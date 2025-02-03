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
  
 $result = mysqli_query($conn,"SELECT DISTINCT dealers.did, dealers.dname FROM master, dealers WHERE master.muid = $q AND master.mdid = dealers.did AND marchive=0");
 




 while($row = mysqli_fetch_array($result)){
//<option value="project" <?php if(isset($_POST['type']) && $_POST['type'] == "project") echo 'selected="selected"';?>>Project</option>
//if(isset($_POST['type']) && $_POST['type'] == "project"
 if($row['did'] = $_POST['did']){
          $isSelected = ' selected'; // if the option submited in form is as same as this row we add the selected tag
$dealerDealerselected = $row['dname'];
     } else {
          $isSelected = ''; // else we remove any tag
     
    
} echo '<option value = "'.$row['dealers.did'].'"'.$isSelected.'>'.$row['dealers.dname'].'</option>';
}


 echo "<option value='".$row['did']."'>".$row['dname']."</option>";
echo '</select>';

// mysqli_close($conn);


 





















