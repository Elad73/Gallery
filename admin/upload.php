<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>

<?php
$message = "";
if (isset($_POST['submit'])) {
    $photo = new Photo();
    $photo->set_title($_POST['title']);
    $photo->set_description($_POST['desc']);
    $photo->set_file($_FILES['file_upload']);

    if($photo->save()) {
        $message = "Photo uploaded Successfully";
    }
    else {
        $message = join("<br>",$photo->errors);
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
                        Upload
                        <small></small>
                    </h1>

                    <div class="col-md-6">
                        <?php echo $message; ?>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="file" name="file_upload">
                            </div>

                            <input type="submit" name="submit">
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>