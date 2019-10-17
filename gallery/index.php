<?php include("includes/header.php"); ?>
<?php
//finding all the photos 
$photos = Photo::find_all();
// finding all the photos  
?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
				<div class="row thumbnails">
				<?php foreach($photos as $photo){ ?>
					
						<div class="col-xs-6 col-md-3">
							<a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
								<img src="admin/<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->title; ?>" class="img-responsive front_homepage_photo" />
							</a>
						</div>
						<!-- col-xs-6 col-md-3 -->
					
				<?php } ?>
          
         </div>
					<!-- div.row thumbnails -->

            </div>




            <!-- Blog Sidebar Widgets Column -->
           <?php /* <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



        </div> */ ?>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
