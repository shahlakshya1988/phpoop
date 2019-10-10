<?php include("includes/init.php"); ?>
<?php 
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}
echo "It Workds";
?>
