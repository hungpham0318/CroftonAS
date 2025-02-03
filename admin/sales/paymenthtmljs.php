<?php session_start();
$title="Payments";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<!DOCTYPE html>
<html>

 
<?php include "stylehead-begin.html";?>
   
div.DTED_Lightbox_Content {
   margin-left:7%;
    width: 86%;
} 
<?php include "stylehead-end.html";?>
</head>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="customForm">

<fieldset class="hr" >
<legend>..</legend>
<editor-field name="i_payments.ip_id"></editor-field>
<editor-field name="i_payments.ip_iid"></editor-field>

<editor-field name="i_payments.Ip_date"></editor-field>
</fieldset> 
<!--<fieldset class="hr">
<legend>Recon Info</legend>
<editor-field name="i_payments.ip_id"></editor-field>
<editor-field name="i_payments.ip_iid"></editor-field>
<editor-field name="i_payments.ip_checknum"></editor-field>
<editor-field name="i_payments.ip_date"></editor-field>
<editor-field name="i_payments.ip_amount"></editor-field>
<editor-field name="i_payments.ip_recvdby"></editor-field>
<editor-field name="i_payments.ip_type"></editor-field>
<editor-field name="i_payments.ip_note"></editor-field>
<editor-field name="i_payments.ip_xtra"></editor-field>




</fieldset> -->


<fieldset class="hr">
<legend>..</legend>



<editor-field name="i_payments.ip_amount"></editor-field>


<editor-field name="i_payments.ip_note" ></editor-field>
<editor-field name="i_payments.ip_xtra"></editor-field>



</fieldset> 

<fieldset class="hr" >
<legend>..</legend>
<editor-field name="i_payments.ip_recvdby"></editor-field>
<editor-field name="i_payments.ip_type"></editor-field>
<editor-field name="i_payments.ip_checknum"></editor-field >



</fieldset>
    </div>
 <div style="width:100%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                        <tr>

<th>Pmt.id</th>
<th>Invoice #</th>

<th>Pmt. Date</th>
<th>Pmt. Amount</th>
<th>Rec&apos;d By</th>
<th>Pmt. Type</th>
<th>Check Num</th>
<th>Payment Notes</th>
<th>Pmt. Extra Info</th>



							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>Pmt.id</th>
<th>Invoice #</th>

<th>Pmt. Date</th>
<th>Pmt. Amount</th>
<th>Rec&apos;d By</th>
<th>Pmt. Type</th>
<th>Check Num</th>
<th>Payment Notes</th>
<th>Pmt. Extra Info</th>




                        </tr>
                    </tfoot>
                    
                </table>
<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none;">Modal iframe</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p></p>
    <table><tr><td ><iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></td><td><iframe src="/admin/worldview/css/substatus-key-iframe.php"   style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></tr></table>
  </div>

	</div>

	
	
	
	
	
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
	// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

				//template.js
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "paymentonlyphp.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 

 
{"label": "Pmt.id","name":"i_payments.ip_id", "type":"readonly"},
{"label": "Invoice #","name":"i_payments.ip_iid"},

{"label": "Pmt. Date","name":"i_payments.ip_date","type":"datetime"},
{"label": "Pmt. Amount","name":"i_payments.ip_amount"},
{"label": "Rec&apos;d By","name":"i_payments.ip_recvdby"},
{"label": "Pmt. Type","name":"i_payments.ip_type"},
{"label": "Check Num","name":"i_payments.ip_checknum"},
{"label": "Payment Notes","name":"i_payments.ip_note"},
{"label": "Pmt. Extra Info","name":"i_payments.ip_xtra"}


        ] 
         
         
    } );


var table = $('#example').DataTable( {
         dom: "Bfrti",
        ajax: "paymentonlyphp.php",
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


/*begin new data:*/
{data: "i_payments.ip_id" },
{data: "i_payments.ip_iid"},

{data: "i_payments.ip_date"},
{data: "i_payments.ip_amount"},
{data: "i_payments.ip_recvdby"},
{data: "i_payments.ip_type"},
{data: "i_payments.ip_checknum"},
{data: "i_payments.ip_note"},
{data: "i_payments.ip_xtra."},


/*end new data*/
	 ],
	 select: {
            style: 'os',
           // selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [   {
            extend: 'create',
            editor: editor,
text: 'New Payment',
            formButtons: [
                {
                    label: 'Cancel',
                    fn: function () { this.close(); }
                },
                'Save Payment'
            ]
        },
      {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
            {
                text: '..',
                titleAttr: 'Select row(s) and click here to ...',
                 action: function ( e, dt, node, config ) {
   editor
   .edit(dt.rows({selected:true}).indexes('ip_id'), false)
        .val('i_payments.ip_date', '<?php echo date("Y-m-d");?>' )
   //.val('master.mstatus', 'A' )
  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
        .submit();},
       editor: editor
  },
            
  'colvis',
	 
                { id:"myBtn",
 	text:   'Status Key' , 
 	titleAttr: '',
                action: function() {
    modal.style.display = "block";
}},
        
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],
i18n: {
                edit: {
                    title:  "INSERT YOUR REPLACEMENT TO EDIT ENTRY HERE"
                }
            },
//  "rowCallback": function ( row, data ) { 


   
  
        
//   $('td', row).css('text-transform', 'uppercase');
//   $('td', row).css('white-space', 'nowrap');
//   $('td', row).css('color', '#000000');
   
//$('td', row).attr('nowrap','nowrap');
 //$('td', row).css('border-width','1px');
   // $('td', row).css('border-style','solid');


//$('td', row).css('text-transform', 'Uppercase');
//$('td', row).css('font-family','monospace');
//$('td', row).css('white-space','nowrap');
//$('td', row).css('font-size','1.25em');
  // if ( data.master.msubstatus == "recon-green" ){ 
 //   $('td', row).css('border-color', 'green');
  //  $('td', row).css('color', 'darkgreen');
  // }
  // else if ( data.master.msubstatus == "recon-red" ){ 
 //  $('td', row).css('border-color', 'red');
//$('td', row).css('color', 'darkred');
 //  }
  
//$('td', row).attr('title','The information in Auction, Registrant, and Dealership columns is only editable when using the checkbox selector and the Edit button.');


   
   
   
   
   
   
//  }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  //if ( data.master.msubstatus =='Inv-No' ){ 
    
   // $('td', row).css('color', 'darkgreen');
   //    $('td', row).css('border-color-top', 'darkgreen');

   //}

  
    } );
          
          
  

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


