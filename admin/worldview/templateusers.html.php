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

/*.css */

#customForm {
    display: flex;
    flex-flow: row wrap;
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
 
#customForm fieldset.name {
    flex: 2 100%;
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
#example_wrapper.dt-buttons{background-color:#7700000!important;}
</style>


</head>
<body>
<button id="kount">Row count</button>
<div id="customForm">
                        <fieldset class="name">
                            <legend>Name</legend>
                        <editor-field name="ufirst"></editor-field>
                        <editor-field name="ulast"></editor-field>
			<editor-field name="uname"></editor-field>
							
                        </fieldset>
                        <fieldset class="office">
                            <legend>Office</legend>
                            <editor-field name="email"></editor-field>
                            <editor-field name="umobile"></editor-field>
			<editor-field name="active"></editor-field>
			<editor-field name="uid"></editor-field>
                        </fieldset>
                        <fieldset class="hr">
                            <legend>HR info</legend>
                            <editor-field name="username"></editor-field>
                            <editor-field name="ucas"></editor-field>
                            <editor-field name="uperms"></editor-field>
			<editor-field name="unotes"></editor-field>
                        </fieldset>
                    </div>
 
<table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr><th></th>
                            <th>First Name</th>
                             <th>Last Name</th>
                            <th>Full Name</th>
			<th>Email</th>
                            <th>Cell</th>
                            <th>Active</th>
                            <th>UID</th>
                            <th>Username</th>
			<th>UCAS</th>
                            <th>Perms</th>
                            <th>Notes</th>
					
                        </tr>
                    </thead>
                    <tfoot>
                    <th></th>
                        <th>First Name</th>
                             <th>Last Name</th>
                            <th>Full Name</th>
			<th>Email</th>
                            <th>Cell</th>
                            <th>Active</th>
                            <th>UID</th>
                            <th>Username</th>
			<th>UCAS</th>
                            <th>Perms</th>
                            <th>Notes</th>
							
                        </tr>
                    </tfoot>
                </table>
				
				<!--
 { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return data.ufirst+' '+data.ulast;
            } },
           
"data": function (data, type, row, meta) {rowId: 'master.mid'
return '<a href="/admin/invoice/singleinvoicesteptwo.php?did=' + data.master.mdid+ '&mid='+data.master.mid+'" target="_blank" class="button">Invoice</a>'; }},

-->
				
				
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
        ajax: "templateusers.php",
        table: "#example",
        template: '#customForm',
        fields: [ {
                label: "First name:",
                name: "ufirst"
            }, {
                label: "Last name:",
                name: "ulast"
            }, {
            label: "Full Name:",
                name: "uname"
            },{
                label: "Email:",
                name: "email"
            }, {
                label: "Cell:",
                name: "umobile"
            }, {
                label: "Active:",
                name: "active"
            }, {			
		label: "u-ID:",
                name: "uid"
            }, {
                label: "Username:",
                name: "username"
            }, {
                label: "ucas:",
                name: "ucas"
            }, {
		label: "perms:",
                name: "uperms"
            }, {
                label: "Notes:",
                name: "unotes"
            }
        ]
    } );
 /* 'ufirst' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'ulast' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'unotes' ),
		Field::inst( 'email' ),
		Field::inst( 'umobile' ),
		Field::inst( 'active' ),
		Field::inst( 'uid' ),
		Field::inst( 'username' ),
		
		
		Field::inst( 'ucas' ),
		Field::inst( 'uperms' ),
		
		Field::inst( 'unotes' ),
		Field::inst( 'uname' )
							
							*/
							
							
var table = $('#example').DataTable( {
//    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "templateusers.php",
            columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],

        columns: [ {   // Checkbox select column
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
             { data: "ufirst" },
            { data: "ulast" },
              { data: "uname" },
            { data: "email" },
             { data: "umobile" },
            { data: "active" },
             { data: "uid" },
            { data: "username" },
            { data: "ucas" },
            { data: "uperms" },
             { data: "unotes" }
              
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            {
                extend: "selectedSingle",
                text: "Activate",
                action: function ( e, dt, node, config ) {
                    // Immediately add `250` to the value of the salary and submit
                    editor
                        .edit( table.row( { selected: true } ).index('uid'), false )
                        .set( 'active', 'Yes' )
                        .set( 'uperms', '2' )
                        
                       // .set( 'mnext', '1' )
                        //.set( 'msolddate', '1' )
                        .submit();
                }},
                 {
                text: 'Reload table',
                action: function () {
                    table.ajax.reload();
               } },
            { extend: "remove", editor: editor }
        ],
  "rowCallback": function ( row, data ) { if ( data.uperms =='2' ){ 
    
    $('td', row).css('background-color', '#CCFFCC');
   }}
  
    } );
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#kount').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );
    
  
   

  
 
});


</script>
</body>
</html>

