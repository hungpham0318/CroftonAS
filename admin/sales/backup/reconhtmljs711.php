<?php session_start();
$title="Recon";
$pageperms =1;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<!DOCTYPE html>
<html>

 
<?php include "stylehead-begin.html";?>
   
 
<?php include "stylehead-end.html";?>

<body>
<?php if($aperms > $pageperms){include '../worldview/css/snow-admin-nav.html';}else{include '../worldview/css/snow-shop-nav.html';}?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="customForm">

<fieldset class="hr" disabled>
<legend>Registration Info</legend>
<editor-field name="master.mvin" ></editor-field>
<editor-field name="master.mdid"></editor-field>
<editor-field name="master.myear"></editor-field >
<editor-field name="master.mmake"></editor-field>
<editor-field name="master.mmodel"></editor-field >

<editor-field name="master.mtransport"></editor-field>

<editor-field name="master.mrtime"></editor-field>
<editor-field name="master.mreqsaledate2"></editor-field>
</fieldset> 

<fieldset class="hr">
<legend>Recon Info</legend>

<editor-field name="master.mcarfax"></editor-field>



<editor-field name="master.mmileage"></editor-field>                                                                                                                                               
<editor-field name="master.mannounce"></editor-field>                                                                                                                                               

<editor-field name="master.mstatus"></editor-field>
<editor-field name="master.msubstatus"></editor-field>
<editor-field name="master.mcolor"></editor-field >
<editor-field name="master.mdetail"></editor-field>
</fieldset> 



<fieldset class="hr">
<legend>Lane/Run Info</legend>
<editor-field name="master.mlane"></editor-field>
<editor-field name="master.mrun"></editor-field>
<editor-field name="master.mrundate"></editor-field>
<br/>
<editor-field name="master.mnotes"></editor-field>
<editor-field name="master.mdamage"></editor-field>
</fieldset> 

<fieldset class="hr" hidden>
<legend>Sale Info</legend>




</fieldset>
    </div>
 <div style="width:100%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                        <tr>

<th>DEALERSHIP</th>
<th>VIN</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
<th>COLOR</th>
<th>MILEAGE</th>
<th>ANNOUNCE</th>
<th>DETAIL</th>
<th>TRANSPORT</th>

<th>SUBMITTED</th>
<th>REQUESTED</th>

<th>S</th>
<th>SS</th>

<th>NOTES</th>

<th>CARFAX</th>
<th>DAMAGE</th>


<th>RUN&nbsp;DATE</th>
<th>LANE</th>
<th>RUN</th>
							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>DEALERSHIP</th>
<th>VIN</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
<th>COLOR</th>
<th>MILEAGE</th>
<th>ANNOUNCE</th>
<th>DETAIL</th>
<th>TRANSPORT</th>

<th>SUBMITTED</th>
<th>REQUESTED</th>

<th>S</th>
<th>SS</th>

<th>NOTES</th>

<th>CARFAX</th>
<th>DAMAGE</th>
<th>RUN&nbsp;DATE</th>
<th>LANE</th>
<th>RUN</th>




                        </tr>
                    </tfoot>
                    
                </table>
<!-- Trigger/Open The Modal -->
<button id="myBtn"style="display: none;">Modal iframe</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>.</p>
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
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.3.3/js/dataTables.colReorder.min.js"></script>
	
	
	

	
	
	
	
	
	
	
	
	
	



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
        ajax: "recononlyphp.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 

{label: "Dealer", name: "master.mdid", type: "select", placeholder:"Select Dealer"},  
{label: "VIN", name:"master.mvin"},
{label: "Year", name:"master.myear"},
{label: "Make", name:"master.mmake"},
{label: "Model", name:"master.mmodel"},
{label: "Color", name:"master.mcolor"},
{label: "Mileage", name:"master.mmileage"},
{label: "Announce", name:"master.mannounce"},
{label: "Detail", name:"master.mdetail", type:"select",
    options: [
{ label: 'Partial', value: 'Partial' },    
{ label: 'Full', value: 'Full' } 
           ]
           },
{label: "Transport", name:"master.mtransport"},
{label: "Submitted", name:"master.mrtime"},
{label: "Requested", name:"master.mreqsaledate2", type:  "datetime"},
{label: "Status:",
  type: "select",
  name: "master.mstatus",
  options: [
       {label: 'I-Inactive-Not Received', value: 'I'
    }, {label: 'A-Active at Auction', value: 'A'
    }, {label: 'S-Sold at Auction', value: 'S'
    }, {label: 'Z-Arbitrated-Arb. Opened', value: 'Z'
    }, {label: 'R-Released-Cancelled', value: 'R'
    }, {label: 'X -Arb Return', value: 'X'
    }]
}, 
{label: "Substatus:", type: "select", name: "master.msubstatus",
  options: [
     {label: 'Red-Not Yet delivered', value: 'recon-red'
  }, {label: 'Yellow-Shop Has Vehicle', value: 'recon-yellow'
  }, {label: 'Green-Ready at Auction', value: 'recon-green'
  }, {label: 'Blue-Not Coming', value: 'recon-blue'
  }, {label: 'Arb-M-Pending Return', value: 'arbit-m'
  }, {label: 'Arb-X-Arb Return', value: 'X'
  }, {label: 'Inv-No-Sold but not yet invoiced', value: 'Inv-No'
  }, {label: 'Inv-Sent-Sold and Invoiced', value: 'Inv-Sent'
  }, {label: 'Inv-Paid-Invoice Paid', value: 'Inv-Paid'
  }]
},

       


/*
{label: "Status:",
                type: "select",
               name: "master.mstatus",
               options: [
               "I",
               "A",
               "S",
               "Z",
               "R",
               "X"
                       ]

           }, 
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
    ]},*/
       
       
{label: "Notes", name:"master.mnotes"},

{label: "Carfax", name:"master.mcarfax"},
{label: "Damage", name:"master.mdamage"},
{label: "Run Date", name:"master.mrundate", type:  "datetime"},
{label: "Lane", name:"master.mlane"},
{label: "Run", name:"master.mrun"}

        ] 
         
         
    } );


var table = $('#example').DataTable( {
        dom: "Biftr",
        ajax: "recononlyphp.php",
	"scrollY": 700,
   // responsive: true,
    	scrollX: "true",    
 	processing: "true",
    //colReorder: true,
   	stateSave: true,
   	 colReorder: true,
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
//{data: "master.mid", },
//{data: "master.mvid"},
//{data: "master.maid"},
//{data: "auctions.a_name"},
//{data: "master.mrid"},
//{data: "master.muid"},
//{data: "users.uname"},
//{data: "master.mdid"},
{data: "dealers.dname"},
{data: "master.mvin"},
{data: "master.myear"},
{data: "master.mmake"},
{data: "master.mmodel"},
{data: "master.mcolor"},
{data: "master.mmileage"},
{data: "master.mannounce"},
//{data: "master.mstock"},
{data: "master.mdetail"},
{data: "master.mtransport"},
//{data: "master.mfloor"},
{data: "master.mrtime", type:"datetime"},
{data: "master.mreqsaledate2", type:"datetime"},
//{data: "master.mreqsaledate", type:"datetime"},
{data: "master.mstatus"},
{data: "master.msubstatus"},
//{data: "master.msolddate"},
{data: "master.mnotes",
    	//"targets": 0,
    	"createdCell": function (td, cellData, rowData, row, col) {
     	 if ( cellData.substring(0,1) != "" ) {
       		//$(td).css('text-transform', 'lowercase')
     		$(td).css('background-color', '#CC99FF'),
     		$(td).css('color', '#ffffff'),
     		$(td).css('border', '8px')
      	}},
 	"render": function ( data, type, row ) {
  	//var data2 = data.substring(58);
  	//var data1 = data2.substring(0,4);
        return '<div style ="padding-left: .5em;">'+data+'</div>';
                } },
//{data: "master.msoldprice"},
//{data: "master.msalesnet"},
{data: "master.mcarfax",
    	//"targets": 0,
    	"createdCell": function (td, cellData, rowData, row, col) {
     	 if ( cellData < 1 ) {
       		//$(td).css('text-transform', 'lowercase')
     		$(td).css('background-color', 'cyan')
      	}else{if (cellData == 'BC') {
      //	$(td).css('background-color', 'pink')
      }}},
 	"render": function ( data, type, row ) {
  	
        return '<div style ="padding-left: .5em;">'+data+'</div>';
                } },
{data: "master.mdamage",
    	//"targets": 0,
    	"createdCell": function (td, cellData, rowData, row, col) {
     	 if ( cellData.substring(0,1) != "" ) {
       		//$(td).css('text-transform', 'lowercase')
     		$(td).css('background-color', '#FFCC33')
      	}},
 	"render": function ( data, type, row ) {
  	
        return '<div style ="padding-left: .5em;">'+data+'</div>';
                } },
//{data: "master.mmiscinfo"},
{data: "master.mrundate", type:"datetime"},
{data: "master.mlane"},
{data: "master.mrun"},

//{data: "master.mrunoutcome"},
//{data: "master.minvid"},
//{data: "master.marchive"},
//{data: "master.mreconview"},

       
//{data: "master.mready"},

/*end new data*/
	 ],
	// select: {
         //   style: 'os',
           // selector: 'td:not(:last-child)' // no row selection on last column
       // },


        buttons: [         {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
            {
                text: 'Mark Received',
                titleAttr: 'Select row(s) and click here to change Status to A - Active, and Substatus to Recon-Yellow - Shop Has Vehicle .',
                 action: function ( e, dt, node, config ) {
   editor
   .edit(dt.rows({selected:true}).indexes('mid'), false)
        .val('master.msubstatus', 'recon-yellow' )
   .val('master.mstatus', 'A' )
  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
        .submit();},
       editor: editor
  },
             {
                text: 'Mark Ready',
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
   
$('td', row).attr('nowrap','nowrap');
 $('td', row).css('border-width','1px');
    $('td', row).css('border-style','solid');


//$('td', row).css('text-transform', 'Uppercase');
//$('td', row).css('font-family','monospace');
//$('td', row).css('white-space','nowrap');
//$('td', row).css('font-size','1.25em');
   if ( data.master.msubstatus == "recon-green" ){ 
    $('td', row).css('border-color', 'green');
    $('td', row).css('color', 'darkgreen');
   }
   else if ( data.master.msubstatus == "recon-red" ){ 
   $('td', row).css('border-color', 'red');
$('td', row).css('color', 'red');
   }
   else if ( data.master.msubstatus == "recon-blue" ){ $('td', row).css('border-color', 'blue');
      $('td', row).css('color', 'blue');}
   else if ( data.master.msubstatus == "recon-yellow" ){ $('td', row).css('border-color', 'gold');
   $('td', row).css('color', '#999900');$('td', row).css('border-width','2px');}
   else if ( data.master.msubstatus == "arbit-m" ){ $('td', row).css('color', 'darkgreen');
   $('td', row).css('border-color', 'darkgreen');$('td', row).css('border-width','1.5px');}
   else if ( data.master.msubstatus == "arbit-z" ){ $('td', row).css('color', 'darkgreen');
   $('td', row).css('border-color', 'darkgreen');}
   else if ( data.master.msubstatus == "Inv-No" ){ $('td', row).css('color', '#000000');
   $('td', row).css('border-color', 'black');}
  else if ( data.master.msubstatus == "Inv-Sent" ){ $('td', row).css('color', '');
  $('td', row).css('border-color', '#000000');}
   else if ( data.master.msubstatus == "Inv-Paid" ){ $('td', row).css('color', 'black');
   $('td', row).css('border-color', 'darkgreen');}
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
    titleAttr: 'Preformatted Landscape PDF with ALL Recon columns included - ',
   text: 'All Columns - Landscape',

  header: true,
   footer: false,
   title: '<?php echo $title;?>',
   orientation: 'landscape',

    exportOptions: {
        // columns: ':visible',
         columns: [ 1, 2,  3, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16,17, 18,0,]
    },
    customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 8;
        doc.defaultStyle.textTransform = 'uppercase';
        doc.styles.tableHeader.fontSize = 8;
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
        objLayout['paddingLeft'] = function(i) { return 1; };
        // Right padding of the cell
        objLayout['paddingRight'] = function(i) { return 1; };
        // Inject the object in the document
        doc.content[1].layout = objLayout;
    }
    },
    
     {
   extend: 'pdfHtml5',
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Visible Columns - Landscape',
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
         columns: ':visible',
        // order: [[ 6, 'desc' ],[5,'asc'],[7,'desc']]
    },
    customize: function (doc) {
        doc.pageMargins = [10,20,10,20];
        doc.defaultStyle.fontSize = 10;
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
    titleAttr: 'Visible Column will try to fit, but may not.',
   text: 'Visible Columns - Portrait',
   
  header: true,
  
   title: 'Recon - Visible Columns',
   orientation: 'letter',
 
    exportOptions: {
        columns: ':visible'
       //  columns: [1, 2, 3,  11, 12, 16, 17, 18 ]
    },
    customize: function (doc) {
        doc.pageMargins = [10,20,10,20];
        doc.defaultStyle.fontSize = 10;
        doc.styles.tableHeader.fontSize = 10;
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
    },
     {
   extend: 'pdfHtml5',
    titleAttr: 'Lane/Run/Run Date/VIN/Year/Make/Statuses',
   text: 'Lane/Run - Portrait',
   
  header: true,
  
   title: 'Lane/Run Recon',
   orientation: 'letter',
 
    exportOptions: {
         //columns: ':visible'
         columns: [1, 2, 3,  11, 12, 16, 17, 18 ]
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

	
	
	setInterval( function () 
{
 table.ajax.reload( null, false ); // user paging is not reset on reload
}, 
120000 );
 
});


</script>
</body>
</html>


