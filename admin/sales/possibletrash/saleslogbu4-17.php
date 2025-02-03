<?php session_start();
$title="Log Sales";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title><?php echo $title;?></title>
	

	<link rel="shortcut icon" type="image/ico" href="http://croftonas.com/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/Editor16/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/admin/worldview/css/snow-nav-admin.css">

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
@import url('https://fonts.googleapis.com/css?family=Droid+Sans+Mono|Open+Sans:600');
body{font-family: 'Droid Sans Mono', monospace;}
th{font-family: 'Open Sans', sans-serif;}

select {
    flex: 2 100%;
   line-height:2em;
  padding:6px;
   }
/*.css */
.upcase { text-transform:uppercase!important;}
#customForm {
    display: flex;
    flex-flow: row wrap;
    text-transform:uppercase!important;
    font-family: 'Open Sans', sans-serif;
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
  
   }
#customForm fieldset.name legend {
    background: #440000;
    color:#fff;
    /*background: #bfffbf;*/
}
 
#customForm fieldset.office legend {
    background: #440000;
    color:#fff;
       /*background: #ffffbf;*/
}
 
#customForm fieldset.hr legend {
     background: #440000;
    color:#fff;
     /* background: #ffbfbf;*/
}
 
#customForm div.DTE_Field {
 
    padding: 5px;
}
#example_wrapper.dt-buttons{
background-color:#770000!important;
}
</style>


</head>
<body><?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="customForm">
                      <fieldset class="name" disabled>
                            <legend>Vehicle</legend>
                        <editor-field name="master.mvin"  disabled></editor-field disabled>
                        <editor-field name="master.mdid" ></editor-field>
		   <!--	 <editor-field name="master.mid"></editor-field>	-->			
                        </fieldset>
                <!--       <fieldset class="office" disabled>
                            <legend></legend>
                          
			<editor-field name="" style="border:none;"></editor-field>
			
			   
                        </fieldset> -->
                        <fieldset class="hr">
                            <legend>Sale Info</legend>
                              
                            <editor-field name="master.msolddate"></editor-field>
                            <editor-field name="master.msoldprice"></editor-field>
                            <editor-field name="master.msalesnet"></editor-field>
			 <editor-field name="master.mmiscinfo"></editor-field>
			 <editor-field name="master.mstatus"></editor-field>
                             <editor-field name="master.msubstatus"></editor-field>
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
        ajax: "saleslogphp.php",
display: 'lightbox',
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




//{"label": "mnotes","name": "master.mnotes"},
{"label": "Sold Price","name": "master.msoldprice"},
{"label": "Sales Net","name": "master.msalesnet"},
//{"label": "Carfax","name": "master.mcarfax"},
//{"label": "Damage","name": "master.mdamage"},
{"label": "Sale Type",
"name": "master.mmiscinfo",
type: "select",
        
               options: ["","OVE","IN-LANE","SIMULCAST","OUTSIDE SALE"   ]

           }
/*{"label": "Lane","name": "master.mlane"},
{"label": "Run#","name": "master.mrun"},
{label: 'Run Date', name: 'master.mrundate', type: 'datetime'},
{"label": "Run Outcome","name": "master.mrunoutcome"},
{"label": "Stock #","name": "master.mstock"},
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
        dom: "Bfrtip",
        ajax: "saleslogphp.php",
        
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
        order: [[ 5, 'desc' ],[4,'asc']],

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
{ data: "master.mmiscinfo" }
//{ data: "master.mlane" },
//{ data: "master.mrun" },
//{ data: "master.mrundate", type:"datetime" },
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

