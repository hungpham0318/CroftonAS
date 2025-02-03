<?php
// DataTables PHP library
include( "../../Editor16/php/DataTables.php" );
$qdid = $_GET['did'];
 
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
 Editor::inst( $db, 'priority_ud_relate', array('u_id', 'd_id' ))

    ->field(
        Field::inst( 'priority_ud_relate.u_id' )
		     ->options( Options::inst()
                ->table( 'users' )
				->value( 'uid' )
				->label( 'uname' )
		),
		Field::inst( 'users.uname' ),
       
        Field::inst( 'priority_ud_relate.d_id' )
            ->options( Options::inst()
                ->table( 'priority_dealers' )
                ->value( 'did' )
                ->label( 'dname' )
        ),
        Field::inst( 'priority_dealers.dname' )
    )


->leftJoin( 'users', 'priority_ud_relate.u_id','=', 'users.uid' )

->leftJoin( 'priority_dealers','priority_ud_relate.d_id', '=', 'priority_dealers.did' )
->where('priority_ud_relate.d_id', $qdid,'=')
->process($_POST)
->json();
?>