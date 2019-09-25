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
		//$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		//var_dump($this->connection);
	}

	public function query($sql){
		//$result = mysqli_query($this->connection,$sql);

		$result = $this->connection->query($sql);
		return $result;
	}

	public function confirmQuery($result){
		if(!$result){
			die($this->connection->error);
		}
	}

	public function escape_string($string){
		return $this->connection->real_escape_string($this->connection,trim($string));
	}

	public function the_insert_id(){
		return $this->connection->insert_id;
	}


}
$database = new Database();
?>
