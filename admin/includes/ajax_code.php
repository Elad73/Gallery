<?php require("init.php");

$user = new User();

if(isset($_POST['image_src'])) {

    $user->ajax_save_user_image($_POST['image_src'], $_POST['user_id']);

}











