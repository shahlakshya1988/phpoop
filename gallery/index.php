<?php include("includes/header.php"); ?>
<?php
//finding all the photos 
$page = !empty($_GET["page"]) ? (int)$_GET["page"] : 1;
$items_per_page = 3;
$item_counts = Photo::count_all();
$paginate = new Paginate($page,$items_per_page,$item_counts);
//var_dump($paginate);
$sql = "SELECT * FROM `photos` LIMIT {$paginate->items_per_page} OFFSET {$paginate->offset()}"; 
//echo $sql;
$photos = Photo::find_by_query($sql);

// finding all the photos  
?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
				<div class="row thumbnails">
				<?php foreach($photos as $photo){ ?>
					
						<div class="col-xs-6 col-md-4">
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


        </div> 
        <!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<ul class="pager">
			<?php
				if($paginate->page_total()>1){
					
					if($paginate->has_previous()){
						echo "<li class='previous'><a href='".basename($_SERVER["PHP_SELF"])."?page=".$paginate->previous()."'>Previous</a></li>";
					}
					for($i = 1; $i<=$paginate->page_total();$i++){
						if($i==$paginate->current_page){
							echo "<li class='active'><a href='".basename($_SERVER["PHP_SELF"])."?page=".$i."' >".$i."</a></li>";
						}else{
							echo "<li><a href='".basename($_SERVER["PHP_SELF"])."?page=".$i."'>".$i."</a></li>";
						}
						
					}
					
					
					if($paginate->has_next()){
						echo "<li class='next'><a href='".basename($_SERVER["PHP_SELF"])."?page=".$paginate->next()."'>Next</a></li>";
					}
				}
			?>
			
			
		</ul>
	</div>
<div>
<!-- div.row -->
        <?php include("includes/footer.php"); ?>
