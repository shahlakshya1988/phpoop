<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
                <?php
                    //var_dump($database->connection);
					/*$sql="SELECT * FROM `users` ";
					$result = $database->query($sql);
					$database->confirmQuery($result);
					$fetch = mysqli_fetch_assoc($result); */
					// var_dump($fetch);
                    $users = new Users();
                    $allUsers = $users->find_all_users();
                    while($fh_users = mysqli_fetch_assoc($allUsers)){
                        //echo "<pre>",print_r($fh_users),"</pre>";
                    }
                ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
