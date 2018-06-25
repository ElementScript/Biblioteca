<?php

namespace Lib\controller;

interface FactoryInterface
{
    public function select();
    public function insert();
    public function update();
    public function delete();
}