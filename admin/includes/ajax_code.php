<?php require("init.php");


if(isset($_POST['image_name']) && isset($_POST['user_id'])) {

    $user = new User();
    //$user = User::find_by_id((int)$_POST['user_id']);
    //$user->set_image_src($_POST['image_name']);
    //$user->update();
    $user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);

}











