/*
 * Editor client script for DB table v_records
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.master.php',
		table: '#newmaster',
		fields: [
			{"label": "mid","name": "mid"},
			{"label": "mvid","name": "mvid"},
{"label": "maid","name": "maid"},
{"label": "mrid","name": "mrid"},
{"label": "muid","name": "muid"},
{"label": "mdid","name": "mdid"},
{"label": "mvin","name": "mvin"},
{"label": "myear","name": "myear"},
{"label": "mmake","name": "mmake"},
{"label": "mmodel","name": "mmodel"},
{"label": "mcolor","name": "mcolor"},
{"label": "mmileage","name": "mmileage"},
{"label": "mannounce","name": "mannounce"},
{"label": "mstock","name": "mstock"},
{"label": "mdetail","name": "mdetail"},
{"label": "mtransport","name": "mtransport"},
{"label": "mfloor","name": "mfloor"},
{"label": "mrtime","name": "mrtime"},
{"label": "mreqsaledate","name": "mreqsaledate2"},
{"label": "mreqsaledate2","name": "mreqsaledate"},
{"label": "mstatus","name": "mstatus"},
{"label": "msubstatus","name": "msubstatus"},
{"label": "msolddate","name": "msolddate"},
{"label": "mnotes","name": "mnotes"},
{"label": "msoldprice","name": "msoldprice"},
{"label": "mcarfax","name": "mcarfax"},
{"label": "mdamage","name": "mdamage"},
{"label": "mmiscInfo","name": "mmiscInfo"},
{"label": "mlane","name": "mlane"},
{"label": "mrun","name": "mrun"},
{"label": "mrundate","name": "mrundate"},
{"label": "mrunoutcome","name": "mrunoutcome"},
{"label": "minvId","name": "minvId"},
{"label": "mcarfax","name": "marchive"}
		]
	} );

	var table = $('#master').DataTable( {
		ajax: 'php/table.master.php',
		columns: [
{data: "mid"},
{data: "mvid"},
{data: "maid"},
{data: "mrid"},
{data: "muid"},
{data: "mdid"},
{data: "mvin"},
{data: "myear"},
{data: "mmake"},
{data: "mmodel"},
{data: "mcolor"},
{data: "mmileage"},
{data: "mannounce"},
{data: "mstock"},
{data: "mdetail"},
{data: "mtransport"},
{data: "mfloor"},
{data: "mrtime"},
{data: "mreqsaledate2"},
{data: "mreqsaledate"},
{data: "mstatus"},
{data: "msubstatus"},
{data: "msolddate"},
{data: "mnotes"},
{data: "msoldprice"},
{data: "mcarfax"},
{data: "mdamage"},
{data: "mmiscInfo"},
{data: "mlane"},
{data: "mrun"},
{data: "mrundate"},
{data: "mrunoutcome"},
{data: "minvId"},
{data: "mcarfax"},
{data: "marchive"}

		],
		select: true,
		lengthChange: false
	} );
} );

}(jQuery));
