<?php
class Database{
    public $connection;
    public $db;

	public function __construct(){
		$this->db = $this->open_db_connection();
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
        if($this->connection->connect_errno){
            die("Connection Failed ".$this->connection->connect_error);
        }
        return $this->connection;
		//var_dump($this->connection);
	}

	public function query($sql){
		//$result = mysqli_query($this->connection,$sql);

		$result = $this->db->query($sql);
		return $result;
	}

	public function confirmQuery($result){
		if(!$result){
			die($this->db->error);
		}
	}

	public function escape_string($string){
		return $this->db->real_escape_string(trim($string));
	}

	public function the_insert_id(){
		return $this->db->insert_id;
	}


}
$database = new Database();
?>
