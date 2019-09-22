<?php 
class Cars{
	public $wheel_count = 4;
	private $door_count = 4;
	protected $model = "No Model Set";
	function car_details(){
		echo "<table>";
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

$bmw = new Cars();
$bmw->car_details();
echo "<br>";
//$bmw->model = "BMW"; protected so can't be accessed
//$bmw->door_count = 5; private so can't be accessed 
$bmw->setDoorCount(56);
$bmw->setModel("BMW");
$bmw->car_details();
?>