<?php 
echo "Current File : ".__FILE__;
echo "<br>";
echo "Current Line : ".__LINE__;
echo "<br>";
echo "Current Line : ".__LINE__;
echo "<br>";
echo "Current Line : ".__LINE__;
echo "<br>";
echo "Current Line : ".__LINE__;
echo "<br>";
echo "Current Dir : ".__DIR__;
echo "<br><h3>file_exits</h3><br>";
echo "<br>__FILE__<br>";
var_dump(file_exists(__FILE__));
echo "<br>__DIR__<br>";
var_dump(file_exists(__DIR__));
echo "<br><h3>is_file</h3><br>";
echo "<br>__FILE__<br>";
var_dump(is_file(__FILE__));
echo "<br>__DIR__<br>";
var_dump(is_file(__DIR__));

echo "<br><h3>is_dir</h3><br>";
echo "<br>__FILE__<br>";
var_dump(is_dir(__FILE__));
echo "<br>__DIR__<br>";
var_dump(is_dir(__DIR__));
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo (5>4)? "true" : "false";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo (4>5)? "true" : "false";
?>