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

               /* $user = Users::find_all();
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
                $photo->save(); */
                ?>
            </h1>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $session->count; ?></div>
                                            <div>New Views</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                         <div>Page View from Gallery</div>
                                      <span class="pull-left">View Details</span>
                                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                         <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-photo fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo Photo::count_all(); ?></div>
                                            <div>Photos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Photos in Gallery</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                         <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">8

                                            </div>

                                            <div>Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Users</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                          <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-support fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">8</div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Comments</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                            </div> <!--First Row-->
                            <div class="row">
                                <div id="piechart" style="width: 900px; height: 500px;"></div>
                            </div>
</div>
<!-- /.container-fluid -->
