<?php session_start();
$title="StepOne";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<?php include "stylehead.html";?>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
<div id="customForm">

  </div>
<div class="tablewrapper">	
<table id="example" class="display nowrap" style="width:100%;">
    <thead>
    <tr>

<!-- <th></th>-->

<th></th>
<th>Dealership</th>
<th>Auction Access #</th>
<th>Sale Day Contact</th>
<th>Sale Day Phone</th>
<th>Id</th>
<th>Dealer Phone</th>

<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>

<th>Mail Acct.</th>
<th>EmailInvoices</th>
<th>Fee Default</th>
<th>Fee Description</th>
<th>Dealer Notes</th>
 </tr>



    </thead>
      <tfoot>
        <tr>

<!--<th></th>-->

<th></th>
<th>Dealership</th>
<th>Auction Access #</th>
<th>Sale Day Contact</th>
<th>Sale Day Phone</th>
<th>Id</th>
<th>Dealer Phone</th>

<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>

<th>Mail Acct.</th>
<th>EmailInvoices</th>
<th>Fee Default</th>
<th>Fee Description</th>
<th>Dealer Notes</th>
 </tr>
    </tfoot>
<tbody>
</table>
</div><!--should close tablewrapper-->

</div><!--should close section1-->
</div><!--should close container-->
<?php include "jsscripts.html";?>


<script type="text/javascript" language="javascript" class="init">
	




				//template.js
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "steponephp.php",
//display: 'envelope',
//display: 'lightbox',
       table: "#example",
       
       fields: [ 


{"label": "dname","name": "dealers.dname"},      
{"label": "dnumber","name": "dealers.dnumber"},


{"label": "dcontact","name": "dealers.dcontact"},
{"label": "dsdphone","name": "dealers.dsdphone"},
{"label": "did","name": "dealers.did"},
{"label": "dphone","name": "dealers.dphone"},

{"label": "daddress","name": "dealers.daddress"},
{"label": "dcity","name": "dealers.dcity"},
{"label": "dstate","name": "dealers.dstate"},
{"label": "dzip","name": "dealers.dzip"},
{"label": "dmailAcctNum","name": "dealers.dmailAcctNum"},
{"label": "dinvoiceemail","name": "dealers.dinvoiceemail"},
{"label": "drepfee","name": "dealers.drepfee"},
{"label": "drepfeedesc","name": "dealers.drepfeedesc"},
{"label": "dnotes","name": "dealers.dnotes"}



        ]
 });
 
// $('#example').on( 'click', 'tbody td, tbody span.dtr-data', function (e) {
        // Ignore the Responsive control and checkbox columns
//        if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') ) {
//            return;
//        }
 
        //editor.inline( this );
//  } );

// Activate an inline edit on click of a table cell
    // or a DataTables Responsive data cell
    
 
    var table = $('#example').DataTable( {
   "scrollY": 500,
   // responsive: true,
    scrollX: "true",    
    dom: "Bfrtlip",
    colReorder: true,
    	    
       
 	iDisplayLength: "500",
	lengthMenu: [[10, 100, 500, -1], [10, 100, 500, "All"]], 
  	ajax: "steponephp.php",
        columns: [

            //{ 
// Checkbox select column
             //   data: null,
           //     defaultContent: '',
            //    className: 'select-checkbox',
          //      orderable: false
         //   },
{ "data": function (data, type, row, meta) {rowId: 'dealers.did'
return '<a href="/admin/sales/createinvoicehtmljs.php?did=' + data.dealers.did+ '">Invoice</a>'; }},

{ data: "dealers.dname"},
{ data: "dealers.dnumber"},


{ data: "dealers.dcontact"},
{ data: "dealers.dsdphone"},
{ data: "dealers.did"},
{ data: "dealers.dphone"},
{ data: "dealers.daddress"},
{ data: "dealers.dcity"},
{ data: "dealers.dstate"},
{ data: "dealers.dzip"},
{ data: "dealers.dmailAcctNum"},
{ data: "dealers.dinvoiceemail"},
{ data: "dealers.drepfee"},
{ data: "dealers.drepfeedesc"},
{ data: "dealers.dnotes"}
	 
	 	 ],

        select: {
            style:    'os',
           selector: 'td:nth-child(1)'
        },
        order: [[ 1, 'asc' ]],

         
        buttons: [
        
 {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
             {
                text: 'Mark as Ready',
                titleAttr: 'Select row(s) and click here to change Status to A - Active, and Substatus to Recon-Green - Ready, at Auction .',
                 action: function ( e, dt, node, config ) {
   editor
   .edit(dt.rows({selected:true}).indexes('mid'), false)
        .val('master.msubstatus', 'recon-green' )
   .val('master.mstatus', 'A' )
  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
        .submit();},
       editor: editor
  },
{
 	text:   'Push to Invoicing' , 
 	titleAttr: 'Sets Sold Date to today, Status to S, and Substatus to Inv-No. Next, select record(s) and use "Edit button" to add Sold Price, Sale Type, and Sales Net',
                action: function ( e, dt, node, config ) {
			editor
			.edit(dt.rows({selected:true}).indexes('mid'), false)
     			.val('master.msubstatus', 'Inv-No' )
			.val('master.mstatus', 'S' )
			.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();},
     		
		},
  		
		


//{
//text:   'Invoice' , 
// "data": function (data, type, row, meta) {rowId: 'master.mid'
//return '<a href="/admin/invoice/singleinvoicesteptwo.php?did=' + data.master.mdid+ '&mid='+data.master.mid+'" >Invoice</a>'; },

//},




	        
           
  'colvis',
	 
             

     
   
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],

  "rowCallback": function ( row, data ) { 


   
  
        
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
   $('td', row).css('color', '#000000');
   
$('td', row).attr('nowrap','nowrap');
 $('td', row).css('border-width','1px');
    $('td', row).css('border-style','solid');


$('td', row).css('text-transform', 'Uppercase');
$('td', row).css('font-family','monospace');
$('td', row).css('white-space','nowrap');
$('td', row).css('font-size','1.25em');
  // if ( data.master.msubstatus == "recon-green" ){ 
  //  $('td', row).css('border-color', 'green');
  //  $('td', row).css('color', 'darkgreen');
//   }
 //  else if ( data.master.msubstatus == "recon-red" ){ 
 //  $('td', row).css('border-color', 'red');
//$('td', row).css('color', 'darkred');
 //  }
//   else if ( data.master.msubstatus == "recon-blue" ){ $('td', row).css('border-color', 'blue');
//      $('td', row).css('color', 'black');}
//   else if ( data.master.msubstatus == "recon-yellow" ){ $('td', row).css('border-color', 'gold');
//   $('td', row).css('color', 'black');}
//   else if ( data.master.msubstatus == "arbit-m" ){ $('td', row).css('color', 'darkgreen');
 //  $('td', row).css('border-color', 'darkgreen');}
  // else if ( data.master.msubstatus == "arbit-z" ){ $('td', row).css('color', 'darkgreen');
  // $('td', row).css('border-color', 'darkgreen');}
 //  else if ( data.master.msubstatus == "Inv-No" ){ $('td', row).css('color', '#000000');
 //  $('td', row).css('border-color', 'black');}
 // else if ( data.master.msubstatus == "Inv-Sent" ){ $('td', row).css('color', '');
 // $('td', row).css('border-color', '#000000');}
//   else if ( data.master.msubstatus == "Inv-Paid" ){ $('td', row).css('color', 'black');
 //  $('td', row).css('border-color', 'darkgreen');}
//$('td', row).attr('title','The information in Auction, Registrant, and Dealership columns is only editable when using the checkbox selector and the Edit button.');


   
   
   
   
   
   
  }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  //if ( data.master.msubstatus =='Inv-No' ){ 
    
   // $('td', row).css('color', 'darkgreen');
   //    $('td', row).css('border-color-top', 'darkgreen');

   //}

  
    } );
          
          
   
  new $.fn.dataTable.Buttons( table, {
        buttons: [
         {
   extend: 'pdfHtml5',
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: '<?php echo $title;?>-Landscape',
   exportOptions: { 
    
 columns: ':visible'
    
   },
  header: true,
   footer: false,
   title: '<?php echo $title;?>',
   orientation: 'landscape',
  /**/
     orientation: 'landscape',
    exportOptions: {
         columns: ':visible'
    },
    customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 7;
        doc.defaultStyle.textTransform = 'uppercase';
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
    titleAttr: 'Lane/Run/Run Date/VIN/Year/Make/Statuses',
   text: '<?php echo $title;?>-Portrait',
   
  header: true,
  
   title: '<?php echo $title;?>',
   orientation: 'letter',
 
    exportOptions: {
         //columns: ':visible'
         columns: [1, 2, 3,  11, 12, 16, 17, 18 ]
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

 
});

             
       
 
     
     
//dom toolbar
 
 
 
// Disable KeyTable while the main editing form is open

    

</script></body></html>
