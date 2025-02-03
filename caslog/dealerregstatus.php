<?php session_start();
//require('includes/config.php');

$dealersover90a = '<table><thead><th>Dealership</th><th>Contact</th><th>Contact Phone</th><th>Last Reg</th><th></th></thead><tbody>';
$dealersover45a = '<table><thead><th>Dealership</th><th>Contact</th><th>Contact Phone</th><th>Last Reg</th><th></th></thead><tbody>';
$dealersactivea = '<table><thead><th>Dealership</th><th>Contact</th><th>Contact Phone</th><th>Last Reg</th><th></th></thead><tbody>';
 $today = date("Y-m-d H:i:s");
include "../admin/process/connecti.php";

 $conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  echo "Please make sure you are still logged in!";
  }
  $result=mysqli_query($conn, "SELECT t1.mid, t1.mdid, t1.mrtime 
FROM master t1
WHERE t1.mid = (SELECT t2.mid
                 FROM master t2
                 WHERE t2.mdid = t1.mdid           
                 ORDER BY t2.mdid DESC
                 LIMIT 1) ORDER BY `mid` ASC ");
foreach($result as $rows){
$id = $rows['mdid'];
$idtime = $rows['mrtime'];
 $result2=mysqli_query($conn, "SELECT * FROM dealers WHERE did = $id AND dactive != 0;" );
foreach($result2 as $row){
 
 $testdate = $rows['mrtime'];
  $testdate45 = $rows['mrtime'];

 $testdate = date('Y-m-d', strtotime("+90 days", strtotime($testdate)));
$testdate45 = date('Y-m-d', strtotime("+45 days", strtotime($testdate45)));

if ($testdate  <= $today) {
 $dealersover90 .= '<tr><td>'.$row['dname'].'</td><td>'.$row['dcontact'].'</td><td>'.$row['dsdphone'].'</td><td>'.date("m-d-y", strtotime($rows['mrtime'])).'</td><td></td></tr>';

}else if ($testdate45  <= $today) {
$dealersover45.= '<tr><td>'.$row['dname'].'</td><td>'.$row['dcontact'].'</td><td>'.$row['dsdphone'].'</td><td>'.date("m-d-y", strtotime($rows['mrtime'])).'</td><td></td></tr>';
}else{$dealersactive .='<tr><td>'.$row['dname'].'</td><td>'.$row['dcontact'].'</td><td>'.$row['dsdphone'].'</td><td>'.date("m-d-y", strtotime($rows['mrtime'])).'</td><td></td></tr>';}
    
}}

$dealersover45.= "</tbody></table>";
$dealersover90.=  "</tbody></table>";





$stylabel ='<p style="font-size:18px;font-family:Tahoma, Geneva, sans-serif;font-weight:normal;>"';

$styleinfo ='style="font-size:18px;font-family:Tahoma, Geneva, sans-serif;font-weight: 400;"';

$addresses = "miked@croftonas.com, suzanne@croftonas.com";
//$addresses = "suzanne@croftonas.com";
			//send email
//$to = "suzianne@aol.com";
	//$to = "suzanne@croftonas.com";
//$to = 'mikec@croftonas.com'.', '.'miked@croftonas.com'.', '.'suzannenbird@gmail.com';
//$to = $addresses;	
 			$subject = "Dealerships' Registration Status";
			$body = "<p $styleinfo>Happy Monday Morning, Mike!</p><p $styleinfo> The following dealerships have not registered vehicles in the last 45 days.<br></p><p> $dealersover45a $dealersover45 <br></p><p $styleinfo> The following dealerships have not registered vehicles in the last 90 days.<br></p> <p> $dealersover90a	$dealersover90 </p> <p $styleinfo>The following dealerships have registered vehicles in the last 45 days.<br></p><p> $dealersactivea	$dealersactive </p><p> Visit this page (while logged in) https://www.croftonas.com/admin/reports/dateddealers.php for the updated list. </p>";
/*			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress('suzanne@croftonas.com');
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();
			*/
			//redirect to index page
			//header('Location: index.php?action=joined');
			//exit;
		







$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";










$to = $addresses;


$subject = "Dealerships' Registration Status";
$hdrs = "From: crofton@croftonas.com \r\n";
$hdrs .= "MIME-Version: 1.0" . "\r\n";
$hdrs .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
//$mssge = "SaleDate: " . strip_tags($_POST['inpSaleDate']). "\r\n";
//$mssge .= "Dealer: " . strip_tags($_POST['dname']). "\r\n";
$mssge = $body."\r\n";
//$mssge .= "Phone: " . strip_tags($_POST['inpYourPhone']). "\r\n";


             if (mail($to, $subject, $mssge, $hdrs)) {
             
             echo "Happy Monday Morning, Mike!<br>";


echo "These dealerships have not registered cars in the last 45 days:.<br>";
echo $dealersover45a.'<br>';
echo $dealersover45.'<br>';

echo "The following dealerships have not registered vehicles in the last 90 days.<br>";
echo $dealersover90a.'<br>';
echo $dealersover90.'<br>';


echo "The following dealerships are active in the last 45 days.<br>";
echo $dealersactivea.'<br>';
echo $dealersactive.'<br>';}
?>