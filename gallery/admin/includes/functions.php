<?php 
spl_autoload_register(function($class){
	var_dump($class);
	$class = strtolower($class);
	$path = __DIR__.DIRECTORY_SEPARATOR;
	$path = "includes".DIRECTORY_SEPARATOR."{$class}.php";
	if(is_file($path) && !class_exists($class)){
		require_once $path;
	}
	if(file_exists($path)){
		//require_once $path;
	}else{
		die("This file {$path}, is missing");
	}
});
?>