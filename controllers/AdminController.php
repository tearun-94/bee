<?php
namespace controllers;

use App\Controller;
use App\Core;
use models\Users;

class AdminController extends Controller
{

    public function actionIndex() {
        if (!$_SESSION['user'])
            Core::redirect($_SERVER["SCRIPT_NAME"]."/admin/login");


    }

    public function actionLogin() {
        $this->layout = 'login';

        if (Users::isUser())
            Core::redirect($_SERVER["SCRIPT_NAME"]);

        if(empty($_POST))
            return $this->render('login');

        $model = new Users();

        if($model->login($_POST['inputLogin'],$_POST['inputPass']))
            Core::redirect($_SERVER["SCRIPT_NAME"]);
        else
            return $this->render('login', [
                'message'   => "Не существующий логин или пароль"
            ]);

    }

    public function actionLogout() {
        session_unset();
        Core::redirect($_SERVER["SCRIPT_NAME"]."/admin/login");
    }

}