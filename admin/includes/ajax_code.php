<?php require("init.php");


if(isset($_POST['thumbnail_name']) && isset($_POST['user_id'])) {

    //$user = User::find_by_id((int)$_POST['user_id']);
    //$user->set_image_src($_POST['image_name']);
    //$user->update();


    $user = new User();
    $user->ajax_save_user_image($_POST['thumbnail_name'], $_POST['user_id']);

}


if(isset($_POST['thumbnail_id'])) {

    echo $_POST['thumbnail_id'];

}












