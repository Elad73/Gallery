<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 13/10/2017
 * Time: 03:36
 */

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', 'E:' . DS . 'Development_projects' . DS . 'wamp64' . DS . 'www' . DS . 'udemy' . DS . 'udemy_oop' . DS . 'gallery');
defined('INCLUDE_PATH') ? null : define('INCLUDE_PATH', 'E:' . DS . 'Development_projects' . DS . 'wamp64' . DS . 'www' . DS . 'udemy' . DS . 'udemy_oop' . DS . 'gallery' . DS . 'admin' . DS . 'includes');


require_once(INCLUDE_PATH . DS. "functions.php");
require_once(INCLUDE_PATH . DS. "config.php");
require_once(INCLUDE_PATH . DS. "database.php");
require_once(INCLUDE_PATH . DS. "db_object.php");
require_once(INCLUDE_PATH . DS. "user.php");
require_once(INCLUDE_PATH . DS. "photo.php");
require_once(INCLUDE_PATH . DS. "comment.php");
require_once(INCLUDE_PATH . DS. "session.php");

