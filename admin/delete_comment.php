
<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php

if(empty($_GET['id'])) {

    redirect("comments.php");
}

$comment = Comment::find_by_id($_GET['id']);

if($comment) {

    $comment->delete();
    $session->message("Comment id {$comment->get_id()} has been deleted...");
}

if(empty($_GET['photo_id'])) {
    redirect("comments.php");
}
else {
    redirect("comment_photo.php?photo_id={$_GET['photo_id']}");
}

?>

