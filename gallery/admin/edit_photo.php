<?php include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}
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
				 <div class="col-md-6">
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
				 </form>
              
           </div>
           <!-- /.row -->

       </div>
       <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>