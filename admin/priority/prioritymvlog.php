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

    
    Editor::inst( $db, 'priority_mvehicles', 'mid' )
    ->field(
Field::inst('priority_mvehicles.mid'),






Field::inst('priority_mvehicles.myear'),
Field::inst('priority_mvehicles.mmake'),
Field::inst('priority_mvehicles.mmodel'),
Field::inst('priority_mvehicles.mvin'),

Field::inst('priority_mvehicles.mastock'),
Field::inst('priority_mvehicles.madescription'),
Field::inst('priority_mvehicles.mcost')
->getFormatter(function($val, $data, $opts) {
    if ($val === '0') { 
      echo "";
    } else {
      return number_format($val, 2);
    }
  }),
Field::inst('priority_mvehicles.mfloor')
->getFormatter(function($val, $data, $opts) {
    if ($val === '0.00') { 
      echo "";
    } else {
      return number_format($val, 2);
    }
  }),
Field::inst('priority_mvehicles.mstock'),
Field::inst('priority_mvehicles.mdetail'),

Field::inst('priority_mvehicles.mcolor'),
Field::inst('priority_mvehicles.mmileage'),
Field::inst('priority_mvehicles.mannounce'),
Field::inst('priority_mvehicles.mtransport'),

Field::inst('priority_mvehicles.mdid')
	->options('priority_dealers','did','dname')
	->validator('Validate::dbValues'),
Field::inst('priority_dealers.dname'),	
Field::inst('priority_mvehicles.mcarfax'),
Field::inst('priority_mvehicles.mdamage'),




Field::inst('priority_mvehicles.mstatus'),
Field::inst('priority_mvehicles.msubstatus'),
Field::inst('priority_mvehicles.msolddate')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
                        
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),

Field::inst('priority_mvehicles.msoldprice') 
->getFormatter(function($val, $data, $opts) {
    if ($val === '0.00') { 
      echo "";
    } else {
      return number_format($val, 2);
    }
  }),

Field::inst('priority_mvehicles.muid')
	->options('users','uid','uname')
	->validator('Validate::dbValues'),

Field::inst('users.uname'),
Field::inst('priority_mvehicles.marchive'),

Field::inst('priority_mvehicles.mrtime')

->getFormatter( function ( $val, $data, $opts ) {
                    
 
                        return date( 'Y-m-d', strtotime( $val ) );
                    
                } ),
                
Field::inst('priority_mvehicles.mnotes'),
Field::inst('priority_mvehicles.marrivdate')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
                        
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),
Field::inst('priority_mvehicles.mdrivable'),
Field::inst('priority_mvehicles.minvdays'),
Field::inst('priority_mvehicles.mhold'),
Field::inst('priority_mvehicles.mtitlestatus'),
Field::inst('priority_mvehicles.mtitlerecd')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
                        
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } ),
Field::inst('priority_mvehicles.mcomments'),
Field::inst('priority_mvehicles.mlotnum'),
Field::inst('priority_mvehicles.mpickup')
->getFormatter( function ( $val, $data, $opts ) {
                    if ($val === "0000-00-00"){
                        echo "";                       
                    }else{
                        
                        return date( 'Y-m-d', strtotime( $val ) );
                    }
                } )


)

->LeftJoin( 'users', 'users.uid', '=', 'priority_mvehicles.muid' )
  ->LeftJoin( 'priority_dealers','priority_dealers.did','=','priority_mvehicles.mdid')
//->LeftJoin('auctions','auctions.a_id','=','priority_mvehicles.maid')
 // ->where('priority_mvehicles.mreconview','0','!=')
 ->where('priority_mvehicles.mstatus','SOLD','!=')
//  ->where('priority_mvehicles.msoldprice',0,'=')
//     ->where('priority_mvehicles.msalesnet',0,'=')
//->where('priority_mvehicles.marchive','1','!=')

    ->process($_POST)
    ->json();
    ?>