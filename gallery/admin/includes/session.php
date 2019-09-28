<?php 
class Session{
	private $signed_in;
	public $user_id;

	public function __construct(){
		if(session_status() == PHP_SESSION_NONE ){
			session_start();
		}
		$this->check_the_login();
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
}

$session = new Session();
?>