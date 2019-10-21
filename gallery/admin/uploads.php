<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
    die();
}
$message = "";
if (isset($_POST["upload"])) {
    $title = $_POST["title"];
    $file = $_FILES["file_upload"];
    $photo = new Photo();
    $photo->title = $title;
    $photo->set_file($file);
    if ($photo->save()) {
        $message = "Photo Uploaded Successfully";
    } else {
        $message = join("<br>", $photo->errors);
    }
}

if(isset($_FILES["file"])){
    $title = $_POST["title"];
    $file = $_FILES["file"];
    $photo = new Photo();
    $photo->title = $title;
    $photo->set_file($file);
    if ($photo->save()) {
        $message = "Photo Uploaded Successfully";
    } else {
        $message = join("<br>", $photo->errors);
    }

} //if(isset($_FILES["file"])){
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <?php include "includes/top_nav.php"; ?>
    <?php include "includes/side_nav.php"; ?>
    <!-- /.navbar-collapse -->
</nav>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Uploads
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
            
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-lg-6">
                <?= $message; ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="file" name="file_upload" id="file_upload" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Upload" name="upload" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="uploads.php" class="dropzone"></form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>