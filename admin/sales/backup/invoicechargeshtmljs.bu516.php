<?php session_start();
$title="Invoice Charges";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<html>
<?php include "../sales/clip/stylestart.html";?>
    div.DTED_Lightbox_Wrapper {    left: 1em;    right: 1em;    margin: 0 auto;    width: 600px;         }
    <?php include "../sales/clip/styleend.html";?>
    
    </head>

<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
<!--</br><button id="kount">Row count</button></br><p>-->


 <div id="customForm">
                        <fieldset class="name">
                            <legend>Name</legend>
                            
                           
                            
                            
                            <editor-field name="i_charges.ic_id"></editor-field>
<editor-field name="i_charges.ic_date"></editor-field>
<editor-field name="i_charges.ic_iid"></editor-field>
<editor-field name="i_charges.ic_mid"></editor-field>
<editor-field name="i_charges.ic_amount"></editor-field>
                            <editor-field name="i_charges.ic_description"></editor-field>
                            <editor-field name="i_charges.ic_solddate"></editor-field>
                            <editor-field name="i_charges.ic_qty"></editor-field>
                            <editor-field name="i_charges.ic_rate"></editor-field>
                            <editor-field name="i_charges.ic_maid"></editor-field>
                            <editor-field name="i_charges.ic_stock"></editor-field>
                                <editor-field name="i_charges.ic_paid"></editor-field>
                            <editor-field name="i_charges.ic_note"></editor-field>
                            <editor-field name="i_charges.ic_xtraint"></editor-field>
                           
                         
                     
                            
                     <!--             <editor-field name="i_charges.ic_id"></editor-field>
                           <editor-field name="i_charges.ic_date"></editor-field>
<editor-field name="i_charges.ic_iid"></editor-field>
<editor-field name="i_charges.ic_mid"></editor-field>

<editor-field name="i_charges.ic_amount"></editor-field>
<editor-field name="i_charges.ic_description"></editor-field>
<editor-field name="i_charges.ic_solddate"></editor-field>
<editor-field name="i_charges.ic_qty"></editor-field>
<editor-field name="i_charges.ic_rate"></editor-field>
<editor-field name="i_charges.ic_maid"></editor-field>
<editor-field name="i_charges.ic_stock"></editor-field>
<editor-field name="i_charges.ic_paid"></editor-field>
<editor-field name="i_charges.ic_note"></editor-field>
<editor-field name="i_charges.ic_xtraint"></editor-field>   -->
                            
                        </fieldset>
                       
                        
                        
                        
                    </div>



 <div style="width:97%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                        <tr>

<th>ic_id</th>
<th>ic_date</th>
<th>ic_iid</th>
<th>ic_mid</th>

<th>ic_amount</th>
<th>ic_description</th>
<th>ic_solddate</th>
<th>ic_qty</th>
<th>ic_rate</th>
<th>ic_maid</th>
<th>ic_stock</th>
<th>ic_paid</th>
<th>ic_note</th>
<th>ic_xtraint</th>


							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>ic_id</th>
<th>ic_date</th>
<th>ic_iid</th>
<th>ic_mid</th>

<th>ic_amount</th>
<th>ic_description</th>
<th>ic_solddate</th>
<th>ic_qty</th>
<th>ic_rate</th>
<th>ic_maid</th>
<th>ic_stock</th>
<th>ic_paid</th>
<th>ic_note</th>
<th>ic_xtraint</th>



                        </tr>
                    </tfoot>
                    
                </table>
<div id='listData'></div>
    

	<?php include"jsscripts.html";?>
	



	<script type="text/javascript" language="javascript" class="init">
	 
				//template.js
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "invoicechargesphp.php",
//display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
{"label": "i_charges.ic_id","name":"i_charges.ic_id"},
{"label": "i_charges.ic_date","name":"i_charges.ic_date", type:"datetime"},
{"label": "i_charges.ic_iid","name":"i_charges.ic_iid"},

{"label": "i_charges.ic_mid","name":"i_charges.ic_mid"},

{"label": "i_charges.ic_amount","name":"i_charges.ic_amount"},
{"label": "i_charges.ic_description","name":"i_charges.ic_description"},
{"label": "i_charges.ic_solddate","name":"i_charges.ic_solddate", "type":"datetime"},
{"label": "i_charges.ic_qty","name":"i_charges.ic_qty"},
{"label": "i_charges.ic_rate","name":"i_charges.ic_rate"},
{"label": "i_charges.ic_maid","name":"i_charges.ic_maid"},
{"label": "i_charges.ic_stock","name":"i_charges.ic_stock"},
{"label": "i_charges.ic_paid","name":"i_charges.ic_paid"},
{"label": "i_charges.ic_note","name":"i_charges.ic_note"},
{"label": "i_charges.ic_xtraint","name":"i_charges.ic_xtraint"},


        ] 
         
         
    } );

var rows = $('tr.immediate');

var table = $('#example').DataTable( {





         dom: "Bfrti",
        ajax: "invoicechargesphp.php",
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
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                      //  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                        '<tr class="group"><td colspan="10">'+"Invoice Number:&nbsp;"+group+'<a href="payment.php?iid='+group+'">&nbsp;&nbsp; Record payment for this invoice.</a></td></tr>'
                    );
 
                    last = group;
                }
            } );
        },
select: {  
type: 'os',
style:    'os'
//selector: 'td:not(:nth-child(36))' // no row selection on last column
 //selector: 'td:first-child'
//selector: 'td.select-checkbox'
     },
     
     "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        
//order: [[ 19, 'desc' ],[22,'asc']],
   columns: [ 
{data: "i_charges.ic_id"},
{data: "i_charges.ic_date"},
{data: "i_charges.ic_iid"},
{data: "i_charges.ic_mid"},

{data: "i_charges.ic_amount"},
{data: "i_charges.ic_description"},
{data: "i_charges.ic_solddate", type: 'datetime'},
{data: "i_charges.ic_qty"},
{data: "i_charges.ic_rate"},
{data: "i_charges.ic_maid"},
{data: "i_charges.ic_stock"},
{data: "i_charges.ic_paid"},
{data: "i_charges.ic_note"},
{data: "i_charges.ic_xtraint"},

/*end new data*/
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [         {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
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
	 
             
        
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],

  "rowCallback": function ( row, data ) { 


   
  
        
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
   
   
$('td', row).attr('nowrap','nowrap');
 $('td', row).css('font-family','monospace');
$('td', row).css('white-space','nowrap');
$('td', row).css('font-size','1.25em');
$('td', row).attr('title','The information in Auction, Registrant, and Dealership columns is only editable when using the checkbox selector and the Edit button.');


   
   
   
   
   
   
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
   text: 'Invoices',
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
        columns: ':visible'
      //   columns: [1, 2, 3,  11, 12, 16, 17, 18 ]
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
 var rowData = table.rows( rows ).data();  
 
 
    table.buttons( 1, null ).container().appendTo(
        table.table().container()
    );
    
    
   // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    //$('#kount').click( function () {
     //alert( table.rows('.selected').data().length +' row(s) selected' );
     //alert(table.rows('.selected').data() +' row(s) selected');
    // console.log( table.rows('.selected').data() +' row(s) selected' );
     //console.table([table.row(this).data()], ["i_charges.ic_id"]);
     //console.log(table.row(this).data().i_charges.ic_id);
   //  console.table([table.row(this).data().unique()], ["i_charges.ic_id"]);
     // alert(table.rows( rows ).data());
     //  alert(table.rows( rows ).data('alertrows'));
  //  } );




$('#example tbody').on('click', 'tr', function () {
    console.log( table.row(this).data().i_charges.ic_id );
});
});


</script>

</body>
</html>
