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

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->_pdo;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo(PDO $pdo): void
    {
        $this->_pdo = $pdo;
    }

    private function __construct()
    {
        $this->setPdo(new PDO("mysql: host=127.0.0.1; dbname=biblioteca", "root", "guitar"));
        return $this->getPdo();
    }

    /**
     * Impedindo a clonagem do objeto (que possibilita uma segunda instância)
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * Impedindo a desserialização do objeto (que possibilita uma segunda instância)
     */
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @return DB|null
     *
     * Singleton Pattern
     */
    public static function getInstance()
    {
        if (self::$_instance == null) 
        {
            self::$_instance = new DB;
        }
        return self::$_instance;
    }
}