<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'users', 'uid' )
	->fields(
		Field::inst( 'uid' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'uname' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'umobile' ),
		Field::inst( 'email' ),
		Field::inst( 'ucompany' ),
		Field::inst( 'uaddress' ),
		Field::inst( 'ucity' ),
		Field::inst( 'ustate' ),
		Field::inst( 'uzip' ),
		Field::inst( 'active' ),
		Field::inst( 'uperms' ),
		Field::inst( 'username' ),
		Field::inst( 'ufax' ),
		Field::inst( 'uofficeph' ),
		Field::inst( 'resetToken' ),
		Field::inst( 'resetComplete' ),
		Field::inst( 'unotes' ),
		Field::inst( 'password' )
		)
	->process( $_POST )
	->json();