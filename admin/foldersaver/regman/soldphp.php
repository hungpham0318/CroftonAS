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
    DataTables\Editor\Join,
    DataTables\Editor\Validate;
 
// Build our Editor instance and process the data coming from _POST

Editor::inst( $db, 'newmaster', 'mid' )
    ->field(
Field::inst('newmaster.mid'),
Field::inst('newmaster.mvid'),
Field::inst('newmaster.maid')
->options('auctions','a_id','a_name')
	->validator('Validate::dbValues'),

Field::inst('auctions.a_name'),
Field::inst('newmaster.mrid'),

Field::inst('newmaster.muid')
	->options('users','uid','uname')
	->validator('Validate::dbValues'),

Field::inst('users.uname'),

Field::inst('newmaster.mdid')
	->options('dealers','did','dname')
	->validator('Validate::dbValues'),

Field::inst('dealers.dname'),
Field::inst('newmaster.mvin'),
Field::inst('newmaster.myear'),
Field::inst('newmaster.mmake'),
Field::inst('newmaster.mmodel'),
Field::inst('newmaster.mcolor'),
Field::inst('newmaster.mmileage'),
Field::inst('newmaster.mannounce'),
Field::inst('newmaster.mstock'),
Field::inst('newmaster.mdetail'),
Field::inst('newmaster.mtransport'),
Field::inst('newmaster.mfloor'),
Field::inst('newmaster.mrtime'),
Field::inst('newmaster.mreqsaledate2'),
Field::inst('newmaster.mreqsaledate'),
Field::inst('newmaster.mstatus'),
Field::inst('newmaster.msubstatus'),
Field::inst('newmaster.msolddate'),
Field::inst('newmaster.mnotes'),
Field::inst('newmaster.msoldprice'),
Field::inst('newmaster.mcarfax'),
Field::inst('newmaster.mdamage'),
Field::inst('newmaster.mmiscinfo'),
Field::inst('newmaster.mlane'),
Field::inst('newmaster.mrun'),
Field::inst('newmaster.mrundate'),
Field::inst('newmaster.mrunoutcome'),
Field::inst('newmaster.minvid'),
Field::inst('newmaster.marchive')	     
            )
   ->where('newmaster.mstatus','S','=')
->where('newmaster.marchive','1','!=')
->LeftJoin( 'users', 'users.uid', '=', 'newmaster.muid' )
  ->LeftJoin( 'dealers','dealers.did','=','newmaster.mdid')
->LeftJoin('auctions','auctions.a_id','=','newmaster.maid')
    ->process($_POST)
    ->json();