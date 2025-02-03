<?php
session_start();
// terminate the session
session_destroy();
header("Location: ../caslog/login.php");
?>
