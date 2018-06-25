<?php

namespace Lib\controller;

interface FactoryInterface
{
    public function select(array $params = []);
    public function insert(string $operation, array $params = []);
    public function update(string $operation, array $params = []);
    public function delete(string $operation, array $params = []);
}