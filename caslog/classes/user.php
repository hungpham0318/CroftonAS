<?php session_start();
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT * FROM users WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $row['username'];
		$_SESSION['uid'] = $row['uid'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['uname'] = $row['uname'];
		$_SESSION['uaddress'] = $row['uaddress'];
		$_SESSION['ucity'] = $row['ucity'];
		$_SESSION['ustate'] = $row['ustate'];
		$_SESSION['uzip'] = $row['uzip'];
		$_SESSION['unotes'] = $row['unotes'];
		$_SESSION['active'] = $row['active'];
		$_SESSION['umobile'] = $row['umobile'];
		$_SESSION['ucompany'] = $row['ucompany'];
		$_SESSION['uperms'] = $row['uperms'];
		$_SESSION['uofficeph'] = $row['uofficeph'];
		$_SESSION['ufax'] = $row['ufax'];
    	$_SESSION['uspecial'] = $row['uspecial'];
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
