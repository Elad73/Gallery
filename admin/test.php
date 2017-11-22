<?php
include("includes/header.php");
//include("includes/user.php");
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 14/10/2017
 * Time: 05:10
 */

//$name = null;
//var_dump($name . "<br>");
//
//unset($name);
//var_dump($name . "<br>");

$user = new User();

$result = "<h1>**</h1>";
if($user->create() === true) {
    $result = str_replace("**", "User created successfully, ID = " . $user->get_id(), $result);


} else {
    $result = str_replace("**", "User was not Created!", $result);
}

echo $result;



