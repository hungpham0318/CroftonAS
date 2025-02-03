<?php session_start();
$title="InvoicePayments";
$qiid=$_GET['iid'];
$qipid=$_GET['ipid'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<?php include "../sales/stylehead-begin.html";?>
 a.dt-button, a.buttons-selected,  a.buttons-edit {
 height:2.5em!important;
 font-size: .7em!important;
font-family: 'Open Sans' sans-serif!important;
text-transform: uppercase;
 
 }
a.dt-button:focus, a.buttons-selected:focus,  a.buttons-edit:focus {
 height:2.5em!important;
 font-size: .7em!important;
 
 }
a.dt-button:hover, a.buttons-selected:hover,  a.buttons-edit:hover {
 height:2.5em!important;
 font-size: .7em!important;
 
 }
a.dt-button:active, a.buttons-selected:active,  a.buttons-edit:active {
 height:2.5em!important;
 font-size: .7em!important;
 
 }
div.DTED.DTED_Envelope_Wrapper
 {
    width: 100%!IMPORTANT;
    margin-left: -50%!important;}
<?php include "../sales/stylehead-end.html";?>
<body>
<?php //include "../worldview/css/snow-admin-nav.html";?>
<!--<button id="kount">Row count</button>-->
<div id="customForm">

<fieldset class="office" >
<!--<legend>Grouped One</legend>-->
<editor-field name="master.mid" ></editor-field>
<editor-field name="master.minvid"></editor-field>
<editor-field name="master.msubstatus"></editor-field>
<editor-field name="master.mpaid"></editor-field>
</fieldset > 

<fieldset class="hr" ><!--<legend>invoice charge</legend>-->
<editor-field name="i_charges.ic_id"></editor-field>
<editor-field name="i_charges.ic_paid"></editor-field>
<editor-field name="i_charges.ic_description"></editor-field>
<editor-field name="i_charges.ic_amount"></editor-field>
<editor-field name="i_charges.ic_note"></editor-field>
<editor-field name="i_charges.ic_date"></editor-field>
</fieldset> 
<!--
<fieldset class="hr"><legend>invoice </legend>
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
<editor-field name="invoices.idinvoiceemail"></editor-field>
<editor-field name="invoices.iclosed"></editor-field>

</fieldset> -->
   </div>
 
<table id="example" class="display compact responsive" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        

<th>Veh Id</th>
<th>Veh. SubStatus</th>
<th>InvoiceId</th>
<th>Payment #</th>

<th>Line Item id</th>
<th>Payment #</th>
<th>Line Item</th>
<th>Amount</th>
<th>Item Notes</th>
<th>Item Date</th>
<!--
<th>Invoice ID</th>
<th>INvoice Date</th>
<th>Invoice Total</th>
<th>Invoice Link</th>
<th>Auction</th>
<th>DealerId</th>
<th>Dealer Name</th>
<th>idattn</th>
<th>idaddress</th>
<th>idcitystatezip</th>
<th>idinvoiceemail</th>
<th>iclosed</th>-->




				
                        </tr>
                    </thead>
                  
                    
                </table>
	

	
	<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none;">Modal iframe</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Try to pull in related tables in modals using the selected row(s)  Also, create modal content for iframes independent of where they are going to appear</p>
    <table><tr><td ><iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></td><td><iframe src="/admin/worldview/css/substatus-key-iframe.php"   style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></tr></table>
  </div>

</div>
	
	
	
<?php include "../sales/jsscripts.html";?>	
	
	

	
	
	
	
	
	
	
	
	
	



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
        //ajax: "paymentwhatphp.php?iid=<?php echo $qiid;?>",
 ajax: "invoicepaymentsphp.php?iid=<?php echo $qiid.'&ipid='.$qipid;?>",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 

{label: "ID", name:"master.mid"},

           {label: "Substatus:",
                type:  "select",  
               
                name: "master.msubstatus",
                 options: [
        "recon-red",
        "recon-yellow",
        "recon-green",
        "recon-blue",
        "arbit-m",
        "Inv-No",
        "Inv-Sent",
        "Inv-Paid"
    ]},
       
 
{label: "InvoiceId", name:"master.minvid"},


{label: "payment id", name:"master.mpaid"},






{label: "ic_id", name:"i_charges.ic_id"},
{label: "ic_paid", name:"i_charges.ic_paid"},
{label: "ic description", name:"i_charges.ic_description"},
{label: "ic amount", name:"i_charges.ic_amount"},
{label: "ic note", name:"i_charges.ic_note"},
{label: "ic date", name:"i_charges.ic_date"},

{label: "i_payments.ip_id", name:"i_payments.ip_id", type: "readonly"},
{label: "ip_checknum", name:"i_payments.ip_checknum"},
{label: "ip_date", name:"i_payments.ip_date"},
{label: "ip_amount", name:"i_payments.ip_amount"},
{label: "ip recvdby", name:"i_payments.ip_recvdby"},
{label: "ip type", name:"i_payments.ip_type"},
{label: "ip note", name:"i_payments.ip_note"},
{label: "ip xtra", name:"i_payments.ip_xtra"}
/*
{label:  "invoices.iid", name:"invoices.iid"},
{label:  "invoices.idate", name:"invoices.idate"},
{label:  "invoices.itotal", name:"invoices.itotal"},
{label:  "invoices.ipdfurl", name:"invoices.ipdfurl"},
{label:  "invoices.iaid", name:"invoices.iaid"},
{label:  "invoices.idid", name:"invoices.idid"},
{label:  "invoices.idname", name:"invoices.idname"},
{label:  "invoices.idattn", name:"invoices.idattn"},
{label:  "invoices.idaddress", name:"invoices.idaddress"},
{label:  "invoices.idcitystatezip", name:"invoices.idcitystatezip"},
{label:  "invoices.idinvoiceemail", name:"invoices.idinvoiceemail"},
{label:  "invoices.iclosed", name:"invoices.iclosed"}*/

        ] 
         
    } );
    
    






var table = $('#example').DataTable( {
         dom: "Bfrtpi",
       
 ajax: "invoicepaymentsphp.php?iid=<?php echo $qiid.'&ipid='.$qipid;?>",
// ajax: "paymentwhatphp.php",
//"scrollY": 700,
   // responsive: true,
    scrollX: "true",    
    dom: "Bfirt",
    //colReorder: true,
   stateSave: false,
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
{data: "master.mid" },

{data: "master.msubstatus"},
{data: "master.minvid"},
       
{data: "master.mpaid"},


{data: "i_charges.ic_id"},
{data: "i_charges.ic_paid"},
{data: "i_charges.ic_description"},
{data: "i_charges.ic_amount"},
{data: "i_charges.ic_note"},
{data: "i_charges.ic_date"},
/*
{data: "invoices.iid"},
{data: "invoices.idate"},
{data: "invoices.itotal"},
{data: "invoices.ipdfurl"},
{data: "invoices.iaid"},
{data: "invoices.idid"},
{data: "invoices.idname"},
{data: "invoices.idattn"},
{data: "invoices.idaddress"},
{data: "invoices.idcitystatezip"},
{data: "invoices.idinvoiceemail"},
{data: "invoices.iclosed"},
*/




/*end new data*/
	 ],
columnDefs: [
  /*           {
               targets: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40, ],
               visible: false
               
            },
            {
                targets: [ 11 ],
                visible: false,
                 searchable: false
            },
         {  targets: 13,
 
    createdCell: function (td, cellData, rowData, row, col) {
      if ( cellData < 1 ) {
        $(td).css('text-transform', 'lowercase')
         
      }},
 
  "render": function ( data, type, row ) {
                    return '<a href ="'+ data +'" data-toggle="tooltip" title="Right Click Invoice Link to download or to view." target="_blank">'+data+'</a>';
                } }*/
   
    ],
	 select: {
            style: 'os',
           // selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [    
/* {
                extend: "create",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },*/
                {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
 {
 	text:   '<?php if($qipid < -1){echo"Click payment above";}else{echo "Paid In Full with PaymentId: ".$qipid;}?>' , 
 	titleAttr: '',
                action: function ( e, dt, node, config ) {
			var allData = table.rows().data();
			editor
			.edit(table.rows().indexes('mid'), false)
     			.val('master.mpaid', <?php echo $qipid;?> )
			.val('i_charges.ic_paid', <?php echo $qipid;?> )
			.val('master.msubstatus', <?php echo "'Inv-Paid'";?> )
			//.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();
     			},
		},  	
		
		
		 {
 	text:   'Undo Payment - ALL' , 
 	titleAttr: '',
                action: function ( e, dt, node, config ) {
			var allData = table.rows().data();
			editor
			.edit(table.rows().indexes('mid'), false)
     			.val('master.mpaid', '0' )
			.val('i_charges.ic_paid', '0' )
			.val('master.msubstatus', <?php echo "'Inv-Sent'";?> )
			//.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();
     			     			
     			     			

     			},
     		
			},  	


//{
//text:   'Invoice' , 
// "data": function (data, type, row, meta) {rowId: 'master.mid'
//return '<a href="/admin/invoice/singleinvoicesteptwo.php?did=' + data.master.mdid+ '&mid='+data.master.mid+'" >Invoice</a>'; },

//},
         
  //'colvis',
/*          
{ id:"myBtn",
 	text:   'Status Key' , 
 	titleAttr: '',
        action: function() {modal.style.display = "block";}
},*/
{
text: 'Reload table', action: function () { table.ajax.reload();}
}
   // 'pageLength'
   ],

"rowCallback": function ( row, data ) { 
        
 $('td', row).css('text-transform', 'uppercase');
 $('td', row).css('white-space', 'nowrap');
if ( data.i_charges.ic_paid > 0 ){ 
 $('td', row).css('border-color', 'green');
 $('td', row).css('color', 'green'); 
   }
}
   
    } );
          
   setInterval( function () {
    table.ajax.reload();
}, 
30000 );    
   
  new $.fn.dataTable.Buttons( table, {
        buttons: [   
  		
{
//classAttr: 'dt-button buttons-selected buttons-edit disabled',

classAttr: '<?php if($qipid < -1){echo"a dt-button buttons-selected  buttons-edit disabled";}else{echo "dt-button buttons-selected buttons-edit";}?>',
 	text:   '<?php if($qipid < -1){echo"Choose a Payment# in the Top Table";}else{echo "Assign to Payment: #".$qipid;}?>' , 
 	titleAttr: 'Make sure the correct payment# shows in this button, and the appropriate line items are selected before clicking. ',
                action: function ( e, dt, node, config ) {
			editor
			.edit(dt.rows({selected:true}).indexes('mid'), false)
     			.val('master.mpaid', <?php echo $qipid;?> )
			.val('i_charges.ic_paid', <?php echo $qipid;?> )
			.val('master.msubstatus', <?php echo "'Inv-Paid'";?> )
			//.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();
     			
     			
     			},
     		//dt-button buttons-selected buttons-edit disabled
		},          {
 	text:   'Undo Payment - SELECTED' , 
 	titleAttr: '',
                action: function ( e, dt, node, config ) {
			var allData = table.rows().data();
			editor
			.edit(dt.rows({selected:true}).indexes('mid'), false)
     			.val('master.mpaid', '' )
			.val('i_charges.ic_paid', '' )
			.val('master.msubstatus', <?php echo "'Inv-Sent'";?> )
			//.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();
     			
     			
     			},
     		
		},
   
            
        ]
    } );
     
    table.buttons( 1, null ).container().appendTo(
        table.table().container()
    );

$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
 
 
});


</script>
</body>
</html>

