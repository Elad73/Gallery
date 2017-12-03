<?php include("includes/header.php"); ?>
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

            $user->set_file($_FILES['user_image']);

            $user->save_user_and_image();
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

                    <div class="col-md-6">

                        <img class="img-responsive" src="<?php echo $user->get_image_src(); ?>" alt="">

                    </div>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="file" name="user_image">
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
                                <input type="text" name="password" class="form-control" value="<?php echo $user->get_password(); ?>">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" name="update" class="btn btn-primary pull-right">
                            </div>

                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>