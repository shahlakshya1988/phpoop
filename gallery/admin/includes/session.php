<?php
class Session{
	private $signed_in = false;
	public $user_id;
	public $message;
	public $count;

	public function __construct(){
		if(session_status() == PHP_SESSION_NONE ){
			session_start();
		}
		$this->check_the_login();
		$this->check_message();
		$this->visitor_account();
	}

	public function is_signed_in(){
		return $this->signed_in;
	}

	public function login($user){
		if($user){
			$this->user_id = $_SESSION["user_id"] = $user->id;
			$this->signed_in = true;
		}
		/* else{
			unset($this->user_id);
			unset($_SESSION["user_id"]);
			$this->signed_in = false;
		}
		*/
	}

	public function logout(){
		unset($this->user_id);
		unset($_SESSION["user_id"]);
		$this->signed_in = false;
	}

	private function check_the_login(){
		if(isset($_SESSION["user_id"])){
			$this->user_id = $_SESSION["user_id"];
			$this->signed_in = true;
		}else{
			$this->signed_in = false;
			unset($this->user_id);
		}
	}

	public function message($msg = ""){
		if(!empty($msg)){
			$_SESSION["message"] = $msg;
		}else{
			return $this->message;
		}
	}
	private function check_message(){
		if(isset($_SESSION["message"])){
			$this->message = $_SESSION["message"];
			unset($_SESSION["message"]);
		}else{
			$this->message = "";
		}
	}

	public function visitor_account(){
		if(isset($_SESSION["count"])){
			return $this->count = $_SESSION["count"]++;
		}else{
			return $_SESSION["count"] = 1;
		}
	}
}

$session = new Session();
?>
