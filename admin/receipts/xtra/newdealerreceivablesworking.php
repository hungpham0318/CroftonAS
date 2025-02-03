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


<thead><tr style ="padding-left:4px; padding-right:2px;"><th style ="width: 7em;">Dealership</th><th>Oldest Invoice Date</th><th>Oldest Invoice# </th><th>Dealer Contact </th><th>Emailed To</th></tr></thead>

<tbody>
<?php 
include "iclosedarrcreate.php";

include "../process/connecti.php";
$resultd = mysqli_query($con, "SELECT * FROM `dealers`
ORDER BY `did` asc ");


foreach($resultd as $drow){
    
$drid = $drow['did'];

include "../process/connecti.php";
$result = mysqli_query($con, "SELECT * FROM `invoices`
LEFT JOIN dealers on `idid` = `did`
WHERE `iclosed` = 0 AND `idid` = $drid
ORDER BY `idate` asc limit 1");

while($row = mysqli_fetch_array($result)){

echo'<td>'.$row['idname'].'</td><td>'.$row['idate'].'</td><td>'.$row['iid'].'</td>



<td>'.$row['dcontact'].'</td>

<td>'.strtolower($row['idinvoiceemail']).'</td></tr>';

}
}
?>

</tbody>
<tfoot><tr><th>Dealership</th><th>Oldest Invoice Date</th><th>Oldest Invoice# </th><th>Dealer Contact </th><th>Emailed To</th></tr></tfoot></table></div>
<script>
$(document).ready(function() {



var table = $('#example').DataTable({
      dom: 'ifrt',
      iDisplayLength: -1,
      //	"scrollY": 700,
      	stateSave: true,
        "columns": [ 
	 { "data": "invoices.idname" },
	 { "data": "invoices.idate" },
            { "data": "invoices.iid" },
            
           
         { "data": "dealers.dcontact" },
			
			
			{ "data": "invoices.idinvoiceemail" },
		
	
		     
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

