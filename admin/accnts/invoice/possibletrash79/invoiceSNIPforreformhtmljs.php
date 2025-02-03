<?php session_start();
$title="Invoice Records";
$pageperms =3;
$qiid = $_GET['iid'];
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<!DOCTYPE html>
<html>
<head>
<style>
dt { margin-top: 1em; }
    dt:first-child { margin-top: 0; }
    dd { width: 25% }
 
    *[data-editor-field] {
        border: 1px dashed #ccc;
        padding: 0.5em;
        margin: 0.5em;
    }
 
    *[data-editor-field]:hover {
        background: #f3f3f3;
        border: 1px dashed #333;
    }
<style>

</head>
<body>
<?php include"../../sales/jsscripts.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>
<div id="example"></div>



<script type="text/javascript" class="init">
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "invoicephpforreform.php?iid='.$qiid.'",
        fields: [ 
{label:"invoices.iid", name:"invoices.iid"},
{label:"invoices.idate", name:"invoices.idate"},
{label:"invoices.itotal", name:"invoices.itotal"},
{label:"invoices.ipdfurl", name:"invoices.ipdfurl"},
{label:"invoices.iaid", name:"invoices.iaid"},
{label:"invoices.idid", name:"invoices.idid"},
{label:"invoices.idname", name:"invoices.idname"},
{label:"invoices.idattn", name:"invoices.idattn"},
{label:"invoices.idaddress", name:"invoices.idaddress"},
{label:"invoices.idcitystatezip", name:"invoices.idcitystatezip"},
{label:"invoices.idinvoiceemail", name:"invoices.idinvoiceemail"},
{label:"invoices.iclosed", name:"invoices.iclosed"}
        ]
    } );
 
    $('#edit').on( 'click', function () {
        editor
            .buttons( {
                label: "Save",
                fn: function () { this.submit(); }
            } )
            .edit();
    } );
} );
</script>
</div>
</body>
</html>