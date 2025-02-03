
/*
 * Editor client script for DB table v_records
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.v_records.php',
		table: '#v_records',
		fields: [
			{
				"label": "v_did",
				"name": "v_did"
			},
			{
				"label": "v_uid",
				"name": "v_uid"
			},
			{
				"label": "v_rid",
				"name": "v_rid"
			},
			{
				"label": "txtVIN",
				"name": "txtvin"
			},
			{
				"label": "txtYear",
				"name": "txtyear"
			},
			{
				"label": "txtMake",
				"name": "txtmake"
			},
			{
				"label": "txtModel",
				"name": "txtmodel"
			},
			{
				"label": "txtColor",
				"name": "txtcolor"
			},
			{
				"label": "txtAnon",
				"name": "txtanon"
			},
			{
				"label": "inpvehStock",
				"name": "inpvehstock"
			},
			{
				"label": "popDetail",
				"name": "popdetail"
			},
			{
				"label": "txtTrans",
				"name": "txttrans"
			},
			{
				"label": "txtPrice",
				"name": "txtprice"
			},
			{
				"label": "r_time",
				"name": "r_time",
				"type": "datetime",
				"format": "YYYY-MM-DD HH:mm:ss"
			},
			{
				"label": "v_status",
				"name": "v_status"
			},
			{
				"label": "v_substatus",
				"name": "v_substatus"
			}
		]
	} );

	var table = $('#v_records').DataTable( {
		ajax: 'php/table.v_records.php',
		columns: [
			{
				"data": "v_did"
			},
			{
				"data": "v_uid"
			},
			{
				"data": "v_rid"
			},
			{
				"data": "txtvin"
			},
			{
				"data": "txtyear"
			},
			{
				"data": "txtmake"
			},
			{
				"data": "txtmodel"
			},
			{
				"data": "txtcolor"
			},
			{
				"data": "txtanon"
			},
			{
				"data": "inpvehstock"
			},
			{
				"data": "popdetail"
			},
			{
				"data": "txttrans"
			},
			{
				"data": "txtprice"
			},
			{
				"data": "r_time"
			},
			{
				"data": "v_status"
			},
			{
				"data": "v_substatus"
			}
		],
		select: true,
		lengthChange: false
	} );
} );

}(jQuery));

