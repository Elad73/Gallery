<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php

$photo_id = "";
if(empty($_GET['photo_id'])) {

   $redirect = "comments.php";
}
else
{
    $photo_id = $_GET['photo_id'];
    $redirect = "comment_photo.php?id={$photo_id}";
}

if(isset($_POST['create'])) {
    $photo_id = trim($_POST['photo_id']);
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $new_comment = Comment::create_comment($photo_id, $author, $body);

    if($new_comment && $new_comment->save()) {

        redirect($redirect);
    }
    else {

        $message = "There was some problems saving";
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
                        Add Comment
                        <small>Hear you out...</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-6 col-md-offset-3">

                            <div class="form-group">
                                <label for="photo_id">Photo ID</label>
                                <input type="text" name="photo_id" class="form-control" value="<?php echo $photo_id ?>">
                            </div>

                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="first-name">body</label>
                                <textarea name="body" class="form-control"></textarea>
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