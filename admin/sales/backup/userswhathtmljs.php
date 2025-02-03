<?php session_start();
$title="Users";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>

<?php include "stylehead-begin.html";?>
#DTE_Field_users-email{text-transform:lowercase!important;}
<?php include "stylehead-end.html";?>
<body>
<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="whatever" style="a{color: #ffffff!important;"></div>
 <div id="customForm">
                        <fieldset class="hr">
                            <legend>Name</legend>
                             
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
<th>Last Name</th>
<th>Full Name</th>
<th>Email</th>
<th>Cell Phone</th>
<th>Username</th>
<th>Active</th>
<th>Notes</th>
<th>CAS Cheat</th>
<th>User ID</th>
<th>First Name</th>
<th>Fax No.</th>
<th>Office No.</th>
<th>Perms</th>


<!--<th>Useraddress</th>
<th>ucity</th>
<th>ustate</th>
<th>uzip</th>
<th>ucompany</th>-->
<!--<th>resetToken</th>-->
<!--<th>resetComplete</th>-->
<!--<th>Encrypted password</th>-->




							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>Last Name</th>
<th>Full Name</th>
<th>Email</th>
<th>Cell Phone</th>
<th>Username</th>
<th>Active</th>
<th>Notes</th>
<th>CAS Cheat</th>
<th>User ID</th>
<th>First Name</th>
<th>Fax No.</th>
<th>Office No.</th>
<th>Perms</th>




                        </tr>
                    </tfoot>
                    
                </table>
<!--
<div id="frame-udrelates" style="color:#660000;border:1.5px solid #660000;width:100%;margin-top:10px;display:block;">
<div id="udr" style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:left;"></div>
<table style="width:100%;"><tr style="width:100%;display:block;"> 
<td style="width:45%;display:block;margin:0 auto;text-align: center;float:left;"></td>

<td style="width:45%;display:block;margin:0 auto;text-align: center;float:right;"></td>
</tr>


<tr>
<td style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:left;"><iframe src="/admin/snipstuff/udrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe></td>

<td style="border:1px solid #660000;min-width:30%;display:inline-block;margin:30px;float:right;"><iframe src="/admin/snipstuff/arelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>

</td></tr></table>-->

	<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none">Modal iframe</button>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:80%;">
  <!--   <span class="close" id="span">&times;</span>
     <div style="float:right;">Manage Dealer Access</div>-->
    
    <table style="width:100%;"><thead><th style="width:45%;margin:5px;">Manage Dealership Access</th><th style="width:45%;margin:5px;" >Selected User Dealership Access</th></thead><tr><td><iframe src="/admin/snipstuff/udrelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>
    
    </td><td ><div id="udr" style="border:none;width:100%;display:inline-block;"><div style="width:100%;margin:5px;text-align:center">When a User is selected,this window displays </br> the dealerships to which the user currently has access.</div></div><!--<iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe>--></td></tr></table>
   <p style="text-align:center;">To Close this window, just click somewhere else.</p>
   </div>
   </div>
  <!-- Trigger/Open The Modal -->

<button id="myBtn2" style="display:none">Modal iframe</button>

<!-- The Modal -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
<div class="modal-content" style="width:80%;">
  <span class="close" id="span2" style="display:none;">&times;</span>
  <!--   <span class="close" id="span2">&times;</span>-->
                        
                        
                   
   

    
    <table style="width:100%;"><thead><th style="width:45%;margin:5px;">Manage Auction Access</th><th style="width:45%;margin:5px;" >Selected User Auction Access</th></thead><tr><td><iframe src="/admin/snipstuff/arelatejoin.html" width="100%" height="500px"  sandbox="allow-same-origin allow-scripts"></iframe>
    </td><td ><div id="uda" style="border:none;width:100%;display:inline-block;"><div style="margin:20px;text-align:center">When a User is selected,this window displays </br> the Auctions to which the user currently has access.</div></div><!--<iframe src="/admin/worldview/css/status-key-iframe.php" style="border:none;width:25em;height:250px;"  sandbox="allow-same-origin allow-scripts"></iframe>--></td></tr></table> 
    <p style="text-align:center;">To Close this window, just click somewhere else.</p>
  </div>
</div>

</div>
	

	

	
	
	

	
	<?php include 'jsscripts.html';?>
	
	
	
	
	
	
	
	



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
{"label": "Last Name","name":"users.ulast"},

{"label": "Full Name","name":"users.uname"},
{"label": "Email","name":"users.email"},
{"label": "Cell Phone","name":"users.umobile"},

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

{"label": "Cas Cheat","name":"users.ucas"},

{"label": "User ID","name":"users.uid"},


{"label": "First Name","name":"users.ufirst"},
{"label": "Fax No.","name":"users.ufax"},
{"label": "Office No.","name":"users.uofficeph"},
{"label": "Perms","name":"users.uperms"},




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
 //  stateSave: true,
      stateSave: false,
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
      { "visible": false, "targets": 7 },
             { "visible": false, "targets": 9 },
            { "visible": false, "targets": 10 },
             { "visible": false, "targets": 11 },
              { "visible": false, "targets": 12 }
        ],
        "order": [0, 'asc' ],
        
//order: [[ 19, 'desc' ],[22,'asc']],
   columns: [ 
   {data: "users.ulast"},
{data: "users.uname"},
{data: "users.email"},
{data: "users.umobile"},

{data: "users.username"},
//{data: "users.password"},
{data: "users.active"},
{data: "users.unotes"},
{data: "users.ucas"},
{data: "users.uid"},
{data: "users.ufirst"},
{data: "users.ufax"},
{data: "users.uofficeph"},
{data: "users.uperms"},
//{data: "users.resetToken"},
//{data: "users.resetComplete"},
//{data: "users.uaddress"},
//{data: "users.ucity"},
//{data: "users.ustate"},
//{data: "users.uzip"},
//{data: "users.ucompany"},








/*end new data*/
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [       
         {
                extend: "create",
                editor: editor,
               formButtons: [
                    'Update',
                   { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
             {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            }, {
                extend: "remove",
                editor: editor,
                formButtons: [
                    'DELETE USER',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
          {
           text: 'Activate User',
            titleAttr: 'Remember to give new users auction and dealerships access.',
          action: function ( e, dt, node, config ) {
  editor
  .edit(dt.rows({selected:true}).indexes('uid'), false)
    .val('users.active', 'yes' )
 //  .val('master.mstatus', 'A' )
  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
      .submit();},
      editor: editor
 },
  'colvis',
	 
                    { id:"myBtn",
 	text:   'Dealer Access' , 
 	titleAttr: '',
                action: function() {
    modal.style.display = "block";
}},
      
        
{ id:"myBtn2",
text:   'Auction Access' , 
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


   
  
        
 //  $('td', row).css('text-transform', 'uppercase');
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
    exportOptions: {
         columns: ':visible'
    },
    customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 9;
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
  var uda1 = '<iframe sandbox="allow-same-origin allow-modals allow-scripts" src="/admin/sales/uarelatehtmljs.php?uid=';
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
       var uda = uda1 + ud2 + ud3;
document.getElementById("udr").innerHTML = udr;
document.getElementById("uda").innerHTML = uda;
//document.getElementById("whatever").innerHTML = qdurl;
   // alert( 'Clicked row id '+qdurl );
  
    console.log( 'qdidurl '+qdidurl );
    console.log( 'qdid '+qdid );
    console.log( 'qdidurl2 '+qdidurl2 );
           console.log( 'udr'+udr );
    } );

 
    //$('#kount').click( function () {
    // alert( table.rows('.selected').data(rowId) +' row(s) selected' );
   // } );

 
});


</script>
</body>
</html>


