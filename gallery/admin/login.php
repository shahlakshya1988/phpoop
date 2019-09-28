<?php 
require_once __DIR__.DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."init.php";
if($session->is_signed_in()){
    redirect("index.php");
    die();
}
if(isset($_POST["submit"])){
    $username = $database->escape_string(trim($_POST["username"]));
    $password = $database->escape_string(trim($_POST["password"]));
    if(!empty($username) && !empty($password)){
        if($user_found){
            $session->login($user_found);
        }else{
            $the_message="Your Password And Username are incorrect";
        }
    }else{
        if(empty($username)){
            $the_message = "Please Enter Your Username";
        }
        if(empty($password)){
            $the_message = "Please Enter Your Password";
        }
    }
}
?>