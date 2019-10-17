<?php
require_once __DIR__.DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."init.php";
//$_GET["id"] = 8; // this is temp
if(empty($_GET["id"])){
    redirect("index.php");
    die();
}
$photo = Photo::find_by_id($_GET["id"]);
//var_dump($photo);
$message = "";
if(isset($_POST["submit"])){
    $author = trim($_POST["author"]);
    $body = trim($_POST["body"]);
    $comment = Comment::create_comment($photo->id,$author,$body);
    if($comment && $comment->save()){
        redirect("photo.php?id={$photo->id}");
        die();
    }else{
        $message="There was a problems";
    }

    redirect("photo.php?id={$photo->id}");
    die();


}
$allcomments = Comment::find_the_comments($photo->id);
//var_dump($allcomments);
?>
<?php include("includes/header.php"); ?>
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?=$photo->title; ?></h1>

                <!-- Author -->
                <!-- <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p> -->

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin<?php echo DIRECTORY_SEPARATOR.$photo->picture_path(); ?>" alt="<?php echo $photo->title; ?>">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
               <div>
				<?php echo $photo->description; ?>
			   </div>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" name="add_comment">
                        <div class="form-group">
                            <label for="author">Enter Your Name</label>
                            <input type="text" name="author" id="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Enter Message</label>
                            <textarea class="form-control" rows="3" name="body" id="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php foreach($allcomments as $comment){ ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment->author; ?>
                                <small><?php echo $comment->datetime; ?></small>
                            </h4>
                            <?php echo $comment->body; ?>
                        </div>
                    </div>
                <?php } ?>
                <?php /* <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div> */ ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php /* <div class="col-md-4">
                <?php include("includes/sidebar.php"); ?>
            </div> */ ?>

        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>