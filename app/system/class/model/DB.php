<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 26/06/18
 * Time: 05:56
 */

namespace Lib\Model;

use \PDO;
use PDOException;

class DB
{
    const HOSTNAME  = "127.0.0.1";
    const USERNAME  = "root";
    const PASSWORD  = "guitar";
    const DBNAME    = "biblioteca";

    private $conn;

    public function __construct()
    {
        $this->conn = new \PDO(
            "mysql:dbname=" . DB::DBNAME .
            ";host=" . DB::HOSTNAME,
            DB::USERNAME,
            DB::PASSWORD
        );
    }

    private function setParams($statement, $parameters = [])
    {
        foreach ($parameters as $key => $value) {
            $this->bindParam($statement, $key, $value);
        }
    }

    private function bindParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }

    public function query($rawQuery, $params = [])
    {
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
    }

    public function select($rawQuery, $params = []): array
    {
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}