<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
                <?php
                /*$user = new Users();
                $user->username="someusername";
                $user->password="123";
                $user->first_name="somefirstname";
                $user->last_name="somelastname";
                $user->create();
                var_dump($user->id); */
                $user = Users::find_user_by_id(1);
                var_dump($user);
                $user->last_name = "Doe";
                $user->update();
                $user1 = Users::find_user_by_id(1);
                var_dump($user1);

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
