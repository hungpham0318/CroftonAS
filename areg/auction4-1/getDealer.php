<?php
//getDealer.php

$link = mysqli_connect("localhost", "crofton_connct", "wintersS2013","crofton_cas")or die("Could not connect to MySQL: ".mysqli_error());
$dname = $_REQUEST['dname'];

$sql = mysqli_query($link, "SELECT DISTINCT dsdphone , dnumber, dcontact FROM dealers WHERE dname = '".$dname."' ");
$row = mysqli_fetch_array($sql);

$rows = '{"dsdphone":"'.$row['dsdphone'].'","dnumber":"'.$row['dnumber'].'","dcontact":"'.$row['dcontact'].'"}'; 

echo json_encode($rows);


?>