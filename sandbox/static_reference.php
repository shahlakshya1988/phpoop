<?php 
class Cars{
	static $wheel_count = 4;
	static $door_count = 4;
	static function car_details(){
		echo Cars::$wheel_count." ".self::$wheel_count."<br>";
		echo Cars::$door_count." ".self::$door_count."<br>";
	}
}
class Trucks extends Cars{
	static function display(){
		parent::car_details();
	}
}
Cars::car_details();
echo "<br>";
Trucks::display();
?>