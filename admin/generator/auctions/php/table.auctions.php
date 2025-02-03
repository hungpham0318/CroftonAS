<?php

/*
 * Editor server script for DB table auctions
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


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'auctions', 'a_id' )
	->fields(
		Field::inst( 'a_name' ),
		Field::inst( 'a_url' )
	)
	->process( $_POST )
	->json();
