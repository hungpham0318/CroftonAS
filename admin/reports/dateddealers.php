<?php session_start();
$title="Sortable Dealer Status";
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
<h3>Dealerships' Last Registration <br> Red = > 90 days | Orange > 45 days | Green < 45 days</h3>
<table id="example" class="display compact" cellspacing="0" width="100%" style = "font-size: 12px!important;">

<!--
<thead><tr style ="padding-left:4px; padding-right:2px;"><th style ="width: 7em;">Invoice</th><th>Payments</th><th>Invoice Date</th><th>Total</th><th>Outstanding</th><th>Location</th><th>Id</th><th>Dealership Name</th><th>Emailed To</th><th>Paid</th><th>Email</th></tr></thead>
-->

<thead><tr style ="padding-left:4px; padding-right:2px;"><th>ID</th><th>Dealership</th><th>Location</th><th>SD Contact #</th><th>SD Contact Name</th><th>AA#</th><th>Date of Last Reg</th></tr></thead>


<tbody>
<?php 
//include "iclosedarrcreate.php";
 $today = date("Y-m-d H:i:s");
include "../process/connecti.php";
//$result = mysqli_query($con, "SELECT invoices.iid, invoices.idate, invoices.itotal, invoices.ipdfurl, invoices.iaid, invoices.idid, invoices.idname, invoices.idattn, invoices.idaddress, invoices.idcitystatezip, invoices.idinvoiceemail, invoices.iclosed, sum(i_payments.ip_amount) as pmtsum FROM invoices LEFT JOIN i_payments on invoices.iid = i_payments.ip_iid GROUP BY invoices.iid");

/*$result=mysqli_query($con, " SELECT * FROM (SELECT mdid, mrtime FROM master ORDER BY mdid, mrtime DESC) a LEFT JOIN dealers on mdid = dealers.did WHERE dealers.dactive = 1 
GROUP BY mdid ORDER BY `a`.`mdid` ASC");*/

  $result=mysqli_query($con, "SELECT t1.mid, t1.mdid, t1.mrtime 
FROM master t1
WHERE t1.mid = (SELECT t2.mid
                 FROM master t2
                 WHERE t2.mdid = t1.mdid           
                 ORDER BY t2.mdid DESC
                 LIMIT 1) ORDER BY `mid` ASC ");
foreach($result as $rows){
$id = $rows['mdid'];
$idtime = $rows['mrtime'];
 $result2=mysqli_query($con, "SELECT * FROM dealers WHERE did = $id AND dactive != 0;" );
foreach($result2 as $row){
 


 $testdate = date('Y-m-d', strtotime("+90 days", strtotime($idtime)));
$testdate45 = date('Y-m-d', strtotime("+45 days", strtotime($idtime)));
/*
echo $testdate;
echo "<br>";
echo $testdate45;
echo "<br>";
echo $today;
echo "<br>";*/
if ($testdate  <= $today) {
   echo'<tr style="white-space: nowrap;border:1px solid red;"><td style="border:1px solid red;">'.$row['did'].'</td>'.'<td style="border:1px solid red;">'.$row['dname'].'</td>'.'<td style="border:1px solid red;">'.$row['dcity'].'</td>'.'<td style="border:1px solid red;">'.$row['dsdphone'].'</td>'.'<td style="border:1px solid red;">'.$row['dcontact'].'</td>'.'<td style="border:1px solid red;">'.$row['dnumber'].'</td>'.'<td style="border:1px solid red;">'
  .date("m-d-y", strtotime($rows['mrtime'])).'</td>'.'</tr>';
    }else if ($testdate45 <= $today){ echo'<tr style="border:1px solid orange;"><td style="border:1px solid orange;">'.$row['did'].'</td>'.'<td style="border:1px solid orange;">'.$row['dname'].'</td>'.'<td style="border:1px solid orange;">'.$row['dcity'].'</td>'.'<td style="border:1px solid orange;">'.$row['dsdphone'].'</td>'.'<td style="border:1px solid orange;">'.$row['dcontact'].'</td>'.'<td style="border:1px solid orange;">'.$row['dnumber'].'</td>'.'<td style="border:1px solid orange;">'.date("m-d-y", strtotime($rows['mrtime'])).'</td>'.'</tr>';
        
    }else{ echo'<tr style="border:2px solid green;"><td style="border:1px solid green;">'.$row['did'].'</td>'.'<td style="border:1px solid green;">'.$row['dname'].'</td>'.'<td style="border:1px solid green;">'.$row['dcity'].'</td>'.'<td style="border:1px solid green;">'.$row['dsdphone'].'</td>'.'<td style="border:1px solid green;">'.$row['dcontact'].'</td>'.'<td style="border:1px solid green;">'.$row['dnumber'].'</td>'.'<td style="border:1px solid green;">'.date("m-d-y", strtotime($rows['mrtime'])).'</td>'.'</tr>';}}
}
    //.date("Y-M-D,$row['mrtime']).'</td>'.'</tr>';}}
    echo "</table>";






?>


</tbody>
</table></div>



	 

<script>

$(document).ready(function() {




	 
var table = $('#example').DataTable({
      dom: 'ifrt',
      iDisplayLength: -1,
      	"scrollY": 700,
      	stateSave: true,
        "columns": [ 
	 
            { "data": "dealers.did" },
            { "data": "dealers.dname" },
            { "data": "dealers.dcity" },
            //	 {
          //  "data": "pmtsum",
          //  "render": function ( data, type, full, meta ) {
           //   return data;
         //   }              
      //  },
            { "data": "dealers.dsdphone" },
            { "data": "dealers.dcontact`" },
			{ "data": "dealers.dnumber" },
			{ "data": "t1.mrtime" },
			
		//	{ "data": "invoices.idinvoiceemail" },
		//	{ "data": "invoices.iclosed" },
		//	  	 {
         //   "data": "email",
        //    "render": function ( data, type, full, meta ) {
        //      return data;
          //  }              
     //   },
		     
	 ],
	
	"rowCallback": function ( row, data ) { 
	$('td', row).attr('nowrap','nowrap');
	$('td', row).css('padding-right', '10px');
	$('td', row).css('padding-left', '10px');
//	if(data.invoices.pmtsum = 0 ){ 
//		$('td', row).css('color', 'darkgreen');
//	   		//$('td', row).css('border-color-top', 'darkgreen');
	//$('input.editor-active', row).prop( 'checked', data.invoices.iclosed == 1 );
//		}	        
				// $('td', row).css('text-transform', 'uppercase');
				//$('td', row).css('font-family','monospace');
				//$('td', row).css('white-space','nowrap');
				//$('td', row).css('font-size','1.25em');
				//$('td', row).attr('title','The information in Auction, Registrant, and Dealership columns is only editable when using the checkbox selector and the Edit button.');			
		},
				//if ( data.master.msubstatus =='Inv-No' ){ 
				// $('td', row).css('color', 'darkgreen');
				//    $('td', row).css('border-color-top', 'darkgreen');
				//}	
				

     drawCallback: function() {
  //// var api = this.api();

   // Total over all pages
  //// var total = api.column(3).data().sum();

   // Total over this page
  //// var pageTotal = api.column(3, {page:'current'}).data().sum();
 ////  var acctRecv = api.column(4, {page: 'current'}).data().sum();
   //var invTotal = api.column(9, {page:'current'}).data().sum();
  // var cntTotal = api.column(9, {page:'current'}).data().count();
  // var divTotal = invTotal/cntTotal;
//   var stillDue = divTotal - pageTotal;
 // if (pageTotal <1 ){stillDue='No Payments';}
 // if (pageTotal > 0){stillDue='$'.stillDue;}
////  $(api.column(3).header()).html('$' + (pageTotal).formatMoney(2, '.', ',')   + '<br/>Billed');
////   $(api.column(4).header()).html('$' + (acctRecv).formatMoney(2, '.', ',')   + '<br/>A / R');
   //$(api.column(9).footer()).html(' Balance: $' + stillDue  );
   
}
    
    
    
    
  } );
          
           // table.column( 2 ).data().sum();
    });
    


</script>
</body>
</html>

