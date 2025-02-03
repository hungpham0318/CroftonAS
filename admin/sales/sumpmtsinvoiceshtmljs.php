<?php session_start();
$title="Invoice Records";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<!DOCTYPE html>
<html>
<?php include "stylehead-begin.html";?>
<?php include "stylehead-end.html";?>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="customForm">
                        <fieldset class="name">
                            <legend>Name</legend>
                            <editor-field name="invoices.iid"></editor-field>
                            <editor-field name="invoices.idate"></editor-field>
                            <editor-field name="invoices.itotal"></editor-field>
                            <editor-field name="invoices.ipdfurl"></editor-field>
                            <editor-field name="invoices.iaid"></editor-field>
                            <editor-field name="invoices.idid"></editor-field>
                            <editor-field name="invoices.idname"></editor-field>
                            <editor-field name="invoices.idattn"></editor-field>
                            <editor-field name="invoices.idaddress"></editor-field>
                            <editor-field name="invoices.idcitystatezip"></editor-field>
                            <editor-field name="invoices.iclosed"></editor-field>
                            
                        </fieldset>
                   </div>
<div style="width:97%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
	<thead>
		<tr>
	<th>Invoice (pdf)</th>
	<!--<th>Invoice # </th>-->
	<th>Invoice Date</th>
	<th>Invoice Total</th>
	<th>Paid Sum</th>
	<th>Pmt</th>
	<th>Paid</th>
	<th>Dealership </th>
	<th>Attn</th>
	<th>Sent Address</th>
	<th>Sent Address2</th>
	<th>AuctionId</th>
	<th>DealerId</th>
	</tr>
        </thead>
        <tfoot> 
          <tr>
	<th>Invoice</th>
	<!--<th>Invoice # </th>-->
	<th>Invoice Date</th>
	<th>Invoice Total</th>
		<th>Paid Sum</th>
	<th>Pmt</th>
	<th>Paid</th>
	<th>Dealership </th>
	<th>Attn</th>
	<th>Sent Address</th>
	<th>Sent Address2</th>
	<th>AuctionId</th>
	<th>DealerId</th>
	</tr>
        </tfoot>
      	</table>
      	
<?php include "jsscripts.html";?>
	<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script type="text/javascript" language="javascript" class="init">

var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "sumpmtsinvoicerecordsphp.php",
//display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
       {"label": "Invoice Link","name":"invoices.ipdfurl"},     
	//{"label": "Invoice# ","name":"invoices.iid"},
	{"label": "Invoice Date","name":"invoices.idate", "type":  "datetime"},
	{label: "Invoice Total",name:"invoices.itotal"},
	
	 {
                "label": "-",
                "name": "psum",
                "type": "readonly"
            },
	
	{ label: "Paid in Full:",
        name:      "invoices.iclosed",
        type:      "checkbox",
        separator: "|",
        options:   [ { label: '', value: 1 }]
        },
	{"label": "Dealer","name":"invoices.idname"},
	{"label": "Attn","name":"invoices.idattn"},
	{"label": "Sent Address","name":"invoices.idaddress"},
	{"label": "Sent Address2","name":"invoices.idcitystatezip"},
	{"label": "AuctionId","name":"invoices.iaid"},
	{"label": "DealerId","name":"invoices.idid"},
        	] 
  } );


var table = $('#example').DataTable( {
	dom: "Bfrti",
	ajax: "sumpmtsinvoicerecordsphp.php",
	"scrollY": 700,
   			// responsive: true,
    	scrollX: "true",    
    	dom: "Bfrt",
    			//colReorder: true,
   	stateSave: true,
    	iDisplayLength: -1,
     	"drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(7, {page:'current'} ).data().each( function ( group, i ) {
           if ( last !== group ) {
                    $(rows).eq( i ).before(
                   //   '<tr class="group"><td colspan="9">'+group+'</td></tr>'
                 //     '<tr class="group" style="font-size:.8em;font-weight:normal;"><td colspan="12">'+group+'</td></tr>'
                    );
                     last = group;
                		}
            			} );
        			},
	select: { type: 'os', style: 'os' 
				//selector: 'td:not(:nth-child(36))' // no row selection on last column
				//selector: 'td:first-child'
				//selector: 'td.select-checkbox'
    		},
			//order: [[ 19, 'desc' ],[22,'asc']],
   	columns: [ 
	{data: "invoices.ipdfurl"},
		//{data: "invoices.iid"},
	{data: "invoices.idate", type:"datetime"},
		{data:  function (data, type, row, meta) {rowId: 'invoices.iid'
		return data.invoices.itotal; },
		//"createdCell": function (td, cellData, rowData, row, col) {
		//     if ( cellData < 1 ) {
		//       $(td).css('text-transform', 'lowercase');
		//       $(td).css('background-color', 'black!important');
		//       $(td).css('color', 'white');
		//    }},
		    },
	{ "data": function (data, type, row, meta) {rowId: 'invoices.itotal'
		return '<a href="/admin/receipts/paymenthtmljs.php?iid=' +data.invoices.iid+'"><button style ="width:9em;font-size:.8em;font-weight:normal;text-transform:uppercase;">&nbsp;Payments&nbsp;</button></a>'; 
//return '<div style = "text-align:right;width:5em;display:inline-block;"><button style ="width:6.4em;line-height:1em;font-size:.6em;text-transform:uppercase;float:right;">Payment</button></a></div>'; 
},				
	
 		"createdCell": function (td, cellData, rowData, row, col) {
      			if ( cellData < 1 ) {
        			$(td).css('text-transform', 'lowercase');
        			$(td).css('background-color', 'black!important');
         			$(td).css('color', 'white');
      				}},
	},
	{ "data": "psum",
           "render": function ( data, type, full, meta ) {
              return data;}
            }, 
		//{data: "invoices.iclosed"},
 	{ data:   "invoices.iclosed",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active" >';
                    }
                    return data;
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
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },
        buttons: [        
				        // {
				          //      extend: "edit",
				          //      editor: editor,
				          //      formButtons: [
				          //          'Update',
				          //          { label: 'Cancel', fn: function () { this.close(); } }
				          //      ]
				           // },
				         //    {
				           //     text: 'Mark as Ready',
				            //    titleAttr: 'Select row(s) and click here to change Status to A - Active, and Substatus to Recon-Green - Ready, at Auction .',
				           //      action: function ( e, dt, node, config ) {
				  // editor
				   //.edit(dt.rows({selected:true}).indexes('mid'), false)
				    //    .val('master.msubstatus', 'recon-green' )
				 //  .val('master.mstatus', 'A' )
				  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
				      //  .submit();},
				     //  editor: editor
				 // },
	  'colvis',
				//{
		        	//text: 'Close Invoice (Paid)',
		 		//titleAttr: 'Select row(s) and click here to ...',
				//action: function ( e, dt, node, config ) {
				//editor
				//.edit(dt.rows({selected:true}).indexes('ip_id'), false)
			       		// .val('i_payments.ip_date', '<?php echo date("Y-m-d");?>' )
				//.val('invoices.iclosed', '1' )
			  		//.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
				//.submit();},
				//editor: editor
			  	//},
		{text: 'Reload table', action: function () { table.ajax.reload();}}
			// 'pageLength'
	        ],
		"columnDefs": [
					// { "targets": 6,  "visible": false },
					// {  "targets": 4,
					//         data:   "iclosed",
					//           render: function ( data, type, row ) {
					//               if ( type === 'display' ) {
					//                   return '<input type="checkbox" class="editor-active">';
					//               }
					//              return data;
					//           },
					//           className: "dt-body-center"
					//        },
	{
    	"targets": 0,
    	"createdCell": function (td, cellData, rowData, row, col) {
     	 if ( cellData < 1 ) {
       		$(td).css('text-transform', 'lowercase')
     		//$(td).css('color', 'black')
      	}},
 	"render": function ( data, type, row ) {
  	var data2 = data.substring(58);
  	var data1 = data2.substring(0,4);
        return '<div id="invlink'+data1+'" class = "invoicelink" style ="padding-left: .5em;"><a href ="'+ data +'" target="_blank"><button style ="width:8em;font-size:1em;">&nbsp;# '+data1+'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></div>';
                } },
		],
	"rowCallback": function ( row, data ) { 
	$('td', row).attr('nowrap','nowrap');
	$('td', row).css('white-space', 'nowrap');
	if ( data.invoices.iclosed === '1' ){ 
		$('td', row).css('color', 'darkgreen');
	   		//$('td', row).css('border-color-top', 'darkgreen');
	$('input.editor-active', row).prop( 'checked', data.invoices.iclosed == 1 );
		}	        
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
   //var invTotal = api.column(9, {page:'current'}).data().sum();
  // var cntTotal = api.column(9, {page:'current'}).data().count();
  // var divTotal = invTotal/cntTotal;
//   var stillDue = divTotal - pageTotal;
 // if (pageTotal <1 ){stillDue='No Payments';}
 // if (pageTotal > 0){stillDue='$'.stillDue;}
  $(api.column(2).footer()).html('$' + pageTotal   );
   //$(api.column(9).footer()).html(' Balance: $' + stillDue  );
   
}
     
    
    
    
    
  } );
          
            table.column( 2 ).data().sum();
          

        

   
   


				
				
				
					  

  new $.fn.dataTable.Buttons( table, {
        buttons: [
         {
   extend: 'pdfHtml5',
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Invoices',
   exportOptions: { 
     columns: ':visible'
     },
   header: true,
   footer: false,
   title: '<?php echo $title;?>',
   orientation: 'landscape',
   customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 7;
        doc.styles.tableHeader.fontSize = 7;
        doc.styles.title.fontSize = 9;
        // Remove spaces around page title
        doc.content[0].text = doc.content[0].text.trim();
        // Create a footer
        doc['footer']=(function(page, pages) {
            return {
                columns: [
                    '<?php  echo "Printed: ". date("Y-m-d H:i:s");?>',
                    {
                        // This is the right column
                        alignment: 'right',
                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                    }
                ],
                margin: [10, 0]
            }
        });
        // Styling the table: create style object
        var objLayout = {};
        // Horizontal line thickness
        objLayout['hLineWidth'] = function(i) { return .5; };
        // Vertikal line thickness
        objLayout['vLineWidth'] = function(i) { return .5; };
        // Horizontal line color
        objLayout['hLineColor'] = function(i) { return '#aaa'; };
        // Vertical line color
        objLayout['vLineColor'] = function(i) { return '#aaa'; };
        // Left padding of the cell
        objLayout['paddingLeft'] = function(i) { return 4; };
        // Right padding of the cell
        objLayout['paddingRight'] = function(i) { return 4; };
        // Inject the object in the document
        doc.content[1].layout = objLayout;
    }
    },
    {
   extend: 'pdfHtml5',
   titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Invoices - Portrait',
   header: true,
   title: 'Invoices',
   orientation: 'letter',
   exportOptions: {
    	//columns: [1, 2, 3,  11, 12, 16, 17, 18 ],
     columns: ':visible'
     },
  customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 7;
        doc.styles.tableHeader.fontSize = 11;
        doc.styles.title.fontSize = 11;
        // Remove spaces around page title
        doc.content[0].text = doc.content[0].text.trim();
        // Create a footer
        doc['footer']=(function(page, pages) {
            return {
                columns: [
                    '<?php  echo "Printed: ". date("Y-m-d H:i:s");?>',
                    {
                        // This is the right column
                        alignment: 'right',
                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                    }
                ],
                margin: [10, 0]
            }
        });
        // Styling the table: create style object
        var objLayout = {};
        // Horizontal line thickness
        objLayout['hLineWidth'] = function(i) { return .5; };
        // Vertikal line thickness
        objLayout['vLineWidth'] = function(i) { return .5; };
        // Horizontal line color
        objLayout['hLineColor'] = function(i) { return '#aaa'; };
        // Vertical line color
        objLayout['vLineColor'] = function(i) { return '#aaa'; };
        // Left padding of the cell
        objLayout['paddingLeft'] = function(i) { return 4; };
        // Right padding of the cell
        objLayout['paddingRight'] = function(i) { return 4; };
        // Inject the object in the document
        doc.content[1].layout = objLayout;
    }
    }
      ]
    } );
    
 table.buttons( 1, null ).container().appendTo(
    table.table().container()
    );

$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
  			//$('#kount').click( function () {
			 //  alert( table.rows('.selected').data().length +' row(s) selected' );
			 // } );			
	 $('#example').on( 'change', 'input.editor-active', function () {
	   $(this).toggleClass('editor-active');
	 	editor
		.edit( $(this).closest('tr'), false )
		.set( 'invoices.iclosed', $(this).prop( 'checked' ) ? 1 : 0 )
		.submit();
		table.ajax.reload();
			} );
;setInterval(function() {
                    table.ajax.reload(null, false);
                  }, 120000);
		});
</script>
</body>
</html>
