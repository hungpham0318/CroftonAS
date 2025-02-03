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

// The following statement can be removed after the first run (i.e. the database
// table has been created). It is a good idea to do this to help improve
// performance.
$db->sql( "CREATE TABLE IF NOT EXISTS `auctions` (
	`a_id` int(10) NOT NULL auto_increment,
	`a_name` varchar(255),
	`a_url` varchar(255),
	PRIMARY KEY( `a_id` )
);" );

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'auctions', 'a_id' )
	->fields(
		Field::inst( 'a_name' ),
		Field::inst( 'a_url' )
	)
	->process( $_POST )
	->json();
