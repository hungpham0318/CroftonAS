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
#example td{font-size:11px;}
<?php include "../sales/stylehead-end.html";?>
</head>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
<?php include "../sales/jsscripts.html"?>
<script>

$(document).ready(function() {
var table = $('#example').DataTable({
      dom: 'ifrt',
      iDisplayLength: -1,
        "columns": [ 
	 
            { "data": "invoices.iid" },
            { "data": "invoices.idate" },
            { "data": "invoices.itotal" },
            	 {
            "data": "pmtsum",
            "render": function ( data, type, full, meta ) {
              return data;
            }              
        },
            { "data": "invoices.ipdfurl" },
            { "data": "invoices.iaid`" },
			{ "data": "invoices.idid" },
			{ "data": "invoices.idname" },
			{ "data": "invoices.idattn" },
			{ "data": "invoices.idaddress" },
			{ "data": "invoices.idcitystatezip" },
			{ "data": "invoices.idinvoiceemail" },
			{ "data": "invoices.iclosed" },
			
			
	
        
     
	 ]
	
    });
    
} );

</script>
<div style="width:97%;margin: 0 auto; ">
<table id="example" class="display compact" cellspacing="0" width="100%" style = "">


<thead><tr><th>Pdf</th><th>2</th><th>Inv. Total</th><th>Balance Due</th><th>5</th><th>7</th><th>8</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>Paid</th></tr></thead>

<tbody>
<?php 




include "../process/connecti.php";
$result = mysqli_query($con, "SELECT invoices.iid,invoices.idate,invoices.itotal,invoices.ipdfurl, invoices.iaid,invoices.idid,invoices.idname, invoices.idattn,invoices.idaddress,invoices.idcitystatezip,invoices.idinvoiceemail, invoices.iclosed, sum(i_payments.ip_amount) as pmtsum FROM invoices LEFT JOIN i_payments on invoices.iid = i_payments.ip_iid GROUP BY invoices.iid");
$x = 0;

foreach($result as $row){
$x++;
$itotal = $row['itotal'];
$ipmtsum = $row['pmtsum'];
$balance = $itotal - $ipmtsum;
echo '<tr id = "row_'.$row['iid'].'">';
echo '<td><div id="invlink'.$row['iid'].'" class = "invoicelink" style ="padding-left: .5em;"><a href ="'.$row['ipdfurl'].'" target="_blank"><button style ="width:8em;font-size:1em;">&nbsp;# '.$row['iid'].'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></div></td>';
echo'<td>'.$row['idate'].'</td>
<td>'.$row['itotal'].'</td>
<td>'.$balance.'</td>
<td><a href="/admin/receipts/paymenthtmljs.php?iid='.$row['iid'].'"><button style ="width:9em;font-size:.8em;font-weight:normal;text-transform:uppercase;">&nbsp;Payments&nbsp;</button></a></td>

<td>'.$row['iaid'].'</td>
<td>'.$row['idid'].'</td>
<td>'.$row['idname'].'</td>
<td>'.$row['idattn'].'</td>
<td>'.$row['idaddress'].'</td>
<td>'.$row['idcitystatezip'].'</td>
<td>'.$row['idinvoiceemail'].'</td>
<td>'.$row['iclosed'].'</td></tr>';



}
?>


</tbody>
<tfoot><tr><th>Pdf</th><th>2</th><th>Inv. Total</th><th>Balance Due</th><th>Payments</th><th>Auction</th><th>DID</th><th>DNAME</th><th>10</th><th>11</th><th>12</th><th>eMailed To:</th><th>Paid</th></tr></tfoot></table></div>


<pre>

	 
	
	 
	 
	 
	 
	 
	    {data: "invoices.ipdfurl"},
		//{data: "invoices.iid"},
	{data: "invoices.idate", type:"datetime"},
		{data:  function (data, type, row, meta) {rowId: 'invoices.iid'
		//return data.invoices.itotal; },
		//"createdCell": function (td, cellData, rowData, row, col) {
		//     if ( cellData < 1 ) {
		//       $(td).css('text-transform', 'lowercase');
		//       $(td).css('background-color', 'black!important');
		//       $(td).css('color', 'white');
		//    }},
		    },
	{ "data": function (data, type, row, meta) {rowId: 'invoices.itotal'
		//return '<a href="/admin/receipts/paymenthtmljs.php?iid=' +data.invoices.iid+'"><button style ="width:9em;font-size:.8em;font-weight:normal;text-transform:uppercase;">&nbsp;Payments&nbsp;</button></a>'; 
//return '<div style = "text-align:right;width:5em;display:inline-block;"><button style ="width:6.4em;line-height:1em;font-size:.6em;text-transform:uppercase;float:right;">Payment</button></a></div>'; 
},				
	
 		"createdCell": function (td, cellData, rowData, row, col) {
      			if ( cellData < 1 ) {
        			$(td).css('text-transform', 'lowercase');
        			$(td).css('background-color', 'black!important');
         			$(td).css('color', 'white');
      				}},
	},
		//{data: "invoices.iclosed"},
 	{ data:   "invoices.iclosed",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                    //    return '<input type="checkbox" class="editor-active" >';
                    }
                   // return data;
                },
                className: "dt-body-center"
            },
	{data: "invoices.idname"},
	{data: "invoices.idattn"},
	{data: "invoices.idaddress"},
	{data: "invoices.idcitystatezip"},
	{data: "invoices.iaid"},
	{data: "invoices.idid"},
/*end new data*/
	 
	 </pre>
</body>
</html>



