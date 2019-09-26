<?php 
class Session{
	private $signed_in;
	public $user_id;

	public function __construct(){
		if(session_status() == PHP_SESSION_NONE){
			session_start();
		}
	}
}
$session = new Session();

?>