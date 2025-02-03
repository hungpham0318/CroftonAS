<html>
<head>



<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.1.1/js/dataTables.keyTable.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.1.1/js/dataTables.autoFill.min.js"></script>
<script src="../../Editor-1.5.5/js/dataTables.editor.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">
<link rel="stylesheet" href="../../Editor-1.5.5/css/editor.dataTables.min.css">
<style>
div.DTE_Inline input {
        border: none;
        background-color: transparent;
        padding: 0 !important;
        font-size: 90%;
    }
 
    div.DTE_Inline input:focus {
        outline: none;
        background-color: transparent;
    }
</style>

</head>
<body>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>VehicleId</th>
            <th>RecordId</th>
            <th>DealerId</th>
            <th>UserId</th>
            <th>VIN</th>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Color</th>
            <th>Mileage</th>
            <th>Announcement</th>
            <th>Stock #</th>
            <th>Detail</th>
            <th>Transport</th>
            <th>Floor</th>
            <th>Status</th>
            <th width="18%">Timestamp</th>
            
        </tr>
    </thead>
</table>
<script>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "vehicles.php",
        table: "#example",
        fields: [ {
                label: "VehicleId:",
                name: "v_id"
            }, {
                label: "RecordId:",
                name: "v_rid"
            }, {
            	label: "DealerId:",
                name: "v_did"
            }, {
            	label: "UserId:",
                name: "v_uid"
            }, {
              label: "VIN:",
                name: "txtVIN"
            }, {
              label: "Year:",
                name: "txtYear"
            }, {
              label: "Make:",
                name: "txtMake"
            }, {
              label: "Model:",
                name: "txtModel"
            }, {
              label: "Color:",
                name: "txtColor"
            }, {
                label: "Mileage:",
                name: "txtMileage"
            }, {
                label: "Announcement:",
                name: "txtAnon"
            }, {
                label: "StockNo:",
                name: "inpvehStock"
            }, {
            label: "Detail:",
                name: "popDetail"
            }, {
            label: "Transport:",
                name: "txtTrans"
            }, {
             label: "Floor:",
                name: "txtPrice"
            }, {
             label: "Status:",
                name: "v_status"
            }, {
                label: "Timestamp:",
                name: "r_time"
            }
        ]
    } );
 
    var table = $('#example').DataTable( {
        dom: "Bfrtip",
 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 
        ajax: "vehicles.php",
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "v_id" },
            { data: "v_did" },
            { data: "v_uid" },
            { data: "v_rid" },
            { data: "txtVIN" },
            { data: "txtYear" },
            { data: "txtMake" },
            { data: "txtModel" },
            { data: "txtColor" },
            { data: "txtMileage" },
            { data: "txtAnon" },
            { data: "inpvehStock" },
            { data: "popDetail" },
            { data: "txtTrans" },
            { data: "txtPrice" },
            { data: "v_status" },
            { data: "r_time" }
	 ],
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
            selector: 'td:first-child',
            blurable: true
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
 
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
} );

</script>
</body>
</html>