<?php session_start();
$title="Master to Copy";
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





<fieldset class="hr">
<legend>Recon Info</legend>
<editor-field name="master.mid"></editor-field>
<editor-field name="master.mlane"></editor-field>
<editor-field name="master.mrun"></editor-field>
<editor-field name="master.myear"></editor-field >
<editor-field name="master.mmake"></editor-field>
<editor-field name="master.mmodel"></editor-field >

<editor-field name="master.mvin",  def="readonly" ></editor-field>

<editor-field name="master.mstock"></editor-field>
<editor-field name="master.mannounce"></editor-field>


<editor-field name="master.mfloor"></editor-field>

</fieldset> 

    </div>  
    

<div style="width:99%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
 

                        <tr>
                          
      <th>ID</th>    
<th>SUBMITTED</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
   <th>VIN</th> 
    <th>DEALERSHIP/STOCK#</th>  

 <th>ANNOUNCE</th>
<th>FLOOR</th>
			
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>
                       
      <th>ID</th>    
<th>SUBMITTED</th>
<th>YEAR</th>
<th>MAKE</th>
<th>MODEL</th>
   <th>VIN</th> 
   <th>DEALERSHIP/STOCK#</th> 

 <th>ANNOUNCE</th>
<th>FLOOR</th>


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


    editor = new $.fn.dataTable.Editor( {
        ajax: "kellyforcopyphp.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 

{label: "ID", name:"master.mid"},

{label: "Submitted", name:"master.mrtime"},


{label: "Year", name:"master.myear"},
{label: "Make", name:"master.mmake"},
{label: "Model", name:"master.mmodel"},
{label: "VIN", name:"master.mvin"},
{label: "Dealer",name: "dealer.dname"}, 

{label: "Announce", name:"master.mannounce"},
{label: "RegFloor", name:"master.mfloor"},


        ] 
         
         
    } );






var table = $('#example').DataTable( {
         dom: "Biftr",
        ajax: "kellyforcopyphp.php",
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
        //    { "visible": false, "targets": 2 }
         {
targets: [ 6],
"orderable": false,
render: function ( data, type, row ) {
return data+' '+row.dealers.dnumber+'  '+row.master.mstock;
}
},
        ],
        
   columns: [ 
       {data: "master.mid", def:"readonly" },

  {data: "master.mrtime", def:"readonly" },


{data: "master.myear"},
{data: "master.mmake"},
{data: "master.mmodel"},
{data: "master.mvin"},
{ data: "dealers.dname" },

{data: "master.mannounce"},
{data: "master.mfloor"},

	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [       
        /*     {
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
         
               columns: ':visible',
                    modifier: {
                        selected: true
                    }
                }
            },*/
              {
                extend: 'copyHtml5',
                  exportOptions: {
                           columns: ':visible',
            header: ':false',
                    modifier: {
                        selected: true,
                   
                    }
                }            },
                

        'selectNone',

 


	        
           
  'colvis',
	 
             
 
     
   
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
      
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

  
/*   
   setInterval( function () 
{
 table.ajax.reload( null, false ); // user paging is not reset on reload
}, 
90000 );*/
});



 



</script>
</body>
</html>


