<?php 
class Cars{
	public function publicMethod(){
		echo "This is public Function/Method";
	}
	protected function protectedMethod(){
		echo "This is protected Function/Method";
	}
	private function privateMethod(){
		echo "This is private Function/Method";
	}
	public function publicMethod2(){
		echo "This is public2 Function/Method";
	}
	protected function protectedMethod2(){
		echo "This is protected2 Function/Method";
	}
	private function privateMethod2(){
		echo "This is private2 Function/Method";
	}
}

$carsMethods = get_class_methods("Cars");
echo "<pre>",print_r($carsMethods),"</pre>";
?>