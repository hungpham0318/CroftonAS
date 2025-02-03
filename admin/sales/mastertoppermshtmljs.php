<?php session_start();
$title="Master Top Perms";
$pageperms =4;
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

<fieldset class="office">
<legend>Grouped One</legend>
<editor-field name="master.mvin" ></editor-field>
<editor-field name="master.mdid"></editor-field>
<editor-field name="master.myear"></editor-field >
<editor-field name="master.mmake"></editor-field>
<editor-field name="master.mmodel"></editor-field >
<editor-field name="master.mcolor"></editor-field >
<editor-field name="master.mmileage"></editor-field>
<editor-field name="master.mstock"></editor-field>

<editor-field name="master.mfloor"></editor-field>

</fieldset> 

<fieldset class="hr">
<legend>Grouped Two</legend>
<editor-field name="master.mdetail"></editor-field>
<editor-field name="master.mtransport"></editor-field>
<editor-field name="master.mannounce"></editor-field>
<editor-field name="master.maid"></editor-field>
<editor-field name="master.muid"></editor-field>
<editor-field name="master.mrtime"></editor-field>
<editor-field name="master.mreqsaledate2"></editor-field>
<editor-field name="master.mcarfax"></editor-field>
<editor-field name="master.mdamage"></editor-field>

</fieldset> 

<fieldset class="hr"><legend>Grouped Three</legend>
<editor-field name="master.mstatus"></editor-field>
<editor-field name="master.msubstatus"></editor-field>
<editor-field name="master.msolddate"></editor-field>
<editor-field name="master.msoldprice"></editor-field>
<editor-field name="master.msalesnet"></editor-field>
<editor-field name="master.mmiscinfo"></editor-field>

<editor-field name="master.marchive"></editor-field>
<editor-field name="master.mready"></editor-field>
<editor-field name="master.mreconview"></editor-field>
<editor-field name="master.mrepfee"></editor-field>
<editor-field name="master.mrepfeedesc"></editor-field>


</fieldset> 

<fieldset class="hr">
<legend>Grouped Four</legend>

<editor-field name="master.mnotes" disabled></editor-field>

<editor-field name="master.mlane"></editor-field>
<editor-field name="master.mrun"></editor-field>
<editor-field name="master.mrundate"></editor-field>
<editor-field name="master.mrunoutcome"></editor-field>
</fieldset>
<fieldset class="hr" disabled>
<editor-field name="master.minvid"></editor-field>
<editor-field name="master.mpaid"></editor-field>
<editor-field name="master.mid"></editor-field>
<editor-field name="master.mrid"></editor-field>
<editor-field name="master.mvid"></editor-field>

</fieldset>
    </div>
 
<table id="example" class="display compact"  width="100%">
                    <thead>
                        <tr>
<th>ID</th>
<th>RID#</th>
<th>AUCTION</th>
<th>RID</th>
<th>USER</th>
<th>DEALERSHIP</th>
<th>VIN</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
<th>COLOR</th>
<th>MILEAGE</th>
<th>ANNOUNCE</th>
<th>STOCK</th>
<th>DETAIL</th>
<th>TRANSPORT</th>
<th>FLOOR</th>
<th>SUBMITTED</th>
<th>REQUESTED</th>

<th>S</th>
<th>SS</th>
<th>SOLD DATE</th>
<th>NOTES</th>
<th>SOLD PRICE</th>
<th>SALE NET</th>
<th>CARFAX</th>
<th>DAMAGE</th>
<th>SALE TYPE</th>
<th>LANE</th>
<th>RUN</th>
<th>RUN DATE</th>
<th>RUN OUTCOME</th>
<th>INVOICE#</th>
<th>ARCHIVE</th>
<th>ON RECON</th>
<th>READY</th>
	<th>PMT#</th>
	<th>REP FEE</th>
	<th>REP FEE DESC</th>						
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>ID</th>
<th>RID#</th>
<th>AUCTION</th>
<th>RID</th>
<th>USER</th>
<th>DEALERSHIP</th>
<th>VIN</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
<th>COLOR</th>
<th>MILEAGE</th>
<th>ANNOUNCE</th>
<th>STOCK</th>
<th>DETAIL</th>
<th>TRANSPORT</th>
<th>FLOOR</th>
<th>SUBMITTED</th>
<th>REQUESTED</th>

<th>S</th>
<th>SS</th>
<th>SOLD DATE</th>
<th>NOTES</th>
<th>SOLD PRICE</th>
<th>SALE NET</th>
<th>CARFAX</th>
<th>DAMAGE</th>
<th>SALE TYPE</th>
<th>LANE</th>
<th>RUN</th>
<th>RUN DATE</th>
<th>RUN OUTCOME</th>
<th>INVOICE#</th>
<th>ARCHIVE</th>
<th>ON RECON</th>
<th>READY</th>
	<th>PMT#</th>
	<th>REP FEE</th>
	<th>REP FEE DESC</th>	

                        </tr>
                    </tfoot>
                    
                </table>
	

	
	<!-- Trigger/Open The Modal -->
<button id="myBtn">Modal iframe</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p></p>
    <table><tr><td ><iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></td><td><iframe src="/admin/worldview/css/substatus-key-iframe.php"   style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></tr></table>
  </div>

</div>
	
	
	
<?php include "jsscripts.html";?>	
	
	
	
	
	
	
	
	
	
	



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
        ajax: "mastertoppermsphp.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 

{label: "ID", name:"master.mid", def:"disabled"},
{label: "RvId", name:"master.mvid", def:"readonly"},
{"label": "Auction", name:"master.maid", type: "select"},
{label: "RegId", name:"master.mrid", def:"readonly"},
{label: "User", name:"master.muid", type: "select"},
{"label": "Dealer","name": "master.mdid",type: "select"
//placeholder:"Select Dealer"
},  
{label: "VIN", name:"master.mvin"},
{label: "Year", name:"master.myear"},
{label: "Make", name:"master.mmake"},
{label: "Model", name:"master.mmodel"},
{label: "Color", name:"master.mcolor"},
{label: "Mileage", name:"master.mmileage"},
{label: "Announce", name:"master.mannounce"},
{label: "Stock#", name:"master.mstock"},
{label: "Detail", name:"master.mdetail", type:"select",
    options: [
{ label: 'Partial', value: 'Partial' },    
{ label: 'Full', value: 'Full' } 
           ]
           },
{label: "Transport", name:"master.mtransport"},
{label: "RegFloor", name:"master.mfloor"},
{label: "Submitted", name:"master.mrtime"},
{label: "Requested", name:"master.mreqsaledate2", type:  "datetime"},

{label: "Status:",
                type: "select",
               name: "master.mstatus",
              options: [
{ label: 'I-Inactive-Not Received', value: 'I' },
 { label: 'A-Active at Auction', value: 'A' },
 { label: 'S-Sold at Auction', value: 'S' },
 { label: 'Z-Arbitrated-Arb. Opened', value: 'Z' },
 { label: 'R-Released-Cancelled', value: 'R' },
  { label: 'X -Arb Return', value: 'X' },
   { label: 'L -Legacy Record', value: 'L' }
               
             
                       ]

           }, 
           {label: "Substatus:",
                type:  "select",  
               
                name: "master.msubstatus",
                 options: [
 { label: 'Red-Not Yet delivered', value: 'recon-red' },
 { label: 'Yellow-Shop Has Vehicle', value: 'recon-yellow' },
 { label: 'Green-Ready at Auction', value: 'recon-green' },
 { label: 'Blue-Not Coming', value: 'recon-blue' },
 { label: 'Arb-M-Pending Return', value: 'arbit-m' },
 { label: 'Arb-X-Arb Return', value: 'X' },
 { label: 'Inv-No-Sold but not yet invoiced', value:'Inv-No'},
 { label: 'Inv-Sent-Sold and Invoiced', value:'Inv-Sent'},
 { label: 'Inv-Paid-Invoice Paid', value:'Inv-Paid'},
  { label: 'Legacy - Legacy Record', value:'Legacy'}
    ]},
       
       {label: "Sold Date", name:"master.msolddate", type:  "datetime" },
{label: "Notes", name:"master.mnotes"},
{label: "Sold Price", name:"master.msoldprice"},
{label: "Sale's Net", name:"master.msalesnet"},
{label: "Carfax", name:"master.mcarfax"},
{label: "Damage", name:"master.mdamage"},
//{label: "Sale Type", name:"master.mmiscinfo", type:"select"},
{"label": "Sale Type",
"name": "master.mmiscinfo",
type: "select",
        
               options: ["","SOS","OVE","IN-LANE","SIMULCAST","OUTSIDE SALE"   ]

           },
{label: "Lane", name:"master.mlane"},
{label: "Run", name:"master.mrun"},
{label: "Run Date", name:"master.mrundate", type:  "datetime"},
{label: "R-Outcome", name:"master.mrunoutcome"},
{label: "InvoiceId", name:"master.minvid"},
//{label: "Archive", name:"master.marchive"},
//{label: "On Recon", name:"master.mreconview"},
{label: 'Archive', name: 'master.marchive', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },
 {label: 'on Recon', name: 'master.mreconview', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },

{label: "Post-Archive", name:"master.mready", type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },
{label: "Pmt#", name:"master.mpaid"},
{label: "Rep Fee", name:"master.mrepfee", type:"select",

              options: [
              
{ label: '$150.00', value: '150' },    

{ label: ' $125.00', value: '125' },

{ label: '$100.00', value: '100' },

{ label:  '$0.00', value: '0' }


               
             
                       ]

           }, 
{label: "Rep Fee Desc", name:"master.mrepfeedesc", type:"select",
              options: [
              
{ label: 'Rep Fee / Standard', value: 'Rep Fee' },    

{ label: 'Rep Fee / Volume', value: 'Rep Fee / Volume' },

{ label: 'Rep Fee / Value', value: 'Rep Fee / Value' },

{ label: 'Rep Fee / Bel Air', value: 'Rep Fee / Bel Air' },

{ label: 'Rep Fee / Prev. Arb.', value: 'Rep Fee / Prev. Arb.' },

{ label: 'Rep Fee / No Charge', value: 'Rep Fee / No Charge' }

               
             
                       ]
}
           

        ] 
         
         
    } );






var table = $('#example').DataTable( {
         dom: "Biftr",
        ajax: "mastertoppermsphp.php",
"scrollY": 700,
processing: "true",
   // responsive: true,
    scrollX: "true",    
 
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
{data: "master.mid", def:"readonly" },
{data: "master.mvid"},
//{data: "master.maid"},
{data: "auctions.a_name"},
{data: "master.mrid"},
//{data: "master.muid"},
{data: "users.uname"},
//{data: "master.mdid"},
{ data: "dealers.dname" },
{data: "master.mvin"},
{data: "master.myear"},
{data: "master.mmake"},
{data: "master.mmodel"},
{data: "master.mcolor"},
{data: "master.mmileage"},
{data: "master.mannounce"},
{data: "master.mstock"},
{data: "master.mdetail"},
{data: "master.mtransport"},
{data: "master.mfloor"},
{data: "master.mrtime", type:"datetime"},
{data: "master.mreqsaledate2", type:"datetime"},

{data: "master.mstatus"},
{data: "master.msubstatus"},
{data: "master.msolddate"},
{data: "master.mnotes"},
{data: "master.msoldprice"},
{data: "master.msalesnet"},
{data: "master.mcarfax"},
{data: "master.mdamage"},
{data: "master.mmiscinfo"},
{data: "master.mlane"},
{data: "master.mrun"},
{data: "master.mrundate", type:"datetime"},
{data: "master.mrunoutcome"},
{data: "master.minvid"},
{data: "master.marchive"},
{data: "master.mreconview"},

       
{data: "master.mready"},
{data: "master.mpaid"},
{data: "master.mrepfee"},
{data: "master.mrepfeedesc"},

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
            {
                extend: "create",
                editor: editor,
                formButtons: [
                    'Create',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
            {
                extend: "remove",
                editor: editor,
                formButtons: [
                    'Create',
                    { label: 'Delete', fn: function () { this.close(); } }
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
	 
             
        { id:"myBtn",
 	text:   'Status Key' , 
 	titleAttr: '',
                action: function() {
    modal.style.display = "block";
}},
     
   
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],

  "rowCallback": function ( row, data ) { 


   
  
        
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
   $('td', row).css('color', '#000000');
   $('th', row).attr('nowrap','nowrap');
$('td', row).attr('nowrap','nowrap');
 //$('td', row).css('border-width','1px');
  //  $('td', row).css('border-style','solid');


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
   
//setInterval( function () {table.ajax.reload( null, false );}, 120000 );
});


</script>
</body>
</html>


