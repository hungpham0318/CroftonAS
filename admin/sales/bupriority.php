<?php session_start();
$title="Copy to Master Log";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>

<?php include "stylehead-begin.html";?>
/*
tfoot input {
        width: 100%!important;
        padding: 3px!important;
        box-sizing: border-box!important;
    }
tfoot th {
        padding: 3px!important;
        box-sizing: border-box!important;}
        
        th {
    font-weight: bold;
    text-align: left;
}

tbody {
 /*   display: table-row-group;*/
  vertical-align: left;
    border-color: inherit;
}
        */
#customForm fieldset.hr {

/*min-width: 350px!important;*/
min-width: 290px!important;
 }
#customForm fieldset.office {
min-width: 290px!important;
 }
#customForm fieldset.name {
min-width: 290px!important;
 }*/
        
<?php include "stylehead-end.html";?>
<body>

<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>




  <div id="customForm">


<!--
<fieldset class="hr">
<legend>Statuses and Rep Fees</legend>
<editor-field name="priority_master.mstatus"></editor-field>
<editor-field name="priority_master.msubstatus"></editor-field>
<editor-field name="priority_master.mrepfee"></editor-field>
<editor-field name="priority_master.mrepfeedesc"></editor-field>

</fieldset> 


<fieldset class="hr"><legend>Sale Info and Misc</legend>
<editor-field name="priority_master.mcarfax"></editor-field>
<editor-field name="priority_master.msolddate"></editor-field>
<editor-field name="priority_master.msoldprice"></editor-field>
<editor-field name="priority_master.msalesnet"></editor-field>
<editor-field name="priority_master.mmiscinfo"></editor-field>

</fieldset> -->


<fieldset class="hr">
<legend>Recon Info</legend>
<editor-field name="priority_master.mid"></editor-field>
<editor-field name="priority_master.mlane"></editor-field>
<editor-field name="priority_master.mrun"></editor-field>
<editor-field name="priority_master.myear"></editor-field >
<editor-field name="priority_master.mmake"></editor-field>
<editor-field name="priority_master.mmodel"></editor-field >

<editor-field name="priority_master.mvin",  def="readonly" ></editor-field>

<editor-field name="priority_master.mstock"></editor-field>
<editor-field name="priority_master.mannounce"></editor-field>


<editor-field name="priority_master.mfloor"></editor-field>

</fieldset> 
<!--
<fieldset class="hr">
<legend>Recon Info</legend>

<editor-field name="priority_master.mmileage"></editor-field>
<editor-field name="priority_master.mdetail"></editor-field>




<editor-field name="priority_master.mdamage"></editor-field>
<editor-field name="priority_master.mtransport"></editor-field>


</fieldset> 
<fieldset class="hr">
<legend>Lane/Run Info</legend>




<editor-field name="priority_master.mrundate"></editor-field>-->
<!--<editor-field name="priority_master.mrunoutcome"></editor-field>
</fieldset>
<fieldset class="hr">
<legend>View Options</legend>
<editor-field name="priority_master.marchive"></editor-field>
<editor-field name="priority_master.mreconview"></editor-field>



</fieldset> 
<fieldset class="hr" >
<legend>Caution when Changing </legend>

<editor-field name="priority_master.maid"></editor-field>
<editor-field name="priority_master.muid"></editor-field>
<editor-field name="priority_master.mdid"></editor-field>
</fieldset> 


<fieldset class="office" disabled >
<legend>Can Not Change</legend>

<editor-field name="priority_master.mrtime"></editor-field>
<editor-field name="priority_master.mreqsaledate2" disabled></editor-field>
<editor-field name="priority_master.mid" readonly></editor-field>

</fieldset> -->





<!--<fieldset class="hr" disabled>
<editor-field name="priority_master.minvid"></editor-field>
<editor-field name="priority_master.mpaid"></editor-field>
<editor-field name="priority_master.mid"></editor-field>
<editor-field name="priority_master.mrid"></editor-field>
<editor-field name="priority_master.mvid"></editor-field>
<editor-field name="priority_master.mready"></editor-field>
<editor-field name="priority_master.mrtime"></editor-field>
<editor-field name="priority_master.mreqsaledate2"></editor-field>

</fieldset>-->
    </div>  
    

<div style="width:99%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
 

                        <tr>
      <th>ID</th>                      
<th>LANE</th>
<th>RUN</th>
<th>DEALERSHIP</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
   <th>VIN</th>      
<th>STOCK</th>
 <th>ANNOUNCE</th>
<th>FLOOR</th>
<th>DETAIL</th>
<th>TRANSPORT</th>
<th>AUCTION</th>
<!--

<th>ID</th>

-->

<!--<th>RID#</th>-->

<!--

-->



<!--<th>RID</th>
<th>USER</th>


<th>COLOR</th>
<th>MILEAGE</th> 



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

<th>RUN DATE</th>
<th>RUN OUTCOME</th>
<th>INVOICE#</th>
<th>ARCHIVE</th>
<th>ON RECON</th>
<th>READY</th>
	<th>PMT#</th>
	<th>REP FEE</th>
	<th>REP FEE DESC</th>		-->				
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>
                       
      <th>ID</th>                      
<th>LANE</th>
<th>RUN</th>
<th>DEALERSHIP</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
   <th>VIN</th>      
<th>STOCK</th>
 <th>ANNOUNCE</th>
<th>FLOOR</th>
<th>DETAIL</th>
<th>TRANSPORT</th>
<th>AUCTION</th>
<!--


<th>ID</th>-->
<!--<th>RID#</th>
<th>AUCTION</th>-->
<!--<th>RID</th>
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
	<th>REP FEE DESC</th>	-->

                        </tr>
                    </tfoot>
                    
                </table>
	</div>

	
	<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none;">Modal iframe</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>.</p>
   <table><thead><th style="border:none;width:50%;"></th><th style="border:none;width:50%;"></th></thead><tr><td ><?php include "../worldview/css/status-key.html";?></td><td><?php include "../worldview/css/substatus-key.html";?></td></tr></table>
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
/*
  $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="" />' );
    } );*/

    editor = new $.fn.dataTable.Editor( {
        ajax: "prioritymasterlogphp.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
/*
{label: "ID", name:"priority_master.mid"},
//{label: "RvId", name:"priority_master.mvid"},
{"label": "Auction", name:"priority_master.maid", type: "select"},
//{label: "RegId", name:"priority_master.mrid"},
{label: "User", name:"priority_master.muid", type: "select"}, */
{label: "ID", name:"priority_master.mid"},


{label: "Lane", name:"priority_master.mlane"},
{label: "Run", name:"priority_master.mrun"},
{label: "Dealer",name: "dealer.dname"}, 
{label: "Year", name:"priority_master.myear"},
{label: "Make", name:"priority_master.mmake"},
{label: "Model", name:"priority_master.mmodel"},
{label: "VIN", name:"priority_master.mvin"},

{label: "Stock#", name:"priority_master.mstock"},
{label: "Announce", name:"priority_master.mannounce"},
{label: "RegFloor", name:"priority_master.mfloor"},
{label: "Detail", name:"priority_master.mdetail"},
{label: "Transport", name:"priority_master.mtransport"},
{label: "Auction", name:"auction."},
{"label": "Auction", name:"priority_master.maid"},


/*
{label: "Color", name:"priority_master.mcolor"},
{label: "Mileage", name:"priority_master.mmileage"},

{label: "Detail", name:"priority_master.mdetail", type:"select",
    options: [
{ label: 'Partial', value: 'Partial' },    
{ label: 'Full', value: 'Full' } 
           ]
           },


{label: "Submitted", name:"priority_master.mrtime"},
{label: "Requested", name:"priority_master.mreqsaledate2", type:  "datetime"},

{label: "Status:",
                type: "select",
               name: "priority_master.mstatus",
              options: [
{ label: 'I-Inactive-Not Received', value: 'I' },
 { label: 'A-Active at Auction', value: 'A' },
 { label: 'S-Sold at Auction', value: 'S' },
 { label: 'Z-Arbitrated-Arb. Opened', value: 'Z' },
 { label: 'R-Released-Cancelled', value: 'R' },
  { label: 'X -Arb Return', value: 'X' }
               
             
                       ]

           }, 
           {label: "Substatus:",
                type:  "select",  
               
                name: "priority_master.msubstatus",
                 options: [
 { label: 'Red-Not Yet delivered', value: 'recon-red' },
 { label: 'Yellow-Shop Has Vehicle', value: 'recon-yellow' },
 { label: 'Green-Ready at Auction', value: 'recon-green' },
 { label: 'Blue-Not Coming', value: 'recon-blue' },
 { label: 'Arb-M-Pending Return', value: 'arbit-m' },
 { label: 'Arb-X-Arb Return', value: 'X' },
 { label: 'Inv-No-Sold but not yet invoiced', value:'Inv-No'},
 { label: 'Inv-Sent-Sold and Invoiced', value:'Inv-Sent'},
 { label: 'Inv-Paid-Invoice Paid', value:'Inv-Paid'}
    ]},
       
       {label: "Sold Date", name:"priority_master.msolddate", type:  "datetime" },
{label: "Notes", name:"priority_master.mnotes"},
{label: "Sold Price", name:"priority_master.msoldprice"},
{label: "Sale's Net", name:"priority_master.msalesnet"},
{label: "Carfax", name:"priority_master.mcarfax"},
{label: "Damage", name:"priority_master.mdamage"},
//{label: "Sale Type", name:"priority_master.mmiscinfo", type:"select"},
{"label": "Sale Type",
"name": "priority_master.mmiscinfo",
type: "select",
        
               options: ["","SOS","OVE","IN-LANE","SIMULCAST","OUTSIDE SALE"   ]

           },

{label: "Run Date", name:"priority_master.mrundate", type:  "datetime"},
{label: "R-Outcome", name:"priority_master.mrunoutcome"},
{label: "InvoiceId", name:"priority_master.minvid"},
//{label: "Archive", name:"priority_master.marchive"},
//{label: "On Recon", name:"priority_master.mreconview"},
{label: 'Archive', name: 'master.marchive', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },
 {label: 'on Recon', name: 'master.mreconview', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },

{label: "Empty-ready", name:"priority_master.mready"},
{label: "Pmt#", name:"priority_master.mpaid"},
{label: "Rep Fee", name:"priority_master.mrepfee", type:"select",

              options: [
              
{ label: '$150.00', value: '150' },    

{ label: ' $125.00', value: '125' },

{ label: '$100.00', value: '100' },

{ label:  '$0.00', value: '0' }


               
             
                       ]

           }, 
{label: "Rep Fee Desc", name:"priority_master.mrepfeedesc", type:"select",
              options: [
              
{ label: 'Rep Fee / Standard', value: 'Rep Fee' },    

{ label: 'Rep Fee / Volume', value: 'Rep Fee / Volume' },

{ label: 'Rep Fee / Value', value: 'Rep Fee / Value' },

{ label: 'Rep Fee / Bel Air', value: 'Rep Fee / Bel Air' },

{ label: 'Rep Fee / Prev. Arb.', value: 'Rep Fee / Prev. Arb.' },

{ label: 'Rep Fee / No Charge', value: 'Rep Fee / No Charge' }

               
             
                       ]
}
       */   

        ] 
         
         
    } );






var table = $('#example').DataTable( {
         dom: "Biftr",
        ajax: "prioritymasterlogphp.php",
//"scrollY": 700,
processing: "true",
   // responsive: true,
    "scrollY": "480",
   // scrollX: "800",    
   scrollX: "true", 
  //scrollY: true,
   colReorder: true,
  //stateSave: true,
    iDisplayLength: -1,
    
select: {  
type: 'os',
style:    'os'
//selector: 'td:not(:nth-child(36))' // no row selection on last column
 //selector: 'td:first-child'
//selector: 'td.select-checkbox'
     },
//order: [[ 19, 'desc' ],[22,'asc']],
order: [ 0, 'desc' ],
"columnDefs": [
            { "visible": false, "targets": 0 },
            { "visible": false, "targets": 1 },
            { "visible": false, "targets": 2 }
        ],
        
   columns: [ 
       {data: "priority_master.mid", def:"readonly" },


{data: "priority_master.mlane"},
{data: "priority_master.mrun"},
{ data: "dealers.dname" },
{data: "priority_master.myear"},
{data: "priority_master.mmake"},
{data: "priority_master.mmodel"},
{data: "priority_master.mvin"},
{data: "priority_master.mstock"},
{data: "priority_master.mannounce"},
{data: "priority_master.mfloor"},
{data: "priority_master.mdetail"},
{data: "priority_master.mtransport"},
{data: "auctions.a_name"},
/*begin new data:

//{data: "priority_master.mvid"},
//{data: "priority_master.maid"},
{data: "auctions.a_name"},
//{data: "priority_master.mrid"},
//{data: "priority_master.muid"},
{data: "users.uname"},
//{data: "priority_master.mdid"},
{ data: "dealers.dname" },


{data: "priority_master.mcolor"},
{data: "priority_master.mmileage"},



{data: "priority_master.mrtime", type:"datetime", def:"readonly"},
{data: "priority_master.mreqsaledate2", type:"datetime"},

{data: "priority_master.mstatus"},
{data: "priority_master.msubstatus"},
{data: "priority_master.msolddate"},
{data: "priority_master.mnotes"},
{data: "priority_master.msoldprice"},
{data: "priority_master.msalesnet"},
{data: "priority_master.mcarfax"},
{data: "priority_master.mdamage"},
{data: "priority_master.mmiscinfo"},

{data: "priority_master.mrundate", type:"datetime"},
{data: "priority_master.mrunoutcome"},
{data: "priority_master.minvid"},
{data: "priority_master.marchive"},
{data: "priority_master.mreconview"},

       
{data: "priority_master.mready"},
{data: "priority_master.mpaid"},
{data: "priority_master.mrepfee"},
{data: "priority_master.mrepfeedesc"},*/

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
                extend: 'excelHtml5',
                        
               exportOptions: {
                //  columns: ':contains("Office")'
             // columns: ':visible'
               columns: ':visible',
                    modifier: {
                        selected: true
                    }
                }
            },
              {
                extend: 'copyHtml5',
                  exportOptions: {
                //  columns: ':contains("Office")'
             // columns: ':visible'
               columns: ':visible',
                    modifier: {
                        selected: true
                    }
                }            },
                
                'selectAll',
        'selectNone',

   /*           {
                extend: 'pdfHtml5',
                   exportOptions: { 
    
 columns: ':visible'
    },
  
                    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: '<?php echo $title;?>-Landscape',
    header: true,
   footer: false,
   title: '<?php echo $title;?>',
   orientation: 'landscape',
 },
 */
          
           
           // 'excelHtml5',
            //'csvHtml5',
            //'pdfHtml5',
            
 /*            {
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
  		
*/		


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
 /*  

//$('td', row).css('text-transform', 'Uppercase');
//$('td', row).css('font-family','monospace');
//$('td', row).css('white-space','nowrap');
//$('td', row).css('font-size','1.25em');
//  if ( data.master.msubstatus == "recon-green" ){ 
  //  $('td', row).css('border-color', 'green');
//  $('td', row).css('color', 'darkgreen');
//   }
if ( data.master.msubstatus == "recon-red" ){ 
 //  $('td', row).css('border-color', 'red');
$('td', row).css('color', 'red');
 }
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
*/

   
  
   
   
   
   
  }
   
   
 
   
   
 
   
   
   
   
   
   
   
   
   
   
   
   
  //if ( data.master.msubstatus =='Inv-No' ){ 
    
   // $('td', row).css('color', 'darkgreen');
   //    $('td', row).css('border-color-top', 'darkgreen');

   //}


    } );
     
 /*   table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );*/
  
new $.fn.dataTable.Buttons( table, {
   buttons: [
         {
   extend: 'pdfHtml5',
   titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Visible Columns-All Rows-Landscape',
   exportOptions: { 
  //  columns: [0,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,18,23,24,26,27,28,32,35,36],
  columns: ':visible',
  /*
   modifier: {
   selected: true
             }
    */		
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
    titleAttr: 'This report obeys the sort order of the main sheet.',
   text: 'Visible Columns-Selected Rows - Landscape',
   
  header: true,
  
   title: '<?php echo"Visible Columns Landscape";?>',
   orientation: 'landscape',
 
    exportOptions: {
       columns: ':visible',
     //  columns: [1, 2, 3,  11, 12, 16, 17, 18 ]
     //columns: [6,7,8,9,5,12,19,20,21,22,23,24,27,28,29,30,37,38]
 modifier: {
   selected: true
             }
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
   
   setInterval( function () 
{
 table.ajax.reload( null, false ); // user paging is not reset on reload
}, 
30000 );
});



 



</script>
</body>
</html>


