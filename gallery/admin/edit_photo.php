<?php error_reporting(0); include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}
if(isset($_POST["update"])){
	echo "<pre>",print_r($_REQUEST),"</PRE>";
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
							<input type="text" name="title" class="form-control" />
						</div>
						<div class="form-group">
						<label for="caption">Caption</label>
							<input type="text" name="caption" id="caption" class="form-control" />
						</div>
						<div class="form-group">
							<label for="alternatetext">Alternate Text</label>
							<input type="text" name="alternatetext" id="alternatetext" class="form-control" />
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" class="form-control" id="description"></textarea>
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

<?php include("includes/footer.php"); ?>