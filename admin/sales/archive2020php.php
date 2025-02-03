<?php session_start();
$pageperms =3;
$pagename = "Archives";
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		$user = $_SESSION['user'];
		$GLOBALS['pagename'] = $pagename;
		}

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

function logChange ( $db, $action, $id, $values ) {
    $db->insert( 'mchanges_log', array(
         'user'   => $GLOBALS['pagename'],
        'ausername' => $_SESSION['ausername'],
     'ainitials' => $_SESSION['ainitials'],
	 'afullname' => $_SESSION['afullname'],
        'action' => $action,
        'values' => json_encode( $values ),
        'row'    => $id,
        'when'   => date('c')
    ) );
}


    
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
Field::inst('master.mready'),
Field::inst('master.minvid'),
Field::inst('master.marchive')	     
            )
//   ->where('master.msubstatus','Inv-Sent','!=')
->where('master.marchive','1','=')
->where('master.mready','0','=')
->where('master.msolddate','2020-01-01','>')
//->where('master.msolddate','2017-12-31','>')
->LeftJoin( 'users', 'users.uid', '=', 'master.muid' )
  ->LeftJoin( 'dealers','dealers.did','=','master.mdid')
->LeftJoin('auctions','auctions.a_id','=','master.maid')
	
	 ->on( 'postCreate', function ( $editor, $id, $values, $row ) {
        logChange( $editor->db(), 'create', $id, $values );
    } )
    ->on( 'postEdit', function ( $editor, $id, $values, $row ) {
        logChange( $editor->db(), 'edit', $id, $values );
    } )
    ->on( 'postRemove', function ( $editor, $id, $values ) {
        logChange( $editor->db(), 'delete', $id, $values );
    } )

    ->process($_POST)
    ->json();
    ?>