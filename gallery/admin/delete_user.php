<?php 
require "includes/init.php";
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}
if(empty($_GET) || !isset($_GET["id"]) || trim($_GET["id"]) == ""){
    redirect("users.php");
    die();
}
$user_id=$_GET["id"];
$user = Users::find_by_id($user_id);
if($user){
    $user->delete_user();
}
$message = "The User Has Been Deleted Successfully";
$session->message($message);
redirect("users.php");
die();
?>