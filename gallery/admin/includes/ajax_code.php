<?php 
    require_once "init.php";
    //echo "<pre>".print_r($_REQUEST)."</pre>";
    if(isset($_POST["image_name"],$_POST["user_id"])){
       // echo "This is data from server";
       $user = new Users();
       $user_id = $_POST["user_id"];
       $user_image = $_POST["image_name"];
       $user->ajax_save_user_image($user_image,$user_id);
    }
?>
<?php 
if(isset($_POST["photo_id"])){
    $photo_id = $_POST["photo_id"];
    //$photo = Photo::find_by_id($photo_id);
    //header("Content: application/json");
    //echo json_encode($photo);
    Photo::display_sidebar_data($photo_id);
}
?>