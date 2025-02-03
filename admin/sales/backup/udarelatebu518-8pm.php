<?php
// DataTables PHP library
include( "../../Editor16/php/DataTables.php" );
$quid = $_GET['uid'];
 
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
 Editor::inst( $db, 'ud_relate', array('u_id', 'd_id' ))

    ->field(
        Field::inst( 'ud_relate.u_id' )
		     ->options( Options::inst()
                ->table( 'users' )
				->value( 'uid' )
				->label( 'uname' )
		),
		Field::inst( 'users.uname' ),
       
        Field::inst( 'ud_relate.d_id' )
            ->options( Options::inst()
                ->table( 'dealers' )
                ->value( 'did' )
                ->label( 'dname' )
        ),
        Field::inst( 'dealers.dname' )
    )


->leftJoin( 'users', 'ud_relate.u_id','=', 'users.uid' )

->leftJoin( 'dealers','ud_relate.d_id', '=', 'dealers.did' )
->where('ud_relate.u_id', $quid,'=')
->process($_POST)
->json();
?>