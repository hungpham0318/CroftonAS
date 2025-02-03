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

Editor::inst( $db, 'dealers', 'did' )
    ->field(
Field::inst('dealers.did'),
Field::inst('dealers.dnumber'),
Field::inst('dealers.dname'),
Field::inst('dealers.dphone'),
Field::inst('dealers.dcontact'),
Field::inst('dealers.dsdphone'),
Field::inst('dealers.dmailAcctNum'),
Field::inst('dealers.dnotes'),
Field::inst('dealers.daddress'),
Field::inst('dealers.dcity'),
Field::inst('dealers.dstate'),
Field::inst('dealers.dinvoiceemail'),
Field::inst('dealers.drepfee'),
Field::inst('dealers.drepfeedesc'),
Field::inst('dealers.dzip')  
            )
   
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
->where( function ( $q ) {

//$q->where('did','(SELECT mdid FROM master WHERE minvid = 0 AND msubstatus LIKE "%Inv-No%")','IN', false);

$q->where('did','(SELECT mdid FROM master WHERE msubstatus LIKE "%Inv-No%")','IN', false);
//$q->where('did','(SELECT mdid FROM master WHERE minvid = 0)','IN', false);
} )
    ->process($_POST)
    ->json();