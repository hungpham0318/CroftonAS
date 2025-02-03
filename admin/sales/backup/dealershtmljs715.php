<?php session_start();
$title="Dealers";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>

<?php include "stylehead-begin.html";?>
#DTE_Field_dealers-dinvoiceemail{min-width:50em!important;text-transform:lowercase!important;}
#DTE_Field_dealers-dnotes{min-width:50em!important;}
<?php include "stylehead-end.html";?>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p><div id ="whatever"></div>
 <div id="customForm">
<fieldset class="hr">
                            <legend>Group A</legend>
                            	<editor-field name="dealers.dname"></editor-field>
                            	<editor-field name="dealers.daddress"></editor-field>
                            	<editor-field name="dealers.dcity"></editor-field>
				<editor-field name="dealers.dstate"></editor-field>
				<editor-field name="dealers.dzip"></editor-field>
				
                            </fieldset>
                            
                            <fieldset class="hr">
                                                    
                            <legend>Group B</legend>
                            	
				<editor-field name="dealers.dcontact"></editor-field>
				<editor-field name="dealers.dsdphone"></editor-field>
				<editor-field name="dealers.dattn"></editor-field>
                            	                     	<editor-field name="dealers.dmailAcctNum"></editor-field>
<editor-field name="dealers.dphone"></editor-field>
                            </fieldset>
                            <fieldset class="office">
                            	<legend>Group C</legend>
                            	
                            	
                            	<editor-field name="dealers.drepfee"></editor-field>
                            	<editor-field name="dealers.drepfeedesc"></editor-field>
                            	<editor-field name="dealers.dnumber"></editor-field>
                            	
                             	
                            </fieldset>
                           <fieldset class="name">
                            	<legend>Group C</legend> 
                       <editor-field name="dealers.dinvoiceemail"></editor-field>
                       <editor-field name="dealers.dnotes"></editor-field>
                        
                        </fieldset>
                        
                    </div>



 <div style="width:97%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                               <tr>

<th>Access No.</th>
<th>Dealership</th>
<th>Street Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Attn:</th>
<th>Sale-Day Contact</th>
<th>Sale-Day Phone</th>
<th>Mail Acct.</th>
<th>Email Invoice to:</th>

<th>Fee Default</th>
<th>Fee Decription</th>
<th>Notes</th>
<th>Id</th>


							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>
<th>Access No.</th>
<th>Dealership</th>
<th>Street Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Attn:</th>
<th>Sale-Day Contact</th>
<th>Sale-Day Phone</th>
<th>Mail Acct.</th>
<th>Email Invoice to:</th>

<th>Fee Default</th>
<th>Fee Description</th>
<th>Notes</th>
<th>Id</th>



                        </tr>
                    </tfoot>
                    
                </table>
<!--
<div id="frame-udrelates" style="color:#660000;border:1.5px solid #660000;width:100%;margin-top:10px;display:block;">
<div id="udr" style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:left;"></div>
<table style="width:100%;"><tr style="width:100%;display:block;"> 
<td style="width:45%;display:block;margin:0 auto;text-align: center;float:left;"></td>

<td style="width:45%;display:block;margin:0 auto;text-align: center;float:right;"></td>
</tr>


<tr>
<td style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:left;"><iframe src="/admin/snipstuff/dcrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe></td>

<td style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:right;"><iframe src="/admin/snipstuff/dcrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>

</td></tr></table>-->

	<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none">Modal iframe</button>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:80%;">
  <!--   <span class="close" id="span">&times;</span>
     <div style="float:right;">Manage User Access</div>-->
    
    <table style="width:100%;"><thead><th style="width:45%;margin:5px;">Manage User Access</th><th style="width:45%;margin:5px;" >Selected Dealer - User Access</th></thead><tr><td><iframe src="/admin/snipstuff/udrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>
    
    </td><td ><div id="udr" style="border:none;width:100%;display:inline-block;"><div style="width:100%;margin:5px;text-align:center">When a Dealer row is selected in the main table, this window displays </br> the Users who can register vehicles for that Dealer. Close this and pick a dealership before clicking 'Dealer Contacts' Button</div></div><!--<iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe>--></td></tr></table>
   <p style="text-align:center;">To Close this window, just click somewhere else.</p>
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
                        
                        
                   
   

    
    <table style="width:100%;"><thead><th style="width:45%;margin:5px;">Manage Contact Relationships</th><th style="width:45%;margin:5px;" >Selected Dealer Contact Relationships</th></thead><tr><td><iframe src="/admin/snipstuff/cdrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>
    </td><td ><div id="uda" style="border:none;width:100%;display:inline-block;"><div style="margin:20px;text-align:center">When a Dealer is selected,this window displays </br> any Contacts related to the dealer .</div></div><!--<iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe>--></td></tr></table> 
    <p style="text-align:center;">To Close this window, just click somewhere else.</p>
  </div>
</div>

</div>
	

	<?php include "jsscripts.html";?>

	
	
	

	
	
	
	
	
	
	
	
	
	



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
        ajax: "whatdealers.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
{"label": "Access No.","name":"dealers.dnumber"},
{"label": "Dealership","name":"dealers.dname"},
{"label": "Address","name":"dealers.daddress"},
{"label": "City","name":"dealers.dcity"},
{"label": "State","name":"dealers.dstate"},
{"label": "Zip","name":"dealers.dzip"},
{"label": "Attn to","name":"dealers.dattn"},
{"label": "Sale-Day Contact","name":"dealers.dcontact"},
{"label": "Sale-Day Phone","name":"dealers.dsdphone"},
{"label": "Mail Acct Info","name":"dealers.dmailAcctNum"},
{"label": "Invoices to:</br> (Comma Separated </br> email addresses)","name":"dealers.dinvoiceemail"},
//{"label": "Default Fee","name":"dealers.drepfee"},
{label: "Default Fee:", type: "select", name: "dealers.drepfee", options: [ "150", "125", "100", "0" ] },
{label: "Fee Description:", type: "select", name: "dealers.drepfeedesc", options: [ 
		"Rep Fee",
		"Rep Fee / Volume",
               "Rep Fee / Value",
               "Rep Fee / Bel Air",
               "Rep Fee / Prev. Arb.",
               "Rep Fee / No Charge" ]} ,
					   
//{"label": "Fee Description","name":"dealers.drepfeedesc"},
{"label": "Notes","name":"dealers.dnotes"},
{"label": "Id","name":"dealers.did","type":"readonly" },


        ] 
         
         
    } );


var table = $('#example').DataTable( {
         dom: "Bfrti",
        ajax: "whatdealers.php",
"scrollY": 700,
   // responsive: true,
    scrollX: "true",    
   "scrollY": 700,
    dom: "Bfrt",
    //colReorder: true,
   stateSave: true,
    iDisplayLength: -1,
   //  "drawCallback": function ( settings ) {
   //         var api = this.api();
    //        var rows = api.rows( {page:'current'} ).nodes();
     //       var last=null;
 
    //        api.column(2, {page:'current'} ).data().each( function ( group, i ) {
     //           if ( last !== group ) {
     //               $(rows).eq( i ).before(
       //               //  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
        //                '<tr class="group"><td colspan="10">'+"Invoice Number:&nbsp;"+group+'<a href="editinvoice.php?iid='+group+'">&nbsp;&nbsp;Delete this Invoice (Click here to review and confirm deletion)</a></td></tr>'
                //    );
 
                 //   last = group;
             //   }
          //  } );
      //  },
select: {  
type: 'os',
style:    'os'
//selector: 'td:not(:nth-child(36))' // no row selection on last column
 //selector: 'td:first-child'
//selector: 'td.select-checkbox'
     },
      "columnDefs": [ 
      
    {"targets": 10,
    "createdCell": function (td, cellData, rowData, row, col) {
      if ( cellData > '0' ) {
        $(td).css('text-transform', 'lowercase')
      }
      
    }},
     { "visible": false, "targets": 2 }
   ],
     
     
   
        "order": [[ 2, 'asc' ]],
        
//order: [[ 19, 'desc' ],[22,'asc']],
   columns: [ 
{data: "dealers.dnumber"},
{data: "dealers.dname"},

{data: "dealers.daddress"},
{data: "dealers.dcity"},
{data: "dealers.dstate"},
{data: "dealers.dzip"},
{data: "dealers.dattn"},



{data: "dealers.dcontact"},
{data: "dealers.dsdphone"},
{data: "dealers.dmailAcctNum"},
{data: "dealers.dinvoiceemail"},
{data: "dealers.drepfee"},
{data: "dealers.drepfeedesc"},
{data: "dealers.dnotes"},

{data: "dealers.did"},

/*end new data*/
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [        {
                extend: "create",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            }, {
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
	 
                    { id:"myBtn",
 	text:   'User Access' , 
 	titleAttr: '',
                action: function() {
    modal.style.display = "block";
}},
      
        
{ id:"myBtn2",
text:   'Dealer Contacts' , 
//"data": function (data, type, row, meta) {rowId: 'users.uid'
//return '<a href="/admin/invoice/singleinvoicesteptwo.php?did=' + data.users.uid+ '&uid='+data.users.uid+'" >Test</a>'; },
	
 	titleAttr: '',
                action: function() {
    modal2.style.display = "block";
}},
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],

  "rowCallback": function ( row, data ) { 


   
  
        
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');

   
$('td', row).attr('nowrap','nowrap');
 $('td', row).css('font-family','Open Sans');
$('td', row).css('white-space','nowrap');
$('td', row).css('font-size','1em');
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
   text: 'Dealers',
   exportOptions: { 
    
 columns: ':visible'
    
   },
  header: true,
   footer: false,
   title: '<?php echo $title;?>',
 
     orientation: 'landscape',
    exportOptions: {
         columns: ':visible'
    },
    customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 9;
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
   text: 'Dealers - Portrait',
   
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
//$('#example tbody').on( 'click', 'tr', function () {
   //     $(this).toggleClass('selected');
//    } );
  var uda1 = '<iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/sales/dcrelatehtmljs.php?did=';
           var ud1 = '<iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/sales/durelatehtmljs.php?did=';
var ud2 = 0;
var ud3 = '" width="100%" height="500px"  ></iframe>';
   var qdid = 0;
 var qdidurl ='<a href="/admin/sales/dcrelatehtmljs.php?did=';
        var qdidurl2 ='">id</a>';
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        ud2 = table.row( this ).id().substr(4, 4);
        qdid = table.row( this ).id().substr(4, 4);
       var qdurl = qdidurl + qdid + qdidurl2;
       var udr = ud1 + ud2 + ud3;
       var uda = uda1 + ud2 + ud3;
document.getElementById("udr").innerHTML = udr;
document.getElementById("uda").innerHTML = uda;
//document.getElementById("whatever").innerHTML = qdurl;
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


</script>
</body>
</html>


