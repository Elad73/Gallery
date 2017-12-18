<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php
$comments = Comment::find_all_ordered("createdDate", "DESC");

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
                        Comments
                        <small></small>
                    </h1>
                    <a href="add_comment.php" class="btn btn-primary">Add comment</a>

                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo Id</th>
                                <th>Author</th>
                                <th>Body</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($comments as $comment) : ?>
                                <tr>
                                    <td><?php echo $comment->get_id(); ?>
                                        <div class="action_link">
                                            <a href="delete_comment.php?id=<?php echo $comment->get_id();?>">Delete</a>
                                        </div>
                                    </td>
                                    <td><?php echo $comment->get_photo_id(); ?></td>
                                    <td><?php echo $comment->get_author(); ?></td>
                                    <td><?php echo $comment->get_body(); ?></td>
                                    <td><?php echo $comment->get_created_date(); ?></td>
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