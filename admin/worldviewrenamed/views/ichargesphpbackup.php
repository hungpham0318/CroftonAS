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


Editor::inst( $db, 'i_charges', 'ic_id' )
    ->field(
Field::inst('i_charges.ic_id'),
Field::inst('i_charges.ic_iid'),
Field::inst('i_charges.ic_mid'),
Field::inst('i_charges.ic_date'),
Field::inst('i_charges.ic_amount'),
Field::inst('i_charges.ic_description'),
Field::inst('i_charges.ic_solddate'),
Field::inst('i_charges.ic_qty'),
Field::inst('i_charges.ic_rate'),
Field::inst('i_charges.ic_maid'),
Field::inst('i_charges.ic_stock'),
Field::inst('i_charges.ic_paid'),
Field::inst('i_charges.ic_note')
        )
			
	   

//->LeftJoin( 'invoices', 'iid', '=', 'i_charges.ic_iid' )
//->where('master.minvid',0,'=')
//  ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
//->LeftJoin('invoices','auctions.iaid','=','i_charges.ic_maid')
    ->process($_POST)
    ->json();
