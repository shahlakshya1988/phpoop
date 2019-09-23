<?php 
class Database{
	private $connection;

	public function open_db_connection(){
		$dsn="mysql:db_name=".DB_NAME.";host=".DB_HOST;
		try{
			$this->connection = new pdo($dsn,DB_USER,DB_PASSWORD);
		}catch(Exception $e){
			$e->getErrorInfo();
			var_dump("Database Connection Failed<br>");
			die();
		}
	}
	
}
$database = new Database();
$database->open_db_connection();
?>