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
 
 // Allow a number of different formats to be submitted for the various demos
$format = isset( $_GET['format'] ) ?
    $_GET['format'] :
    '';
 
if ( $format === 'custom' ) {
    $update = 'n/j/Y';
    $registered = 'l j F Y';
}
else {
    $update = Format::DATE_ISO_8601;
    $registered = Format::DATE_ISO_8601;
}
 
 
 
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
//Field::inst('master.msolddate'),




 Field::inst( 'master.solddate' )
            ->validator( 'Validate::dateFormat', array(
                'empty' => false,
                'format' => $update
            ) )
            ->getFormatter( 'Format::date_sql_to_format', $update )
            ->setFormatter( 'Format::date_format_to_sql', $update ),















Field::inst('master.mnotes'),
Field::inst('master.msoldprice'),
Field::inst('master.mcarfax'),
Field::inst('master.mdamage'),
Field::inst('master.mmiscinfo'),
Field::inst('master.mlane'),
Field::inst('master.mrun'),
Field::inst('master.mrundate'),
Field::inst('master.mrunoutcome'),
Field::inst('master.minvid'),
Field::inst('master.marchive')	     
            )
->where('master.minvid',0,'=')
//->where('master.mid',3000,'>')
//->where('master.msubstatus',"recon-green","=")
//->where('master.mstatus',"A", "=")
//->where('master.mlane',23,'=')
->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
->LeftJoin( 'dealers','dealers.did','=','master.mdid')
->LeftJoin('auctions','auctions.a_id','=','master.maid')
    ->process($_POST)
    ->json();