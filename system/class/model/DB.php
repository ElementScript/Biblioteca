<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 21/06/18
 * Time: 05:16
 */

namespace Lib\model;

use \PDO;

class DB
{
    private $_pdo;
    private static $_instance = null;

    private function __construct()
    {
        $this->_pdo = new PDO("mysql: host=127.0.0.1; dbname=library", "root", "");
    }

    public static function getInstance()
    {
        if (self::$_instance == null) 
        {
            self::$_instance = new DB;
        }
        return self::$_instance;
    }
}