<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 24/06/18
 * Time: 06:49
 */

namespace Lib\controller;


use Lib\model\DB;

class Livro
{
    private static $_access;

    public function __construct()
    {
        self::$_access = DB::getInstance();
    }

    public static function select()
    {
        return self::$_access->select("livro");
    }
}