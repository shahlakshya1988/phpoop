<?php
require "includes/init.php";
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}
if(empty($_GET) || !isset($_GET["id"]) || trim($_GET["id"]) == ""){
    redirect("comments.php");
    die();
}
$comment_id=$_GET["id"];
$comment = Comment::find_by_id($comment_id);
if($comment){
    $comment->delete();
}
redirect("comments.php");
die();
?>
