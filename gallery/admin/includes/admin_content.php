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
                    //$users = new Users();
                    $allUsers = Users::find_all_users();
                    while($fh_users = mysqli_fetch_assoc($allUsers)){
                        echo "<pre>",print_r($fh_users),"</pre>";
                    }

                    $singleUser = Users::find_user_by_id(1);
                    $user = new Users();
                    $user->id = $singleUser["id"];
                    $user->username = $singleUser["username"];
                    $user->password = $singleUser["password"];
                    $user->first_name = $singleUser["first_name"];
                    $user->last_name = $singleUser["last_name"];

                    var_dump($user->id);
                    var_dump($user->username);
                    var_dump($user->password);
                    var_dump($user->first_name);
                    var_dump($user->last_name);
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
