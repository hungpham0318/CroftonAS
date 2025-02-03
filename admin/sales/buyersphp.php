<?php
 //buyersphp.php
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

Editor::inst( $db, 'buyers', 'bid' )
    ->field(

Field::inst('buyers.bid'),
Field::inst('buyers.baccnum'),
Field::inst('buyers.battn'),
Field::inst('buyers.baddress'),
Field::inst('buyers.bcity'),
Field::inst('buyers.bstate'),
Field::inst('buyers.bzip'),
Field::inst('buyers.bfirstname'),
Field::inst('buyers.blastname'),
Field::inst('buyers.bphone'),
Field::inst('buyers.bcategory'),
Field::inst('buyers.btbd'),
Field::inst('buyers.bnotes'),
Field::inst('buyers.bemail')  
            )
   
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','newmaster.maid')
    ->process($_POST)
    ->json();
































