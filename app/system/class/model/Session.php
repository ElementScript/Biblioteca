<?php

namespace Lib\controller;

use Lib\Model\DB;
use Lib\model\Model;

class Session extends Model
{
    const SESSION = "User";

    public static function login($login, $password)
    {
        $sql = new DB();
        $results = $sql->select("SELECT * FROM user WHERE user_name = :LOGIN", [
            ":LOGIN" => $login
        ]);

        if (count($results) === 0) {
            throw new \Exception("Usuário não encontrado ou senha inválida");
        }

        $data = $results[0];

        if (password_verify($password, $data["user_pass"]) === true)
        {
            $user = new Session();
            $user->setData($data);

            $_SESSION[Session::SESSION] = $user->getValues();

            return $user;
        }
        else
        {
            throw new \Exception("Usuário não encontrado ou senha inválida");
        }
    }

    public static function verifyLogin($inadmin = true)
    {
        if (!isset($_SESSION[Session::SESSION]) || !$_SESSION[Session::SESSION] || !(int)$_SESSION[Session::SESSION]["iduser"] > 0 || (bool)$_SESSION[Session::SESSION]["inadmin"] !== $inadmin)
        {
            header("Location: ./index.php");
            exit;
        }
    }

    public static function logout()
    {
        $_SESSION[Session::SESSION] = NULL;
    }

    public static function listAll()
    {
        $sql = new DB();
        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
    }

    public function save()
    {
        $sql = new DB();
        $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", [
            ":desperson"    => $this->getdesperson(),
            ":deslogin"     => $this->getdeslogin(),
            ":despassword"  => $this->getdespassword(),
            ":desemail"     => $this->getdesemail(),
            ":nrphone"      => $this->getnrphone(),
            ":inadmin"      => $this->getinadmin()
        ]);

        $this->setData($results[0]);
    }

    public function get($iduser)
    {
        $sql = new DB();
        $results = $sql->select("SELECT * FROM user WHERE user_id = :userid", [
            ":userid" => $iduser
        ]);

        $this->setData($results[0]);
    }

    public function update()
    {
        $sql = new DB();
        $results = $sql->select("CALL user_update(:user_id, :user_name, :user_pass)", [
            ":user_id"       => $this->getuser_id(),
            ":user_name"    => $this->getuser_name(),
            ":user_pass"     => $this->getuser_pass()
        ]);

        $this->setData($results[0]);
    }

    public function delete()
    {
        $sql = new DB();
        $sql->query("CALL sp_users_delete(:iduser)", [
            ":iduser" => $this->getiduser()
        ]);
    }
}