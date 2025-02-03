<?php
 //dcontactsphp.php
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

Editor::inst( $db, 'd_contacts', 'dc_id' )
    ->field(

Field::inst('d_contacts.dc_id'),
Field::inst('d_contacts.dc_accnum'),
Field::inst('d_contacts.dc_attn'),
Field::inst('d_contacts.dc_address'),
Field::inst('d_contacts.dc_city'),
Field::inst('d_contacts.dc_state'),
Field::inst('d_contacts.dc_zip'),
Field::inst('d_contacts.dc_fullname'),
Field::inst('d_contacts.dc_phone'),
Field::inst('d_contacts.dc_copiesto'),
Field::inst('d_contacts.dc_mailmethod'),
Field::inst('d_contacts.dc_notes'),
Field::inst('d_contacts.dc_emailinvoice')  
            )
   
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','newmaster.maid')
    ->process($_POST)
    ->json();
































