<?php
 
// DataTables PHP library
include( "../../Editor16/php/DataTables.php" );
 
// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;
 
 
/*
 * Example PHP implementation used for the joinLinkTable.html example
 */
 
Editor::inst( $db, 'users', 'uid' )
    ->field(
        Field::inst( 'ud_relate.u_id' )
->options( Options::inst()
                ->table( 'users' )
                ->value( 'uid' )
                ->label( 'uname' )
            ),

        Field::inst( 'users.uname' ),
        
        
        Field::inst( 'ud_relate.d_id' )
            ->options( Options::inst()
                ->table( 'dealers' )
                ->value( 'did' )
                ->label( 'dname' )
            ),
        Field::inst( 'dealers.dname' )
    )
    
    ->leftJoin( 'ud_relate', 'users.uid',          '=', 'ud_relate.u_id' )
    ->leftJoin( 'dealers',      'ud_relate.d_id', '=', 'dealers.did' )
    ->process($_POST)
    ->json();
