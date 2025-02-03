<?php session_start();
$title="Priority";
$pageperms =2;
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

















<fieldset class="office">
<legend>Vehicle</legend>
<editor-field name="priority_mvehicles.myear"></editor-field >
<editor-field name="priority_mvehicles.mmake"></editor-field>
<editor-field name="priority_mvehicles.mmodel"></editor-field >
<editor-field name="priority_mvehicles.mvin",  def="readonly" ></editor-field>
<editor-field name="priority_mvehicles.mastock"></editor-field>
<editor-field name="priority_mvehicles.madescription"></editor-field>
<editor-field name="priority_mvehicles.mcolor"></editor-field>
<editor-field name="priority_mvehicles.mmileage"></editor-field>
<editor-field name="priority_mvehicles.mannounce"></editor-field>
<editor-field name="priority_mvehicles.mstatus"></editor-field>
<editor-field name="priority_mvehicles.mdetail"></editor-field>
</fieldset> 

<fieldset class="office">
<legend>Info</legend>
<editor-field name="priority_mvehicles.mcost"></editor-field>
<editor-field name="priority_mvehicles.mfloor"></editor-field>
<editor-field name="priority_mvehicles.marrivdate"></editor-field>
<editor-field name="priority_mvehicles.mdrivable"></editor-field>
<editor-field name="priority_mvehicles.minvdays"></editor-field>
<editor-field name="priority_mvehicles.mhold"></editor-field>
<editor-field name="priority_mvehicles.mtitlestatus"></editor-field>
<editor-field name="priority_mvehicles.mtitlerecd"></editor-field>
<editor-field name="priority_mvehicles.mcomments"></editor-field>
<editor-field name="priority_mvehicles.mlotnum"></editor-field>
<editor-field name="priority_mvehicles.mpickup"></editor-field>

</fieldset>




<fieldset class="office" disabled>
<legend>Read Only</legend>
<editor-field name="priority_dealers.dname"></editor-field>
<editor-field name="priority_mvehicles.mid" ></editor-field>

<editor-field name="priority_mvehicles.marchive"></editor-field>
<editor-field name="priority_mvehicles.mrtime"></editor-field>

</fieldset> 








    </div>  
    

<div style="width:99%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
 

                        <tr>
						


<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
    

<th>DESCRIPTION</th>
<th>VIN</th>  


<th>COLOR</th>
<th>MILEAGE</th> 
 <th>DEALER STOCK#</th>


<th>USER</th>
<th>DETAIL</th>
<th>ANNOUNCE</th>



<th>COST</th>
<th>FLOOR</th>
   <th>ADESA-STOCK#</th>

<!--<th>CARFAX</th>
<th>DAMAGE</th>-->

					
<th>DATE ARRIVED</th>	
<th>DRIVABLE</th>	
	
<th>HOLD</th>	
<th>TITLE STATUS</th>	
<th>TITLE REC</th>	
<th>COMMENTS</th>	
<th>LOT NUM</th>	
<th>PICKUP DATE</th>
<th>STATUS</th>

<th>SOLD DATE</th>
<th>SOLD PRICE</th>

<th>ARCHIVE</th>
<th>DATE POSTED</th>
<th>NOTES</th>

<th>DEALERSHIP</th>	
<th>ID</th>  	 				
						
						
			
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>
                   
  

<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
    

<th>DESCRIPTION</th>
<th>VIN</th>  


<th>COLOR</th>
<th>MILEAGE</th> 
 <th>DEALER STOCK#</th>


<th>USER</th>
<th>DETAIL</th>
<th>ANNOUNCE</th>



<th>COST</th>
<th>FLOOR</th>
   <th>ADESA-STOCK#</th>

<!--<th>CARFAX</th>
<th>DAMAGE</th>-->

					
<th>DATE ARRIVED</th>	
<th>DRIVABLE</th>	
	
<th>HOLD</th>	
<th>TITLE STATUS</th>	
<th>TITLE REC</th>	
<th>COMMENTS</th>	
<th>LOT NUM</th>	
<th>PICKUP DATE</th>
<th>STATUS</th>

<th>SOLD DATE</th>
<th>SOLD PRICE</th>

<th>ARCHIVE</th>
<th>DATE POSTED</th>
<th>NOTES</th>

<th>DEALERSHIP</th>	
<th>ID</th>  	 				
				
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
   <table><thead><th style="border:none;width:50%;"></th><th style="border:none;width:50%;"></th></thead><tr><td ><?php //include "../worldview/css/status-key.html";?></td><td><?php// include "../worldview/css/substatus-key.html";?></td></tr></table>
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
        ajax: "prioritymvlog.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       stateSave: true,
       fields: [ 
           /*
   <th>A-STOCK#</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
  

<th>DESCRIPTION</th>
<th>VIN</th>    


<th>COLOR</th>
<th>MILEAGE</th> 
 <th>DEALER STOCK#</th>


<th>USER</th>
<th>DETAIL</th>
<th>ANNOUNCE</th>
<th>COST</th>
<th>FLOOR</th>

<!--<th>CARFAX</th>
<th>DAMAGE</th>-->

					
<th>DATE ARRIVED</th>	
<th>DRIVABLE</th>	
	
<th>HOLD</th>	
<th>TITLE STATUS</th>	
<th>TITLE REC</th>	
<th>COMMENTS</th>	
<th>LOT NUM</th>	
<th>PICKUP DATE</th>
<th>STATUS</th>

<th>SOLD DATE</th>
<th>SOLD PRICE</th>

<th>ARCHIVE</th>
<th>DATE POSTED</th>
<th>NOTES</th>

<th>DEALERSHIP</th>	
<th>ID</th>  */


{label: "Year", name:"priority_mvehicles.myear"},
{label: "Make", name:"priority_mvehicles.mmake"},
{label: "Model", name:"priority_mvehicles.mmodel"},



{label: "Description", name:"priority_mvehicles.madescription"},
{label: "VIN", name:"priority_mvehicles.mvin"},


{label: "Color", name:"priority_mvehicles.mcolor"},
{label: "Mileage", name:"priority_mvehicles.mmileage"},
{label: "Announce", name:"priority_mvehicles.mannounce"},
{label: "Dealer Stock#", name:"priority_mvehicles.mstock"},
{label: "User", name:"users.uname", type: "select"},
{label: "Detail", name:"priority_mvehicles.mdetail", type:"select",
    options: [
        { label: '', value: '' },    
{ label: 'WASH&VAC-25', value: 'WASH&VAC-25' },    
{ label: 'DETAIL-75', value: 'DETAIL-75' } 
           ]
           },


{label: "Cost", name:"priority_mvehicles.mcost"},
{label: "Floor", name:"priority_mvehicles.mfloor"},

{label: "Adesa Stock#", name:"priority_mvehicles.mastock"},
//{label: "Transport", name:"priority_mvehicles.mtransport"},


//{label: "Carfax", name:"priority_mvehicles.mcarfax"},
//{label: "Damage", name:"priority_mvehicles.mdamage"},




{"label": "Date Arrived","name":"priority_mvehicles.marrivdate", type:  "datetime"},
{"label": "Drivable","name":"priority_mvehicles.mdrivable"},

{"label": "Hold","name":"priority_mvehicles.mhold"},
{"label": "Title Status","name":"priority_mvehicles.mtitlestatus"},
{"label": "Title Rec'd","name":"priority_mvehicles.mtitlerecd", type:  "datetime"},
{"label": "Comments","name":"priority_mvehicles.mcomments"},
{"label": "Lot Num","name":"priority_mvehicles.mlotnum"},
{"label": "Pickup Date","name":"priority_mvehicles.mpickup", type:  "datetime"},
{label: "Status:",
                type: "select",
               name: "priority_mvehicles.mstatus",
              options: [
//{ label: 'I-Inactive-Not Received', value: 'I' },
 { label: 'A-ACTIVE AT AUCTION', value: 'ACTIVE' },
 { label: 'S-SOLD AT AUCTION', value: 'SOLD' },
// { label: 'Z-Arbitrated-Arb. Opened', value: 'Z' },
// { label: 'R-Released-Cancelled', value: 'R' },
//  { label: 'X -Arb Return', value: 'X' }
               
             
                       ]

           }, 
          
       
       {label: "Sold Date", name:"priority_mvehicles.msolddate", type:  "datetime" },

{label: "Sold Price", name:"priority_mvehicles.msoldprice"},

{label: 'Archive', name: 'priority_vehicles.marchive', type: "checkbox", separator: "|", options: [ {label: '', value: 1}] },

{label: "Date Posted", name:"priority_mvehicles.mrtime"},
{label: "Notes", name:"priority_mvehicles.mnotes"},
{label: "Dealer",name: "priority_dealers.dname"}, 

{label: "ID", name:"priority_mvehicles.mid"},

       ] 
  
    } );






var table = $('#example').DataTable( {
         dom: "Biftr",
        ajax: "prioritymvlog.php",
//"scrollY": 700,
processing: "true",
   // responsive: true,
    "scrollY": "740",
   // scrollX: "800",    
   scrollX: "true", 
  //scrollY: true,
 //  colReorder: true,
stateSave: "true",
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
  
   
    { "visible": false, "targets": 13 },
 //   { "visible": false, "targets": 14 },
    { "visible": false, "targets": 15 },
    { "visible": false, "targets": 16 },
    { "visible": false, "targets": 17 },
     { "visible": false, "targets": 18 },
    { "visible": false, "targets": 19 },
   
            { "visible": false, "targets": 20 },
             { "visible": false, "targets":21 },
            { "visible": false, "targets": 22 },
            { "visible": false, "targets": 23 },
             { "visible": false, "targets": 24 },
             { "visible": false, "targets": 25 },
            { "visible": false, "targets": 28 },
           { "visible": false, "targets": 27 }
        ],
        
   columns: [ 

{data: "priority_mvehicles.myear"},
{data: "priority_mvehicles.mmake"},
{data: "priority_mvehicles.mmodel"},


{data: "priority_mvehicles.madescription"},
{data: "priority_mvehicles.mvin"},

{data: "priority_mvehicles.mcolor"},
{data: "priority_mvehicles.mmileage"},
{data: "priority_mvehicles.mstock"},



{data: "users.uname"},
{data: "priority_mvehicles.mdetail"},

{data: "priority_mvehicles.mannounce"},
//{data: "priority_mvehicles.mtransport"},

{data: "priority_mvehicles.mcost"},
{data: "priority_mvehicles.mfloor"},


//{data: "master.mdid"},

//{data: "priority_mvehicles.mcarfax"},
//{data: "priority_mvehicles.mdamage"},
{data: "priority_mvehicles.mastock"},
{data: "priority_mvehicles.marrivdate."},
{data: "priority_mvehicles.mdrivable."},

{data: "priority_mvehicles.mhold."},
{data: "priority_mvehicles.mtitlestatus."},
{data: "priority_mvehicles.mtitlerecd."},
{data: "priority_mvehicles.mcomments."},
{data: "priority_mvehicles.mlotnum."},
{data: "priority_mvehicles.mpickup."},

{data: "priority_mvehicles.mstatus"},

{data: "priority_mvehicles.msolddate", type:"datetime"},


{data: "priority_mvehicles.msoldprice"},


{data: "priority_mvehicles.marchive"},






{data: "priority_mvehicles.mrtime", type:"datetime", def:"readonly"},
{data: "priority_mvehicles.mnotes"},
{ data: "priority_dealers.dname" },

{data: "priority_mvehicles.mid", def:"readonly" },

/*end new data*/
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },
  buttons: [         {
                extend: "create",
                editor: editor,
                formButtons: [
                    'Add Vehicle',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
    {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update Vehicle',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
        {
                extend: "remove",
                editor: editor,
                formButtons: [
                    'Delete Vehicle',
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

             {
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

          
           
           // 'excelHtml5',
            //'csvHtml5',
            //'pdfHtml5',
            

{
 	text:   'Push to Sold' , 
 	titleAttr: 'Sets Sold Date to today, Status to S. Next, select record(s) and use "Edit button" to add Sold Price, Sale Type, and Sales Net',
                action: function ( e, dt, node, config ) {
			editor
			.edit(dt.rows({selected:true}).indexes('mid'), false)
     			.val('priority_mvehicles.mstatus', 'SOLD' )
		.val('priority_mvehicles.msolddate', '<?php echo date("Y-m-d");?>' )
     			.submit();},
     		
		},
  		

  'colvis',

/*{ id:"myBtn",
 	text:   'Status Key' , 
 	titleAttr: '',
    action: function() {
    modal.style.display = "block";
}},*/
     
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

