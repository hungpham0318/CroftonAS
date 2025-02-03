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

Editor::inst( $db, 'master', 'mid' )
    ->field(
Field::inst('master.mid'),
Field::inst('master.mvid'),
Field::inst('master.maid')
->options('auctions','a_id','a_name')
	->validator('Validate::dbValues'),

Field::inst('auctions.a_name'),
Field::inst('master.mrid'),

Field::inst('master.muid')
	->options('users','uid','uname')
	->validator('Validate::dbValues'),

Field::inst('users.uname'),

Field::inst('master.mdid')
	->options('dealers','did','dname')
	->validator('Validate::dbValues'),

Field::inst('dealers.dname'),
Field::inst('master.mvin'),
Field::inst('master.myear'),
Field::inst('master.mmake'),
Field::inst('master.mmodel'),
Field::inst('master.mcolor'),
Field::inst('master.mmileage'),
Field::inst('master.mannounce'),
Field::inst('master.mstock'),
Field::inst('master.mdetail'),
Field::inst('master.mtransport'),
Field::inst('master.mfloor'),
Field::inst('master.mrtime'),
Field::inst('master.mreqsaledate2'),
Field::inst('master.mreqsaledate'),
Field::inst('master.mstatus'),
Field::inst('master.msubstatus'),
Field::inst('master.msolddate')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
 
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),


Field::inst('master.mnotes'),
Field::inst('master.msoldprice'),
Field::inst('master.msalesnet'),
Field::inst('master.mcarfax'),
Field::inst('master.mdamage'),
Field::inst('master.mmiscinfo'),
Field::inst('master.mlane'),
Field::inst('master.mrun'),
Field::inst('master.mrundate')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
 
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),
Field::inst('master.mrunoutcome'),
Field::inst('master.minvid'),
Field::inst('master.marchive')	     
            )
   ->where('master.msubstatus','Inv-No','==')
->where('master.marchive','1','!=')
->where('master.marchive','1','!=')
->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
  ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
->LeftJoin('auctions','auctions.a_id','=','master.maid')
    ->process($_POST)
    ->json();