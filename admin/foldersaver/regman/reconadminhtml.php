<?php session_start();
//admin/regman/reconhtml.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>


		<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>!Set Title!</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<!-- datatables css -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
<link rel="stylesheet" href="../Editor/css/editor.dataTables.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="/admin/world/world-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"/>  
<!--<link rel="stylesheet" href="../css/admin.css" type="text/css" />-->


    <link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
 
  </head>

  <body>
    <div class="navbar-wrapper">
      <div class="container">
<!-- NAVBAR
================================================== -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container" >
            <div class="navbar-header">
              <button type="button" class="btn-primary navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CAS Administration</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">

                <li class="active"><a href="#">Home</a></li>
                <li><a href="/admin/regman/reconadminhtml.php">Recon</a></li>
                <li><a href="/admin/regman/masteradminhtml.php">Master</a></li>
                 <li><a href="/admin/regman/soldadminhtml.php">Sold</a></li>
                  
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Invoicing<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li class="dropdown-header">Billing - Coming Soon</li>
                  
                    <li class=""><a href="/admin/accnts/invoicepdf/index.php">Create New Invoice</a></li>
                    <li class="dropdown-item disabled"><a href="">View Outstanding Invoices</a></li>
                    <li class="dropdown-item disabled"><a href="/admin/accnts/invoicehtml.php">View Outstanding Invoice</a></li>
                    <li><a href="/admin/accnts/invoicehtml.php" >View Paid Invoices</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Payments</li>
                    <li class="dropdown-item disabled"><a href="#" class="disabled">Record Payments</a></li>
                    <li class="dropdown-item disabled"><a href="#" class="disabled">View Payments Info</a></li>
                    
                  </ul>
                </li>
                   <li><a href="#contact">Archives</a></li>
                    <li><a href="#contact">Users</a></li>
                     <li><a href="#contact">Dealers</a></li>
                     
                     <li><a href="#contact">Log Out!</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container">

<table id="example" >
    <thead>
    <tr>

<!-- <th></th>-->
<th></th>

<th>mid</th>


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



<th>mreqsaledate</th>
<th>mstatus</th>
<th>msubstatus</th>

<th>mnotes</th>

<th>mcarfax</th>
<th>mdamage</th>
<th>mmiscInfo</th>
<th>mlane</th>
<th>mrun</th>
<th>mrundate</th>



            



        </tr>
    </thead>
      <tfoot>
        <tr>

<!--<th></th>-->
<th></th>
<th>mid</th>

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

<th>mreqsaledate</th>
<th>mstatus</th>
<th>msubstatus</th>

<th>mnotes</th>

<th>mcarfax</th>
<th>mdamage</th>
<th>mmiscInfo</th>
<th>mlane</th>
<th>mrun</th>
<th>mrundate</th>


        </tr>
    </tfoot>
</table><!-- example -->

</div><!-- admin insert-->




<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<!--<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.1.1/js/dataTables.keyTable.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.1.1/js/dataTables.autoFill.min.js"></script>
<script src="../../Editor-1.5.5/js/dataTables.editor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.3.2/js/dataTables.colReorder.min.js"></script>

<script src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js"></script>

<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.colVis.min.js"></script>
<script>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "reconphp.php",
        table: "#example",
       deferRender:    true,
    //scroller:       true,
        fields: [ 
{"label": "mid","name": "newmaster.mid", type:  "readonly", def:   ""},
//{"label": "mvid","name": "newmaster.mvid", type:  "hidden", def:   ""},
//{"label": "maid","name": "auctions.a_id", type:  "hidden", def:   "1"},
//{"label": "mrid","name": "newmaster.mrid", type:  "hidden", def:   ""},
//{"label": "uid","name": "users.uid", type:  "hidden", def:   ""},
//{"label": "did","name": "dealers.did", type:  "hidden", def:   ""},
{"label": "mvin","name": "newmaster.mvin"},
{"label": "myear","name": "newmaster.myear"},
{"label": "mmake","name": "newmaster.mmake"},
{"label": "mmodel","name": "newmaster.mmodel"},
{"label": "mcolor","name": "newmaster.mcolor"},
{"label": "mmileage","name": "newmaster.mmileage"},
{"label": "mannounce","name": "newmaster.mannounce"},
{"label": "mstock","name": "newmaster.mstock"},
{"label": "mdetail","name": "newmaster.mdetail"},
{"label": "mtransport","name": "newmaster.mtransport"},
{"label": "mfloor","name": "newmaster.mfloor"},
//{"label": "mrtime","name": "newmaster.mrtime"},
//{"label": "mreqsaledate2","name": "newmaster.mreqsaledate2", type:  "readonly", def:   ""},
{"label": "mreqsaledate","name": "newmaster.mreqsaledate"}, 
{
                type: "select",
               label: "Status:",
                name: "newmaster.mstatus",
               options: [
               "I",
               "A",
               "S",
               "Z",
               "R",
               "X"
                       ]

           }, {
                type:  "select",  
               label: "Substatus:",
                name: "newmaster.msubstatus",
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
    
 //{"label": "msolddate","name": "newmaster.msolddate"},
{"label": "mnotes","name": "newmaster.mnotes"},
//{"label": "msoldprice","name": "newmaster.msoldprice"},
{"label": "mcarfax","name": "newmaster.mcarfax"},
{"label": "mdamage","name": "newmaster.mdamage"},
{"label": "mmiscinfo","name": "newmaster.mmiscinfo"},
{"label": "mlane","name": "newmaster.mlane"},
{"label": "mrun","name": "newmaster.mrun"},
{"label": "mrundate","name": "newmaster.mrundate"}
//{"label": "mrunoutcome","name": "newmaster.mrunoutcome"}
//{"label": "minvid","name": "newmaster.minvid"},
//{"label": "marchive","name": "newmaster.marchive"}
        ]
 });
 
// $('#example').on( 'click', 'tbody td, tbody span.dtr-data', function (e) {
        // Ignore the Responsive control and checkbox columns
//        if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') ) {
//            return;
//        }
 
        //editor.inline( this );
//  } );
  $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder=" '+title+'" />' );
    } );
// Activate an inline edit on click of a table cell
    // or a DataTables Responsive data cell
    
 
    var table = $('#example').DataTable( {
   "scrollY": 500,
   // responsive: true,
    scrollX: "true",    
    dom: "Bfrtlip",
    colReorder: true,
    	    
       
 	iDisplayLength: "50",
	lengthMenu: [[10, 100, 500, -1], [10, 100, 500, "All"]], 
  	ajax: "reconphp.php",
        columns: [
       // {   // Responsive control column
       //         data: null,
       //         defaultContent: '',
       //         className: 'control',
       //         orderable: false
       //     },
 {   // Checkbox select column
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "newmaster.mid" },
//{ data: "newmaster.mvid" },
//{ data: "auctions.a_id" },
//{ data: "newmaster.mrid" },
//{ data: "users.uid" },
//{ data: "dealers.did" },
{ data: "newmaster.mvin" },
{ data: "newmaster.myear" },
{ data: "newmaster.mmake" },
{ data: "newmaster.mmodel" },
{ data: "newmaster.mcolor" },
{ data: "newmaster.mmileage" },
{ data: "newmaster.mannounce" },
{ data: "newmaster.mstock" },
{ data: "newmaster.mdetail" },
{ data: "newmaster.mtransport" },
{ data: "newmaster.mfloor" },
//{ data: "newmaster.mrtime" },
//{ data: "newmaster.mreqsaledate2" },
{ data: "newmaster.mreqsaledate" },
{ data: "newmaster.mstatus" },
{ data: "newmaster.msubstatus" },
//{ data: "newmaster.msolddate" },
{ data: "newmaster.mnotes" },
//{ data: "newmaster.msoldprice" },
{ data: "newmaster.mcarfax" },
{ data: "newmaster.mdamage" },
{ data: "newmaster.mmiscinfo" },
{ data: "newmaster.mlane" },
{ data: "newmaster.mrun" },
{ data: "newmaster.mrundate" },
//{ data: "newmaster.mrunoutcome" },
//{ data: "newmaster.minvid" },
//{ data: "newmaster.marchive" }	
	 ],
	 
//	 order: [ 2, 'asc' ],
//        select: {
 //           style:    'os',
//            selector: 'td.select-checkbox'
//        },
	 
	 
        autoFill: {
            columns: ':not(:first-child)',
            editor:  editor
        },
        keys: {
            columns: ':not(:first-child)',
            editor:  editor
        },
        select: {
            style:    'os',
            selector: 'td:nth-child(1)',
            blurable: true
        },
         
        buttons: [
        
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            //{ extend: "remove", editor: editor },
            //'excelHtml5',
            //'csvHtml5',
            //'pdfHtml5',
            'colvis'
        ],
           

"rowCallback": function ( row, data ) { 
$('td', row).attr('nowrap','nowrap');
$('td', row).css('text-transform', 'Uppercase','font-family','monospace');
   if ( data.newmaster.msubstatus == "recon-green" ){ $('td', row).css('background-color', '#00FF66','padding-left','-10px','padding-right','-10px');}
   else if ( data.newmaster.msubstatus == "recon-red" ){ $('td', row).css('background-color', '#FCA38B','padding-left','-10px','padding-right','-10px');}
   else if ( data.newmaster.msubstatus == "recon-blue" ){ $('td', row).css('background-color', '#00CCFF','padding-left','-10px','padding-right','-10px');}
   else if ( data.newmaster.msubstatus == "recon-yellow" ){ $('td', row).css('background-color', '#FFFF66','padding-left','-10px','padding-right','-10px');}
   else if ( data.newmaster.msubstatus == "arbit-m" ){ $('td', row).css('background-color', '#99FF66','padding-left','-10px','padding-right','-10px');}
   else if ( data.newmaster.msubstatus == "arbit-z" ){ $('td', row).css('background-color', '#CCFF66','padding-left','-10px','padding-right','-10px');}
   else if ( data.newmaster.msubstatus == "Inv-No" ){ $('td', row).css('background-color', 'Orange','padding-left','-10px','padding-right','-10px');}
  else if ( data.newmaster.msubstatus == "Inv-Sent" ){ $('td', row).css('background-color', '#ffffff','padding-left','-10px','padding-right','-10px');}
   else if ( data.newmaster.msubstatus == "Inv-Paid" ){ $('td', row).css('background-color', 'Transparent','padding-left','-10px','padding-right','-10px');}
}
           
       
     });
 

// Disable KeyTable while the main editing form is open
 editor
        .on( 'open', function ( e, mode, action ) {
            if ( mode === 'main' ) {
                table.keys.disable();
            }
        } )
        .on( 'close', function () {
            table.keys.enable();
        } );
        

     table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );    
} );
</script>

</body></html>
	
	