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
    private $_sql;
    private $_statement;
    private static $_instance = null;

    private function __construct()
    {
        $this->_pdo = new PDO("mysql: host=127.0.0.1; dbname=biblioteca", "root", "guitar");
    }

    public static function getInstance()
    {
        if (self::$_instance == null) 
        {
            self::$_instance = new DB;
        }
        return self::$_instance;
    }

    public function query($operation, $params = [])
    {
        $this->_sql = "$operation $params";
        $this->_statement = $this->_pdo->prepare($this->_sql);
        $this->_statement->execute();
        return $this->_statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select($table, $params = [])
    {
        return $this->query("SELECT * FROM $table ", $params);
    }

    public function insert($table, $params = [])
    {
        return $this->query("INSERT INTO $table ", $params);
    }

    public function update($table, $params = [])
    {
        return $this->query("UPDATE $table ", $params);
    }

    public function delete($table, $params = [])
    {
        return $this->query("UPDATE $table ", $params);
    }
}