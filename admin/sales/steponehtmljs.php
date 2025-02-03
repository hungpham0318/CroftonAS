<?php session_start();
$title="StepOne";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		$qidid = 0;
		$qiid = 0;
	$msg = 0;
	$msg = $_GET['msg'];
	$qidid = $_GET['idid'];
	$qiid = $_GET['iid'];
		
		
		
		}?>
<!DOCTYPE html>
<html>
<?php include "stylehead-begin.html";?>
thead {padding:10px!important;font-size:11px!important;border:.5px solid #000;}
tfoot {padding:10px!important;font-size:11px!important;}
<?php include "stylehead-end.html";?>
<body>
<?php if ($msg != 0){echo '<a href="/admin/accnts/invoice/bunker/'.$qidid.'.'.$qiid.'.pdf" target="_blank">INVOICE CREATED! Click to open in new tab. (Or right-click and choose "Save link as..." to download.)</a>';}?>
<?php include "../worldview/css/snow-admin-nav.html";?>
<div id="customForm">

  </div>
<div class="tablewrapper">	
<table id="example" class="display nowrap" style="width:100%;">
    <thead>
    <tr>

<th></th>

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

<th></th>

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
    dom: "Bfrti",
    colReorder: true,
    	   // var invoicecount = <?php include'countinvoices.php';?>
       
 	iDisplayLength: -1,
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
return '<a href="/admin/accnts/invoice/finalprecreator.php?did=' + data.dealers.did+ '">Invoice</a>'; }},

//return '<a href="/admin/sales/createinvoicehtmljs.php?did=' + data.dealers.did+ '">Invoice</a>'; }},
//return '<?php//include '/countinvoices.php?q=" + data.dealers.did + "';?>'; }},
{ "data": function (data, type, row, meta) {rowId: 'dealers.did'
var invoicecount = 2;
return '<a href="/admin/snipstuff/editdealerfromstepone.php?did=' + data.dealers.did+ '"> Check Dealer Info</a>'; }},
//return '<a href="/admin/snipstuff/editdealerfromstepone.php?did=' + data.dealers.did+ '">' + invoicecount +' Check Dealer Info</a>'; }},

//return invoicecount; 

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
          // { extend: "edit",   editor: editor},

  		
		


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


   
   $('td', row).css('font-size', '13px');
         $('td', row).css('padding', '8px');
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
   $('td', row).css('color', '#000000');
   
$('td', row).attr('nowrap','nowrap');
 $('td', row).css('border-width','.5px');
    $('td', row).css('border-style','solid');


//$('td', row).css('text-transform', 'Uppercase');
//$('td', row).css('font-family','monospace');
//$('td', row).css('white-space','nowrap');
//$('td', row).css('font-size','1.25em');
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
