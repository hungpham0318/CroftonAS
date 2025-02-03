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

Editor::inst( $db, 'newv_record', 'v_id' )
    ->field(
     

Field::inst('newv_record.v_id')->validator( 'Validate::notEmpty' ),
Field::inst('newv_record.v_did'),
Field::inst('newv_record.v_uid'),
Field::inst('newv_record.v_rid'),
Field::inst('newv_record.txtVIN'),
Field::inst('newv_record.txtYear'),
Field::inst('newv_record.txtMake'),
Field::inst('newv_record.txtModel'),
Field::inst('newv_record.txtColor'),
Field::inst('newv_record.txtMileage'),
Field::inst('newv_record.inpvehStock'),
Field::inst('newv_record.popDetail'),
Field::inst('newv_record.txtTrans'),
Field::inst('newv_record.txtPrice'),
Field::inst('newv_record.v_status'),
Field::inst('newv_record.v_substatus'),
Field::inst('newv_record.txtAnon'),

Field::inst('newv_record.v_SoldDate'),
Field::inst('newv_record.v_notes'),
Field::inst('newv_record.v_salePrice'),
Field::inst('newv_record.v_carfax'),
Field::inst('newv_record.v_notes2'),
Field::inst('newv_record.r_time'),

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
   
    ->leftJoin('r_record', 'r_id', '=', 'newv_record.v_rid')
    ->process($_POST)
    ->json();