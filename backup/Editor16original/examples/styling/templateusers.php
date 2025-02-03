<?php
 //templatesample.php
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
Editor::inst( $db, 'users', 'uid' )
    ->fields(
        Field::inst( 'ufirst' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'ulast' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'uname' ),
		
		Field::inst( 'email' ),
		Field::inst( 'umobile' ),
		Field::inst( 'active' ),
		
		Field::inst( 'username' ),
		Field::inst( 'ucas' ),

		
		
		Field::inst( 'uid' ),
	
		Field::inst( 'uperms' ),
		Field::inst( 'unotes' )
		)
    ->process( $_POST )
    ->json();


?>
