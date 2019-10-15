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
                       Comments

                   </h1>
                   <div>
                       <a href="add_user.php" class="btn btn-primary">Add User</a>
                   </div>
               </div>
               <div class="col-lg-12">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Author</th>
                              <th>Body</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $comments = Comment::find_all();
                          //var_dump($comments);
                            foreach($comments as $comment){ ?>
                                <tr>
                                    <td> <?php echo $comment->id; ?>
                                </td>

                                    <td><?php echo $comment->author ?> <br>
                                        <div class="action_links">
                                            <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                            <a href="edit_comment.php?id=<?php echo $comment->id; ?>">Edit</a>
                                        <!--    <a href="">View</a> -->
                                        </div>
                                    </td>
                                    <td><?php echo $comment->body ?></td>
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
