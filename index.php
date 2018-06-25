<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 21/06/18
 * Time: 05:11
 */

// session_start();

require_once "vendor/autoload.php";

use \Lib\view\Page;
use \Slim\App;
use \Lib\controller\Livro;

$config = ['settings' => [
    'addContentLengthHeader' => false
]];

$app = new App($config);

$app->get('/', function () {
    $page = new Page();
    $page->setTpl("index");
    $sql = new Livro();
    $sql->select();
    $select = $sql->select();
    foreach ($select as $items)
    {
        foreach ($items as $key => $item)
        {
            $name = explode("_", $key);
            echo "<strong style='color: #C34;'>" . ucfirst($name[1]) . ": </strong>" . $item . "<br>";
        }
    }
});

$app->run();