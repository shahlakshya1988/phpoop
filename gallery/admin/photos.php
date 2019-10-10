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
               <div class="col-lg-12">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Photo</th>
                              <th>Id</th>
                              <th>File Name</th>
                              <th>Title</th>
                              <th>Size</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php 
                            $photos = Photo::find_all();
                            // var_dump($photos);
                            foreach($photos as $photo){ ?>
                                <tr>
                                    <td><?php echo $photo->upload_dir ?>
                                    <br>
                                    <img src="https://placehold.it/62X62" alt="<?php echo $photo->title ?>">    
                                </td>
                                    <td><?php echo $photo->photo_id ?></td>
                                    <td><?php echo $photo->filename ?></td>
                                    <td><?php echo $photo->title ?></td>
                                    <td><?php echo $photo->size ?></td>
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