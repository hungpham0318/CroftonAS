<?php
 //invoicerecordsphp.php
/*
 * Example PHP implementation used for the index.html example
 */
 
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
 
// Build our Editor instance and process the data coming from _POST

Editor::inst( $db, 'users', 'uid' )
    ->field(
Field::inst('uid'),
Field::inst('uname'),
Field::inst('email'),
Field::inst('umobile'),
Field::inst('users.ufax'),
Field::inst('users.uofficeph'),
Field::inst('username'),
Field::inst('password'),
Field::inst('active'),
Field::inst('resetToken'),
Field::inst('resetComplete'),
Field::inst('uaddress'),
Field::inst('ucity'),
Field::inst('ustate'),
Field::inst('uzip'),
Field::inst('ucompany'),
Field::inst('unotes'),
Field::inst('uperms'),
Field::inst('ucas'),
Field::inst('ufirst'),
Field::inst('ulast')



   
            )
   
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','newmaster.maid')
    ->process($_POST)
    ->json();
































