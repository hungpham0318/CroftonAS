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
Editor::inst( $db, 'v_record', 'v_id' )
	->fields(
		Field::inst( 'v_did' ),
		Field::inst( 'v_uid' ),
		Field::inst( 'v_rid' ),
		Field::inst( 'txtvin' ),
		Field::inst( 'txtyear' ),
		Field::inst( 'txtmake' ),
		Field::inst( 'txtmodel' ),
		Field::inst( 'txtcolor' ),
		Field::inst( 'txtanon' ),
		Field::inst( 'inpvehstock' ),
		Field::inst( 'popdetail' ),
		Field::inst( 'txttrans' ),
		Field::inst( 'txtprice' ),
		Field::inst( 'r_time' )
			->validator( 'Validate::dateFormat', array( 'format'=>'Y-m-d H:i:s' ) )
			->getFormatter( 'Format::datetime', array( 'from'=>'Y-m-d H:i:s', 'to'  =>'Y-m-d H:i:s' ) )
			->setFormatter( 'Format::datetime', array( 'to'  =>'Y-m-d H:i:s', 'from'=>'Y-m-d H:i:s' ) ),
		Field::inst( 'v_status' ),
		Field::inst( 'v_substatus' )
	)
	->process( $_POST )
	->json();
