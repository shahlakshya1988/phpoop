<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){
    redirect("login.php");
    die();
}

$user = new Users();
if(isset($_POST["add_user"])){
  //echo "<pre>",print_r($_POST),"</pre>";
  //echo "<pre>",print_r($_FILES),"</pre>";

    $username = trim($_POST["username"]);
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $password = trim($_POST["password"]);
    $user->username = $username;
    $user->first_name = $first_name;
    $user->last_name = $last_name;
    $user->password = $password;
    $user->set_file($_FILES["user_image"]);
    //$user->save_user_and_image();
    $user->upload_photo();
    $user->save();
    $message = "The User has been succesfully Added";
    $session->message($message);
    redirect("users.php");

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
                   <div class="pull-right">
                       <a href="users.php" class="btn btn-primary">View Users</a>
                   </div>
               </div>

                 <form name="add_user" action="" enctype="multipart/form-data" method="POST">
				 <div class="col-md-7">
          <div class="form-group">
            <label for="user_image">User Image</label>
            <input type="file" name="user_image" id="user_image" class="form-control" >
          </div>
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

                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="add_user" value="Add User" class="btn btn-primary btn-lg ">
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
