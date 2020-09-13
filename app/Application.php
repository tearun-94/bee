<?php

class Application {

    public static function init()
    {

        spl_autoload_register(['static','loadClass']);
    }

    public static function loadClass($name)
    {
        include_once  lcfirst(str_ireplace ( '\\' , '/',  $name )) . '.php';
    }


}