<html>
<head>
<?php include "../sales/stylehead-begin.html";?>

    .dataTables_scrollBody thead{
        visibility:hidden;
    }
    .group{
        background-color:#333!important;
        font-size:11px;
        color:#fff!important;
        opacity:0.7;
    }
.hidden {
    display: none;
}
#example td{font-size:13px;}
<?php include "../sales/stylehead-end.html";?>
</head>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
 <?php include "../sales/jsscripts.html"?>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js""></script>
	
<div style="width:97%;margin: 0 auto; ">
<table id="example" class="display compact" cellspacing="0" width="100%" style = "">


<thead><tr><th>Pdf</th><th>Invoice Date</th><th>Inv. Total</th><th>Balance Due</th><th>Payments</th><th>Auction</th><th>DID</th><th>DNAME</th><th>10</th><th>11</th><th>12</th><th>eMailed To:</th><th>Paid</th></tr></thead>

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
echo '<tr id = "row_'.$row['iid'].'" style ="background-color:#CCFFCC; color:darkgreen;">';
echo '<td><a href ="'.$row['ipdfurl'].'" target="_blank"><button style ="width:8em;font-size:1em;background-color:lightgreen!important;">&nbsp;# '.$row['iid'].'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></td>';

}else{
$iclosed = $row['iclosed'];
echo '<tr id = "row_'.$row['iid'].'">';
echo '<td><a href ="'.$row['ipdfurl'].'" target="_blank"><button style ="width:8em;font-size:1em;">&nbsp;# '.$row['iid'].'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></td>';}
echo'<td>'.$row['idate'].'</td>
<td>$'.$row['itotal'].'</td>
<td>$'.number_format($balance,2).'</td>
<td><a href="/admin/receipts/paymenthtmljs.php?iid='.$row['iid'].'"><button style ="width:9em;font-size:.8em;font-weight:normal;text-transform:uppercase;">&nbsp;Payments&nbsp;</button></a></td>';
echo'<td>'.$iaid.'</td>
<td>'.$row['idid'].'</td>
<td>'.$row['idname'].'</td>
<td>'.$row['idattn'].'</td>
<td>'.$row['idaddress'].'</td>
<td>'.$row['idcitystatezip'].'</td>
<td>'.$row['idinvoiceemail'].'</td>';

if($iclosed == 1){
echo '<td><input type= "checkbox" value="'.$iclosed.'" style = "border:1px solid green;" disabled readonly checked></td></tr>';
}else{
echo '<td><input type= "checkbox" value="'.$iclosed.'" disabled readonly></td></tr>';
}


}
?>


</tbody>
<tfoot><tr><th>Pdf</th><th>Invoice Date</th><th>Inv. Total</th><th>Balance Due</th><th>Payments</th><th>Auction</th><th>DID</th><th>DNAME</th><th>10</th><th>11</th><th>12</th><th>eMailed To:</th><th>Paid</th></tr></tfoot></table></div>


<pre>

	 
	
	 
	 
	 
	 
	 
	    {data: "test_invoices.ipdfurl"},
		//{data: "test_invoices.iid"},
	{data: "test_invoices.idate", type:"datetime"},
		{data:  function (data, type, row, meta) {rowId: 'test_invoices.iid'
		//return data.test_invoices.itotal; },
		//"createdCell": function (td, cellData, rowData, row, col) {
		//     if ( cellData < 1 ) {
		//       $(td).css('text-transform', 'lowercase');
		//       $(td).css('background-color', 'black!important');
		//       $(td).css('color', 'white');
		//    }},
		    },
	{ "data": function (data, type, row, meta) {rowId: 'test_invoices.itotal'
		//return '<a href="/admin/receipts/paymenthtmljs.php?iid=' +data.test_invoices.iid+'"><button style ="width:9em;font-size:.8em;font-weight:normal;text-transform:uppercase;">&nbsp;Payments&nbsp;</button></a>'; 
//return '<div style = "text-align:right;width:5em;display:inline-block;"><button style ="width:6.4em;line-height:1em;font-size:.6em;text-transform:uppercase;float:right;">Payment</button></a></div>'; 
},				
	
 		"createdCell": function (td, cellData, rowData, row, col) {
      			if ( cellData < 1 ) {
        			$(td).css('text-transform', 'lowercase');
        			$(td).css('background-color', 'black!important');
         			$(td).css('color', 'white');
      				}},
	},
		//{data: "test_invoices.iclosed"},
 	{ data:   "test_invoices.iclosed",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                     return '<input type="checkbox" class="editor-active" >';
                    }
                   // return data;
                },
                className: "dt-body-center"
            },
	{data: "test_invoices.idname"},
	{data: "test_invoices.idattn"},
	{data: "test_invoices.idaddress"},
	{data: "test_invoices.idcitystatezip"},
	{data: "test_invoices.iaid"},
	{data: "test_invoices.idid"},
/*end new data*/
	 
	 </pre>
	 

<script>

$(document).ready(function() {
  editor = new $.fn.dataTable.Editor( {
        ajax: '../php/staff-html.php',
        table: '#example',


   } );


var table = $('#example').DataTable({
      dom: 'ifrt',
      iDisplayLength: -1,
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
			{ "data": "test_invoices.idattn" },
			{ "data": "test_invoices.idaddress" },
			{ "data": "test_invoices.idcitystatezip" },
			{ "data": "test_invoices.idinvoiceemail" },
			{ "data": "test_invoices.iclosed" },
			
			
	
        
     
	 ],
	
	"rowCallback": function ( row, data ) { 
	$('td', row).attr('nowrap','nowrap');
	$('td', row).css('white-space', 'nowrap');
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
   var total = api.column(2).data().sum();

   // Total over this page
   var pageTotal = api.column(2, {page:'current'}).data().sum();
   var acctRecv = api.column(3, {page: 'current'}).data().sum();
   //var invTotal = api.column(9, {page:'current'}).data().sum();
  // var cntTotal = api.column(9, {page:'current'}).data().count();
  // var divTotal = invTotal/cntTotal;
//   var stillDue = divTotal - pageTotal;
 // if (pageTotal <1 ){stillDue='No Payments';}
 // if (pageTotal > 0){stillDue='$'.stillDue;}
  $(api.column(2).header()).html('$' + pageTotal + '<br/>Total&nbsp;Billed');
   $(api.column(3).header()).html('$' + acctRecv   + '<br/>Receivables');
   //$(api.column(9).footer()).html(' Balance: $' + stillDue  );
   
}
    
    
    
    
  } );
          
           // table.column( 2 ).data().sum();
    });
    


</script>
</body>
</html>



