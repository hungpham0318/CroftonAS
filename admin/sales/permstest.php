<?php
$testperms=3;
$testperms=$pageperms;

if($_SESSION['perms'] !> $testperms){header('Location: ../worldview/index.php?msg=You dont have permission to view that page!');}
echo "testperms: ".$testperms;

 ?>