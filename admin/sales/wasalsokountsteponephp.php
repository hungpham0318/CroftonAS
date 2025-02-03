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
if ( ! isset( $_POST['action'] ) ) {
   $rawquery = "SELECT d.*,
                      ( SELECT count(*) FROM master m
                        WHERE m.mdid = d.did AND m.mstatus = 'S' AND m.msubstatus = 'Inv-No') AS nmid
                FROM dealers d";
   $data = $db->sql( $rawquery )->fetchAll();
   echo json_encode( array(
      'data' => $data
   ) );
 
}else{


Editor::inst( $db, 'dealers', 'did' )
    ->field(
Field::inst('dealers.did')
->options('master','mdid','msubstatus')
	->options('master','mdid','mstatus')
	->options('master','mdid','mid')
	
	->validator('Validate::dbValues'),

Field::inst('master.mstatus'),
Field::inst('master.msubstatus'),
Field::inst('master.mid'),
Field::inst('nmid'),

Field::inst('dealers.dnumber'),
Field::inst('dealers.dname'),
Field::inst('dealers.dphone'),
Field::inst('dealers.dcontact'),
Field::inst('dealers.dsdphone'),
Field::inst('dealers.dmailAcctNum'),
Field::inst('dealers.dnotes'),
Field::inst('dealers.daddress'),
Field::inst('dealers.dcity'),
Field::inst('dealers.dstate'),
Field::inst('dealers.dinvoiceemail'),
Field::inst('dealers.drepfee'),
Field::inst('dealers.drepfeedesc'),
Field::inst('dealers.dzip')  
            )
 ->LeftJoin( 'master', 'mdid', '=', 'dealers.did' )
   //     ->LeftJoin( 'master', 'mid', 'AS', 'nmid' )
    // ->LeftJoin( 'users', 'users.uid', '=', 'ud_relate.u_id' )
  //   ->LeftJoin( 'dealers','dealers.did','=','ud_relate.d_id')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
//->where('master.mdid','dealers.did','=')
//->where('nmid','1','>=')
//->where('master.mstatus','S','=')
//->where('master.msubstatus','Inv-No','=')
->where( function ( $q ) {

$q->where('did','(SELECT mdid FROM master WHERE mstatus = "S" AND msubstatus LIKE "%Inv-No%" AND mdid = dealers.did)','IN', false);
})

//->where('did','(SELECT mdid FROM master WHERE msubstatus LIKE "%Inv-No%")','IN', false)
//$q->and_where('did','(SELECT mdid FROM master WHERE mstatus  = "S")','IN', false);

    ->process($_POST)
    ->json();
}