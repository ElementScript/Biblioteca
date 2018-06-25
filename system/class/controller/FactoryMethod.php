<?php

namespace Lib\controller;

abstract class FactoryMethod
{
    const LIVRO = "livro";
    const ALUNO = "aluno";
    const USUARIO = "user";

    abstract protected function insert(string $type): FactoryInterface;

    public function select(): FactoryInterface
    {
        
    }
}
