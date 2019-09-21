<?php 
class Cars{
	public $wheel_count=4;
	public $door_count=5;
	public function getDoorCount(){
		return "This Vehicle is having {$this->door_count} doors";
	}
}
class Trucks extends Cars{
	public $door_count=10;
}
$truck = new Trucks();
var_dump($truck->getDoorCount());
?>