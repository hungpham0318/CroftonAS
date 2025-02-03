
/*
 * Editor client script for DB table auctions
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.auctions.php',
		table: '#auctions',
		fields: [
			{
				"label": "a_name:",
				"name": "a_name"
			},
			{
				"label": "a_url:",
				"name": "a_url"
			}
		]
	} );

	var table = $('#auctions').DataTable( {
		ajax: 'php/table.auctions.php',
		columns: [
			{
				"data": "a_name"
			},
			{
				"data": "a_url"
			}
		],
		select: true,
		lengthChange: false
	} );

	new $.fn.dataTable.Buttons( table, [
		{ extend: "create", editor: editor },
		{ extend: "edit",   editor: editor },
		{ extend: "remove", editor: editor }
	] );

	table.buttons().container()
		.appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
} );

}(jQuery));

