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

Editor::inst( $db, 'newmaster', 'mid' )
    ->field(
Field::inst('mid')->validator( 'Validate::notEmpty' ),
Field::inst('mvid'),
Field::inst('maid'),
Field::inst('mrid'),
Field::inst('muid'),
Field::inst('mdid'),
Field::inst('mvin'),
Field::inst('myear'),
Field::inst('mmake'),
Field::inst('mmodel'),
Field::inst('mcolor'),
Field::inst('mmileage'),
Field::inst('mannounce'),
Field::inst('mstock'),
Field::inst('mdetail'),
Field::inst('mtransport'),
Field::inst('mfloor'),
Field::inst('mrtime'),
Field::inst('mreqsaledate2'),
Field::inst('mreqsaledate'),
Field::inst('mstatus'),
Field::inst('msubstatus'),
Field::inst('msolddate'),
Field::inst('mnotes'),
Field::inst('msoldprice'),
Field::inst('mcarfax'),
Field::inst('mdamage'),
Field::inst('mmiscinfo'),
Field::inst('mlane'),
Field::inst('mrun'),
Field::inst('mrundate'),
Field::inst('mrunoutcome'),
Field::inst('minvid'),
Field::inst('marchive')	     
            )
   
     
    ->process($_POST)
    ->json();