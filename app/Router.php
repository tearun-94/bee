<?php
namespace App;

class Router
{
    public static function run ()
    {
        $route = substr($_SERVER['REQUEST_URI'], strpos($_SERVER["SCRIPT_NAME"],"index.php"));

        foreach ($_POST as $key => $value)
            $_POST[$key] = strip_tags($value);

        if(($pos = strpos($route, '?')) !== false)
            $route = substr($route, 0, $pos);

        $route = is_null($route) ? $_SERVER['REQUEST_URI'] : $route;
        $route = explode('/', $route);

        if ($route[0] == "index.php")
            array_shift($route);

        $result[0] = array_shift($route);
        $result[1] = array_shift($route);
        $result[2] = $route;

        return $result;
    }
}