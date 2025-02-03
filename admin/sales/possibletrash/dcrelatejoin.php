<?php
$qdid=$_GET['did'];

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
 
 
/*
 * Example PHP implementation used for the joinLinkTable.html example
 */

Editor::inst( $db, 'dc_relate', array('dc_did', 'dc_dcid' ))
    ->field(
        Field::inst( 'dc_relate.dc_did' )
->options( Options::inst()
                ->table( 'dealers' )
                ->value( 'did' )
                ->label( 'dname' )
            ),

        Field::inst( 'dealers.dname' ),
        
        
        Field::inst( 'dc_relate.dc_dcid' )
            ->options( Options::inst()
                ->table( 'd_contacts' )
                ->value( 'dc_id' )
                ->label( 'dc_fullname' )
            ),
        Field::inst( 'd_contacts.dc_fullname' )
    )
    

 ->leftJoin( 'd_contacts',      'dc_relate.dc_dcid', '=', 'd_contacts.dc_id' )
->leftJoin( 'dealers',      'dc_relate.dc_did', '=', 'dealers.did' ) 
//->where('dc_relate.dc_did','$qdid','=')
//->where('dc_relate.dc_did','dealers.did','=')
//->where('d_contacts.dc_id','dc_relate.dc_dcid','=')
//->where('dealers.did','$qdid','=')
    ->process($_POST)
    ->json();
 
//SELECT DISTINCT * FROM dc_relate,  dealers,  d_contacts WHERE dc_relate.dc_did = dealers.did AND d_contacts.dc_id = dc_relate.dc_dcid  


//SELECT  * FROM dc_relate,  dealers,  d_contacts WHERE dc_relate.dc_did = dealers.did AND d_contacts.dc_id = dc_relate.dc_dcid AND dealers.did =1048