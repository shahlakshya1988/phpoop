<?php 
    require_once "init.php";
    if(isset($_POST["image_name"],$_POST["user_id"])){
       // echo "This is data from server";
       $user = new Users();
       $user_id = $_POST["user_id"];
       $user_image = $_POST["image_name"];
       $user->ajax_save_user_image($user_image,$user_id);
    }
?>