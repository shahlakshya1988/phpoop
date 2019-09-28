<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "header.php";
$session->logout();
redirect("login.php");
die();
?>