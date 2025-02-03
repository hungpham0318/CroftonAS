<?php
 //invoicerecordsphp.php
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../../../Editor16/php/DataTables.php" );
$qiid = $_GET['iid'];
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




    
    Editor::inst( $db, 'invoices', 'iid' )
    ->field(
Field::inst('iid'),
Field::inst('idate'),
Field::inst('itotal'),
Field::inst('ipdfurl'),
Field::inst('iaid'),
Field::inst('idid'),
Field::inst('idname'),
Field::inst('idattn'),
Field::inst('idaddress'),
Field::inst('idcitystatezip'),
Field::inst('iclosed')
     
            )

//->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
 // ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
->where('iid',$qiid,'=')
 //  ->where('master.msubstatus','Inv-Sent','!=')
//->where('master.marchive','1','!=')
    ->process($_POST)
    ->json();
    ?>