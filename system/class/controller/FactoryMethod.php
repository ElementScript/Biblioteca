<?php

namespace Lib\controller;

use Lib\model\DB;

abstract class FactoryMethod
{
    private $_db;
    private $_sql;
    private $_statement;

    const LIVRO = "livro";
    const ALUNO = "aluno";
    const USUARIO = "user";

    /**
     * @param mixed $db
     */
    public function setDb(): void
    {
        $$this->_db = DB::getInstance();
    }

    /**
     * @param mixed $sql
     */
    public function setSql($sql): void
    {
        $this->_sql = $sql;
    }

    /**
     * @param mixed $statement
     */
    public function setStatement($statement): void
    {
        $this->_statement = $statement;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * @return mixed
     */
    public function getSql()
    {
        return $this->_sql;
    }

    /**
     * @return mixed
     */
    public function getStatement()
    {
        return $this->_statement;
    }

    abstract protected function select(string $type, array $params = []): FactoryInterface;
    abstract protected function insert(string $operation, array $params = []): FactoryInterface;
    abstract protected function update(string $operation, array $params = []): FactoryInterface;
    abstract protected function delete(string $operation, array $params = []): FactoryInterface;

    public function query($operation, $params = [])
    {
        $this->setSql("$operation $params");
        $this->setStatement($this->getDb()->prepare($this->getSql()));
        $this->getStatement()->execute();
        return $this->getStatement()->fetchAll(\PDO::FETCH_ASSOC);
    }
}
