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
			$stmt->execute(array(


'username' => $username,
'uid' => $uid,
'uname' => $uname
));
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
   $this->username = $row['username'];
     $this->uname = $row['uname'];
   $this->uid = $row['uid'];
   
}

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['quid'] = $uid;
		$_SESSION['uname'] = $uname;
		

		    return true;
		}
	}

	public function logout(){
		session_destroy();
		header('Location: ../../login.php'); 
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){




			return true;
		}
	}

}


?>
