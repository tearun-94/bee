<?php
namespace App;
use App;
use App\Router;

class Core {

    public $defaultController = 'Main';
    public $controllerAddition = "Controller";

    public $actionAddition = "action";
    public $defaultAction = "Index";

    public function run(){
        list($controllerName, $actionName, $params) = \App\Router::run();
        $this->action($controllerName, $actionName, $params);
    }

    public function action($controllerName = null, $actionName = null, $params = null) {

        $controllerName = (empty($controllerName) ? $this->defaultController : ucfirst($controllerName)).$this->controllerAddition;
        if(!file_exists(ROOTPATH.DIRECTORY_SEPARATOR."controllers".DIRECTORY_SEPARATOR.$controllerName.".php")){
            $this->action('Error', 'error404');
            return;
        }

        include_once ROOTPATH.DIRECTORY_SEPARATOR."controllers".DIRECTORY_SEPARATOR.$controllerName.".php";
        $controller = "\\controllers\\".$controllerName;
        if(!class_exists($controller)){
            $this->action('Error', 'error404');
            return;
        }
        $controller = new $controller;

        $actionName = $this->actionAddition.(empty($actionName) ? $this->defaultAction : ucfirst($actionName));
        if (!method_exists($controller, $actionName)){
            $this->action('Error', 'error404');
            return;
        }

        $controller->$actionName($params);

    }

    public static function redirect($url) {
        header("Location: $url");
    }

    public static function goHome() {
        Core::redirect($_SERVER["SCRIPT_NAME"]);
    }


}