



<?php
 //allfields-good-php.php
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../../Editor16/php/DataTables.php" );
$qiid= $_GET['iid'];
$qipid= $_GET['ipid'];
//echo $qiid.$qipid;
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




    
    Editor::inst( $db, 'master', 'mid' )
    ->field(
Field::inst('master.mid')
	->options('i_charges','ic_mid','ic_paid')
	->options('i_charges','ic_mid','ic_description')
	->options('i_charges','ic_mid','ic_amount')
	->options('i_charges','ic_mid','ic_note')
	->options('i_charges','ic_mid','ic_date')
	->validator('Validate::dbValues'),
Field::inst('i_charges.ic_paid'),
Field::inst('i_charges.ic_description'),
Field::inst('i_charges.ic_amount'),
Field::inst('i_charges.ic_note'),
Field::inst('i_charges.ic_date'),


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
Field::inst('master.mrtime')
->getFormatter( function ( $val, $data, $opts ) {
                    
 
                        return date( 'Y-m-d', strtotime( $val ) );
                    
                } ),
Field::inst('master.mreqsaledate2'),
Field::inst('master.mreqsaledate')->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
 
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),
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
//Field::inst('master.mreconview'),

 Field::inst( 'master.mreconview' )
            ->setFormatter( function ( $val, $data, $opts ) {
                return ! $val ? 0 : 1;
            } ),
Field::inst('master.mpaid'),

Field::inst('master.minvid')
->options('i_payments','ip_iid','ip_id')
->options('i_payments','ip_iid','ip_checknum')
->options('i_payments','ip_iid','ip_date')
->options('i_payments','ip_iid','ip_amount')
->options('i_payments','ip_iid','ip_recvdby')
->options('i_payments','ip_iid','ip_type')
->options('i_payments','ip_iid','ip_note')
->options('i_payments','ip_iid','ip_xtra')
->options('invoices','iid','iid')
->options('invoices','iid','idate')
->options('invoices','iid','itotal')
->options('invoices','iid','ipdfurl')
->options('invoices','iid','iaid')
->options('invoices','iid','idid')
->options('invoices','iid','idname')
->options('invoices','iid','idattn')
->options('invoices','iid','idaddress')
->options('invoices','iid','idcitystatezip')
->options('invoices','iid','idinvoiceemail')
->options('invoices','iid','iclosed')
	->validator('Validate::dbValues'),
	
Field::inst('i_payments.ip_id'),
Field::inst('i_payments.ip_checknum'),
Field::inst('i_payments.ip_date'), 	
Field::inst('i_payments.ip_amount'), 	
Field::inst('i_payments.ip_recvdby'),  	
Field::inst('i_payments.ip_type'),  	
Field::inst('i_payments.ip_note'),  	
Field::inst('i_payments.ip_xtra'), 	
Field::inst('invoices.iid'), 
Field::inst('invoices.idate'),
Field::inst('invoices.itotal'),
Field::inst('invoices.ipdfurl'),
Field::inst('invoices.iaid'),
Field::inst('invoices.idid'),
Field::inst('invoices.idname'),
Field::inst('invoices.idattn'),
Field::inst('invoices.idaddress'),
Field::inst('invoices.idcitystatezip'),
Field::inst('invoices.idinvoiceemail'),
Field::inst('invoices.iclosed'),

Field::inst('master.marchive')	 	     
            )

->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
  ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
->LeftJoin('auctions','auctions.a_id','=','master.maid')
->LeftJoin('invoices','invoices.iid','=','master.minvid')
->LeftJoin('i_charges','i_charges.ic_mid','=','master.mid')
->LeftJoin('i_payments','i_payments.ip_iid','=','master.minvid')
//->Join('i_payments','i_payments.ip_id','=','master.mpaid')
//->LeftJoin('iip_relate','iip_relate.iip_iid','=','master.minvid')
//->LeftJoin('iip_relate','iip_relate.iip_ipid','=','master.mpaid')
 // ->where('master.mreconview','0','!=')
//   ->where('master.mstatus','S','=')
//->where('master.marchive','1','!=')
->where('master.minvid',$qiid,'=')
//->where('master.mpaid',$qipid,'=')
    ->process($_POST)
    ->json();
    ?>