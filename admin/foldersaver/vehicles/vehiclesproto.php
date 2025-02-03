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
    ->field(
     

Field::inst('v_record.v_id')->validator( 'Validate::notEmpty' ),
Field::inst('v_record.v_did'),
Field::inst('v_record.v_uid'),
Field::inst('v_record.v_rid'),
Field::inst('v_record.txtVIN'),
Field::inst('v_record.txtYear'),
Field::inst('v_record.txtMake'),
Field::inst('v_record.txtModel'),
Field::inst('v_record.txtColor'),
Field::inst('v_record.txtMileage'),
Field::inst('v_record.inpvehStock'),
Field::inst('v_record.popDetail'),
Field::inst('v_record.txtTrans'),
Field::inst('v_record.txtPrice'),
Field::inst('v_record.v_status'),
Field::inst('v_record.v_substatus'),
Field::inst('v_record.txtAnon'),
Field::inst('v_record.r_time'),
Field::inst('r_record.rtime'),
Field::inst('r_record.r_id'),
Field::inst('r_record.r_uid'),
Field::inst('r_record.r_did'),
Field::inst('r_record.dname'),
Field::inst('r_record.inpFiveMilNum'),
Field::inst('r_record.inpYourEmail'),
Field::inst('r_record.inpSaleDate'),
Field::inst('r_record.SaleDate'),
Field::inst('r_record.inpYourName'),
Field::inst('r_record.inpSDContact'),
Field::inst('r_record.inpDPhone'),
Field::inst('r_record.inpYourPhone'),
Field::inst('r_record.auction')
            )
   
    ->leftJoin('r_record', 'r_id', '=', 'v_record.v_rid')
    ->process($_POST)
    ->json();