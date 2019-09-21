<?php 
class Cars{
		
}
class OtherCar extends Cars{
	
}
$myClasses = get_declared_classes();
echo "<pre>",print_r($myClasses),"</pre>";
?>