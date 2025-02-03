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




    
    Editor::inst( $db, 'i_charges_temp', 'i_charges_temp.ic_id' )
    ->field(
Field::inst('i_charges_temp.ic_id'),
Field::inst('i_charges_temp.ic_iid'),
Field::inst('i_charges_temp.ic_mid'),
Field::inst('i_charges_temp.ic_date'),
Field::inst('i_charges_temp.ic_amount'),
Field::inst('i_charges_temp.ic_description'),
Field::inst('i_charges_temp.ic_solddate'),

Field::inst('i_charges_temp.ic_qty'),
Field::inst('i_charges_temp.ic_rate'),
Field::inst('i_charges_temp.ic_ratedesc'),
Field::inst('i_charges_temp.ic_maid'),
Field::inst('i_charges_temp.ic_stock'),
Field::inst('i_charges_temp.ic_paid'),
Field::inst('i_charges_temp.ic_note'),
Field::inst('i_charges_temp.ic_price')
     
            )
 //->LeftJoin( 'invoices_temp','invoices_temp.iid','=','i_charges_temp.ic_iid')
//->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
// ->LeftJoin( 'dealers','dealers.did','=','i_charges_temp.ic_price')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
 // ->where('master.mreconview','0','!=')
 //  ->where('master.msubstatus','Inv-Sent','!=')
//->where('master.marchive','1','!=')
//->where( function ( $q ) {
//$q->where('ic_mid','(SELECT mid FROM master WHERE msubstatus LIKE "%Inv_No%")','IN', false);
//$q->where('ic_mid','(SELECT mid FROM master WHERE mdid = $did)','IN', false);
//})

    ->process($_POST)
    ->json();
    ?>