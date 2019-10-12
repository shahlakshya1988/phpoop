<?php error_reporting(0); include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}


if(isset($_POST["add_user"])){
	//echo "<pre>",print_r($_REQUEST),"</PRE>";

} // isset($_POST["add_user"])

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
                       Add User
                   </h1>
                   <div class="">
                       <a href="users.php" class="btn btn-primary">View Users</a>
                   </div>
               </div>
               
                 <form name="add_user" action="" enctype="multipart/formdata" method="POST">
				 <div class="col-md-7">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control"  />
                        </div>
                        <div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control"  />
						</div>
					
						<div class="form-group">
						<label for="first_name">First Name</label>
							<input type="text" name="first_name" id="first_name" class="form-control"  />
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" name="last_name" id="last_name" class="form-control"  />
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
					 <!-- -->
					 
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