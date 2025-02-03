<?php session_start();
$title="Lane 21";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>

<?php include "stylehead-begin.html";?>

thead {padding:10px!important;font-size:.9em!important;;font-weight:normal;color:#000000;}
tfoot{padding:10px!important;font-size:.82em!important;font-family:verdana, arial, sans-serif;font-weight:normal;color:#000;}
th.sorting {font-size:.82em!important;font-weight:normal;color:#000000;}
table.dataTable tfoot th, table.dataTable tfoot td {border:1px solid #aaa;border-top:1px solid #aaa;}
table.dataTable thead th, table.dataTable thead td {border-left:1px solid #aaa;border-top:1px solid #aaa;}
thead tr{border:1px solid #aaa!important;padding:10px;}
table.dataTable tbody td {border-left:1px solid #ddd;border-right:1px solid #ddd;}
<?php include "stylehead-end.html";?>

<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="customForm">
                      <fieldset class="hr" disabled>
                            <legend>.</legend>
                        <editor-field name="master.mvin"  disabled></editor-field disabled>
                        <editor-field name="master.mdid" ></editor-field>
		  		
                        </fieldset>
          
                        <fieldset class="hr">
                            <legend>..</legend>
                              
                            <editor-field name="master.msolddate"></editor-field>
                            <editor-field name="master.msoldprice"></editor-field>
                            <editor-field name="master.msalesnet"></editor-field>
			 <editor-field name="master.mmiscinfo"></editor-field>
			  </fieldset> 
                        <fieldset class="hr">
                            <legend>...</legend>
			 <editor-field name="master.mstatus"></editor-field>
                             <editor-field name="master.msubstatus"></editor-field>
                              <editor-field name="master.mrepfee"></editor-field>
                             <editor-field name="master.mrepfeedesc"></editor-field>
                        </fieldset>
                     
                        
                    </div>
 
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>


<th>Vin</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Dealership</th> 

<th>Date Submitted</th>
<th>S</th>
<th>SS</th>
<th>Sold Date</th>
<th>Sold Price</th>
<th>Sales Net</th>
<th>Sale Type</th>
<th>Rep Fee</th>
<th> Rep Fee Desc</th>
<th>Lane</th>
<th>Run</th>
<th>Run Date</th>
                    
                   
							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>
                    


<th>Vin</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Dealership</th> 

<th>Date Submitted</th>
<th>S</th>
<th>SS</th>
<th>Sold Date</th>
<th>Sold Price</th>
<th>Sales Net</th>
<th>Sale Type</th>
<th>Rep Fee</th>
<th> Rep Fee Desc</th>
<th>Lane</th>
<th>Run</th>
<th>RunDate</th>
                    
                   
							
                        </tr>
                    </tfoot>
                </table>
				
				
				
	<?php include "../sales/jsscripts.html";?>

	<script type="text/javascript" language="javascript" class="init">
	
				//template.js
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "saleslog-ln21-php.php",
//display: 'lightbox',
display: 'envelope',
        table: "#example",
        template: '#customForm',

       fields: [ 

//{"label": "mid","name": "master.mid", type:  "readonly", def:   ""},
{"label": "VIN","name": "master.mvin"},
{"label": "myear","name": "master.myear"},
{"label": "mmake","name": "master.mmake"},
{"label": "mmodel","name": "master.mmodel"},
{"label": "Dealership",
"name": "master.mdid",
type: "select"
//placeholder:"Select Dealer"
},


//{label: 'mrtime',name: 'master.mrtime', type:  'datetime' //,def:   function () { return Date(); }},

/*{"label": 'mreqsaledate:',name:  'master.mreqsaledate2', type:  'datetime' },


/*{"label": "mcolor","name": "master.mcolor"},
{"label": "mmileage","name": "master.mmileage"},
{"label": "mannounce","name": "master.mannounce"},
{"label": "Floor","name": "master.mfloor"},





 
{"label": "mdetail","name": "master.mdetail"},
{"label": "mtransport","name": "master.mtransport"},

*/
{label: "Status:",
                type: "select",
               name: "master.mstatus",
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
 { label: 'Inv-Paid-Invoice Paid', value:'Inv-Paid'}
    ]},
    
 {"label": "Sold Date","name": "master.msolddate", "type":  "datetime"},




//{"label": "mnotes","name": "master.mnotes"},
{"label": "Sold Price","name": "master.msoldprice"},
{"label": "Sales Net","name": "master.msalesnet"},
//{"label": "Carfax","name": "master.mcarfax"},
//{"label": "Damage","name": "master.mdamage"},
{"label": "Sale Type",
"name": "master.mmiscinfo",
type: "select",
        
               options: ["", "SOS","OVE","IN-LANE","SIMULCAST","OUTSIDE SALE"   ]

           },
           {label: "Rep Fee", name:"master.mrepfee", type:"select",

              options: [              
{label: '$150.00', value: '150' },    
{label: ' $125.00', value: '125' },
{label: '$100.00', value: '100' },
{label:  '$0.00', value: '0' }
         ]           }, 
{label: "Rep Fee Desc", name:"master.mrepfeedesc", type:"select",
              options: [
              
{label: 'Rep Fee / Standard', value: 'Rep Fee' },    

{label: 'Rep Fee / Volume', value: 'Rep Fee / Volume' },

{label: 'Rep Fee / Value', value: 'Rep Fee / Value' },

{label: 'Rep Fee / Bel Air', value: 'Rep Fee / Bel Air' },

{label: 'Rep Fee / Prev. Arb.', value: 'Rep Fee / Prev. Arb.' },

{label: 'Rep Fee / No Charge', value: 'Rep Fee / No Charge' }
         ]},
{"label": "Lane","name": "master.mlane"},
{"label": "Run#","name": "master.mrun"},
{label: 'Run Date', name: 'master.mrundate', type: 'datetime'},
//{"label": "Run Outcome","name": "master.mrunoutcome"},
/*{"label": "Stock #","name": "master.mstock"},
{"label": "Auction",
"name": "master.maid"
type: "select",
placeholder:"Select Auction"
},


{"label": "User",
"name": "master.muid",
type: "select",
placeholder:"Select User"
},




{"label": "minvid","name": "master.minvid"},
{"label": "marchive","name": "master.marchive"},*/
//{"label": "mrid","name": "master.mrid"},
//{"label": "mvid","name": "master.mvid"},
//{"label": "mreqsaledate2","name": "master.mreqsaledate2"},

        ] 
    } );

							
							
var table = $('#example').DataTable( {
//    $('#example').DataTable( {}
        dom: "Biftr",
        ajax: "saleslog-ln21-php.php",
        processing:"true",
        "scrollY": 700,
   // responsive: true,
    scrollX: "true",  
     
 

        
        
        
        
        
        
        
        
        
        
    lengthMenu: [
      [ -1, 10, 25, 50, ],
   [ 'Show All', 'Show 10', 'Show 25', 'Show 50' ]
  ],
  
        
           // columnDefs: [ 
         //   {
          //  orderable: false,
        //    className: 'select-checkbox',
        //    targets:   0
     //   } ],
    select: {
           style:    'os'
           //selector: 'td:first-child'
     },
        order: [[16, 'asc'],[ 15, 'asc' ],[14,'desc']],

        columns: [ //{   Checkbox select column
               // data: null,
               // defaultContent: '',
              //  className: 'select-checkbox',
            //    orderable: false
         //   },
            
     
//{ data: "master.mid" },
{ data: "master.mvin" },
{ data: "master.myear" },
{ data: "master.mmake" },
{ data: "master.mmodel" },
{ data: "dealers.dname" },
//{data:"master.mdid"},
//{ data: "master.mcolor" },
{ data: "master.mrtime", type:"datetime" },
//{ data: "master.mmileage" },
//{ data: "master.mannounce" },
//{ data: "master.mdetail" },
//{ data: "master.mtransport" },
//{ data: "master.mfloor" },
//{ data: "master.mreqsaledate2" },
{ data: "master.mstatus" },
{ data: "master.msubstatus" },
{ data: "master.msolddate" , type:"datetime"},
//{ data: "master.mnotes" },
{ data: "master.msoldprice" },
{ data: "master.msalesnet" },
//{ data: "master.mcarfax" },
//{ data: "master.mdamage" },
{ data: "master.mmiscinfo" },
{data: "master.mrepfee"},
{data: "master.mrepfeedesc"},
{ data: "master.mlane" },
{ data: "master.mrun" },
{ data: "master.mrundate", type:"datetime" },
//{ data: "master.mrunoutcome" },
//{ data: "master.mstock" },
//{ data: "auctions.a_name" },
//{ data: "users.uname" },
//{ data: "master.mdid" }


//{ data: "master.minvid" },
//{ data: "master.marchive" }
//{ data: "master.mrid" },
//{ data: "master.mvid" },
//{ data: "master.mreqsaledate2" }
//   { data: "sites.name", editField: "users.site" }
	 ],
	 
//	 order: [ 2, 'asc' ],
 select: {
 type: 'os',
 style:    'os'
 //selector: 'td.select-checkbox'
       },
            
       
           
              
     
        select: true,



        buttons: [
 	//{ extend: "create", editor: editor },
	
	
 		
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
		'colvis',
                
                { extend: "edit",   editor: editor},
	{text: 'Reload table', action: function () { table.ajax.reload();}},         
           
        
        
       // 'pageLength'

        ],

        
  "rowCallback": function ( row, data ) { 
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
  if ( data.master.msubstatus =='Inv-No' ){ 
    
    $('td', row).css('color', 'darkgreen');
       $('td', row).css('border-color-top', 'darkgreen');
   }
   }

  
    } );
          
//here for bpdf reports


 new $.fn.dataTable.Buttons( table, {
        buttons: [
         
    
     {
   extend: 'pdfHtml5',
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'All Columns',
   exportOptions: { 
    
//columns: ':visible',
 columns: [0, 1, 2,  3, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16],
    // order: [[ 6, 'desc' ],[5,'asc'],[7,'desc']]
    // order: [[ '4', 'asc' ],['5','asc']],
   },
  header: true,
   footer: false,
   title: '<?php echo $title;?>',
   orientation: 'landscape',

    customize: function (doc) {
        doc.pageMargins = [10,20,10,20];
        doc.defaultStyle.fontSize = 9.5;
        doc.defaultStyle.textTransform = 'uppercase';
       
        doc.styles.tableHeader.fontSize = 10;
        doc.styles.title.fontSize = 10;
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
   text: 'All Visible Columns',
   exportOptions: { 
     order: [[ '5', 'asc' ],['4','asc']],
columns: ':visible',
 //columns: [0, 1, 2,  3, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16],
    // order: [[ 6, 'desc' ],[5,'asc'],[7,'desc']]
  
   },
  header: true,
   footer: false,
   title: '<?php echo $title;?>',
   orientation: 'landscape',

    customize: function (doc) {
        doc.pageMargins = [10,20,10,20];
        doc.defaultStyle.fontSize = 9.5;
        doc.defaultStyle.textTransform = 'uppercase';
       
        doc.styles.tableHeader.fontSize = 10;
        doc.styles.title.fontSize = 10;
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
   text: 'Lane/Run - Portrait',
     header: true,
     title: 'Lane/Run Recon',
   orientation: 'landscape',
     exportOptions: {
         //columns: ':visible'
         columns: [0,1, 2, 3,4,5,  14,15, 16 ]
    },
    customize: function (doc) {
        doc.pageMargins = [20,20,20,20];
        doc.defaultStyle.fontSize = 12;
        doc.styles.tableHeader.fontSize = 11;
        doc.styles.title.fontSize = 12;
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

