<?php
 //frankenphp.php
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../../../Editor16/php/DataTables.php" );
 
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
$qmdid = $_GET['did'];


Editor::inst( $db, 'test_i_charges_temp', array('ic_id', 'ic_did') )
    
    
   
    ->fields(
Field::inst('ic_id'),
Field::inst('ic_num'),
Field::inst('ic_description'),
Field::inst('ic_ratedesc'),
Field::inst('ic_qty'),
Field::inst('ic_rate'),
Field::inst('ic_amount'),
Field::inst('ic_iid'),
Field::inst('ic_mid'),
Field::inst('ic_did' ),
Field::inst('ic_date'),
Field::inst('ic_solddate'),
Field::inst('ic_maid'),
Field::inst('ic_stock'),
Field::inst('ic_paid'),
Field::inst('ic_note'),
Field::inst('ic_xtraint')
     
            )
//->LeftJoin( 'invoices', 'invoices.iid', '=', 'ic_iid' )
//->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
 // ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
 // ->where('master.mreconview','0','!=')
 //  ->where('master.msubstatus','Inv-Sent','!=')
->where('ic_did',$qmdid,'=')
    ->process($_POST)
    ->json();
    ?>