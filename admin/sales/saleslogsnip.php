
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
