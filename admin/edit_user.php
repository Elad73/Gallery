<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>

<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php



if(empty($_GET['id'])) {

    redirect("users.php");

} else {

     $user = User::find_by_id($_GET['id']);

    if(isset($_POST['update'])) {

        if($user) {
            $user->set_username($_POST['username']);
            $user->set_first_name($_POST['first_name']);
            $user->set_last_name($_POST['last_name']);
            $user->set_password($_POST['password']);
            $user->set_username($_POST['username']);

            //In case the thumbnail image (file) was not changed, then make an update, with out setting the file.
            if(empty($_FILES['user_image']) || $_FILES['user_image']['error'] == UPLOAD_ERR_NO_FILE) {

                $user->save();
                $session->message("The user has been updated");
                redirect("users.php");

            } else {

                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $user->save();
                //redirect("edit_user.php?id={$user->get_id()}");
                $session->message("The user has been updated");
                redirect("users.php");

            }
        }
    }
}


?>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include("includes/side_nav.php"); ?>

        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <!-- /.container-fluid -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit User
                        <small>ch..ch..ch..Changes...</small>
                    </h1>

                    <div class="col-md-6 user_image_box">
                        <a href="#" data-toggle="modal" data-target="#photo-library" ><img id="user_thumbnail" class="img-responsive" src="<?php echo $user->get_image_src(); ?>" alt=""></a>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="text" value="Choose Thumbnail" name="browse" data-toggle="modal" data-target="#photo-library" class="btn btn-primary pull-left">
                            </div>

                            <div>
                                <br>
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->get_username(); ?>">
                            </div>

                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo $user->get_first_name(); ?>">
                            </div>

                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo $user->get_last_name(); ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->get_password(); ?>">
                            </div>


                            <div class="form-group">
                                 <a id="user-id"  href="delete_user.php?id=<?php echo $user->get_id(); ?>" class="btn btn-danger">Delete</a>
                                <input type="submit" value="Update" name="update" class="btn btn-primary pull-right">
                            </div>


                            <!--
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_user.php?id=<?php echo $user->get_id(); ?>" class="btn btn-danger btn-lg ">Delete</a>
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>
                            </div>
                            -->

                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>