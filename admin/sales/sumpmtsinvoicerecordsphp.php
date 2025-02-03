<?php
 //invoicerecordsphp.php
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../../Editor16/php/DataTables.php" );
 
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

if ( ! isset( $_POST['action'] ) ) {
   $rawquery = "SELECT i.*,
                      ( SELECT sum(ip_amount) FROM i_payments p
                        WHERE i.iid = p.ip_iid ) AS psum
                FROM invoices i";
   $data = $db->sql( $rawquery )->fetchAll();
   echo json_encode( array(
      'data' => $data
   ) );
 
}else{
   
    Editor::inst( $db, 'invoices', 'invoices.iid' )
    ->field(
Field::inst('invoices.iid'),
Field::inst('invoices.idate'),
Field::inst('invoices.itotal'),
  Field::inst('psum'),
Field::inst('invoices.ipdfurl'),
Field::inst('invoices.iaid'),
Field::inst('invoices.idid'),
Field::inst('invoices.idname'),
Field::inst('invoices.idattn'),
Field::inst('invoices.idaddress'),
Field::inst('invoices.idcitystatezip'),
Field::inst('invoices.iclosed'),
     Field::inst('psum')
            )

//->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
 // ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
//->LeftJoin('auctions','auctions.a_id','=','master.maid')
// ->where('invoices.iclosed','1','=')
 //  ->where('master.msubstatus','Inv-Sent','!=')
//->where('master.marchive','1','!=')
    ->process($_POST)
    ->json();
    }
    ?>