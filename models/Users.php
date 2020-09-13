<?php
namespace models;

class Users extends \App\Model
{
    public function login($login, $password) {
        $password = md5($password);
        $user = $this->all("login = '$login' AND password = '$password'", 1);

        if ($user)
            $_SESSION['user'] = $user[0]->login;
        else
            return false;

        return true;
    }

    public static function isUser(){
        if (isset($_SESSION['user']))
            return true;
        else
            return false;

    }
}