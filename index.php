<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 21/06/18
 * Time: 05:11
 */
session_start();

require_once ("vendor/autoload.php");

use \Lib\Page;
use \Slim\App;
use \Lib\controller\Session;

$app = new App;

$app->get('/admin', function () {
    $page = new Page();
    $page->setTpl("index");
});

$app->get('/', function() {
    $page = new Page(["header" => false, "footer" => false]);
    $page->setTpl("login");
});


$app->run();