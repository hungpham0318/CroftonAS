<?php session_start();
$title="Archived";
$pageperms =3;
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
                    </tfoot>
                </table>
<?php include "jsscripts.html";?>

	<script type="text/javascript" language="javascript" class="init">
	
				//template.js
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "archive2020php.php",
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
        
        ajax: "archive2020php.php",
"scrollY": 700,
   // responsive: true,
    scrollX: "true",    
    dom: "Bifrt",
    colReorder: true,
    stateSave:      true,
    iDisplayLength: -1,
    processing: "true",
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
                'colvis',
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

 	setInterval( function () {
    table.ajax.reload( null, false ); // user paging is not reset on reload
}, 120000 );
});


</script>
</body>
</html>


