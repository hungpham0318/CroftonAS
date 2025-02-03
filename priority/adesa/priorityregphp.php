<?php session_start();
$pageperms =1;
$pagename = "Unsold Inventory";
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

/* function logChange ( $db, $action, $id, $values ) {
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
}*/

    
    Editor::inst( $db, 'temp_priority_master', 'mid' )
    ->field(
Field::inst('temp_priority_master.mid'),






Field::inst('temp_priority_master.myear'),
Field::inst('temp_priority_master.mmake'),
Field::inst('temp_priority_master.mmodel'),
Field::inst('temp_priority_master.mvin'),

Field::inst('temp_priority_master.mstock'),
Field::inst('temp_priority_master.mannounce'),
Field::inst('temp_priority_master.mfloor'),

Field::inst('temp_priority_master.mdetail'),

Field::inst('temp_priority_master.mcolor'),
Field::inst('temp_priority_master.mmileage'),

Field::inst('temp_priority_master.mtransport'),

Field::inst('temp_priority_master.mdid')
	->options('priority_dealers','did','dname')
	->validator('Validate::dbValues'),
Field::inst('priority_dealers.dname'),	
Field::inst('temp_priority_master.mcarfax'),
Field::inst('temp_priority_master.mdamage'),




Field::inst('temp_priority_master.mstatus'),
Field::inst('temp_priority_master.msubstatus'),
Field::inst('temp_priority_master.msolddate')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
                        
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),

Field::inst('temp_priority_master.msoldprice') 
->getFormatter(function($val, $data, $opts) {
    if ($val === '0.00') { 
      echo "";
    } else {
      return number_format($val, 2);
    }
  }),

Field::inst('temp_priority_master.muid')
	->options('users','uid','uname')
	->validator('Validate::dbValues'),

Field::inst('users.uname'),
Field::inst('temp_priority_master.marchive'),
Field::inst('temp_priority_master.mrtime')

->getFormatter( function ( $val, $data, $opts ) {
                    
 
                        return date( 'Y-m-d', strtotime( $val ) );
                    
                } ),
                
Field::inst('temp_priority_master.mnotes')


            )

->LeftJoin( 'users', 'users.uid', '=', 'temp_priority_master.muid' )
  ->LeftJoin( 'priority_dealers','priority_dealers.did','=','temp_priority_master.mdid')
//->LeftJoin('auctions','auctions.a_id','=','temp_priority_master.maid')
 // ->where('temp_priority_master.mreconview','0','!=')
 // ->where('temp_priority_master.mstatus','S','!=')
//  ->where('temp_priority_master.msoldprice',0,'=')
//     ->where('temp_priority_master.msalesnet',0,'=')
//->where('temp_priority_master.marchive','1','!=')

    ->process($_POST)
    ->json();
    ?>