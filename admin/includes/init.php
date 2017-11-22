<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 13/10/2017
 * Time: 03:36
 */

defined('DS') ? null : define('DS, DIRECTORY_SEPARATOR');
defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' . DS . 'wamp64' . DS . 'www' . DS . 'udemy' . DS . 'udemy_oop' . DS . 'gallery');
defined('INCLUDE_PATH') ? null : define('SITE_ROOT', 'C:' . DS . 'wamp64' . DS . 'www' . DS . 'udemy' . DS . 'udemy_oop' . DS . 'gallery' . DS . 'admin' . DS . 'includes');


require_once("functions.php");
require_once("config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");
