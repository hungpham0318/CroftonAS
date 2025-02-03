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




    
    Editor::inst( $db, 'i_charges', 'i_charges.ic_id' )
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
Field::inst('i_charges.ic_note'),
Field::inst('i_charges.ic_xtraint')
     
            )

//->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
 // ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
 // ->where('master.mreconview','0','!=')
 //  ->where('master.msubstatus','Inv-Sent','!=')
//->where('master.marchive','1','!=')
    ->process($_POST)
    ->json();
    ?>