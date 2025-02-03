<html>
<head>
<?php include "../sales/stylehead-begin.html";?>
input:disabled{color:black;}
.sorting{background-image:none!important;font-size: .8em;}
.sorting_asc, .sorting_desc {background-image:none!important;font-size: 1em;font-weight:bold;}
<?php include "../sales/stylehead-end.html";?>

<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
 <?php include "../sales/jsscripts.html"?>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js""></script>
	
<div style="width:97%;margin: 0 auto; ">
<table id="example" class="display compact" cellspacing="0" width="100%" style = "">


<thead><tr style ="padding-left:4px; padding=right:2px;"><th style ="width: 9em;">Invoice</th><th>Payments</th><th>Invoice Date</th><th>Total</th><th>Outstanding</th><th>Location</th><th>Id</th><th>Dealership Name</th><th>Emailed To</th><th>Paid</th></tr></thead>

<tbody>
<?php 




include "../process/connecti.php";
$result = mysqli_query($con, "SELECT test_invoices.iid, test_invoices.idate, test_invoices.itotal, test_invoices.ipdfurl, test_invoices.iaid, test_invoices.idid, test_invoices.idname, test_invoices.idattn, test_invoices.idaddress, test_invoices.idcitystatezip, test_invoices.idinvoiceemail, test_invoices.iclosed, sum(i_payments.ip_amount) as pmtsum FROM test_invoices LEFT JOIN i_payments on test_invoices.iid = i_payments.ip_iid GROUP BY test_invoices.iid");
$x = 0;

foreach($result as $row){


$x++;
$iaid = $row['iaid'];
if ($iaid = 1){$iaid = "Manheim,PA";
}

$itotal = $row['itotal'];
$ipmtsum = $row['pmtsum'];
$balance = $itotal - $ipmtsum;
if($balance == "0"){$iclosed = 1;
echo '<tr id = "row_'.$row['iid'].'" style ="background-color:#CCFFCC; color:black;">';
echo '<td><a href ="'.$row['ipdfurl'].'" target="_blank"><button style ="border-radius:.5em;width:7em;background-color:#CCFFCC; color:black;">&nbsp;# '.$row['iid'].'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></td>';
echo'<td><a href="/admin/receipts/paymenthtmljs.php?iid='.$row['iid'].'"><button style ="border-radius:.5em;width:7em;font-size:.8em;font-weight:normal;text-transform:uppercase;background-color:#CCFFCC; color:#000000;"">&nbsp;Payments&nbsp;</button></a></td>';


}else{
$iclosed = $row['iclosed'];
echo '<tr id = "row_'.$row['iid'].'">';
echo '<td><a href ="'.$row['ipdfurl'].'" target="_blank"><button style ="width:7em;">&nbsp;# '.$row['iid'].'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></td>';
echo'<td><a href="/admin/receipts/paymenthtmljs.php?iid='.$row['iid'].'"><button style ="width:7em;font-size:.8em;font-weight:normal;text-transform:uppercase;">&nbsp;Payments&nbsp;</button></a></td>';

}
echo'<td>'.$row['idate'].'</td>
<td>$'.$row['itotal'].'</td>
<td>$'.number_format($balance,2).'</td>';
echo'<td>'.$iaid.'</td>
<td>'.$row['idid'].'</td>
<td>'.$row['idname'].'</td>
<td>'.$row['idinvoiceemail'].'</td>';

if($iclosed == 1){
echo '<td><input type= "checkbox" value="'.$iclosed.'" style = "border:1px solid green;" disabled readonly checked></td></tr>';
}else{
echo '<td><input type= "checkbox" value="'.$iclosed.'" disabled readonly></td></tr>';
}


}
?>


</tbody>
<tfoot><tr><th>Invoice</th><th>Payments</th><th>Invoice Date</th><th>Inv. Total</th><th>Balance Due</th><th>Auction</th><th>DID</th><th>Dealership</th><th>Emailed To</th><th>Paid</th></tr></tfoot></table></div>



	 

<script>
Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
$(document).ready(function() {



var table = $('#example').DataTable({
      dom: 'ifrt',
      iDisplayLength: -1,
      	"scrollY": 700,
      	stateSave: true,
        "columns": [ 
	 
            { "data": "test_invoices.iid" },
            { "data": "test_invoices.idate" },
            { "data": "test_invoices.itotal" },
            	 {
            "data": "pmtsum",
            "render": function ( data, type, full, meta ) {
              return data;
            }              
        },
            { "data": "test_invoices.ipdfurl" },
            { "data": "test_invoices.iaid`" },
			{ "data": "test_invoices.idid" },
			{ "data": "test_invoices.idname" },
			
			{ "data": "test_invoices.idinvoiceemail" },
			{ "data": "test_invoices.iclosed" },
		     
	 ],
	 
	 

	
	"rowCallback": function ( row, data ) { 
	$('td', row).attr('nowrap','nowrap');
	$('td', row).css('padding-right', '10px');
	$('td', row).css('padding-left', '10px');
//	if(data.test_invoices.pmtsum = 0 ){ 
//		$('td', row).css('color', 'darkgreen');
//	   		//$('td', row).css('border-color-top', 'darkgreen');
	//$('input.editor-active', row).prop( 'checked', data.test_invoices.iclosed == 1 );
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
   var api = this.api();

   // Total over all pages
   var total = api.column(3).data().sum();

   // Total over this page
   var pageTotal = api.column(3, {page:'current'}).data().sum();
   var acctRecv = api.column(4, {page: 'current'}).data().sum();
   //var invTotal = api.column(9, {page:'current'}).data().sum();
  // var cntTotal = api.column(9, {page:'current'}).data().count();
  // var divTotal = invTotal/cntTotal;
//   var stillDue = divTotal - pageTotal;
 // if (pageTotal <1 ){stillDue='No Payments';}
 // if (pageTotal > 0){stillDue='$'.stillDue;}
  $(api.column(3).header()).html('$' + (pageTotal).formatMoney(2, '.', ',')   + '<br/>Billed');
   $(api.column(4).header()).html('$' + (acctRecv).formatMoney(2, '.', ',')   + '<br/>A / R');
   //$(api.column(9).footer()).html(' Balance: $' + stillDue  );
   
}
    
    
    
    
  } );
          
           // table.column( 2 ).data().sum();
    });
    


</script>
</body>
</html>

