<?php 
class Cars{
	private $wheel_count;
	private $door_count;
	private $seat_count;
	private $model;
	public function __construct($wheelCount,$doorCount,$seatCount,$model){
		echo "<br>Object Created<br>";
		$this->wheel_count = $wheelCount;
		$this->door_count = $doorCount;
		$this->seat_count = $seatCount;
		$this->model = $model;
	}
	public function __destruct(){
		echo "<br>{$this->model} Object Destroyed<br>";
	}
	function car_details(){
		echo "<table>";
		echo "<tr><th>Wheel Count</th><td>{$this->wheel_count}</td></tr>";
		echo "<tr><th>Door Count</th><td>{$this->door_count}</td></tr>";
		echo "<tr><th>Seat Count</th><td>{$this->seat_count}</td></tr>";
		echo "<tr><th>Model</th><td>{$this->model}</td></tr>";
		echo "</table>";
	}
}
$bmw = new Cars(4,5,4,"BMW");
$bmw->car_details();
unset($bmw);

$audi = new Cars(4,5,4,"Audi");
$audi->car_details();
unset($audi);
?>