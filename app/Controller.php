<?php
namespace App;

class Controller
{
    public $layout = "main";

    public function renderLayout($view, $params){
        $layout = ROOTPATH.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR."layouts".DIRECTORY_SEPARATOR.$this->layout.".php";
        extract($params);

        require $layout;

    }

    public function render($view, $params = []) {
        $controller = array_pop(explode(DIRECTORY_SEPARATOR,get_class($this)));
        $controller = strtolower(substr($controller, 0, strpos($controller, "Controller")));

        $viewFile = ROOTPATH.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$controller.DIRECTORY_SEPARATOR.$view.'.php';

        $this->renderLayout($viewFile, $params);
    }

}