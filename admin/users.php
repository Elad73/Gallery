<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php
$Users = User::find_all();

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
                        Users
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($Users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->get_id(); ?></td>
                                    <td> <img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_placeholder(); ?>" alt=""></td>
                                    <td><?php echo $user->get_username(); ?>
                                        <div class="action_link">
                                            <a href="delete_user.php?id=<?php echo $user->get_id();?>">Delete</a>
                                            <a href="edit_user.php?id=<?php echo $user->get_id();?>">Edit</a>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td><?php echo $user->get_first_name(); ?></td>
                                    <td><?php echo $user->get_last_name(); ?></td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>


                        </table> <!--End of Table -->

                    </div>




                </div>
            </div>
            <!-- /.row -->

        </div>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>