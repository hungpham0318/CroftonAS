<?php
 //allfields-good-php.php
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../../Editor16/php/DataTables.php" );
$qiid=$_GET['iid']; 
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




    
    Editor::inst( $db, 'i_payments', 'ip_id' )
    ->field(
    Field::inst('i_payments.ip_id'),
  
Field::inst('i_payments.ip_iid')

	->options('invoices','iid','iid')
	->options('invoices','iid','idate')
	->options('invoices','iid','itotal')
	->validator('Validate::dbValues'),



Field::inst('invoices.iid'),
Field::inst('invoices.idate'),
Field::inst('invoices.itotal'),
Field::inst('i_payments.ip_checknum'),
Field::inst('i_payments.ip_date')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
 
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),
Field::inst('i_payments.ip_amount'),
Field::inst('i_payments.ip_recvdby'),
Field::inst('i_payments.ip_type'),
Field::inst('i_payments.ip_note'),
Field::inst('i_payments.ip_xtra')
     
            )

//->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
 // ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
->LeftJoin('invoices','invoices.iid','=','i_payments.ip_iid')
 // ->where('master.mreconview','0','!=')
//   ->where('master.msubstatus','Inv-Sent','!=')
->where('i_payments.ip_iid',$qiid,'=')
    ->process($_POST)
    ->json();
    ?>