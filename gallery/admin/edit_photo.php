<?php error_reporting(0); include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}
if(isset($_GET["id"]) && !empty($_GET["id"])){
	$id = trim($_GET["id"]);
	$photo = Photo::find_by_id($id);
	//var_dump($photo);
}else{
	redirect("photos.php");
	die();
}

if(isset($_POST["update"])){
	//echo "<pre>",print_r($_REQUEST),"</PRE>";
	$title = $_POST["title"];
	$caption = $_POST["caption"];
	$alternate_text = $_POST["alternate_text"];
	$description = $_POST["description"];
	$photo->title = $title;
	$photo->caption = $caption;
	$photo->alternate_text = $alternate_text;
	$photo->description = $description;
	$photo->save();
	$message = "Photo Has Been Updated Successfully";
	$session->message($message);
	redirect("photos.php");
	die();
} // isset($_POST["update"])

?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <?php  include "includes/top_nav.php"; ?>
       <?php include "includes/side_nav.php"; ?>
        <!-- /.navbar-collapse -->
    </nav>



    <div id="page-wrapper">

       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">
                       Photos
                       <small>Subheading</small>
                   </h1>
               </div>
               
                 <form name="edit_photo" action="" enctype="multipart/formdata" method="POST">
				 <div class="col-md-7">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>" />
						</div>
						<div class="form-group">
							<a href="javascript:;" class="thumbnail" >
								<img src="<?php echo $photo->picture_path(); ?>"  />
							</a>
						</div>
						<div class="form-group">
						<label for="caption">Caption</label>
							<input type="text" name="caption" id="caption" class="form-control" value="<?php echo $photo->caption; ?>" />
						</div>
						<div class="form-group">
							<label for="alternate_text">Alternate Text</label>
							<input type="text" name="alternate_text" id="alternate_text" class="form-control" value="<?php echo $photo->alternate_text; ?>" />
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" class="form-control" id="description"><?php echo $photo->description; ?></textarea>
						</div>
					 </div>
					 <!-- -->
					 <div class="col-md-5">
						<div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                  </p>
                                  <p class="text ">
                                    Photo Id: <span class="data photo_id_box">34</span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data">image.jpg</span>
                                  </p>
                                 <p class="text">
                                  File Type: <span class="data">JPG</span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data">3245345</span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>   
                              </div>
                            </div>          
                        </div>
					 </div>
					 <!-- -->
				 </form>
              
           </div>
           <!-- /.row -->

       </div>
       <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<script type="text/javascript">

</script>
<?php include("includes/footer.php"); ?>