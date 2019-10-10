<?php include("includes/init.php"); ?>
<?php 
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}
//var_dump(empty($_GET) || isset($_GET["id"]) || trim($_GET["id"]) == "");
//die();
if(empty($_GET) || !isset($_GET["id"]) || trim($_GET["id"]) == ""){
    redirect("photos.php");
    die();
}
$photo_id=$_GET["id"];
$photo = Photo::find_by_id($photo_id);
if($photo){
    $photo->delete_photo($photo_id);
}else{
    redirect("photos.php");
}
redirect("photos.php");
?>
