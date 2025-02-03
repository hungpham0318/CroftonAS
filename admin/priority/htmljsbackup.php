<?php session_start();
$title="Priority";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>

<?php include "../sales/stylehead-begin.html";?>
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
        
<?php include "../sales/stylehead-end.html";?>
<body>

<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>




  <div id="customForm">
















</fieldset> 
<fieldset class="hr">
<legend>1</legend>
<editor-field name="priority_master.mid" readonly></editor-field>
<editor-field name="priority_master.myear"></editor-field >
<editor-field name="priority_master.mmake"></editor-field>
<editor-field name="priority_master.mmodel"></editor-field >

<editor-field name="priority_master.mvin",  def="readonly" ></editor-field>

<editor-field name="priority_master.mstock"></editor-field>
<editor-field name="priority_master.mannounce"></editor-field>


<editor-field name="priority_master.mfloor"></editor-field>
<editor-field name="priority_master.mdetail"></editor-field>
<editor-field name="priority_master.mcolor"></editor-field>


<editor-field name="priority_master.mmileage"></editor-field>
<editor-field name="priority_master.mtransport"></editor-field>

</fieldset>




<fieldset class="hr" >
<legend>2</legend>






<editor-field name="priority_master.mdid"></editor-field>
<editor-field name="priority_master.mcarfax"></editor-field>
<editor-field name="priority_master.mdamage"></editor-field>
<editor-field name="priority_master.mstatus"></editor-field>
<editor-field name="priority_master.msubstatus"></editor-field>

<editor-field name="priority_master.msolddate"></editor-field>
<editor-field name="priority_master.msoldprice"></editor-field>


<editor-field name="priority_master.muid"></editor-field>
<editor-field name="priority_master.marchive"></editor-field>
<editor-field name="priority_master.mrtime"></editor-field>
<editor-field name="priority_master.mnotes"></editor-field>
</fieldset> 








    </div>  
    

<div style="width:99%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
 

                        <tr>
						
<th>ID</th>  

<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
<th>VIN</th>      
<th>STOCK</th>
<th>ANNOUNCE</th>
<th>COST</th>
<th>DETAIL</th>
<th>COLOR</th>
<th>MILEAGE</th> 
<th>TRANSPORT</th>

<th>DEALERSHIP</th>
<th>CARFAX</th>
<th>DAMAGE</th>

<th>S</th>
<th>SS</th>
<th>SOLD DATE</th>
<th>SOLD PRICE</th>



<th>USER</th>
<th>ARCHIVE</th>
<th>mrtime</th>
<th>NOTES</th>					
						
				
						
						
			
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>
                       
    <th>ID</th>  

<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
<th>VIN</th>      
<th>STOCK</th>
<th>ANNOUNCE</th>
<th>COST</th>
<th>DETAIL</th>
<th>COLOR</th>
<th>MILEAGE</th> 
<th>TRANSPORT</th>

<th>DEALERSHIP</th>
<th>CARFAX</th>
<th>DAMAGE</th>

<th>S</th>
<th>SS</th>
<th>SOLD DATE</th>
<th>SOLD PRICE</th>



<th>USER</th>
<th>ARCHIVE</th>
<th>mrtime</th>
<th>NOTES</th>	
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

<?php include "../sales/jsscripts.html";?>	
	
	
	
	
	
	
	
	
	
	



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
        ajax: "prioritylogphp.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 

{label: "ID", name:"priority_master.mid"},

{label: "Year", name:"priority_master.myear"},
{label: "Make", name:"priority_master.mmake"},
{label: "Model", name:"priority_master.mmodel"},
{label: "VIN", name:"priority_master.mvin"},

{label: "Stock#", name:"priority_master.mstock"},
{label: "Announce", name:"priority_master.mannounce"},
{label: "Cost", name:"priority_master.mfloor"},
{label: "Detail", name:"priority_master.mdetail", type:"select",
    options: [
{ label: 'Partial', value: 'Partial' },    
{ label: 'Full', value: 'Full' } 
           ]
           },

{label: "Color", name:"priority_master.mcolor"},
{label: "Mileage", name:"priority_master.mmileage"},
{label: "Transport", name:"priority_master.mtransport"},
{label: "Dealer",name: "priority_dealer.dname"}, 

{label: "Carfax", name:"priority_master.mcarfax"},
{label: "Damage", name:"priority_master.mdamage"},



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

{label: "Sold Price", name:"priority_master.msoldprice"},

{label: "User", name:"priority_master.muid", type: "select"},

{label: 'Archive', name: 'master.marchive', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },

{label: "Submitted", name:"priority_master.mrtime"},
{label: "Notes", name:"priority_master.mnotes"},

       ] 
  
    } );






var table = $('#example').DataTable( {
         dom: "Biftr",
        ajax: "prioritylogphp.php",
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
           // { "visible": false, "targets": 0 },
        //    { "visible": false, "targets": 1 },
         //   { "visible": false, "targets": 2 }
        ],
        
   columns: [ 
{data: "priority_master.mid", def:"readonly" },

{data: "priority_master.myear"},
{data: "priority_master.mmake"},
{data: "priority_master.mmodel"},
{data: "priority_master.mvin"},
{data: "priority_master.mstock"},
{data: "priority_master.mannounce"},
{data: "priority_master.mfloor"},
{data: "priority_master.mdetail"},
{data: "priority_master.mcolor"},
{data: "priority_master.mmileage"},

{data: "priority_master.mtransport"},
{data: "priority_master.mdid"},

{data: "priority_master.mcarfax"},
{data: "priority_master.mdamage"},
{data: "priority_master.mstatus"},
{data: "priority_master.msubstatus"},
{data: "priority_master.msolddate", type:"datetime"},


{data: "priority_master.msoldprice"},






{data: "priority_master.muid"},

{data: "priority_master.marchive"},






{data: "priority_master.mrtime", type:"datetime", def:"readonly"},
{data: "priority_master.mnotes"},


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
            

{
 	text:   'Push to Sold' , 
 	titleAttr: 'Sets Sold Date to today, Status to S, and Substatus to Inv-No. Next, select record(s) and use "Edit button" to add Sold Price, Sale Type, and Sales Net',
                action: function ( e, dt, node, config ) {
			editor
			.edit(dt.rows({selected:true}).indexes('mid'), false)
     			.val('priority_master.mstatus', 'S' )
		.val('priority_master.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();},
     		
		},
  		

  'colvis',

{ id:"myBtn",
 	text:   'Status Key' , 
 	titleAttr: '',
    action: function() {
    modal.style.display = "block";
}},
     
//  {text: 'Reload table', action: function () { table.ajax.reload();}}
    
 // 'pageLength'
],

    
    
  "rowCallback": function ( row, data ) { 



  
        
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
   $('td', row).css('color', '#000000');
   $('th', row).attr('nowrap','nowrap');
$('td', row).attr('nowrap','nowrap');



   }


    } );
     

  


         
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

  
   
//   setInterval( function () 
//{ table.ajax.reload( null, false ); // user paging is not reset on reload}, 
//30000 );
});



 



</script>
</body>
</html>

