<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 21/06/18
 * Time: 05:11
 */

session_start();

require_once "vendor/autoload.php";

use \Lib\view\Page;
use \Slim\App;

$config = ['settings' => [
    'addContentLengthHeader' => false,
]];

$app = new App($config);

$app->get('/', function () {
    $page = new Page();
    $page->setTpl("index");
});
$app->run();