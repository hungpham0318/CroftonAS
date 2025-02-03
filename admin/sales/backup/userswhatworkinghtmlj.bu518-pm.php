<?php session_start();
$title="Users";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<!DOCTYPE html>
<html>
<?php include "stylehead-begin.html";?>
<?php include "stylehead-end.html";?>
</head>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
 <div id="customForm">




                        <fieldset class="hr">
                            <legend>Name</legend>
  <!--                           


-->







 

                           
                            
                            
                            <editor-field name="users.uid"></editor-field>
<editor-field name="users.uname"></editor-field>
<editor-field name="users.email"></editor-field>
<editor-field name="users.umobile"></editor-field>
<editor-field name="users.ufax"></editor-field>
                            <editor-field name="users.uofficeph"></editor-field>
                            <editor-field name="users.username"></editor-field>
                            <editor-field name="users.password"></editor-field>
                            <editor-field name="users.ucas"></editor-field>
                             </fieldset>
                             <fieldset class="hr">
                            <legend>Name</legend>
                             
<editor-field name="users.uaddress"></editor-field>
<editor-field name="users.ucity"></editor-field>
<editor-field name="users.ustate"></editor-field>
<editor-field name="users.uzip"></editor-field>
                            <editor-field name="users.ucompany"></editor-field>
                            <editor-field name="users.unotes"></editor-field>
                            <editor-field name="users.uperms"></editor-field>
                           
                            <editor-field name="users.ufirst"></editor-field>
                           <editor-field name="users.ulast"></editor-field>
                         
         <editor-field name="users.active"></editor-field>
                            <editor-field name="users.resetToken"></editor-field>
                            <editor-field name="users.resetComplete"></editor-field>
                            
                        </fieldset>
                       
                        
                        
                        
                    </div>



 <div style="width:97%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                        <tr>

<th>User ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Cell Phone</th>
<th>Fax No.</th>
<th>Office No.</th>
<th>Username</th>
<!--<th>Encrypted password</th>-->
<th>Active</th>
<!--<th>resetToken</th>-->
<!--<th>resetComplete</th>-->
<!--<th>Useraddress</th>
<th>ucity</th>
<th>ustate</th>
<th>uzip</th>
<th>ucompany</th>-->
<th>Notes</th>
<th>Perms</th>
<th>CAS Cheat</th>
<th>First Name</th>
<th>Last Name</th>


							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>User ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Cell Phone</th>
<th>Fax No.</th>
<th>Office No.</th>
<th>Username</th>
<!--<th>Encrypted password</th>-->
<th>Active</th>
<!--<th>resetToken</th>-->
<!--<th>resetComplete</th>-->
<!--<th>Useraddress</th>
<th>ucity</th>
<th>ustate</th>
<th>uzip</th>
<th>ucompany</th>-->
<th>Notes</th>
<th>Perms</th>
<th>CAS Cheat</th>
<th>First Name</th>
<th>Last Name</th>




                        </tr>
                    </tfoot>
                    
                </table>
<!--	<div id="udr" style="border:1px solid #660000;width:45%;display:inline-block;margin:30px;float:left;"></div>
<div id="whatever">Baise cette merde!</div>-->
<div id="frame-udrelates" style="color:#660000;border:1.5px solid #660000;width:100%;margin-top:10px;display:block;">
<!--<div id="udr" style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:left;"></div>-->
<table style="width:100%;"><tr style="width:100%;display:block;"> 
<td style="width:45%;display:block;margin:0 auto;text-align: center;float:left;"></td>

<td style="width:45%;display:block;margin:0 auto;text-align: center;float:right;"></td>
</tr>


<tr>
<td style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:left;"><iframe src="/admin/snipstuff/udrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe></td>

<td style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:right;"><iframe src="/admin/snipstuff/arelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>

</td></tr></table>

	<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none">Modal iframe</button>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:80%;">
  <!--   <span class="close" id="span">&times;</span><div id="whatever">Baise cette merde!</div>-->

    
    <table style="width:100%;"><tr><td ><div id="udr" style="border:none;width:100%;display:inline-block;"></div><!--<iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe>--></td><td><iframe src="/admin/snipstuff/udrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>
    
    

    
    </td></tr></table>
   <p>To close this window click anywhere else.</p>
   </div>
   </div>
  <!-- Trigger/Open The Modal -->

<button id="myBtn2" style="display:none">Modal iframe</button>

<!-- The Modal -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
<div class="modal-content" style="width:80%;">
    <span class="close" id="span2">&times;</span>

                        
                        
                   
    <div id="whatever">Baise cette merde!</div>
<!--<div id="udr" style="border:1px solid #660000;width:45%;display:inline-block;margin:30px;float:left;"></div>-->
    <p>Try to pull in related tables in modals using the selected row(s)  Also, create modal content for iframes independent of where they are going to appear</p><iframe src="/admin/snipstuff/arelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>
    <table><tr><td ><iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></td><td><iframe src="/admin/worldview/css/substatus-key-iframe.php"   style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe></tr></table>
  </div>
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

	
	
	

	
	
	
	
	
	
	
	
	
	



	<script type="text/javascript" language="javascript" class="init">
	
	// Get the modal
var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
btn2.onclick = function() {
    modal2.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  if (event.target == modal) {
        modal.style.display = "none";
    }}
    


span2.onclick = function() { 
   if (event.target == modal2) {
        modal2.style.display = "none";
    }
    
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    } if (event.target == modal2) {
        modal2.style.display = "none";
    }
}
				//template.js
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "usersphp.php",
display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
{"label": "User ID","name":"users.uid"},
{"label": "Full Name","name":"users.uname"},
{"label": "Email","name":"users.email"},
{"label": "Cell Phone","name":"users.umobile"},
{"label": "Fax No.","name":"users.ufax"},
{"label": "Office No.","name":"users.uofficeph"},
{"label": "Username","name":"users.username"},
//{"label": "users.password","name":"users.password"},
{"label": "Active","name":"users.active"},
//{"label": "users.resetToken","name":"users.resetToken"},
//{"label": "users.resetComplete","name":"users.resetComplete"},
//{"label": "users.uaddress","name":"users.uaddress"},
//{"label": "users.ucity","name":"users.ucity"},
//{"label": "users.ustate","name":"users.ustate"},
//{"label": "users.uzip","name":"users.uzip"},
//{"label": "users.ucompany","name":"users.ucompany"},
{"label": "Notes","name":"users.unotes"},
{"label": "Perms","name":"users.uperms"},
{"label": "Cas Cheat","name":"users.ucas"},
{"label": "First Name","name":"users.ufirst"},
{"label": "Last Name","name":"users.ulast"},


        ] 
         
         
    } );


var table = $('#example').DataTable( {
         dom: "Bfrti",
        ajax: "usersphp.php",
"scrollY": 700,
   // responsive: true,
    scrollX: "true",    
   "scrollY": 700,
    dom: "Bfrt",
    //colReorder: true,
   stateSave: true,
    iDisplayLength: -1,
   //  "drawCallback": function ( settings ) {
   //         var api = this.api();
    //        var rows = api.rows( {page:'current'} ).nodes();
     //       var last=null;
 
    //        api.column(2, {page:'current'} ).data().each( function ( group, i ) {
     //           if ( last !== group ) {
     //               $(rows).eq( i ).before(
       //               //  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
        //                '<tr class="group"><td colspan="10">'+"Invoice Number:&nbsp;"+group+'<a href="editinvoice.php?iid='+group+'">&nbsp;&nbsp;Delete this Invoice (Click here to review and confirm deletion)</a></td></tr>'
                //    );
 
                 //   last = group;
             //   }
          //  } );
      //  },
select: {  
type: 'os',
style:    'os'
//selector: 'td:not(:nth-child(36))' // no row selection on last column
 //selector: 'td:first-child'
//selector: 'td.select-checkbox'
     },
     
     "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        
//order: [[ 19, 'desc' ],[22,'asc']],
   columns: [ 
{data: "users.uid"},
{data: "users.uname"},
{data: "users.email"},
{data: "users.umobile"},
{data: "users.ufax"},
{data: "users.uofficeph"},
{data: "users.username"},
//{data: "users.password"},
{data: "users.active"},
//{data: "users.resetToken"},
//{data: "users.resetComplete"},
//{data: "users.uaddress"},
//{data: "users.ucity"},
//{data: "users.ustate"},
//{data: "users.uzip"},
//{data: "users.ucompany"},
{data: "users.unotes"},
{data: "users.uperms"},
{data: "users.ucas"},
{data: "users.ufirst"},
{data: "users.ulast"},

/*end new data*/
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [        {
                extend: "create",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            }, {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
         //    {
           //     text: 'Mark as Ready',
            //    titleAttr: 'Select row(s) and click here to change Status to A - Active, and Substatus to Recon-Green - Ready, at Auction .',
           //      action: function ( e, dt, node, config ) {
  // editor
   //.edit(dt.rows({selected:true}).indexes('mid'), false)
    //    .val('master.msubstatus', 'recon-green' )
 //  .val('master.mstatus', 'A' )
  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
      //  .submit();},
     //  editor: editor
 // },
  'colvis',
	 
                    { id:"myBtn",
 	text:   'See Dealers' , 
 	titleAttr: '',
                action: function() {
    modal.style.display = "block";
}},
      
        
{ id:"myBtn2",
text:   'Invoice' , 
//"data": function (data, type, row, meta) {rowId: 'users.uid'
//return '<a href="/admin/invoice/singleinvoicesteptwo.php?did=' + data.users.uid+ '&uid='+data.users.uid+'" >Test</a>'; },
	
 	titleAttr: '',
                action: function() {
    modal2.style.display = "block";
}},
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],

  "rowCallback": function ( row, data ) { 


   
  
        
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');

   
$('td', row).attr('nowrap','nowrap');
 $('td', row).css('font-family','Open Sans');
$('td', row).css('white-space','nowrap');
$('td', row).css('font-size','1em');
$('td', row).attr('title','The information in Auction, Registrant, and Dealership columns is only editable when using the checkbox selector and the Edit button.');


   
   
   
   
   
   
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
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Users',
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
         columns: ':visible'
    },
    customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 7;
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
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Users - Portrait',
   
  header: true,
  
   title: 'Invoices',
   orientation: 'letter',
 
    exportOptions: {
        columns: ':visible'
      //   columns: [1, 2, 3,  11, 12, 16, 17, 18 ]
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
   // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
//$('#example tbody').on( 'click', 'tr', function () {
   //     $(this).toggleClass('selected');
//    } );
 
           var ud1 = '<iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/sales/udarelatehtmljs.php?uid=';
var ud2 = 0;
var ud3 = '" width="100%" height="500px"  ></iframe>';
   var qdid = 0;
 var qdidurl ='<a href="/admin/sales/udarelatehtmljs.php?uid=';
        var qdidurl2 ='">id</a>';
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        ud2 = table.row( this ).id().substr(4, 4);
        qdid = table.row( this ).id().substr(4, 4);
       var qdurl = qdidurl + qdid + qdidurl2;
       var udr = ud1 + ud2 + ud3;
document.getElementById("udr").innerHTML = udr;
document.getElementById("whatever").innerHTML = qdurl;
   // alert( 'Clicked row id '+qdurl );
    console.log( 'qdidurl '+qdidurl );
    console.log( 'qdid '+qdid );
    console.log( 'qdidurl2 '+qdidurl2 );
           console.log( 'udr'+udr );
    } );

 
    //$('#kount').click( function () {
      //  alert( table.rows('.selected').data().length +' row(s) selected' );
   // } );

 
});


</script>
</body>
</html>


