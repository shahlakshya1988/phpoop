<?php 
class Cars{
	/**
	properties are the variables created inside of the class
	**/
	public $wheel_count;
	public $model;
	public $door_count = 4;
	
	public function getCarModel(){
		return "This Car Is ::: ".$this->model;
	}
	
}


$bmw = new Cars();
$bmw->model="BMW";
echo "<br>";
var_dump($bmw->door_count);
$bmw->door_count = 5;
echo "<br>";
var_dump($bmw->door_count);

echo "<br>******************<br>";
$mercedes = new Cars();
$mercedes->model="Mercedes";
var_dump($mercedes->door_count);
echo "<br>";
echo $bmw->getCarModel();
echo "<br>";
echo $mercedes->getCarModel();
?>