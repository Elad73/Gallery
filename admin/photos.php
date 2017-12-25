<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php
$photos = Photo::find_all();
//$photos = User::find_by_id($_SESSION['user_id'])->get_photos();

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
                        Photos
                        <small></small>
                    </h1>
                    <p class="bg-success">
                        <?php echo $message; ?>
                    </p>
                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($photos as $photo) : ?>
                                <tr>
                                    <!--<td> <img src="http://via.placeholder.com/140x100" alt=""></td>-->
                                    <td> <img class="admin-photo-thumbnail" src="<?php echo $photo->get_src(); ?>" alt="">
                                        <div class="action_link">
                                            <a class="delete_link" href="delete_photo.php?id=<?php echo $photo->get_id();?>">Delete</a>
                                            <a href="edit_photo.php?id=<?php echo $photo->get_id();?>">Edit</a>
                                            <a href="../photo.php?id=<?php echo $photo->get_id(); ?>">View</a>
                                        </div>

                                    </td>
                                    <td><?php echo $photo->get_id(); ?></td>
                                    <td><?php echo $photo->get_filename(); ?></td>
                                    <td><?php echo $photo->get_title(); ?></td>
                                    <td><?php echo $photo->get_description(); ?></td>
                                    <td><?php echo $photo->get_size(); ?></td>
                                    <td>
                                        <a href="comment_photo.php?photo_id=<?php echo $photo->get_id();?>">
                                            <?php
                                                $comments = Comment::find_the_comments($photo->get_id());
                                                echo count($comments);
                                            ?>
                                        </a>
                                    </td>
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