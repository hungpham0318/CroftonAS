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

Editor::inst( $db, 'a_relate', array('a_uid', 'a_aid' ))
    ->field(
        Field::inst( 'a_relate.a_uid' )
->options( Options::inst()
                ->table( 'users' )
                ->value( 'uid' )
                ->label( 'uname' )
            ),

        Field::inst( 'users.uname' ),
        
        
        Field::inst( 'a_relate.a_aid' )
            ->options( Options::inst()
                ->table( 'auctions' )
                ->value( 'a_id' )
                ->label( 'a_name' )
            ),
        Field::inst( 'auctions.a_name' )
    )
    
    //->leftJoin( 'ud_relate', 'users.uid',          '=', 'ud_relate.u_id' )
    ->leftJoin( 'auctions',      'a_relate.a_aid', '=', 'auctions.a_id' )
->leftJoin( 'users',      'a_relate.a_uid', '=', 'users.uid' )
    ->process($_POST)
    ->json();
 
  