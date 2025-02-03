<?php
$qiid=$_GET['iid'];
?>
<!DOCTYPE html>
<html>
<head>
<?php// include"../../sales/stylehead-begin.html";?>

<style>
button.create,
    div.panel {
        position: relative;
        box-sizing: border-box;
        float: left;
        width: 80%;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #eee;
        min-height: 105px;
        padding: 5px;
        margin: 1em 2% 0 0;
    }
 
    button.create:hover {
        background-color: #ddd;
    }
 
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
        width: 100%;
        padding-left: 2%;
        margin: 0;
        color: #999;
    }
 
    div.panel dd {
        float: left;
        width: 100%;
        margin: 0;
    }

<?php //include"../../sales/stylehead-end.html";?>

<body>
<?php include "../../sales/jsscripts.html"; ?>
<div id="panels"></div>
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
                '<dt>InvoiceNo.:</dt>'+ '<dd data-editor-field="iid">'+data.iid+'</dd>'+
'<dt>Date:</dt>'+ '<dd data-editor-field="idate">'+data.idate+'</dd>'+
'<dt>Total:</dt>'+ '<dd data-editor-field="itotal">'+data.itotal+'</dd>'+
'<dt>Link:</dt>'+ '<dd data-editor-field="ipdfurl">'+data.ipdfurl+'</dd>'+
'<dt>Auction:</dt>'+ '<dd data-editor-field="iaid">'+data.iaid+'</dd>'+
'<dt>DealerId:</dt>'+ '<dd data-editor-field="idid">'+data.idid+'</dd>'+
'<dt>To::</dt>'+ '<dd data-editor-field="idname">'+data.idname+'</dd>'+
'<dt>Attn::</dt>'+ '<dd data-editor-field="idattn">'+data.idattn+'</dd>'+
'<dt>Street Addr:</dt>'+ '<dd data-editor-field="idaddress">'+data.idaddress+'</dd>'+
'<dt>CityStateZip:</dt>'+ '<dd data-editor-field="idcitystatezip">'+data.idcitystatezip+'</dd>'+
'<dt>Email Invoices to::</dt>'+ '<dd data-editor-field="idinvoiceemail">'+data.idinvoiceemail+'</dd>'+
'<dt>Paid in Full:</dt>'+ '<dd data-editor-field="iclosed">'+data.iclosed+'</dd>'+

            '</dl>'+
        '</div>'
    ).appendTo( '#panels' );
}
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "invoicephpforreform.php?iid='.$qiid.'",
        fields: [ {label:  "iid", name:"iid"},
{label:  "idate", name:"idate"},
{label:  "itotal", name:"itotal"},
{label:  "ipdfurl", name:"ipdfurl"},
{label:  "iaid", name:"iaid"},
{label:  "idid", name:"idid"},
{label:  "idname", name:"idname"},
{label:  "idattn", name:"idattn"},
{label:  "idaddress", name:"idaddress"},
{label:  "idcitystatezip", name:"idcitystatezip"},
{label:  "idinvoiceemail", name:"idinvoiceemail"},
{label:  "iclosed", name:"iclosed"}
        ]
    } );
 
    // Create record - on create we insert a new panel
    editor.on( 'postCreate', function (e, json) {
        createPanel( json.data[0] );
    } );
 
    $('button.create').on( 'click', function () {
        editor
            .title('Create new record')
            .buttons('Create')
            .create();
    } );
 
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
        url: 'invoicephpforreform.php?qiid=<?php echo $qiid;?>',
        dataType: 'json',
        success: function ( json ) {
            for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                createPanel( json.data[i] );
            }
        }
    } );
} );
</script>
</body>
</html>