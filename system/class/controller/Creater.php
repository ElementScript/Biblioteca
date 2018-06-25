<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 25/06/18
 * Time: 05:37
 */

namespace Lib\controller;

class Creater extends FactoryMethod
{
    protected function select(string $type, array $params = []): FactoryInterface
    {
        switch ($type)
        {
            case parent::LIVRO:
                return new Livro();
            case parent::ALUNO:
                return new Aluno();
            case parent::USUARIO:
                return new Usuario();
            default:
                throw new \InvalidArgumentException("$type não é um tipo válido!");
        }
    }

    protected function insert(string $operation, array $params = []): FactoryInterface
    {
        // TODO: Implement insert() method.
    }

    protected function update(string $operation, array $params = []): FactoryInterface
    {
        // TODO: Implement update() method.
    }

    protected function delete(string $operation, array $params = []): FactoryInterface
    {
        // TODO: Implement delete() method.
    }
}