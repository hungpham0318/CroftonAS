<?php
include "../process/connecti.php";



$xyz = mysqli_query($con, 'UPDATE master SET marchive = 1 WHERE msolddate <=  CURDATE()- INTERVAL 90 DAY  AND msolddate != "0000-00-00" AND marchive != 1'); 




/*SELECT mid, msolddate, marchive FROM `master` WHERE msolddate <=  CURDATE()- INTERVAL 90 DAY  AND msolddate != "0000-00-00" AND marchive != 1  
ORDER BY `master`.`msolddate`  ASC*/


mysqli_close($con);

?>