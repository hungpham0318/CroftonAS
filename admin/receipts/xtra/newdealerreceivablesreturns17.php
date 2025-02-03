<?php session_start();
$title="All Invoices";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<head>
<?php include "../sales/stylehead-begin.html";?>
input:disabled{color:black;}
.sorting{background-image:none!important;font-size: .8em;}
.sorting_asc, .sorting_desc {background-image:none!important;font-size: 1em;font-weight:bold;}

<?php include "../sales/stylehead-end.html";?>

<body>
<div style="font-size:.8em!important"><?php include "../worldview/css/snow-admin-nav.html";?></div>
 <?php include "../sales/jsscripts.html"?>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js""></script>

<div style="width:97%;margin: 0 auto; ">
<table id="example" class="display compact" cellspacing="0" width="100%" style = "font-size: 12px!important;">


<thead><tr style ="padding-left:4px; padding-right:2px;"><th style ="width: 7em;">Dealership</th><th>Date of Oldest</th><th># of Unpaid Inv </th><th>Outstanding Amount</th><th>Dealer Contact </th><th>Emailed To</th></tr></thead>

<tbody>
<?php 
//include "iclosedarrcreate.php";

include "../process/connecti.php";
$resultd = mysqli_query($con, "SELECT * FROM `dealers` ");


foreach($resultd as $drow){
    
$drid = $drow['did'];

include "../process/connecti.php";
$result = mysqli_query($con, "SELECT ds.did, ds.dname, ds.dcontact, ds.dinvoiceemail, iv.iid, iv.itotal, iv.idate, iv.itotal FROM dealers ds 
LEFT JOIN (SELECT count(*) as iid, idid, iclosed, idate, SUM(itotal) as itotal
FROM invoices 
GROUP BY idid
HAVING `iclosed` != 1) iv
ON   ds.did = iv.idid
WHERE ds.did = iv.idid AND iclosed = 0 AND ds.did = $drid
ORDER BY `idate` asc LIMIT 1");

while($row = mysqli_fetch_array($result)){

echo'<td>'.$drow['dname'].'</td><td>'.$row['idate'].'</td><td>'.$row['iid'].'</td><td>'.$row['itotal'].'</td>



<td>'.$row['dcontact'].'</td>

<td>'.strtolower($row['dinvoiceemail']).'</td></tr>';

}
}
?>

</tbody>
<tfoot><tr><th>Dealership</th><th>Date of Oldest</th><th># of Unpaid Inv </th><th>Outstanding Amount</th><th>Dealer Contact </th><th>Emailed To</th></tr></tfoot></table></div>
<script>
$(document).ready(function() {



var table = $('#example').DataTable({
      dom: 'ifrt',
      iDisplayLength: -1,
      //	"scrollY": 700,
      //	stateSave: true,
        "columns": [ 
	 { "data": "dealers.dname" },
	 { "data": "invoices.idate" },
            { "data": "invoices.iid" },
            
           { "data": "invoices.itotal" },
         { "data": "dealers.dcontact" },
			
			
			{ "data": "dealers.dinvoiceemail" },
		
	
		     
	 ],
	 
	 

	
	"rowCallback": function ( row, data ) { 
	$('td', row).attr('nowrap','nowrap');
	$('td', row).css('padding-right', '10px');
	$('td', row).css('padding-left', '10px');
		},
			
				


    
    
    
    
  } );
          
          
    });
    


</script>


</body>
</html>

