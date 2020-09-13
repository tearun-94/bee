<?php
session_start();
define('ROOTPATH', __DIR__);
require __DIR__ . '/app/Application.php';

Application::init();
(new \App\Core())->run();