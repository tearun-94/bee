<?php
namespace controllers;

class ErrorController
{
    public function actionError404()
    {
        header("HTTP/1.x 404 Not Found");
        header("Status: 404 Not Found");
        echo "404 Not Found";
    }
}