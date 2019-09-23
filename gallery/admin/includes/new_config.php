<?php 
// DATABASE CONNECTION CONSTANTS
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_NAME","gallery_db");
// DATABASE CONNECTION CONSTANTS
$dsn="mysql:db_name=".DB_NAME.";host=".DB_HOST;
$connection = new pdo($dsn,DB_USER,DB_PASSWORD);
//var_dump($connection);
?>