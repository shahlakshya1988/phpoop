<?php error_reporting(0); include("includes/header.php"); ?>
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
                       Users

                   </h1>
                   <div class="col-lg-12">
                   <?php
                        if(isset($session->message) && trim($session->message)!=''){
                            ?>
                            <br>
                            <p class="bg-success text-center"><?php echo $session->message; ?></p>
                            <?php 
                        }
                   ?>
               </div>
               <br>
               
                   <div>
                       <a href="add_user.php" class="btn btn-primary">Add User</a>
                   </div>
               </div>
               
               <div class="col-lg-12">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Photo</th>
                              <th>Username</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $users = Users::find_all();
                           // var_dump($users);
                            foreach($users as $user){ ?>
                                <tr>
                                    <td> <?php echo $user->id; ?>
                                </td>
                                    <td> <img src="<?php echo $user->image_path_and_placeholder(); ?>" alt="<?php echo $user->username ?>" class="admin-user-thumbnail"> </td>
                                    <td><?php echo $user->username ?> <br>
                                    <div class="action_links">
                                        <a href="delete_user.php?id=<?php echo $user->id; ?>" class="delete_confirm">Delete</a>
                                        <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                    <!--    <a href="">View</a> -->
                                    </div> </td>
                                    <td><?php echo $user->first_name ?></td>
                                    <td><?php echo $user->last_name ?></td>
                                </tr>
                           <?php }
                          ?>

                      </tbody>

                  </table>
               </div>
           </div>
           <!-- /.row -->

       </div>
       <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
