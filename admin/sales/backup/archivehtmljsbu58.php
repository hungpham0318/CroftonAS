<?php session_start();
$title="Master Master";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<head>

	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $title;?></title>
	<!-- new  links from recon-->
	
	
	<link rel="stylesheet" type="text/css" href="/admin/worldview/css/snow-nav-admin.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="shortcut icon" type="image/ico" href="http://croftonas.com/images/favicon.ico">
	
	

	
	
	
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.2.0/css/autoFill.dataTables.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="/Editor16/css/editor.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="/Editor16/FieldType-Select2-1.6.2/editor.select2.min.css"/>

<link rel="stylesheet" type="text/css" href="/Editor16/FieldType-Selectize-1.6.2/editor.selectize.min.css"/>
<link rel="stylesheet" type="text/css" href="/Editor16/FieldType-Title-1.6.2/editor.title.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.0.0/css/rowGroup.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css"/>
	
	
	
	
	
	
	
	
<!-- end new  links from recon-->
	<!--old master links
	
	<link rel="shortcut icon" type="image/ico" href="http://croftonas.com/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/Editor16/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/admin/worldview/css/snow-nav-admin.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">-->
<!---

In addition to the above code, the following Javascript library files are loaded for use in this example:
https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css
https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css
https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css
../../extensions/Editor/css/editor.dataTables.min.css
<link rel="stylesheet" type="text/css" href="/Editor16/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/Editor16/resources/demo.css">

end old master links-->




<style type="text/css" class="init">

body{font-family: 'Open Sans', sans-serif!important;
font-size:16px;
 width:100%;}
th{font-family: 'Open Sans', sans-serif;}
/*
div.DTE_Body div.DTE_Body_Content div.DTE_Field {
    width: 40em;
    padding: 5px 20px;
    box-sizing: border-box;
}
 


div.DTE_Body div.DTE_Form_Content {
    display:flex;
    flex-direction: row;
    flex-wrap: wrap;
}
.DTE_Field.hr  {width:20em!important;
white-space: nowrap;
margin:1px;}


.DTE_Label{
width:15em!important;
white-space: nowrap;
margin:1px;
font-size:.5em
line-height;.5em;}
*/

.DTE_Field {
width:20em!important;
white-space: nowrap;
margin:1px;
float:left;}

div.DTED_Lightbox_Wrapper {
    left: 1em;
    right: 1em;
    margin: 0 auto;
    width: 70%;
}
#customForm {
    display: flex;
    flex-flow: row wrap;
display: -webkit-flex;
    display: flex;
    width: 100%;
  -webkit-align-content: center;
    align-content: center;
    background-color: white;
    margin:0 auto;
    padding: .5em;  
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
}
#customForm input {
    width:15em;
font-family: 'Open Sans', sans-serif;
font-size:1em;
height:1.6em;
}
#customForm.hr input text {
    width:20em;
font-family: 'Open Sans', sans-serif;
font-size:1em;
height:1.6em;
}
 #customForm.hr select {
    width:20em;
font-size:1em;
font-family: 'Open Sans', sans-serif;
height:1.6em;
}
  #customForm select {
    width:15em;
font-size:1em;
font-family: 'Open Sans', sans-serif;
height:1.6em;
}
#customForm fieldset {
    flex: 1;
    border: 1px solid #aaa;
    margin: 0.5em;
font-size:18px;
width:300px;
}
 
#customForm fieldset legend {
    padding: 5px 20px;
    border: 1px solid #aaa;
    font-weight: bold;
}
 
#customForm fieldset.name {
    flex: 1 100%;
margin:0 auto;

height:100px;
}


#customForm fieldset.office {
    flex: 2 ;

height:700px;
}
#customForm fieldset.hr {
    flex: 2 ;
}

 
#customForm fieldset.name legend {
    background: #660000;
color:#ffffff;
}
 
#customForm fieldset.office legend {
    background: #660000;
color:#ffffff;
}
 
#customForm fieldset.hr legend {
    background: #660000;
color:#ffffff;
}
 
#customForm div.DTE_Field {font-family: 'Open Sans', sans-serif!important;
font-size:16px;
    padding: 5px;
}

.DTE_Field  {font-family: 'Open Sans', sans-serif!important;
font-size:16px;}
.DTE_Field_Type_text {font-family: 'Open Sans', sans-serif!important;
font-size:16px;}
#DTE_Field_Name_master.mvin {font-family: 'Open Sans', sans-serif!important;
font-size:16px;}

</style>


</head>
<body><?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="customForm">

<fieldset class="office">
<legend>Registration Info</legend>
<editor-field name="master.mvin" ></editor-field>
<editor-field name="master.mdid"></editor-field>
<editor-field name="master.myear"></editor-field >
<editor-field name="master.mmake"></editor-field>
<editor-field name="master.mmodel"></editor-field >
<editor-field name="master.mcolor"></editor-field >
<editor-field name="master.mmileage"></editor-field>
<editor-field name="master.mstock"></editor-field>

<editor-field name="master.mfloor"></editor-field>
<editor-field name="master.mdetail"></editor-field>
<editor-field name="master.mtransport"></editor-field>
<editor-field name="master.mannounce"></editor-field>
</fieldset> 

<fieldset class="hr">
<legend>Recon Info</legend>
<editor-field name="master.maid"></editor-field>
<editor-field name="master.muid"></editor-field>
<editor-field name="master.mrtime"></editor-field>
<editor-field name="master.mreqsaledate2"></editor-field>
<editor-field name="master.mcarfax"></editor-field>
<editor-field name="master.mdamage"></editor-field>
<editor-field name="master.mnotes"></editor-field>




<editor-field name="master.mready"></editor-field>
<editor-field name="master.marchive"></editor-field>
<editor-field name="master.mreconview"></editor-field>

<editor-field name="master.mid"></editor-field>
<editor-field name="master.mrid"></editor-field>
<editor-field name="master.mvid"></editor-field>

</fieldset> 

<fieldset class="hr">
<legend>Sale Info</legend>
<editor-field name="master.mstatus"></editor-field>
<editor-field name="master.msubstatus"></editor-field>
<editor-field name="master.msolddate"></editor-field>
<editor-field name="master.msoldprice"></editor-field>
<editor-field name="master.msalesnet"></editor-field>

<editor-field name="master.mmiscinfo"></editor-field>
<editor-field name="master.mlane"></editor-field>
<editor-field name="master.mrun"></editor-field>
<editor-field name="master.mrundate"></editor-field>
<editor-field name="master.mrunoutcome"></editor-field>

<editor-field name="master.minvid"></editor-field>
</fieldset>
    </div>
 
<table id="example" class="display compact" cellspacing="0" width="100%">
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
<th>ANNOUNCEMENT</th>
<th>STOCK</th>
<th>DETAIL</th>
<th>TRANSPORT</th>
<th>FLOOR</th>
<th>SUBMITTED</th>
<th>REQUESTED</th>
<th>REQUESTED1</th>
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
							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>mid</th>
<th>mvid</th>
<th>maid</th>
<th>mrid</th>
<th>muid</th>
<th>mdid</th>
<th>mvin</th>
<th>myear</th>
<th>mmake</th>
<th>mmodel</th>
<th>mcolor</th>
<th>mmileage</th>
<th>mannounce</th>
<th>mstock</th>
<th>mdetail</th>
<th>mtransport</th>
<th>mfloor</th>
<th>mrtime</th>
<th>mreqsaledate2</th>
<th>mreqsaledate</th>
<th>mstatus</th>
<th>msubstatus</th>
<th>msolddate</th>
<th>mnotes</th>
<th>msoldprice</th>
<th>msalesnet</th>
<th>mcarfax</th>
<th>mdamage</th>
<th>Sale Type</th>
<th>mlane</th>
<th>mrun</th>
<th>mrundate</th>
<th>mrunoutcome</th>
<th>minvid</th>
<th>marchive</th>
<th>mreconview</th>
<th>mready</th>
                        </tr>
                    </tfoot>
                </table>
                <!--new scripts from recon-->
                
                
                
                
                
                
	
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

	
                
                
                
                
                <!-- end new scripts from recon-->
	<!--old scripts from mastermaster			
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="/Editor16/js/dataTables.editor.min.js">
	</script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js">
	</script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js">
	</script>
	end old scripts from mastermaster-->

	<script type="text/javascript" language="javascript" class="init">
	
				//template.js
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "archivephp.php",
//display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
{label: "ID", name:"master.mid",def:"readonly"},
{label: "RvId", name:"master.mvid"},
{"label": "Auction", name:"master.maid", type: "select"},
{label: "RegId", name:"master.mrid"},
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
{label: "Announcement", name:"master.mannounce"},
{label: "Stock#", name:"master.mstock"},
{label: "Detail", name:"master.mdetail"},
{label: "Transport", name:"master.mtransport"},
{label: "RegFloor", name:"master.mfloor"},
{label: "Submitted", name:"master.mrtime"},
{label: "Requested", name:"master.mreqsaledate2", type:  "datetime"},
{label: "empty", name:"master.mreqsaledate", type:  "datetime"},
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
       
       {label: "Sold Date", name:"master.msolddate", type:  "datetime" },
{label: "Notes", name:"master.mnotes"},
{label: "Sold Price", name:"master.msoldprice"},
{label: "Sale's Net", name:"master.msalesnet"},
{label: "Carfax", name:"master.mcarfax"},
{label: "Damage", name:"master.mdamage"},
{label: "Sale Type", name:"master.mmiscinfo", type:"select"},
{label: "Lane", name:"master.mlane"},
{label: "Run", name:"master.mrun"},
{label: "Run Date", name:"master.mrundate", type:  "datetime"},
{label: "R-Outcome", name:"master.mrunoutcome"},
{label: "InvoiceId", name:"master.minvid"},
//{label: "Archive", name:"master.marchive"},
//{label: "On Recon", name:"master.mreconview"},
{label: 'Archive', name: 'master.marchive', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },
 {label: 'on Recon', name: 'master.mreconview', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },

{label: "Empty-ready", name:"master.mready"}
        ] 
         
         
    } );


var table = $('#example').DataTable( {
         dom: "Bfrti",
        ajax: "archivephp.php",
"scrollY": 700,
   // responsive: true,
    scrollX: "true",    
    dom: "Bfrt",
    colReorder: true,
    stateSave:      true,
    iDisplayLength: -1,
select: {  
type: 'os',
style:    'os'
//selector: 'td:not(:nth-child(36))' // no row selection on last column
 //selector: 'td:first-child'
//selector: 'td.select-checkbox'
     },
order: [[ 36, 'desc' ],[4,'asc']],
   columns: [ 


/*begin new data:*/
{data: "master.mid", },
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
{data: "master.mreqsaledate", type:"datetime"},
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

/*end new data*/
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [
 	//{ extend: "create", editor: editor },
	

 /*	{ text:   'Push to Invoicing' , 
 	titleAttr: 'Sets Sold Date to today, Status to S, and Substatus to Inv-No. Next, select record(s) and use "Edit button" to add Sold Price, Sale Type, and Sales Net',
                action: function ( e, dt, node, config ) {
			editor
			.edit(dt.rows({selected:true}).indexes('mid'), false)
     			.val('master.msubstatus', 'Inv-No' )
			.val('master.mstatus', 'S' )
			.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();},
     		
		},*/
                
                { extend: "edit",   editor: editor},
	{text: 'Reload table', action: function () { table.ajax.reload();}},         
    
       // 'pageLength'
        ],

  "rowCallback": function ( row, data ) { 
   
    $('input.master.mreconview', row).prop('checked', data.master.mreconview == 1);
  $('input.master.marchive', row).prop('checked', data.master.marchive == 1);
        
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


