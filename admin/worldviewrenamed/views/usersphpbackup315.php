<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../../Editor/php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Upload,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;
 
// Build our Editor instance and process the data coming from _POST

Editor::inst( $db, 'users', 'uid' )
    ->field(
Field::inst('users.uid'),
Field::inst('users.uname'),
Field::inst('users.email'),
Field::inst('users.umobile'),
Field::inst('users.ufax'),
Field::inst('users.uofficeph'),
Field::inst('users.username'),
Field::inst('users.password'),
Field::inst('users.active'),
Field::inst('users.resetToken'),
Field::inst('users.resetComplete'),
Field::inst('users.uaddress'),
Field::inst('users.ucity'),
Field::inst('users.ustate'),
Field::inst('users.uzip'),
Field::inst('users.ucompany'),
Field::inst('users.unotes'),
Field::inst('users.uperms')   
            )
   
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','newmaster.maid')
    ->process($_POST)
    ->json();