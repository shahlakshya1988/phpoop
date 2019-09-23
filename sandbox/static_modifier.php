<?php 
class Cars{
	static public $vehicleType="4 Wheeler";
	public $wheel_count = 4;
	private $door_count = 5;
	protected $seat_count =6;
	public $model="My Car";
	function car_details(){
		//echo self::$vehicleType;
		echo "<table>";
		echo "<tr><th>Vehicle Type</th><td>".self::$vehicleType."</td></tr>";
		echo "<tr><th>Wheel Count</th><td>{$this->wheel_count}</td></tr>";
		echo "<tr><th>Door Count</th><td>{$this->door_count}</td></tr>";
		echo "<tr><th>Model</th><td>{$this->model}</td></tr>";
		echo "</table>";
	}
	public function setDoorCount($door_count){
		$this->door_count = $door_count;
	}
	public function setModel($model){
		$this->model = $model;
	}
}


var_dump(Cars::$vehicleType);
$obj = new Cars();
$obj->car_details();
?>