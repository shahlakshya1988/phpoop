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
                /*$user = Users::find_by_id(1);
                var_dump($user);
                $user->last_name = "Doe";
                $user->update();
                $user1 = Users::find_by_id(1);
                var_dump($user1); */
              /*  $user = Users::find_by_id(9);
                var_dump($user);
                echo "<br>";
                var_dump($user->delete());
                 echo "<br>";
                $user1 = Users::find_by_id(9);
                var_dump($user1); */
              /* $user = new Users();
                $user->username="mynewusername12";
                $user->password = "123";
                $user->first_name = "newuserfirstname12";
                $user->last_name = "newuserlastname12";
                $user->save(); */
                //var_dump($user);
                //$user = new Users();
                /*$user = Users::find_by_id(3);
                var_dump($user);
                $user->username = "myupdateduser12";
                $user->save();
                $user = Users::find_by_id(3);
                var_dump($user);*/

                /* $user = Users::find_by_id(9);
                var_dump($user);
                $user->username = "myupdateduser12";
                $user->save();
                $user = Users::find_by_id(9);
                var_dump($user); */

                $user = Users::find_all();
                var_dump($user);
                echo "<br><br><br>";
                $photos = Photo::find_all();
                var_dump($photos);
                echo "<br><br><br>";
                $photo = new Photo();
                $photo->title = "New Photo";
                $photo->size = "200";
                $photo->description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ullam fugiat ducimus, beatae accusamus officiis, nulla adipisci quam perferendis qui cum cupiditate veniam ipsa recusandae dignissimos. Magnam iure dolorem ullam.";
                $photo->filename="myphoto.jpg";
                $photo->type="JPG";
                $photo->save();
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
