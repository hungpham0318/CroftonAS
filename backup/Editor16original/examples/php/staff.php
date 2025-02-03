<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../../php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'users' )
	->fields(
		Field::inst( 'ufirst' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'ulast' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'unotes' ),
		Field::inst( 'email' ),
		Field::inst( 'ucell' ),
		Field::inst( 'username' ),
		Field::inst( 'ucas' ),
		Field::inst( 'active' ),
		Field::inst( 'ucas' ),
		Field::inst( 'uname' ),
		Field::inst( 'uid' ),
		Field::inst( 'ucas' ),
		Field::inst( 'uperms' )
			->validator( 'Validate::numeric' )
			->setFormatter( 'Format::ifEmpty', null )
		
	)
	->process( $_POST )
	->json();
