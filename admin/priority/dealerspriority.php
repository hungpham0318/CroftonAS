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

Editor::inst( $db, 'priority_dealers', 'did' )
    ->field(
Field::inst('priority_dealers.did'),
Field::inst('priority_dealers.dnumber'),
Field::inst('priority_dealers.dname'),
Field::inst('priority_dealers.dphone'),
Field::inst('priority_dealers.dcontact'),
Field::inst('priority_dealers.dsdphone'),
Field::inst('priority_dealers.dmailAcctNum'),
Field::inst('priority_dealers.dinvoiceemail'),
Field::inst('priority_dealers.dnotes'),
Field::inst('priority_dealers.daddress'),
Field::inst('priority_dealers.dcity'),
Field::inst('priority_dealers.dstate'),
Field::inst('priority_dealers.dzip'),
Field::inst('priority_dealers.dattn'),
Field::inst('priority_dealers.drepfee'),
Field::inst('priority_dealers.drepfeedesc')



   
            )
   
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','priority_dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','newmaster.maid')
    ->process($_POST)
    ->json();
































