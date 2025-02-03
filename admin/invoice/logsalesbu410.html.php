<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>templates</title>
	

	<link rel="shortcut icon" type="image/ico" href="http://croftonas.com/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/Editor16/css/editor.dataTables.min.css">


<!---

In addition to the above code, the following Javascript library files are loaded for use in this example:
https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css
https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css
https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css
../../extensions/Editor/css/editor.dataTables.min.css
<link rel="stylesheet" type="text/css" href="/Editor16/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/Editor16/resources/demo.css">

-->




<style type="text/css" class="init">
select {
    flex: 2 100%;
   border: none;
    background-img:none;
   }
/*.css */
.upcase { text-transform:uppercase!important;}
#customForm {
    display: flex;
    flex-flow: row wrap;
    text-transform:uppercase!important;
}
 
#customForm fieldset {
    flex: 1;
    border: 1px solid #aaa;
    margin: 0.5em;
    
     
}
 
#customForm fieldset legend {
    padding: 5px 20px;
    border: 1px solid #aaa;
    font-weight: bold;
     
}

#customForm fieldset input {
    
    text-transform: uppercase;
     
}
 
#customForm fieldset.name {
    flex: 2 100%;
   
}
 #customForm fieldset.name select {
    flex: 2 100%;
   border: none;
    background-img:none;
   }
#customForm fieldset.name legend {
    background: #bfffbf;
   
}
 
#customForm fieldset.office legend {
    background: #ffffbf;
     
}
 
#customForm fieldset.hr legend {
    background: #ffbfbf;
     
}
 
#customForm div.DTE_Field {
 
    padding: 5px;
}
#example_wrapper.dt-buttons{
background-color:#770000!important;
}
</style>


</head>
<body>
<button id="kount">Row count</button>
<div id="customForm">
                        <fieldset class="name " disabled>
                            <legend>vehicle(name)</legend>
                        <editor-field name="master.mvin"  disabled></editor-field disabled>
                        <editor-field name="master.mdid" ></editor-field>
			<editor-field name="master.mstock"></editor-field>
							
                        </fieldset>
                        <fieldset class="office" disabled>
                            <legend>Sale Day Contact Inf-(Office)</legend>
                           
			<editor-field name="" style="border:none;"></editor-field>
			<editor-field name="master.muid" style="border:none;" ></editor-field>
			
			 <editor-field name=""></editor-field>
                            <editor-field name=""></editor-field>
			
                        </fieldset>
                        <fieldset class="hr">
                            <legend>Invoice Info (hr)</legend>
                            <editor-field name="master.msolddate"></editor-field>
                            <editor-field name="master.msoldprice"></editor-field>
                            <editor-field name="master.msalesnet"></editor-field>
			<editor-field name="master.mid"></editor-field>
                        </fieldset>
                    </div>
 
<table id="example" class="display compact " cellspacing="0" width="100%">
                    <thead>
                        <tr>
<th></th>

<th>Id</th>
<th>Vin</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Color</th>
<th>Mileage</th>
<th>Announcement</th>
<th>Detail</th>
<th>Via</th>
<th>Floor</th>
<!--<th>Timestamp</th>-->
<th>RequestedDate</th>
<th>Status</th>
<th>SStatus</th>
<th>Solddate</th>
<th>Notes</th>
<th>Sold Price</th>
<th>SalesNet</th>
<th>Carfax</th>
<th>Damage</th>
<th>MiscInfo</th>
<th>Lane</th>
<th>Run</th>
<th>Rundate</th>
<th>RunOutcome</th>
<th>Stock</th>        
<th>Auction</th>
<th>User</th>
<th>Dealer</th> 
<!--
<th>InvoiceId</th>
<th>Archive</th> 

-->


                    
                   
							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>
                    
<th></th>

<th>Id</th>
<th>Vin</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Color</th>
<th>Mileage</th>
<th>Announcement</th>
<th>Detail</th>
<th>Via</th>
<th>Floor</th>
<!--<th>Timestamp</th>-->
<th>RequestedDate</th>
<th>Status</th>
<th>SStatus</th>
<th>Solddate</th>
<th>Notes</th>
<th>Sold Price</th>
<th>SalesNet</th>
<th>Carfax</th>
<th>Damage</th>
<th>MiscInfo</th>
<th>Lane</th>
<th>Run</th>
<th>Rundate</th>
<th>RunOutcome</th>
<th>Stock</th>        
<th>Auction</th>
<th>User</th>
<th>Dealer</th> 
<!--
<th>InvoiceId</th>
<th>Archive</th> 
-->



                    
                   
							
                        </tr>
                    </tfoot>
                </table>
				
				
				
				
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="/Editor16/js/dataTables.editor.min.js">
	</script>

	<script type="text/javascript" language="javascript" class="init">
	
				//template.js
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "logsales.php",
display: 'lightbox',
        table: "#example",
        template: '#customForm',

       fields: [ 

{"label": "mid","name": "master.mid", type:  "readonly", def:   ""},
{"label": "mvin","name": "master.mvin"},
{"label": "myear","name": "master.myear"},
{"label": "mmake","name": "master.mmake"},
{"label": "mmodel","name": "master.mmodel"},
{"label": "mcolor","name": "master.mcolor"},
{"label": "mmileage","name": "master.mmileage"},
{"label": "mannounce","name": "master.mannounce"},
{"label": "mfloor","name": "master.mfloor"},
//{label: 'mrtime',name: 'master.mrtime', type:  'datetime', def:   function () { return new Date(); }},
{"label": 'mreqsaledate:',name:  'master.mreqsaledate2', type:  'datetime' },

 
{"label": "mdetail","name": "master.mdetail"},
{"label": "mtransport","name": "master.mtransport"},


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
    ]},
    
 {"label": "msolddate","name": "master.msolddate", "type":  "datetime"},




{"label": "mnotes","name": "master.mnotes"},
{"label": "msoldprice","name": "master.msoldprice"},
{"label": "Sales Net","name": "master.msalesnet"},
{"label": "mcarfax","name": "master.mcarfax"},
{"label": "mdamage","name": "master.mdamage"},
{"label": "mmiscinfo","name": "master.mmiscinfo"},
{"label": "mlane","name": "master.mlane"},
{"label": "mrun","name": "master.mrun"},
{label: 'mrundate', name: 'master.mrundate', type: 'datetime'},
{"label": "mrunoutcome","name": "master.mrunoutcome"},
{"label": "mstock","name": "master.mstock"},
{"label": "Auction",
"name": "master.maid"
//type: "select",
//placeholder:"Select Auction"
},


{"label": "User",
"name": "master.muid",
type: "select",
placeholder:"Select User"
},

{"label": "Dealership",
"name": "master.mdid",
type: "select"
//placeholder:"Select Dealer"
},



{"label": "minvid","name": "master.minvid"},
{"label": "marchive","name": "master.marchive"},
//{"label": "mrid","name": "master.mrid"},
//{"label": "mvid","name": "master.mvid"},
//{"label": "mreqsaledate2","name": "master.mreqsaledate2"},

        ] 
    } );

							
							
var table = $('#example').DataTable( {
//    $('#example').DataTable( {}
        dom: "Bfrtip",
        ajax: "logsales.php",
        
        
           // columnDefs: [ 
         //   {
          //  orderable: false,
        //    className: 'select-checkbox',
        //    targets:   0
     //   } ],
  //  select: {
    //       style:    'os',
  //         selector: 'td:first-child'
  //    },
  //      order: [[ 1, 'asc' ]],

        columns: [ {   // Checkbox select column
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            
     
{ data: "master.mid" },
{ data: "master.mvin" },
{ data: "master.myear" },
{ data: "master.mmake" },
{ data: "master.mmodel" },
{ data: "master.mcolor" },
{ data: "master.mmileage" },
{ data: "master.mannounce" },
{ data: "master.mdetail" },
{ data: "master.mtransport" },
{ data: "master.mfloor" },
{ data: "master.mreqsaledate2" },
{ data: "master.mstatus" },
{ data: "master.msubstatus" },
{ data: "master.msolddate" , type:"datetime"},
{ data: "master.mnotes" },
{ data: "master.msoldprice" },
{ data: "master.msalesnet" },
{ data: "master.mcarfax" },
{ data: "master.mdamage" },
{ data: "master.mmiscinfo" },
{ data: "master.mlane" },
{ data: "master.mrun" },
{ data: "master.mrundate", type:"datetime" },
{ data: "master.mrunoutcome" },
{ data: "master.mstock" },
{ data: "auctions.a_name" },
{ data: "users.uname" },
{ data: "master.mdid" }


//{ data: "master.minvid" },
//{ data: "master.marchive" }
//{ data: "master.mrid" },
//{ data: "master.mvid" },
//{ data: "master.mreqsaledate2" }
//   { data: "sites.name", editField: "users.site" }
	 ],
	 
//	 order: [ 2, 'asc' ],
//        select: {
 //           style:    'os',
//            selector: 'td.select-checkbox'
//        },
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           
              
     
        select: true,






        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            {
                extend: "selectedSingle",
                text: "Send to Invoice",
                action: function ( e, dt, node, config ) {
                    // Immediately add `250` to the value of the salary and submit
                    editor
                        .edit( table.row( { selected: true } ).index('mid'), false )
                        .set( 'master.mstatus', 'S' )
                        .set( 'master.msubstatus', 'Inv-No' )
                       //.set( 'master.msolddate', ' new date('Y-m-d' )
                       // .set( 'mnext', '1' )
                   //.set( 'msolddate', 'msold')
                        .submit();
                }},
                
                
                
{
                text:   'Push to Invoicing' ,
                action: function ( e, dt, node, config ) {
                    editor
     .edit(dt.rows({selected:true}).indexes('mid'), false)
     .val('master.msubstatus', 'Inv-No' )
      .val('master.mstatus', 'S' )
     .val('master.msolddate', '<?php echo date("Y-m-d");?>' )
     .submit();
                
                }},
                
                
                
                
                
                
                
                 {
                text: 'Reload table',
                action: function () {
                    table.ajax.reload();
               } }
          //  { extend: "remove", editor: editor }
        ],

        
  "rowCallback": function ( row, data ) { 
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
  if ( data.master.msubstatus =='Inv-No' ){ 
    
    $('td', row).css('background-color', '#CCFFCC');
     
   }
   }
  
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

