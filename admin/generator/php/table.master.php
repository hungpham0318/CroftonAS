<?php

/*
 * Editor server script for DB table v_records
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// The following statement can be removed after the first run (i.e. the database
// table has been created). It is a good idea to do this to help improve
// performance.

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'newmaster', 'mid' )
->fields(
Field::inst('mid'),
Field::inst('mvid'),
Field::inst('maid'),
Field::inst('mrid'),
Field::inst('muid'),
Field::inst('mdid'),
Field::inst('mvin'),
Field::inst('myear'),
Field::inst('mmake'),
Field::inst('mmodel'),
Field::inst('mcolor'),
Field::inst('mmileage'),
Field::inst('mannounce'),
Field::inst('mstock'),
Field::inst('mdetail'),
Field::inst('mtransport'),
Field::inst('mfloor'),
Field::inst('mrtime'),
Field::inst('mreqsaledate2'),
Field::inst('mreqsaledate'),
Field::inst('mstatus'),
Field::inst('msubstatus'),
Field::inst('msolddate'),
Field::inst('mnotes'),
Field::inst('msoldprice'),
Field::inst('mcarfax'),
Field::inst('mdamage'),
Field::inst('mmiscinfo'),
Field::inst('mlane'),
Field::inst('mrun'),
Field::inst('mrundate'),
Field::inst('mrunoutcome'),
Field::inst('minvid'),
Field::inst('marchive')				)
	->process( $_POST )
	->json();





