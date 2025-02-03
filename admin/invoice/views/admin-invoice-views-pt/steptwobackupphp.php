<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
//$iid=$_GET['iid'];
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


Editor::inst( $db, 'i_charges_temp', 'ic_id' )
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
Field::inst('i_charges_temp.ic_maid'),
Field::inst('i_charges_temp.ic_stock'),
Field::inst('i_charges_temp.ic_paid'),
Field::inst('i_charges_temp.ic_note')
        )
			
//->where('master.minvid',0,'=')
//->LeftJoin( '$iid', '=', 'i_charges.ic_iid' )

//->LeftJoin( 'invoices', 'iid', '=', 'data.i_charges.ic_iid' )
//->where('icharges.ic_iid','$iid','=')
// ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
//->LeftJoin('invoices','auctions.iaid','=','i_charges.ic_maid')
    ->process($_POST)
    ->json();