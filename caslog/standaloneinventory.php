

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
<head>

	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="/admin/worldview/css/snow-nav-admin.css">
<link rel="stylesheet" type="text/css" href="https://editor.datatables.net/media/css/site-examples.css?_=f5d04e3be679f59bce16388d8b78523c"/>
	
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="/Editor16/css/editor.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>





	
	
	<style >

	



button.create{}

    div.panel {
        position: relative;
        box-sizing: border-box;
        float: left;
        width: 23%;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #eee;
        min-height: 105px;
        padding: 5px;
        margin: 1em 2% 0 0;
    }
 
 /*  button.create:hover {
        background-color: #ddd;
    }*/
 
    div.panel i.edit,
    div.panel i.remove {
        position: absolute;
        bottom: 5px;
        right: 5px;
        color: #999;
    }
 
    div.panel i.remove {
        right: 25px;
    }
 
    div.panel i.edit:hover,
    div.panel i.remove:hover {
        color: black;
    }
 
    div.panel dl {
        margin: 0;
    }
 
    div.panel dt {
        clear: both;
        float: left;
        width: 33%;
        padding-left: 2%;
        margin: 0;
        color: #999;
    }
 
    div.panel dd {
        float: left;
        width: 65%;
        margin: 0;
    }
.DTED 
{
background-color:#ffffff!important;
border:solid 1px!important;
border-color:#000000!important;}

</style>
</head>

<body>
<div>
<?php include "../worldview/css/snow-admin-nav.html";?></div></br></br>

    <div style="clear:both; padding-top: 2em;"></div><div>
        
<div class="demo-html"></div>
				<div id="panels">
					
				</div>
				<div style="clear:both; padding-top: 2em;"></div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="/Editor16/js/dataTables.editor.min.js"></script>
<script type="text/javascript" src="/Editor16/js/editor.jqueryui.js"></script>










<script>

var editor; // use a global for the submit and return data rendering in the examples
 
// Template function to display the information panels. Editor will
// automatically keep the values up-to-date with any changes due to the use of
// the `data-editor-field` attribute. It knows which panel to update for each
// record through the use of `data-editor-id` in the container element.
function createPanel ( data )
{
    var id = data.DT_RowId;
     
    $(
        '<div class="panel" data-editor-id="'+id+'">'+
            '<i class="edit fa fa-pencil" data-id="'+id+'"/>'+
            '<i class="remove fa fa-times" data-id="'+id+'"/>'+
            '<dl>'+
'<dt>uid:</dt>'+'<dd data-editor-field="uid">'+data.uid+'</dd>'+'<dt>Last Name:</dt>'+'<dd data-editor-field="ulast">'+data.ulast+'</dd>'+'<dt>Full Name:</dt>'+'<dd data-editor-field="uname">'+data.uname+'</dd>'+'<dt>Email:</dt>'+'<dd data-editor-field="email">'+data.email+'</dd>'+'<dt>Cell:</dt>'+'<dd data-editor-field="umobile">'+data.umobile+'</dd>'+'<dt>Username:</dt>'+'<dd data-editor-field="username">'+data.username+'</dd>'+'<dt>Active:</dt>'+'<dd data-editor-field="active">'+data.active+'</dd>'+'<dt>Cheat:</dt>'+'<dd data-editor-field="ucas">'+data.ucas+'</dd>'+'<dt>Uperms:</dt>'+'<dd data-editor-field="uperms">'+data.uperms+'</dd>'+'</dl>'+'</div>'
    ).appendTo( '#panels' );
}
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
    ajax: "usersphp.php",
        fields: [
        {"label": "User ID","name":"uid"},
        {"label": "Last Name","name":"ulast"},

{"label": "Full Name","name":"uname"},
{"label": "Email","name":"email"},
{"label": "Cell Phone","name":"umobile"},

{"label": "Username","name":"username"},
//{"label": "users.password","name":"password"},
{"label": "Active","name":"active"},
//{"label": "users.resetToken","name":"resetToken"},
//{"label": "users.resetComplete","name":"resetComplete"},
//{"label": "users.uaddress","name":"users.uaddress"},
//{"label": "users.ucity","name":"users.ucity"},
//{"label": "users.ustate","name":"users.ustate"},
//{"label": "users.uzip","name":"users.uzip"},
//{"label": "users.ucompany","name":"users.ucompany"},
//{"label": "Notes","name":".unotes"},

{"label": "Cas Cheat","name":"u.ucas"},




//{"label": "First Name","name":"ufirst"},
//{"label": "Fax No.","name":"ufax"},
//{"label": "Office No.","name":"uofficeph"},
{"label": "Perms","name":"uperms"}
//{"label": "users.password","name":"upassword"},
        ]
    } );
 
    // Create record - on create we insert a new panel
//    editor.on( 'postCreate', function (e, json) {
 //       createPanel( json.data[0] );
   // } );
 
 //   $('button.create').on( 'click', function () {
 //       editor
 //           .title('Create new record')
//            .buttons('Create')
//            .create();
 //   } );
 
    // Edit
    $('#panels').on( 'click', 'i.edit', function () {
        editor
            .title('Edit record')
            .buttons('Save changes')
            .edit( $(this).data('id') );
    } );
 
    // Remove
    $('#panels').on( 'click', 'i.remove', function () {
        editor
            .title('Delete record')
            .buttons('Delete')
            .message('Are you sure you wish to delete this record?')
            .remove( $(this).data('id') );
    } );
 
    // Load the initial data and display in panels
    $.ajax( {
        url: 'usersphp.php',
        dataType: 'json',
        success: function ( json ) {
            for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                createPanel( json.data[i] );
            }
        }
    } );
} );
</script>
</div>
</body>
</html>