<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php

$user = new User();

if(isset($_POST['create'])) {

    if($user) {
        $user->set_username($_POST['username']);
        $user->set_first_name($_POST['first_name']);
        $user->set_last_name($_POST['last_name']);
        $user->set_password($_POST['password']);
        $user->set_image_src($_POST['user_thumbnail_input']);

        $user->save();
        $session->message("The {$user->get_username()} had been added");
        redirect("users.php");
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
                        Add User
                        <small>Welcome to the Real world...</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-6 col-md-offset-3">

                            <!--
                            <div class="form-group">
                                <input type="file" name="user_image">
                            </div>
                            -->

                            <div class="col-md-6">
                                <a href="#" data-toggle="modal" data-target="#photo-library" ><img id="user_thumbnail" class="img-responsive" src="" alt=""></a>
                                <input type="hidden" value="" id="user_thumbnail_input" name="user_thumbnail_input">
                            </div>

                            <div class="form-group bottom_margin">
                                <input type="text" value="Choose Thumbnail" name="browse" data-toggle="modal" data-target="#photo-library" class="btn btn-primary pull-left">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" name="create" class="btn btn-primary pull-right">
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