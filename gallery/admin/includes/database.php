<?php 
class Database{
	public $connection;

	public function __construct(){
		$this->open_db_connection();
	}

	public function open_db_connection(){
		/*$dsn="mysql:db_name=".DB_NAME.";host=".DB_HOST;
		try{
			$this->connection = new pdo($dsn,DB_USER,DB_PASSWORD);
		}catch(Exception $e){
			$e->getErrorInfo();
			var_dump("Database Connection Failed<br>");
			die();
		} */
		/*var_dump(DB_HOST);
		var_dump(DB_USER);
		var_dump(DB_PASS);
		var_dump(DB_NAME); */
		$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		//var_dump($this->connection);
	}

	public function query($sql){
		$result = mysqli_query($this->connection,$sql);
		if(!$result){
			die(mysqli_error($this->connection));
		}
		return $result;
	}
	
}
$database = new Database();
?>