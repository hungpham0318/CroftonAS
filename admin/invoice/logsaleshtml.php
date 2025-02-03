<?php session_start();
$title="Log Sales";

if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<a href="/admin/worldview/index.php">Click here to login</a>';
	}else{ include 'logging.php';
	}?>

