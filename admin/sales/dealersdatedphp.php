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

Editor::inst( $db, 'dealers', 'did' )
    ->field(
Field::inst('dealers.did')
	->options('master','mdid','mdid')
	->options('master','mdid','mrtime')
		->validator('Validate::dbValues'),
	
Field::inst('dealers.dnumber'),
Field::inst('dealers.dname'),
Field::inst('dealers.dphone'),
Field::inst('dealers.dcontact'),
Field::inst('dealers.dsdphone'),
Field::inst('dealers.dmailAcctNum'),
Field::inst('dealers.dinvoiceemail'),
Field::inst('dealers.dnotes'),
Field::inst('dealers.daddress'),
Field::inst('dealers.dcity'),
Field::inst('dealers.dstate'),
Field::inst('dealers.dzip'),
Field::inst('dealers.dattn'),
Field::inst('dealers.drepfee'),
Field::inst('dealers.drepfeedesc')
//Field::inst('master.mdid'),
//Field::inst('master.mrtime')


   
            )
   
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','newmaster.maid')
//->LeftJoin('master','master.mdid','=','dealers.did')
    ->process($_POST)
    ->json();
































