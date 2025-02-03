<?php session_start();
$title="Payments";
$qiid=$_GET['iid'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		$ainitials =$_SESSION['ainitials'];
		}?>

<!DOCTYPE html>
<html>

 
<?php include "../sales/stylehead-begin.html";?>

<?php include "../sales/stylehead-end.html";?>
</head>
<body><div class="container" style="width:98%;margin:0 auto;">
<?php include "../worldview/css/snow-admin-nav.html";?>

<div id="whatever"></div>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="customForm">

<fieldset class="hr" >
<legend>..</legend>

<editor-field name="i_payments.ip_iid"></editor-field>

<editor-field name="i_payments.ip_date"></editor-field>
<editor-field name="i_payments.ip_recvdby"></editor-field>
<editor-field name="i_payments.ip_type"></editor-field>
</fieldset> 

<fieldset class="hr">
<legend>..</legend>




<editor-field name="i_payments.ip_amount"></editor-field>
<editor-field name="i_payments.ip_checknum"></editor-field >

<editor-field name="i_payments.ip_note" ></editor-field>
<editor-field name="i_payments.ip_xtra"></editor-field>


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





    </div>
 <div style="width:100%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                        <tr>

<th>Payment #</th>
<th>Invoice #</th>

<th>Pmt. Date</th>
<th>Pmt. Amount</th>
<th>Rec&apos;d By</th>
<th>Pmt. Type</th>
<th>Check Num</th>
<th>Payment Notes</th>
<th>Pmt. Extra Info</th>
<th>Invoice Total</th>


							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>Payment #</th>
<th>Invoice #</th>

<th>Pmt. Date</th>
<th>Pmt. Amount</th>
<th>Rec&apos;d By</th>
<th>Pmt. Type</th>
<th>Check Num</th>
<th>Payment Notes</th>
<th>Pmt. Extra Info</th>
<th>Invoice Total</th>

                        </tr>
                    </tfoot>
                    
                 </table>  
<div style ="width: 95%;margin:0 auto;font-size:.8em;font-weight:bold;line-height:2em; padding-top:.5em;"><p>Click New Payment to create a payment. Next, double-click the payment row, and the item table, below, will update so the button shows the payment number. Then you can select the items and click to apply that payment number.</p>
<p></p>  </div>
	<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none">Modal iframe</button>


<!-- The Modal -->
<div id="myModal" class="envelope" style="display:block;">

  <!-- Modal content -->
  <div class="modal-content" style="width:97%;">
  <!--   <span class="close" id="span">&times;</span>
     <div style="float:right;">Manage Dealer Access</div>-->
    
    <table style="width:100%;"><thead><th style="width:100%;margin:5px;">Charges for Invoice# <?php echo $qiid;?></th><th style="width:1%;margin:1px;" ></th></thead><tr><td><div id="udr" style="border:none;width:100%;display:inline-block;"><div style="width:100%;margin:5px;text-align:center"> <iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/receipts/invoicepaymentshtmljs.php?iid=<?php echo $qiid;?>" style="width:100%;height:600px;border:none;" ></iframe></div></div>
    
    </td><td></td></tr></table>
   <p style="text-align:center;"></p>
   </div>
   </div>
  <!-- Trigger/Open The Modal -->

<button id="myBtn2" style="display:none">Modal iframe</button>

<!-- The Modal -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
<div class="modal-content" style="width:80%;">
  <span class="close" id="span2" style="display:none;">&times;</span>
  <!--   <span class="close" id="span2">&times;</span>-->
                        
                     
                   
   
    
    <table style="width:100%;"><thead><th style="width:45%;margin:5px;">Manage Auction Access</th><th style="width:45%;margin:5px;" >Selected User Auction Access</th></thead><tr><td><iframe src="/admin/snipstuff/arelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>
    </td><td ><div id="uda" style="border:none;width:100%;display:inline-block;"><div style="margin:20px;text-align:center">When a User is selected,this window displays </br> the Auctions to which the user currently has access.</div></div><!--<iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe>--></td></tr></table> 
    <p style="text-align:center;">To Close this window, just click somewhere else.</p>
  </div>
</div>
	
	<!--  ??</table>?? -->
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
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js"></script>


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
var modal2 = document.getElementById('myModal2');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
btn2.onclick = function() {
    modal2.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  if (event.target == modal) {
        modal.style.display = "none";
    }}
    


span2.onclick = function() { 
   if (event.target == modal2) {
        modal2.style.display = "none";
    }
    
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    } if (event.target == modal2) {
        modal2.style.display = "none";
    }
}
				//template.js
	
	
	
	



var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "paymentonlyinvtotal.php?iid=<?php echo $qiid;?>",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 

 
{"label": "Pmt.id","name":"i_payments.ip_id", "type":"readonly"},
{"label": "Invoice #","name":"i_payments.ip_iid", def:"<?php echo $qiid;?>"},

{"label": "Pmt. Date","name":"i_payments.ip_date","type":"datetime",def:"<?php echo date('Y-m-d');?>"},
{"label": "Pmt. Amount","name":"i_payments.ip_amount"},
{"label": "Rec&apos;d By","name":"i_payments.ip_recvdby", def:"<?php echo $ainitials;?>"},
{"label": "Pmt. Type","name":"i_payments.ip_type",def:"Check"},
{"label": "Check Num","name":"i_payments.ip_checknum"},
{"label": "Payment Notes","name":"i_payments.ip_note"},
{"label": "Pmt. Extra Info","name":"i_payments.ip_xtra"},
{"label": "InvoiceTotal","name":"invoices.itotal"}

        ] 
         
         
    } );


var table = $('#example').DataTable( {

         dom: "Bfrti",
        ajax: "paymentonlyinvtotal.php?iid=<?php echo $qiid;?>",
//"scrollY": 700,
   // responsive: true,
    //scrollX: "true",    
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
{data: "i_payments.ip_xtra"},
{data: "invoices.itotal"},

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
     
	 
/* { id:"myBtn",
 	text:   'Mark Items for Payment' , 
 	titleAttr: '',
                action: function() {
    envelope.style.display = "block";
}},
      
        
{ id:"myBtn2",
text:   'Help!' , 
//"data": function (data, type, row, meta) {rowId: 'users.uid'
//return '<a href="/admin/invoice/singleinvoicesteptwo.php?did=' + data.users.uid+ '&uid='+data.users.uid+'" >Test</a>'; },
	
 	titleAttr: '',
                action: function() {
    modal2.style.display = "block";
}},*/
 {text: 'Edit Payment',
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
            
            
 // 'colvis',
   //  {
           //     text: '..',
          //      titleAttr: 'Select row(s) and click here to ...',
           //      action: function ( e, dt, node, config ) {
  // editor
 //  .edit(dt.rows({selected:true}).indexes('ip_id'), false)
      //  .val('i_payments.ip_date', '<?php echo date("Y-m-d");?>' )
   //.val('master.mstatus', 'A' )
  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
 //       .submit();},
  //     editor: editor
 // },

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],
i18n: {
                edit: {
                    title:  "EDIT ENTRY"
                }
            },
  "rowCallback": function ( row, data ) { 


   
  
        
   $('td', row).css('text-transform', 'uppercase');
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
  
//$('td', row).attr('title','');


   
   
   
   
   
   
  },
   




   

   
   
   
   
   
   
   
   
  //if ( data.master.msubstatus =='Inv-No' ){ 
    
   // $('td', row).css('color', 'darkgreen');
   //    $('td', row).css('border-color-top', 'darkgreen');

   //}
   
//
//
//
//
   
   
   
   
   
 //drawCallback: function () {
   //   var api = this.api();
     // $( api.table().footer() ).html(
       // api.column( 3, {page:'current'} ).data().sum()
      //);
    //}
    
     drawCallback: function() {
   var api = this.api();

   // Total over all pages
   var total = api.column(3).data().sum();

   // Total over this page
   var pageTotal = api.column(3, {page:'current'}).data().sum();
var invTotal = api.column(9, {page:'current'}).data().sum();
   var cntTotal = api.column(9, {page:'current'}).data().count();
   var divTotal = invTotal/cntTotal;
   var stillDue = divTotal - pageTotal;
  if (pageTotal <1 ){stillDue='No Payments';}
 // if (pageTotal > 0){stillDue='$'.stillDue;}
  $(api.column(3).footer()).html('$' + pageTotal   );
 //  $(api.column(9).footer()).html(' Balance: $' + stillDue  );
   
}
     
    
    
    
    
  } );
          
            table.column( 3 ).data().sum();
          

        

   
   

$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
   
 //$('#example tbody').on( 'click', 'tr', function () {
   //     $(this).toggleClass('selected');
//    } );
 // var ud1 = '<iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/sales/uarelatehtmljs.php?uid=';
       var ud1 = '<iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/receipts/invoicepaymentshtmljs.php?iid=<?php echo $qiid;?>&ipid=';
      var uda1 = '<iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/sales/udarelatehtmljs.php?uid=';
var ud2 = 0;
var ud3 = '" style="width:100%;height:500px;border:none;" ></iframe>';
   var qdid = 0;
 var qdidurl ='<a href="/admin/sales/udarelatehtmljs.php?uid=';
        var qdidurl2 ='">id</a>';
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    
    // var ud2 = table.row( this ).data();
    var rowData = table.row( this ).data();
    // ud2 = rowData.ip_id;
        ud2 = table.row( this ).id().substr(4, 4);
        qdid = table.row( this ).id().substr(4, 4);
		//qipid = table.row( this ).id(ip_id);
       
       var qdurl = qdidurl + qdid + qdidurl2;
       var udr = ud1 + ud2 + ud3;
       var uda = uda1 + ud2 + ud3;
document.getElementById("udr").innerHTML = udr;
document.getElementById("uda").innerHTML = uda;
document.getElementById("whatever").innerHTML = qdurl;
   // alert( 'Clicked row id '+qdurl );
  
    console.log( 'qdidurl '+qdidurl );
    console.log( 'qdid '+qdid );
    console.log( 'qdidurl2 '+qdidurl2 );
           console.log( 'udr'+udr );
    } );

 
    //$('#kount').click( function () {
    // alert( table.rows('.selected').data(rowId) +' row(s) selected' );
   // } );

 
});

});

</script>
</body>
</html>


