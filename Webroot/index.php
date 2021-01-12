<?php

/** 
 * create composer.json with psr-4
 * composer install => create vendor
 * import autoload.php in vendor 
 * nameprefix : Mvc
 **/
require __DIR__ . '/../vendor/autoload.php';

use Mvc\Controllers\TasksController;

use Mvc\Dispatcher;
use Mvc\Router;
use Mvc\Request;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'Config/core.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>