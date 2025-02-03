<?php session_start();
$title="Invoice Records";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>


<html><?php include "../sales/clip/stylestart.html";?>
    div.DTED_Lightbox_Wrapper {
        left: 1em;    
        right: 1em;    
        margin: 0 auto;    
        width: 600px;
          }
    <?php include "../sales/clip/styleend.html";?>
    </head>
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
 This page really needs to be grouped by Dealership with links to the pdf and ?...
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                        <tr>

<th>iid</th>
<th>idate</th>
<th>itotal</th>
<th>ipdfurl</th>
<th>iaid</th>
<th>idid</th>
<th>idname</th>
<th>idattn</th>
<th>idaddress</th>
<th>idcitystatezip</th>
<th>iclosed</th>


							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>iid</th>
<th>idate</th>
<th>itotal</th>
<th>ipdfurl</th>
<th>iaid</th>
<th>idid</th>
<th>idname</th>
<th>idattn</th>
<th>idaddress</th>
<th>idcitystatezip</th>
<th>iclosed</th>



                        </tr>
                    </tfoot>
                    
                </table>
	

	
	
	
	
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="/Editor16/js/dataTables.editor.min.js"></script>
	<!--<script type="text/javascript" language="javascript" src="/Editor16/js/dataTables.editor.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/v1.13.4/dist/jquery.mask.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.2.0/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>



<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.display.min.js"></script>
<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.mask.min.js"></script>
<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.select2.min.js"></script>
<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.selectize.min.js"></script>
<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.title.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.0.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>

	
	
	

	
	
	
	
	
	
	
	
	
	



	<script type="text/javascript" language="javascript" class="init">
	
				//template.js
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "invoicerecordsphp.php",
//display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
{"label": "invoices.iid","name":"invoices.iid"},
{"label": "invoices.idate","name":"invoices.idate", "type":  "datetime"},
{"label": "invoices.itotal","name":"invoices.itotal"},
{"label": "invoices.ipdfurl","name":"invoices.ipdfurl"},
{"label": "invoices.iaid","name":"invoices.iaid"},
{"label": "invoices.idid","name":"invoices.idid"},
{"label": "invoices.idname","name":"invoices.idname"},
{"label": "invoices.idattn","name":"invoices.idattn"},
{"label": "invoices.idaddress","name":"invoices.idaddress"},
{"label": "invoices.idcitystatezip","name":"invoices.idcitystatezip"},
{"label": "invoices.iclosed","name":"invoices.iclosed"},


        ] 
         
         
    } );


var table = $('#example').DataTable( {
         dom: "Bfrti",
        ajax: "invoicerecordsphp.php",
"scrollY": 700,
   // responsive: true,
    scrollX: "true",    
    dom: "Bfrt",
    //colReorder: true,
   stateSave: true,
    iDisplayLength: -1,
select: {  
type: 'os',
style:    'os'
//selector: 'td:not(:nth-child(36))' // no row selection on last column
 //selector: 'td:first-child'
//selector: 'td.select-checkbox'
     },
//order: [[ 19, 'desc' ],[22,'asc']],
   columns: [ 
{data: "invoices.iid"},
{data: "invoices.idate", type:"datetime"},
{data: "invoices.itotal"},
{data: "invoices.ipdfurl"},
{data: "invoices.iaid"},
{data: "invoices.idid"},
{data: "invoices.idname"},
{data: "invoices.idattn"},
{data: "invoices.idaddress"},
{data: "invoices.idcitystatezip"},
{data: "invoices.iclosed"},

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
	 
             
        
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],
"columnDefs": [ {
    "targets": 3,
    "createdCell": function (td, cellData, rowData, row, col) {
      if ( cellData < 1 ) {
        $(td).css('text-transform', 'lowercase')
      }},
 
  "render": function ( data, type, row ) {
                    return '<a href ="'+ data +'" target="_blank">'+data+'</a>';
                } },
   
    ],
  "rowCallback": function ( row, data ) { 


   
  
        
  // $('td', row).css('text-transform', 'uppercase');
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


</script>
</body>
</html>


