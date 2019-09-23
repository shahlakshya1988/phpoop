<?php 
class Cars{
	public $wheel_count = 4;
	private $door_count = 4;
	protected $seat_count = 2;
	
	public function carDetails(){
		echo $this->wheel_count;
		echo "<br>";
		echo $this->door_count;
		echo "<br>";
		echo $this->seat_count;
		echo "<br>";
	}
	
	public function getWheelCount(){
		return $this->wheel_count;
	}
	public function getDoorCount(){
		return $this->door_count;
	}
	public function getSeatCount(){
		return $this->seat_count;
	}
	
	public function setWheelCount($wheelCount){
		$this->wheel_count = $wheel_count;
	}
	public function setDoorCount($door_count){
		$this->door_count = $door_count;
	}
	public function setSeatCount($seatCount){
		$this->seat_count = $seatCount;
	}
}

$bmw =  new Cars();
$bmw->carDetails();
echo "<br>".$bmw->getDoorCount()."<br>";
$bmw->setDoorCount(5);
echo "<br>".$bmw->getDoorCount()."<br>";
?>