<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 13/10/2017
 * Time: 22:04
 */

/**
 * Scans the application and looking for undeclared objects
 */
function classAutoLoader($class){



    $class = strtolower($class);
    $path = "includes/{$class}.php";

    if(is_file($path) && !class_exists($class)){
        include $path;
    }
    else {
        die("This file name {$class}.php was not found man...");
    }

}

spl_autoload_register('classAutoLoader');

function redirect($location){

    header("Location: {$location}");
}