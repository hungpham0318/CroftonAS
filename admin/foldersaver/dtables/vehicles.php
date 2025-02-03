<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../Editor/php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;
 
// Build our Editor instance and process the data coming from _POST

Editor::inst( $db, 'v_record', 'v_id' )
    ->fields(
       
        Field::inst( 'v_did' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'v_uid' ),
        Field::inst( 'txtVIN' ),
        Field::inst( 'txtYear' ),
        Field::inst( 'txtMake' ),
        Field::inst( 'txtModel' ),
        Field::inst( 'txtColor' ),
        Field::inst( 'txtMileage' ),
        Field::inst( 'txtAnon' ),
        Field::inst( 'inpvehStock' ),
        Field::inst( 'popDetail' ),
        Field::inst( 'txtTrans' ),
        Field::inst( 'txtPrice' ),
        Field::inst( 'v_status' ),
         Field::inst( 'v_substatus' ),
        Field::inst( 'r_time' ),
         Field::inst( 'v_id' )->validator( 'Validate::notEmpty' ),
          Field::inst( 'v_rid' )
             )
    ->process( $_POST )
    ->json();