<?php include("includes/header.php"); ?>
<?php
//finding all the photos 
$photos = Photo::find_all();
// finding all the photos  
?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

				<?php foreach($photos as $photo){ ?>
					<div class="row thumbnails">
						<div class="col-xs-6 col-md-3">
							<a class="thumbnail" href="#">
								<img src="" alt="" />
							</a>
						</div>
						<!-- col-xs-6 col-md-3 -->
					</div>
					<!-- div.row thumbnails -->
				<?php } ?>
          
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
           <?php /* <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



        </div> */ ?>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
